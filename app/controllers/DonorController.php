<?php

class DonorController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$donors = Donor::orderBy('created_at', 'desc')
					->paginate($this->perPage);

		return View::make('donors.list', array(
			'donors' => $donors
		));
	}

	public function getAlert(){
		$blood_groups = array('') + BloodGroup::all()->lists('name', 'id');
		
		return View::make('donors.alert', array(
			'blood_groups' => $blood_groups
		));
	}

	public function getGetEligibleDonors($bloodGroupId){
		return Response::json(array(
			'donors' => Donor::where('blood_group_id', '=', $bloodGroupId)
						->get()
		));
	}

	public function postAlert(){

		$donors = Input::get('donors');

		foreach($donors as $donorId){
			$donor = Donor::find($donorId);
			// send sms to $donor->contact_no;
		}

		Session::flash('success', 'Successfully sent alerts to selected donors!');
		return Redirect::action('DonorController@getAlert');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$blood_groups = array('') + BloodGroup::all()->lists('name', 'id');

		return View::make('donors.create', array(
			'blood_groups' => $blood_groups
		));	
	}

	protected function validate(){

		$rules = array(
			'name' => 'required',
			'dob' => 'required|date_format:Y-m-d',
			'nic' => 'required',
			'gender' => 'not_in:0',
			'blood_group_id' => 'not_in:0',
			'email' => 'email',
		);

		$messages = array(
			'dob.required' => 'The date of birth field is required.',
			'dob.date_format' => 'The date of birth field should be in format of yyyy-mm-dd.',
			'nic.required' => 'The national ID field is required.',
			'gender.not_in' => 'The gender field is required.',
			'blood_group_id.not_in' => 'The blood group field is required.',
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
		$validator = $this->validate();

		if($validator->fails()){

			if (Request::ajax()){
				return Response::json(array(
					'success' => false,
					'messages' => $validator->messages()
				));
			}

			return Redirect::back()
					->withErrors($validator->messages())
					->withInput(Input::all());	
		}

		$donor = new Donor();

		$donor->name = Input::get('name');
		$donor->dob = Input::get('dob');
		$donor->nic = Input::get('nic');
		$donor->gender = Input::get('gender');
		$donor->blood_group_id = Input::get('blood_group_id');
		$donor->email = Input::get('email');
		$donor->address = Input::get('address');
		$donor->details = Input::get('details');

		$donor->save();

		if (Request::ajax()){
			return Response::json(array(
				'success' => true,
				'donors' => [''] + Donor::all()->lists('name_with_blood_group', 'id'),
				'donor_id' => $donor->id,
			));
		}

		Session::flash('success', 'Successfully created donor!');
		return Redirect::route('donor.index');
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		return View::make('donors.view');
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{

		$donor = Donor::find($id);

		$blood_groups = array('') + BloodGroup::all()->lists('name', 'id');

		return View::make('donors.create', array(
			'donor' => $donor,
			'blood_groups' => $blood_groups
		));	
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$validator = $this->validate();

		if($validator->fails()){
			return Redirect::back()
					->withErrors($validator->messages())
					->withInput(Input::all());	
		}

		$donor = Donor::find($id);
		$donor->name = Input::get('name');
		$donor->dob = Input::get('dob');
		$donor->nic = Input::get('nic');
		$donor->gender = Input::get('gender');
		$donor->blood_group_id = Input::get('blood_group_id');
		$donor->email = Input::get('email');
		$donor->address = Input::get('address');
		$donor->details = Input::get('details');

		$donor->save();

		Session::flash('success', 'Successfully updated donor!');
		return Redirect::back();
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Donor::find($id)->delete();

		Session::flash('success', 'Successfully deleted donor!');
		return Redirect::back();
	}


}




















