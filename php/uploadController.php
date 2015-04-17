<?php
include_once("models/UsersModel.php");
session_start();
if (!isset($_SESSION['user']))
{
	header("HTTP/1.0 400 Bad Request");
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
		//print_r($array);
		if (is_array($array)){
			$idalbum = $array[0]->id;
			$albumname = $array[0]->albumName;
		}
		else
		{
			header("HTTP/1.0 400 Bad Request");
			echo "Create new album falied";
			return ;
		}
	}
	//echo "new album id:".$idalbum;
	$result = $model->uploadPhoto($_FILES["file"], $id, $_FILES["file"]["name"], $idalbum, $_POST["description"], 1);
	switch ($result) {
		case 0:
			echo "Finished";
			$return["success"] = true;
			break;
		default:
			header("HTTP/1.0 400 Bad Request");
			echo "Something wrong:".$result;
			break;
	}
}
?>
