<?php
include_once("models/UsersModel.php");
if(isset($_POST['username']) and isset($_POST['email']) and isset($_POST['password']) and isset($_POST['fullname']) and isset($_POST['schoolId'])) {
	$username = $_POST['username'];
	$password = sha1($_POST['password']);
	$email = $_POST['email'];
	$fullname = $_POST['fullname'];
	$schoolId = $_POST['schoolId'];
	$model = new UsersModel();
	$msg='';
    
    if(isset($_POST['phone']))
        $phone = $_POST['phone'];
    else
        $phone = '0123456789';
    
	if ($model->checkUser($username))
		$msg='* This username is already registered.</br>';
	if ($model->checkEmail($email))
		$msg=$msg.'* This email is already registered.';
	if($msg <> '') {
		echo $msg;
	}
	else {
		$result = $model->registerUser($username, $password, $fullname, $email, $phone, $schoolId, 1);
		if ($result == 0)
			echo "Thank you for registering at the NHV-CAM. Please check your email to activate your account!";
		else 
            //echo 'Error. Please sign up again!';
            echo $result;
	}
}
?>