<?php

class DonationController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$donations = Donation::orderBy('created_at', 'desc')
					->paginate($this->perPage);

		return View::make('donations.list', array(
			'donations' => $donations
		));
	}

	public function getMobile($location_id = null){

		$mobiles = array('') + Location::whereIn('location_type_id', array(3))->lists('code', 'id');
		$donors = [''] + Donor::all()->lists('name_with_blood_group', 'id');
		$products = [''];

		foreach(Category::all() as $cat){
			$cat_products = $cat->products->lists('name', 'id');
			$products[$cat->name] = $cat_products;
		}

		$locations = [''] + Location::all()->lists('name_with_parent', 'id');

		if($location_id){
			$donations = Donation::where('location_id', '=', $location_id)
				->orderBy('donations.created_at', 'desc')
					->paginate(15);			
		}else{
			$donations = Donation::mobileCampaigns()
				->orderBy('donations.created_at', 'desc')
				->paginate(15);
		}
		// $donations = Donation::orderBy('created_at', 'desc')
		// 			->paginate($this->perPage);
		


		if(Request::ajax()){
			return View::make('mobiles.mdonations-table', array(
				'donations' => $donations
			));
		}

		return View::make('mobiles.mdonations', array(
			'mobiles' => $mobiles,
			'donors' => $donors,
			'products' => $products,
			'locations' => $locations,
			'donations' => $donations,
			'today' => Carbon\Carbon::now()
		));
	}

	public function postMobile(){

		$donations = Input::get('mobile_campaign_id');

		foreach($donations as $mobileID){
			$mobile = Location::find($mobileID);
		}

		//Session::flash('success', 'Successfully selected mobiles!');
		//return Redirect::action('DonationController@getMobiles');
		return Redirect::route('donation.getMobile');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$donors = [''] + Donor::all()->lists('name_with_blood_group', 'id');
		$products = [''];

		foreach(Category::all() as $cat){
			$cat_products = $cat->products->lists('name', 'id');
			$products[$cat->name] = $cat_products;
		}

		$locations = [''] + Location::all()->lists('name_with_parent', 'id');

		return View::make('donations.create', [
			'donors' => $donors,
			'products' => $products,
			'locations' => $locations,
			'today' => Carbon\Carbon::now()
		]);
	}

	protected function validate(){
		$rules = array(
			'donor_id' => 'not_in:0',
			'product_id' => 'not_in:0',
			'location_id' => 'not_in:0',
			'quantity' => 'required',
			'donated_at' => 'required|date_format:Y-m-d H:i:s',
		);

		$messages = array(
			'donor_id.not_in' => 'The donor field is required.',
			'product_id.not_in' => 'The product field is required.',
			'location_id.not_in' => 'The location field is required.',
			'donated_at.required' => 'The donated on field is required.',
			'donated_at.date_format' => 'The donated on field should be in format of yyyy-mm-dd hh:mm:ss.',
		);

		$validator = Validator::make(Input::all(), $rules, $messages);

		return $validator;
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		/*$validator = $this->validate();

		if($validator->fails()){
			return Redirect::back()
					->withErrors($validator->messages())
					->withInput(Input::all());	
		}*/


		$validator = $this->validate();

		if($validator->fails()){

			if (Request::ajax()){
				return Response::json(array(
					'success' => false,
					'messages' => $validator->messages()
				));
			}

			else{
				return Redirect::back()
						->withErrors($validator->messages())
						->withInput(Input::all());	

			}
		}



		$donor = Donor::find(Input::get('donor_id'));
		$product = Product::find(Input::get('product_id'));

		// Donor can only give blood of it's own blood type
		if(strtolower($product->category->name) == 'blood'){

			if(strtolower($donor->blood_group->name) != strtolower($product->name)){
				//apply ajax
				if (Request::ajax()){
					return Response::json(array(
						'success' => false,
						'messages' => ['This donor is only able to donate blood of type ' . $donor->blood_group->name . ' only.']
					));
				}

				else{
					return Redirect::back()
						->withErrors(['This donor is only able to donate blood of type ' . $donor->blood_group->name . ' only.'])
						->withInput(Input::all());
				}
			}
		}

		// Check if donor is eligible to make the donation
		if(count($donor->donations)) {
			
			// Check if donor is donating within the validity period
			$validity_days = $product->validity_period;

			$last_donated_at = new Carbon\Carbon($donor->donations->last()->donated_at);	
			$next_possible_donation_date = $last_donated_at->addDays($validity_days);

			$today = Carbon\Carbon::now();

			if($next_possible_donation_date->gt($today)){
				//if ajax request nam return response.
				if (Request::ajax()){
					return Response::json(array(
						'success' => false,
						'messages' => ['This donor is not able to donate untill ' . $next_possible_donation_date->format('Y-m-d') . '.']
					));
				}

				else{
					return Redirect::back()
						->withErrors(['This donor is not able to donate untill ' . $next_possible_donation_date->format('Y-m-d') . '.'])
						->withInput(Input::all());	
				}
			}
		}

		DB::beginTransaction();

		$donation = new Donation();

		$donation->donor_id = Input::get('donor_id');
		$donation->product_id = Input::get('product_id');
		$donation->location_id = Input::get('location_id');
		$donation->quantity = Input::get('quantity');
		$donation->donated_at = Input::get('donated_at');

		$donation->save();

		/*if (Request::ajax()){
			return Response::json(array(
				'success' => true,
				'donors' => [''] + Donor::all()->lists('name_with_blood_group', 'id'),
				'donor_id' => $donor->id,
			));
		}*/

		// Increment product quantity

		$product = $donation->product;
		$product->quantity = $product->quantity + $donation->quantity;
		$product->save();

		// increment count in item_in table
		// increment count in location_products table
		$response = Event::fire('donation.create', array($donation));

		DB::commit();

		if (Request::ajax()){
			return Response::json(array(
				'success' => true,
				'donors' => [''] + Donor::all()->lists('name_with_blood_group', 'id'),
				'donor_id' => $donor->id,
			));
		}

		else{		
			Session::flash('success', 'Successfully created donation!');
			return Redirect::route('donation.index');
		}
		
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


}
