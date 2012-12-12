<?php

Class User extends Elegant {
	
	public static $table = 'hc_users';

	protected $rules = array(
		'name' => 'required|min:3',
		'email' => 'email',
		'username' => 'required|min:3',
		'password' => 'required|confirmed|min:4' 
	);


}