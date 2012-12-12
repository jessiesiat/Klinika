<?php

Class Admin_User_Controller extends Base_Controller {
	
	public function action_new()
	{
		View::make('admin.user.new');
	}

}