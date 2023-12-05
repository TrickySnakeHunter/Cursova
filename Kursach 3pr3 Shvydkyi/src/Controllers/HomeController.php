<?php

class HomeController
{

	private $data;
	private $root;

	public function __construct($data, $root)
	{
		$this->data = $data;
		$this->root = $root;
	}

	public function output()
	{
		include($this->root."../src/Views/Views.php");
		return new Views($this->data, $this->root);
	}
}
