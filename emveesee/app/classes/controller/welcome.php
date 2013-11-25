<?php

/**
* 
*/
class Controller_Welcome extends Controller
{

	public static function action_hello($name, $age) 
	{
		$data = array();
		$data["myName"] = $name;
		$data["age"] = $age;
		View::forge("welcome/hello", "Hello, ".$data["myName"])->load($data);

	}
}