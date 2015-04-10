<?php 
//include_once("php/models/UsersModel.php");
session_start();
ob_start();

if(isset($_GET['action'])) {	
    
    $action = $_GET['action'];
    
	switch ($action) {
		//View home
		case 'home':
			include 'pages/home/home.php';
			break;
		//Action Logout	
		case 'signout':
			//unset($_SESSION['username']);
			//header("location: ../");
			break;
		case 'contact':
			//Contact
			break;
        
		case 'active':			
			$username= $_GET['username'];
			$active_code =$_GET['id'];
			$model= new UsersModel();
			if($model->active_account($username, $active_code))
				header("location: ?action=home&result=true&username=".$username."#toactive");
			else
				header("location: ?action=home&result=false&username=".$username."#toactive");
			break;
        
		case 'settings':
			include 'pages/user_settings/settings.php';
			break;
		default:
			include 'pages/home/home.php';
			break;
	}
}
else {
	include 'pages/home/home.php';
}
?>