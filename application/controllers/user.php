<?php

class User_Controller extends Base_Controller {
	
	public $restful = true; 

	public function __construct()
	{
		parent::__construct();
		$this->filter('before', 'auth');
	}

	public function get_index()
	{
		$users = User::get();

		return View::make('user.index')
					->with('users', $users);
	}

	public function get_show($user_id)
	{
		$user = User::find($user_id);

		return View::make('user.show')
					->with('user', $user);
	}

	public function get_new()
	{
		return View::make('user.new');
	}

	public function post_new()
	{
		$user = new User();

		if($user->validate(Input::get()))
		{
			$user_data = array(
					  'name' => Input::get('name'),
					  'email' => Input::get('email'),
					  'username' => Input::get('username'),
					  'password' => Hash::make(Input::get('password'))
				    );
			$user->fill($user_data);
			$user->save();

			return Redirect::to_action('user')
							->with('success', 'Successfully created new user.');
		}

		return Redirect::to_action('user.new')
						->with_input()
						->with('errors', $user->errors());
	}

}