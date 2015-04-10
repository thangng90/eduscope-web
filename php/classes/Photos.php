<?php
class Photos{
	public $id;
	public $snippet;
	public $statistics;
	function Photos($_id, $_snippet, $_statistics){
		$this->id 			= $_id;
		$this->snippet		= $_snippet;
		$this->statistics 	= $_statistics;
	}
}
?>