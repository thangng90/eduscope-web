<?php
include_once("models/UsersModel.php");
session_start();
if (!isset($_SESSION['user']))
{
	echo "Have to login first";
	return;	
}
if(isset($_FILES["file"])) {
	$model = new UsersModel();
	$id = $_SESSION['user']->idUser;
    $idalbum = $_POST["album-id"];
	$albumname = $_POST["album-name"];
	if ($idalbum == "" and $albumname == "")
		$idalbum = 0 ;
	if ($idalbum == "")
	{
		$array = $model->createAlbum($id,$albumname,"",$_SESSION['user']->schoolName,$_SESSION['user']->provinceName);
		if (is_array($array)){
			$idalbum = $array->id;
			$albumname = $array->albumName;
		}
		else
		{
			echo "Create new album falied";
			return ;
		}
	}
	$result = $model->uploadPhoto($_FILES["file"], $id, $_FILES["file"]["name"], $idalbum, $_POST["description"], 1);
	switch ($result) {
		case 0:
			echo "Finished";
			$return["success"] = true;
			break;
		default:
			echo "Something wrong:".$result;
			break;
	}
}
?>