<?php
class Album{
	public $id;
	public $albumName;
	public $schoolName;
	public $provinceName;
	public $description;
	public $dateCreated;
	public $ownerName;
	public $albumThumbnail;
	function Album($_id, $_albumName, $_schoolName, $_provinceName, $_description, $_dateCreated, $_ownerName, $_albumThumbnail){
		$this->id 				= $_id;
		$this->albumName 		= $_albumName;
		$this->schoolName 		= $_schoolName;
		$this->provinceName 	= $_provinceName;
		$this->description 		= $_description;
		$this->dateCreated  	= $_dateCreated;
		$this->ownerName 		= $_ownerName;
		$this->albumThumbnail 	= $_albumThumbnail;
	}
}
?>