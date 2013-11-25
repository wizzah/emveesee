<?php

namespace Core;

class View
{

	public $title;
	public $template;
	public $location;

	function __construct($title, $template, $loc) {
		$this->title    = $title;
		$this->template = $template;
		$this->location = $loc;
	}

	/**
	 * Creates views
	 * @param  string $loc  Location of view being forged
	 * @param  array $data Variables being passed through
	 */
	public static function forge($loc, $title) {
		$template = Config::get('template');

		return new self($title, $template, $loc);
	}

	public function load($data) {
		$title = $this->title;
		$content =  $this->load_html(APP_ROOT."app/views/".$this->location.".php", $data);

		//include the template
		include APP_ROOT."app/views/".$this->template;
	}

	public function load_html($filename, $data) {
		if(is_file($filename)) {
			//output buffering captures scope, so that the tepmlate doesn't collide with the views
			//captures output, is almost like eval()
			ob_start();
			//for every index of $data
			extract($data);
			// include this filename, that loads up the php
			include $filename;
			// this returns the parsed php code
			return ob_get_clean();
		}
		return false;
	}
}

?>