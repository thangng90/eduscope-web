<?php
class Devices{
	public $id;
	public $idschool;
	public $code;	// information to authenticate a photo
	public $name;
	public $status;
	function Devices($_id, $_idschool, $_code, $_name, $_status){
		$this->id 		= $_id;
		$this->idschool = $_idschool;
		$this->code 	= $_code;
		$this->name 	= $_name;
		$this->status 	= $_status;
	}
}
?>