<?php

namespace Core;

/**
* 
*/
class Config
{
	/**
	* returns template.php
	*/
	public static function get($needle) {

		$haystack = include APP_ROOT."app/config/config.php";
		return $haystack[$needle];

	}
}