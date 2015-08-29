<?php

class AdjustmentController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		// 
		// $adjustments = Product::paginate($this->perPage);

		// return View::make('adjustment.list', [
		// 	'adjustment' => $adjustments
		// ]);

		echo "INDEX";


	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		
		
		$types = ['','Positive', 'Negative'];
		$products = [''];

		foreach(Category::all() as $cat){
			$cat_products = $cat->products->lists('name', 'id');
			$products[$cat->name] = $cat_products;
		}

		$locations = [''] + Location::all()->lists('name_with_parent', 'id');
		//$products = array('') + Product::all()->lists('name', 'category_id');

		return View::make('adjustments.create', [
			'products' => $products,
		 	'locations' => $locations,
			'type' => $types, 
			'quantity'=> '',
		 	'today' => Carbon\Carbon::now(),
		 	'description' => ''	
		]);

		
		
	}

	//Validating the Inputs from Adjustment Create

	protected function validate(){
		$rules = array(
			'type' => 'not_in:0',
			'product_id' => 'not_in:0',
			'location_id' => 'not_in:0',
			'quantity' => 'required | numeric',
			// 'adjustment_date' => 'required|date_format:Y-m-d H:i:s',
		);

		$messages = array(
			'type.not_in' => 'Please select an Adjustment Type.',
			'product_id.not_in' => 'Please select a Product.',
			'location_id.not_in' => 'Please select the Location.',
			'quantity.required' => 'Please enter a valid product quantity.',
			'quantity.numeric' => 'Quanity value should be numeric.',
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
		//

		$validator = $this->validate();

		if($validator->fails()){
			return Redirect::back()
					->withErrors($validator->messages())
					->withInput(Input::all());	
		}

		$type = Input::get('type');
		$product = Product::find(Input::get('product_id'));
		$location = Location::find(Input::get('location_id'));
		$quantity = Input::get('quantity');
		$adjustment_date = Input::get('adjustment_date');
		$description = Input::get('description');


		
		DB::beginTransaction();
		$adjustment = new Adjustment(); 

		// Record details in adjustment table 
		// Type [1 : Positive] [2 : Negative]

		$adjustment->type = $type;
		$adjustment->adjustment_date = $adjustment_date;
		$adjustment->description  = $description;

		$adjustment->save();

		// Store other details in a new array 

		$extra = array(
			'product-id ' => $product->id, 
			'quantity' => $quantity , 
			'location_id' => $location->id);


		// Get the current adjustment id;
		

		//Update records in the adjustment_products table


		//If type : POSITIVE 
		// 1.Find the correct record and Increment the product qty in location_products table
		// 2.Update item_in table 

		//If type : NEGATIVE
		// 1.Find the correct record and Decrement the product qty in location_products table
		// 2.Update item_out table 


		$response = Event::fire('adjustment.create', array($adjustment,$extra));



		DB::commit();
		print_r($response);
        exit();

		Session::flash('success', 'Successfully created donation!');
		return Redirect::route('adjustment.index');
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
