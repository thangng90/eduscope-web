<?php
class Users{
	public $idUser;
    public $username;
	public $fullName;
	public $schoolName;
	public $provinceName;
	public $email;
	public $phone;
	public $group;
	public $registrationDate;
	public $numPhoto;
	function Users($_iduser, $_username, $_fullname, $_schoolname, $_provincename, $_email, $_phone, $_idgroup, $_regDate, $_numPhoto)
	{
		$this->idUser 					=	$_iduser;
		$this->username 				=	$_username;
		$this->fullName 				=	$_fullname;
		$this->schoolName				=	$_schoolname;
		$this->provinceName 			=	$_provincename;
		$this->email 					=	$_email;
		$this->phone 					=	$_phone;
		$this->group 					=	$_idgroup;
		$this->registrationDate 		=	$_regDate;
		$this->numPhoto 				=	$_numPhoto;
	}
}
?>