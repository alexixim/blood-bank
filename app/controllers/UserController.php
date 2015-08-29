<?php

class UserController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$users = User::orderBy('created_at', 'desc')
					->paginate($this->perPage);

		return View::make('users.list', array(
			'users' => $users,
		));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('users.create');
	}

	protected function validate(){
		$rules = array(
			'name' => 'required',
			'username' => 'required',
			'email' => 'email|required',
			'password' => 'required',
		);

		$messages = array(
			'name.required' => 'The Name field is required.',
			'username.required' => 'The Username field is required.',
			'password.required' => 'The Password field is required.',
			'email.required' => 'The Email field is required.',
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

		$user = new User();

		$user->name = Input::get('name');
		$user->username = Input::get('username');
		$user->email = Input::get('email');
		$user->password = Input::get('password');

		$user->save();

		Session::flash('success', 'Successfully created user!');
		return Redirect::route('user.index');
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$users = User::orderBy('created_at', 'desc')
					->paginate($this->perPage);

		return View::make('users.list', array(
			'users' => $users,
		));
		return View::make('users.view');
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$user = User::find($id);

		return View::make('users.create', array(
			'user' => $user,
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

		$user = User::find($id);
		$user->name = Input::get('name');
		$user->username = Input::get('username');
		$user->email = Input::get('email');
		$user->password = Input::get('password');

		$user->save();

		Session::flash('success', 'Successfully updated user!');
		//return Redirect::back();
		return Redirect::route('user.index');
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		User::find($id)->delete();

		Session::flash('success', 'Successfully deleted user!');
		return Redirect::back();
	}


}
