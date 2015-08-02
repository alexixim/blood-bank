<?php

class AuthController extends BaseController
{
    public function getLogin()
    {
        // If already logged in, redirect back
        if (Auth::check()) {
            return Redirect::back()
                ->with('success', 'You are already logged in');
        }

        return View::make('auth.login');
    }

    public function postLogin()
    {
        $userdata = array(
            'username' => Input::get('username'),
            'password' => Input::get('password')
        );

        // declare the rules for the form validation
        $rules = array(
            'username' => 'required',
            'password' => 'required'
        );

        // validate the inputs
        $validator = Validator::make($userdata, $rules);

        // check if the form validates with success.
        if ($validator->passes()) {

            if (Auth::attempt($userdata)) {
                return Redirect::intended(''); 
            } else {
                return Redirect::to('auth/login')
                    ->withErrors(array('password' => 'Invalid username or password.'))->withInput(Input::except('password'));
            }
        }

        return Redirect::to('')
            ->withErrors($validator)
            ->withInput(Input::except('password'));
    }

    public function getLogout()
    {
        Auth::logout();
        Session::flush();

        // Redirect to homepage
        return Redirect::to('/')->with('success', 'You have been successfully logged out');
    }

}
