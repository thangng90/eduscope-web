<?php
class Schools{
	public $id;
	public $name;
	public $status;
	function Schools($_id, $_name, $_status){
		$this->id 		= $_id;
		$this->name 	= $_name;
		$this->status 	= $_status;
	}
}
?>