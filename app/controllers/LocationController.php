<?php

class LocationController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$locations = Location::paginate($this->perPage);

		return View::make('locations.list', array('locations' => $locations));
	}


		/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$location_types = array('') + LocationType::all()->lists('name', 'id');
		$parent_locations = array('') + Location::whereIn('location_type_id', array(1, 2))->lists('code', 'id');

		return View::make('locations.create', array(
			'location_types' => $location_types,
			'parent_locations' => $parent_locations
		));	
	}

	protected function validate(){
		$rules = array(
			'code' => 'required',
			'name' => 'required',
			'address' => 'required',
			'location_type_id' => 'not_in:0',
			'valid_till' => 'date_format:Y-m-d',
		);

		$messages = array(
			'code.required' => 'The Location Code is required.',			
			'name.required' => 'The Location Name field is required.',	
			'address.required' => 'The address field is required.',
			'location_type_id.not_in' => 'The location type field is required.',
			'valid_till.date_format' => 'The valid till field should be in format of yyyy-mm-dd.',
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
			return Redirect::back()
					->withErrors($validator->messages())
					->withInput(Input::all());	
		}

		$location = new Location();

		$location->code = Input::get('code');
		$location->name = Input::get('name');
		$location->address = Input::get('address');
		$location->email = Input::get('email');
		$location->contact_no = Input::get('contact_no');
		$location->location_type_id = Input::get('location_type_id');
		$location->parent_location_id = Input::get('parent_location_id');
		$location->valid_till = Input::get('valid_till');
		$location->created_by = Auth::user() -> username; //Input::get('created_by');
		$location->organizer_details = Input::get('organizer_details');

		$location->save();

		Session::flash('success', 'Successfully created location!');
		return Redirect::route('location.index');
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		return View::make('locations.view');	
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$location = Location::find($id);

		$location_types = array('') + LocationType::all()->lists('name', 'id');
		//$parent_locations = array('') + Location::all()->lists('code', 'name');
		//$parent_locations = array('') + Location::where('location_type_id', 'IN', array(1, 2));
		$parent_locations = array('') + Location::whereIn('location_type_id', array(1, 2))->lists('code', 'id');

		return View::make('locations.create', array(
			'location' => $location,
			'location_types' => $location_types,
			'parent_locations' => $parent_locations
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

		$location = Location::find($id);
		$location->code = Input::get('code');
		$location->name = Input::get('name');
		$location->address = Input::get('address');
		$location->email = Input::get('email');
		$location->contact_no = Input::get('contact_no');
		$location->location_type_id = Input::get('location_type_id');
		$location->parent_location_id = Input::get('parent_location_id');
		$location->valid_till = Input::get('valid_till');
		$location->created_by = Input::get('created_by');
		$location->organizer_details = Input::get('organizer_details');

		$location->save();

		Session::flash('success', 'Successfully updated location!');
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
		Location::find($id)->delete();

		Session::flash('success', 'Successfully deleted location!');
		return Redirect::back();
	}


}
