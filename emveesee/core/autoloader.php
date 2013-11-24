<?php

/**
* 
*/
namespace Core;

class Autoloader
{
	/**
	 * init registers the custom autoload class
	 */
	public static function init()
	{
		//the function to use when autoloading
		//the true parameter is there to prepend any autoloading it does
		spl_autoload_register("Core\Autoloader::loader", true);
	}

	/**
	 * Parses classname to find the file path
	 * Includes the class, as well
	 * @param  string $classname Name of the class being autoloaded
	 */
	public static function loader($classname)
	{
		// Lowercase the classname
		$filename = strtolower($classname);
		// Replaces the forward slash with backward slash
		$filename = str_replace("\\", "/", $filename);
		// Replaces any underscores with backward slash
		$filename = str_replace("_", "/", $filename);

		//Check the type to make sure it's 0 and not actually false 
		//If 'core' is in $filename
		if(strpos($filename, "core") !== false)
		{
			include "../emveesee/".$filename.".php";

		}
		//or else include app/classes/filename.php
		else
		{
			//mvc/app/classes/filename
			include "../emveesee/app/classes/".$filename.".php";
		}
	}

	/**
	 * Registers classes so you don't have to prepend everything wih the namespace, Core\
	 * @param  array $classes Array of classes to autoload
	 */
	public static function register_core_classes($classes)
	{
		//For every class in the array
		foreach($classes as $class) {
			//Split string at \
			$short_name = explode("\\", $class);
			//Get the last piece of the array created by the line above
			//and redeclare $short_name as that
			$short_name = array_pop($short_name);
			//Gives ability to use $short_name instead of $class
			class_alias($class, $short_name);
		}
	}

}