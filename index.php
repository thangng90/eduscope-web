<?php 
include_once("php/models/UsersModel.php");
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
		case 'logout':
			unset($_SESSION['user']);
			header("location: ?action=home");
			break;
		case 'contact':
			//Contact
			break;
        
		case 'activate':
            unset($_SESSION['user']);
            if(isset($_GET['username']) && isset($_GET['code'])) {
                include 'pages/home/home.php';
                $username= $_GET['username'];
                $activate_code =$_GET['code'];
                
                $model= new UsersModel();
                if($model->activateAccount($username, $activate_code) == 0) {
                    $model->login($username, "", 1);
                    echo "<script>showActivationModal();</script>";
                }
            } else {
                header("location: ?action=home");
            }
			break;
        
        case 'step':
            include 'pages/step/step.php';
            break;
        
        case 'all-albums':
            include 'pages/all-albums/all-albums.php';
            break;
        
        case 'all-photos':
            include 'pages/all-photos/all-photos.php';
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