<?php

//Includes the autoloader
include "../emveesee/core/autoloader.php";

//Calls autoloader
//So now I don't have to include every file
Core\Autoloader::init();

//give it array of core classes to autoload
Core\Autoloader::register_core_classes(array(
	"Core\Router",
	"Core\Controller",
	"Core\View"
));

// Create new instance of Router class
$newRouter = new Router($_SERVER['REQUEST_URI']);

//ucwords uppercases the first character
$controllerName = ucwords($newRouter->controller);
//Prepends "Controller_"
$controllerName = "Controller_".$controllerName;

//Prepends "action_" to the front of the method
//This is so other people can't try to use your methods
$method = "action_".$newRouter->method;
//Takes in controller name and method
//$controllerName::$method($newRouter->parameters)
call_user_func_array(array($controllerName, $method), $newRouter->parameters);