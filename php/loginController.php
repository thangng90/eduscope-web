<?php
	include_once("models/UsersModel.php");
	if(isset($_POST['email']) and isset($_POST['password'])) {
		$email = $_POST['email'];
		$password = $_POST['password'];
		unset($_POST);
		$model = new UsersModel();
		$result = $model->login($email, $password);
		if($result == 0) {	
			echo "true";	
		}
		else {
			echo "Incorrect username or password";
		}
	}
?>