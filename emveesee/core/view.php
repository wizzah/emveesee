<?php

namespace Core;

class View
{
	/**
	 * Creates views
	 * @param  string $loc  Location of view being forged
	 * @param  array $data Variables being passed through
	 */
	public static function forge($loc, $data, $title) {
		${$title} = $title;

		$template = "template.php";

		//include the template
		include "../emveesee/app/views/".$template;

		//for every index of $data
		foreach ($data as $key => $value) {
			//variable the variable
			//this helps with scope, so the later include can use these variables
			//anyway, the variable variable gets the value
			${$key} = $value;
		}

		//includes the content
		include "../emveesee/app/views/".$loc.".php";
		
	}
}

?>