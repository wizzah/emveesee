<?php

/**
* example.com/First/Second/Third
* First is the controller
* Second is the method
* Third, fourth, etc are parameters in the method
*/

//declare Core namespace
namespace Core;

/**
 * Breaks up the uri
 */
class Router
{
	/**
	 * Class's constructor function
	 * @param string $uri Browser's URL
	 */
	function __construct($uri)
	{
		//Registers this uri, and doesn't include the first slash
		$this->uri = substr($uri, 1);

		//split the uri
		$pieces = explode("/", $this->uri);

		//Declare controller method
		//array_shift shifts off the first item in $pieces
		$this->controller = array_shift($pieces);
		//Declare method function
		$this->method = array_shift($pieces);
		//Everything else is a parameter
		$this->parameters = $pieces;
	}
}

?>