<?php
include_once("../UsersModel.php");
if(isset($_POST['username']) and isset($_POST['email']) and isset($_POST['password'])
	and isset($_POST['fullname'])and isset($_POST['phone'])
	 and isset($_POST['schoolname'] and isset($_POST['provincename'])){
	$username = $_POST['username'];
	$password = sha1($_POST['password']);
	$email = $_POST['email'];
	$fullname = $_POST['fullname'];
	$phone = $_POST['phone'];
	$schoolname = $_POST['schoolname'];
	$provincename = $_POST['provincename'];
	$model = new UsersModel();
	$msg='';
	if ($model->checkUser($username))
		$msg='* This username is already registered.</br>';
	if ($model->checkEmail($email))
		$msg=$msg.'* This email is already registered.';
	if($msg <> ''){
		echo $msg;
	}
	else{
		$listpro = $model->getListProvince();
		$provinceId = NULL;
		$schoolId = NULL;
		foreach ($listpro as $value) {
			if ($value->name == $provincename)
			{
				$provinceId = $value->id;
				break;
			}
		}
		if ($provinceId != NULL){
			$listschool = $model->getListSchool($provinceId);
			foreach ($listschool as $value) {
				if ($value->name == $schoolname){
					$schoolId =  $value->id;
					break;
				}
			}
		}
		else 'Error. Please sign up again!';
		if ($schoolId != NULL){
			$result = $model->registerUser($username, $password, $fullname, $email, $phone, $schoolId,1);
			if ($result == 0)
				echo "Thank you for registering at the NHV-CAM. Please check your email to active your account!";
		}
		else 'Error. Please sign up again!';
	}
}
?>