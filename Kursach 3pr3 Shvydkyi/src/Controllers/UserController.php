<?php
class UserController{
  
private $data;
private $model;

public function __construct($data) {
	$this->data=$data;
}

public function output(){
if(!empty($this->data))
	
	return "../src/Views/action/action.php";
}
}

    
