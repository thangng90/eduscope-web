<?php
$webroot = $_SERVER['DOCUMENT_ROOT'] . "eduscope/";
require_once 'swift/lib/swift_required.php';
include($webroot . 'php/classes/Users.php');
include_once($webroot . 'php/classes/Schools.php');
include_once($webroot . 'php/classes/Province.php');
include_once($webroot . 'php/classes/Devices.php');
include_once($webroot . 'php/classes/Album.php');
include_once($webroot . 'php/classes/Photos.php');
include_once('dbhelper.php');

class UsersModel extends dbhelper{
	public function getListProvince(){
		$sql = "SELECT * FROM PROVINCE";
		$result = parent::execQuery($sql);
		$lstProvince = array();
		if (parent::getNumberRows($result)>0){
			while($row = parent::fetchArray($result)){
				$province = new Province($row['IdProvince'],$row['ProvinceName']);
				array_push($lstProvince,$province);
			}
			return $lstProvince;
		}
		return NULL;
	}
	public function getListSchool($_idprovince){
		$sql = "SELECT * FROM SCHOOL WHERE IdProvince=$_idprovince";
		$result = parent::execQuery($sql);
		$lstSchool = array();
		if (parent::getNumberRows($result)>0) {
			while($row = parent::fetchArray($result)){
				$school = new Schools($row['IdSchool'],$row['SchoolName'],$row['Status']);
				array_push($lstSchool,$school);
			}
			return $lstSchool;
		}
		return NULL;
	}
	public function registerUser($_username, $_passwd, $_fullname, $_email, $_phone, $_idschool, $_idgroup) {
		if ($this->checkUser($_username))
			return 2;
		if ($this->checkEmail($_email))
			return 1;
		$key = md5(uniqid(rand(), true)).md5(uniqid(rand(), true));
		$expired = date_format(date_create(), ' Y-m-d H:i:s');
		$sql_key = "INSERT INTO `eduscope_db`.`ACTIVEKEYS` (`IdActive`,`Keys`) VALUES ('$_username','$key')";
		if(parent::execSQL($sql_key))
		{
			$sql_user = "INSERT INTO `eduscope_db`.`USER` (`Username`,`Password`,`Fullname`,`Email`,`Phone`,`IdSchool`,`IdUserGroup`,`Status`) 
			VALUES ('$_username','$_passwd','$_fullname','$_email','$_phone',$_idschool,$_idgroup,0)";
			if(parent::execSQL($sql_user))
			{
				$link = "http://www.ispioneer.com/eduscope?action=activate&username=$_username&code=$key";
				$this->sendEmail($link, $_email, $_fullname);
				return 0;	
			}
		}	
		return 3;
	}
	public function checkUser($_username) {
		$sql = "SELECT * FROM USER WHERE Username='$_username'";
		$result = parent::execQuery($sql);
		if (parent::getNumberRows($result) > 0){
			return true;
		}
		return false;
	}
    
	public function checkEmail($_email) {
		$sql = "SELECT * FROM USER WHERE Email='$_email'";
		$result = parent::execQuery($sql);
		if (parent::getNumberRows($result) > 0){
			return true;
		}
		return false;
	}
    
	public function checkDevice($_iddev) {
		$sql = "SELECT * FROM RPI WHERE IdRpi='$_iddev'";
		$result = parent::execQuery($sql);
		if (parent::getNumberRows($result) > 0){
			return true;
		}
		return false;
	}
    
	private function sendEmail($_message, $_email, $_fullname) {
		$transport = Swift_SmtpTransport::newInstance('smtp.gmail.com', 465, "ssl")
  		->setUsername('is.forwarder454@gmail.com')
  		->setPassword('forwarder454');

		$mailer = Swift_Mailer::newInstance($transport);

		$message = Swift_Message::newInstance('EduScope Network - Activation mail')
  		->setFrom(array('is.forwarder454@gmail.com' => 'IS Technology Supporter '))
  		->setTo(array($_email))
  		->setBody("Hello, $_fullname\n\nWellcome to EduScope Network. To complete your registration, please visit this URL:\n$_message\n\nHave a good day!");
		$result = $mailer->send($message);
	}
    
	public function activateAccount($_username, $_activekey) {
		if (!$this->checkUser($_username))
			return 1;
		$sql_key = "SELECT * FROM `eduscope_db`.`ACTIVEKEYS` WHERE `Keys`='$_activekey'";
		$result = parent::execQuery($sql_key);
		if (parent::getNumberRows($result) > 0){
			$sql_del = "DELETE FROM `eduscope_db`.`ACTIVEKEYS` WHERE `IdActive`='$_username'";
			$sql_up = "UPDATE `eduscope_db`.`USER` SET Status=1 WHERE `Username`='$_username'";
			echo $sql_del;
			if (parent::execSQL($sql_del) && parent::execSQL($sql_up))
				return 0;
			else
				return 2;
		}
	}
    
	public function login($_username, $_passwd, $_flag) {
		//$pass_hash = sha1($_passwd);
        if($_flag == 0) {
            $sql="SELECT * FROM `eduscope_db`.`USER` WHERE (`Username`='$_username' OR `Email`='$_username') AND Password='$_passwd' AND Status=1";
        } else if($_flag == 1) {
            $sql="SELECT * FROM `eduscope_db`.`USER` WHERE (`Username`='$_username' OR `Email`='$_username') AND Status=1";
        }
		$result=parent::execQuery($sql);
		if(parent::getNumberRows($result)>0){
			if($row = parent::fetchArray($result)){
				session_start();
				$location = $this->getLocationName($row['IdSchool']);
				$numPhoto = $this->getNumberPhoto($row['IdUser']);
				$user_lg= new Users($row['IdUser'], $row['Username'], $row['Fullname'],$location[0],$location[1],$row['Email'],$row['Phone'],$row['IdUserGroup'],$row['DateRegister'],$numPhoto);			
				print_r($user_lg);
				$_SESSION['user']= $user_lg;		
				return 0;	
			}
		}
		return 21;
	}
    
    public function getUserbyId($_userId) {
        $sql="SELECT * FROM `eduscope_db`.`USER` WHERE `IdUser`=$_userId AND Status=1";
        $result=parent::execQuery($sql);
        if(parent::getNumberRows($result) == 1) {
            $row = parent::fetchArray($result);
            $location = $this->getLocationName($row['IdSchool']);
            $numPhoto = $this->getNumberPhoto($row['IdUser']);
            $user = new Users($row['IdUser'], $row['Username'], $row['Fullname'],$location[0],$location[1],$row['Email'],$row['Phone'],$row['IdUserGroup'],$row['DateRegister'],$numPhoto);
            return $user;
        } else {
            return null;
        }
    }
    
	//location[0]=SchoolName;location[1]=ProvinceName;location[2]=ProvinceId;
	public function getLocationName($_idschool){
		$sql = "SELECT * FROM `eduscope_db`.`SCHOOL` WHERE `IdSchool`=$_idschool";
		$result = parent::execQuery($sql);
		$location = array();
		if (parent::getNumberRows($result)>0){
			if($row = parent::fetchArray($result)){
				array_push($location,$row['SchoolName']);
				array_push($location,$this->getListProvince()[strval($row['IdProvince']-1)]->name);
				array_push($location,$row['IdProvince']);
			}
			return $location;
		}
		return NULL;
	}
    
	public function getNumberPhoto($_iduser){
		$sql = "SELECT COUNT(IdUserCreate) FROM `eduscope_db`.`PHOTO` WHERE  `IdUserCreate`=$_iduser";
		$result = parent::execQuery($sql);
		$count = 0;
		if (parent::getNumberRows($result)>0){
			while($row = parent::fetchArray($result)){	
				$count = $row['0'];
			}
			return $count;
		}
		return $count;
	}
	public function getUsergroup($_idusergroup) {
		$sql = "SELECT * FROM `eduscope_db`.`USERGROUP` WHERE `IdUserGroup`=$_idusergroup";
		$result = parent::execQuery($sql);
		$usergroup = array();
		if (parent::getNumberRows($result)>0){
			if($row = parent::fetchArray($result)){
				array_push($usergroup,$row['IdUserGroup']);
				array_push($usergroup,$row['Name']);
				array_push($usergroup,$row['Description']);
			}
			return $usergroup;
		}
		return NULL;
	}
    
	public function getIdSchool($_iduser){
		$sql="SELECT * FROM `eduscope_db`.`USER` WHERE `IdUser`=$_iduser AND `Status`=1";
		$result=parent::execQuery($sql);
		if(parent::getNumberRows($result)>0){
			if($row = parent::fetchArray($result)){
				return $row['IdSchool'];
			}
		}
		return NULL;
	}
    
	public function getUserFullName($_iduser) {
		$sql="SELECT * FROM `eduscope_db`.`USER` WHERE `IdUser`=$_iduser AND `Status`=1";
		$result=parent::execQuery($sql);
		if(parent::getNumberRows($result)>0){
			if($row = parent::fetchArray($result)) {
				return $row['Fullname'];
			}
		}
		return NULL;
	}
    
	private function registerDevice($_iddev, $_name, $_idusercreate){
		if ($this->checkDevice($_iddev))
			return 11;
		$idschool = $this->getIdSchool($_idusercreate);
		$sql = "INSERT INTO `eduscope_db`.`RPI` (`IdRpi`,`IdSchool`,`Code`,`Name`,`IdUserCreate`,`Status`) 
		VALUES ('$_iddev',$idschool,UUID(),'$_name',$_idusercreate,1)";
		if(parent::execSQL($sql)){
			return 0;
		}
		return 13;
	}
	public function registerDeviceResponse($_iddev,$_name,$_idusercreate){
		$status = $this->registerDevice($_iddev,$_name,$_idusercreate);
		if ($status == 0)
		{
			$arrayresult = array();
			$sql = "SELECT * FROM `eduscope_db`.`RPI` WHERE `IdRpi`='$_iddev' AND `Status`=1";
			$result=parent::execQuery($sql);
			if(parent::getNumberRows($result)>0){
				if($row = parent::fetchArray($result)){
					array_push($arrayresult, $status);
					array_push($arrayresult, $row['Code']);
				}
			}
			return $arrayresult;
		}
		return $status;
	}

	//get all album
	public function getListAlbum($_userId) {
        if($_userId == 0) { // means all
            $sql = "SELECT * FROM `eduscope_db`.`ALBUM` WHERE `Status`=1";
        } else {
            $sql = "SELECT * FROM `eduscope_db`.`ALBUM` WHERE `Status`=1 AND `IdUserCreate`=$_userId";
        }		
		$result=parent::execQuery($sql);
		$arrayresult = array();
		if(parent::getNumberRows($result)>0){
			while($row = parent::fetchArray($result)){
				$location = $this->getLocationName($this->getIdSchool($row['IdUserCreate']));
				$album = new Album($row['IdAlbum'],$row['Name'],$location[0],$location[1],$row['Description'],$row['DateCreate'],$this->getUserFullName($row['IdUserCreate']),"");
				array_push($arrayresult, $album);
			}
			return $arrayresult;
		}
		return NULL;
	}
    
    // get scroll album
    public function getScrollListAlbum($_userId, $_page){
        $limit = 20;
        $start = ($_page - 1)*$limit;
        if ($_userId == 0)
            $sql = "SELECT * FROM `eduscope_db`.`ALBUM` WHERE `Status`=1 ORDER BY IdAlbum ASC LIMIT $start,$limit";
        else
            $sql = "SELECT * FROM `eduscope_db`.`ALBUM` WHERE `Status`=1 AND `IdUserCreate`=$_userId ORDER BY IdAlbum ASC LIMIT $start,$limit";
        $result=parent::execQuery($sql);
        $arrayresult = array();
        if(parent::getNumberRows($result)>0) {
            while($row = parent::fetchArray($result)) {
                $location = $this->getLocationName($this->getIdSchool($row['IdUserCreate']));
                $album = new Album($row['IdAlbum'],$row['Name'],$location[0],$location[1],$row['Description'],$row['DateCreate'],$this->getUserFullName($row['IdUserCreate']),"");
                array_push($arrayresult, $album);
            }
            return $arrayresult;
        }
        return NULL;
    }

	//get all photos in album
	public function getListPhoto($_type, $_param, $_page) {
		$limit = 20;
		$start = ($_page - 1)*$limit;
		$param = "";
		$sql = "";
		switch ($_type) {
			case 'schoolId':	// IdSchool
				$param = "WHERE `eduscope_db`.`PHOTO`.`IdSchool`=$_param AND `eduscope_db`.`PHOTO`.`Status`=1";
				$sql = "SELECT * FROM `eduscope_db`.`PHOTO` ".$param." ORDER BY `eduscope_db`.`PHOTO`.`IdPhoto` ASC LIMIT $start,$limit";
				break;
			case 'provinceId':// IdProvince
				$param = "WHERE `eduscope_db`.`SCHOOL`.`IdProvince`=$_param AND `eduscope_db`.`PHOTO`.`Status`=1";
				$sql = "SELECT `eduscope_db`.`PHOTO`.`IdPhoto`,`eduscope_db`.`PHOTO`.`PhotoName`,`eduscope_db`.`PHOTO`.`Description`,
					`eduscope_db`.`PHOTO`.`DateCreate`,`eduscope_db`.`PHOTO`.`IdUserCreate`,`eduscope_db`.`PHOTO`.`PathParent`,
					`eduscope_db`.`PHOTO`.`TotalView`,`eduscope_db`.`PHOTO`.`TotalRated`,`eduscope_db`.`PHOTO`.`IdSchool`
					 FROM `eduscope_db`.`PHOTO` 
					 INNER JOIN `eduscope_db`.`SCHOOL`
		 			ON `eduscope_db`.`SCHOOL`.`IdSchool`=`eduscope_db`.`PHOTO`.`IdSchool` ".$param." ORDER BY `eduscope_db`.`PHOTO`.`IdPhoto` ASC LIMIT $start,$limit";
				break;
			case 'albumId'://IdAlbum
				$param = "WHERE `eduscope_db`.`ALBUM_PHOTO`.`IdAlbum`=$_param AND `eduscope_db`.`PHOTO`.`Status`=1";
				$sql = "SELECT `eduscope_db`.`PHOTO`.`IdPhoto`,`eduscope_db`.`PHOTO`.`PhotoName`,`eduscope_db`.`PHOTO`.`Description`,
					`eduscope_db`.`PHOTO`.`DateCreate`,`eduscope_db`.`PHOTO`.`IdUserCreate`,`eduscope_db`.`PHOTO`.`PathParent`,
					`eduscope_db`.`PHOTO`.`TotalView`,`eduscope_db`.`PHOTO`.`TotalRated`,`eduscope_db`.`PHOTO`.`IdSchool`
					 FROM `eduscope_db`.`PHOTO` 
					 INNER JOIN `eduscope_db`.`ALBUM_PHOTO`
		 			ON `eduscope_db`.`ALBUM_PHOTO`.`IdPhoto`=`eduscope_db`.`PHOTO`.`IdPhoto` ".$param." ORDER BY `eduscope_db`.`PHOTO`.`IdPhoto` ASC LIMIT $start,$limit";
				break;
			default://IdPhoto
				$param = "WHERE `eduscope_db`.`PHOTO`.`IdPhoto`=$_param AND `eduscope_db`.`PHOTO`.`Status`=1";
				$sql = "SELECT * FROM `eduscope_db`.`PHOTO` ".$param;
				break;
		}
		//echo $sql;
		$arrayresult = array();
		$result = parent::execQuery($sql);
		if(parent::getNumberRows($result)>0){
			while($row = parent::fetchArray($result)){
				$provinceName = $this->getLocationName($row['IdSchool'])[1];
				$photos = new Photos($row['IdPhoto'],
									 $this->collectSnippetInfo($row['IdPhoto'],$row['PhotoName'],$row['DateCreate'],$row['Description'],$provinceName,$row['IdUserCreate'],$row['PathParent']),
									 $this->collectStatisticsInfo($row['IdPhoto'],$row['TotalView'],$row['TotalRated'])
									);
				array_push($arrayresult, $photos);
			}
			return $arrayresult;
		}
		return NULL;
	}

	public function collectSnippetInfo($_idphoto, $_photoName, $_dateUploaded, $_description, $_provincename, $_userUploaded, $_thumbnail){
		$sql = "SELECT * FROM `eduscope_db`.`ALBUM_PHOTO` WHERE `IdPhoto`='$_idphoto' AND `Status`=1";
		$result=parent::execQuery($sql);
		$albumName = "";
		$albumid = "";
		if(parent::getNumberRows($result)>0){
			if($row = parent::fetchArray($result)){
				$albumName = $this->getAlbumName($row['IdAlbum']);
				$albumid = $row['IdAlbum'];
			}
		}
		$result = array('photoName' 	=> $_photoName,
						'albumId'		=> $albumid,
						'albumName' 	=> $albumName,
						'dateUploaded'	=> $_dateUploaded,
						'description'	=> $_description,
						'provinceName'	=> $_provincename,
						'userUpload'	=> $_userUploaded,
						'path'		=> $_thumbnail,
						);
		return $result;
	}

	public function collectStatisticsInfo($_photo_id, $_totalView, $_totalRated){
		$result = array('view' 		=> $_totalView,
						'rating'	=> array('total' 	=> $_totalRated,
											 'average'	=> $this->avgRated($_photo_id),
											 'fiveStar' => $this->numRated(5,$_photo_id),
											 'fourStar' => $this->numRated(4,$_photo_id),
											 'threeStar'=> $this->numRated(3,$_photo_id),
											 'twoStar' 	=> $this->numRated(2,$_photo_id),
											 'oneStar' 	=> $this->numRated(1,$_photo_id)
											 )
						);
		return $result;
	}

	public function numRated($_rated, $_photo){
		$sql = "SELECT COUNT(Rate) FROM `eduscope_db`.`VOTE` WHERE  `Rate`=$_rated AND `IdPhoto`=$_photo";
		$result = parent::execQuery($sql);
		$count = 0;
		if (parent::getNumberRows($result)>0){
			while($row = parent::fetchArray($result)){	
				$count = $row['0'];
			}
			return $count;
		}
		return $count;
	}

	public function avgRated($_photo){
		$sql = "SELECT AVG(Rate) FROM `eduscope_db`.`VOTE` WHERE `IdPhoto`=$_photo";
		$result = parent::execQuery($sql);
		$count = 0;
		if (parent::getNumberRows($result)>0){
			while($row = parent::fetchArray($result)){	
				$count = $row['0'];
			}
			return $count;
		}
		return $count;
	}

	public function getAlbumName($_idAlbum){
		$sql="SELECT * FROM `eduscope_db`.`ALBUM` WHERE `IdAlbum`='$_idAlbum' AND `Status`=1";
		$result=parent::execQuery($sql);
		if(parent::getNumberRows($result)>0){
			if($row = parent::fetchArray($result)){
				return $row['Name'];
			}
		}
		return NULL;
	}
	public function createDir($_iduser){
		//province->school->user->album->idphoto->1,2,3
		$idsch = $this->getIdSchool($_iduser);
		$idpro = $this->getLocationName($idsch)[2];
		$dir = "../uploads/";
		$arr = array(strval($idpro),strval($idsch),strval($_iduser));
		for($i = 0 ; $i < 3 ; $i++){
			$dir = $dir.$arr[$i]."/";
			if (!file_exists($dir)){
				mkdir($dir,0777,true);
			}
		}
		return;
	}
    
	function makeThumbnails($updir, $img, $id,$MaxWe,$MaxHe) {
    	$arr_image_details = getimagesize($img); 
    	$width = $arr_image_details[0];
    	$height = $arr_image_details[1];

    	$percent = 100;
    	if($width > $MaxWe) $percent = floor(($MaxWe * 100) / $width);

    	if(floor(($height * $percent)/100)>$MaxHe)  
    	$percent = (($MaxHe * 100) / $height);

    	if($width > $height) {
    	    $newWidth=$MaxWe;
     	    $newHeight=round(($height*$percent)/100);
    	}else{
    	    $newWidth=round(($width*$percent)/100);
    	    $newHeight=$MaxHe;
    	}

    	if ($arr_image_details[2] == 1) {
    	    $imgt = "ImageGIF";
    	    $imgcreatefrom = "ImageCreateFromGIF";
    	}
    	if ($arr_image_details[2] == 2) {
    	    $imgt = "ImageJPEG";
    	    $imgcreatefrom = "ImageCreateFromJPEG";
    	}
    	if ($arr_image_details[2] == 3) {
        	$imgt = "ImagePNG";
        	$imgcreatefrom = "ImageCreateFromPNG";
    	}
    	if ($imgt) {
       		$old_image = $imgcreatefrom($img);
        	$new_image = imagecreatetruecolor($newWidth, $newHeight);
        	imagecopyresized($new_image, $old_image, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);

        $imgt($new_image, $updir."".$id);
        return;    
    	}
	}
    
    public function createAlbum($_iduser,$_albumName,$_description,$_schoolname,$_provincename) {
		//print_r($_SESSION['username']);
		$iduser = $_iduser;
		$schoolName = $_schoolname;
		$provinceName = $_provincename;
		$sqlinsert = "INSERT INTO `eduscope_db`.`ALBUM` (`Name`,`Description`,`IdUserCreate`,`Status`)
		 VALUES ('$_albumName','$_description',$iduser,1)";
		$idAlbum = parent::execSQLReturnID($sqlinsert);
		if($idAlbum == 0){
			return 142;
		}
		$sql = "SELECT * FROM `eduscope_db`.`ALBUM` WHERE `IdAlbum`=$idAlbum AND `Status`=1";
		$result=parent::execQuery($sql);
		$arrayresult = array();
		if(parent::getNumberRows($result)>0){
			if($row = parent::fetchArray($result)){
				$album = new Album($row['IdAlbum'],$row['Name'],$schoolName,$provinceName,$row['Description'],$row['DateCreate'],$this->getUserFullName($row['IdUserCreate']),"");
				array_push($arrayresult, $album);
			}
			return $arrayresult;
		}
		return NULL;
	}
    
	public function ratePhoto($_idPhoto,$_rateValue){
		if ($_rateValue < 1 || $_rateValue > 5)
			return 81;		// error 
		if (!isset($_SESSION['username'])){
			return 82;		// have to login 1st
		}
		$iduser = $_SESSION['username']->idUser;
		if ($this->changeRatePhoto($_idPhoto,$_rateValue,$iduser)==0)
			return 0;
		$sql = "INSERT INTO `eduscope_db`.`VOTE` (`Rate`,`IdPhoto`,`IdUserRate`,`Status`) 
		 VALUES ($_rateValue,$_idPhoto,$iduser,1)";
		if(parent::execSQL($sql)){
			return 0;
		}
		else{
			return 81;
		}
	}
    
	public function changeRatePhoto($_idPhoto,$_rateValue,$_iduser) {
		//if (!isset($_SESSION['username'])){
		//	return 82;		// have to login 1st
		//}
		//$iduser = $_SESSION['username']->idUser;
		$sql = "SELECT * FROM `eduscope_db`.`VOTE` 
		WHERE `IdPhoto`=$_idPhoto AND `IdUserRate`=$_iduser AND `Status`=1";
		$result=parent::execQuery($sql);
		if(parent::getNumberRows($result)==0)
		{
			return -1;
		}
		$sql_up = "UPDATE `eduscope_db`.`VOTE` SET `Rate`=$_rateValue 
		WHERE `IdPhoto`=$_idPhoto AND `IdUserRate`=$_iduser";
		if (parent::execSQL($sql_up))
			return 0;
		else
			return -1;
	}
    
	public function descriptionPhoto($_idPhoto,$_description) {
		if (!isset($_SESSION['username'])){
			return 62;		// have to login 1st
		}
		$iduser = $_SESSION['username']->idUser;
		$sql = "UPDATE `eduscope_db`.`PHOTO` SET `Description`='$_description',`IdUserEdit`=$iduser,`DateEdit`=NOW()  
		WHERE `IdPhoto`=$_idPhoto";
		if(parent::execSQL($sql)){
			return 0;
		}
		else
			return 61;
	}
    
	//upload function
	public function uploadPhoto($_data, $_iduser, $_photoName, $_albumId, $_description, $_groupview) {
		//assume data already checked
		$idrpi=1; // get when image is authenticated
		$iduser = $_iduser;
		$idsch = $this->getIdSchool($iduser);
		//check albumId
		$dir_image = $this->checkAlbum($_albumId, $iduser);
        $path = substr($dir_image, 3);
		$sqlinsert = "INSERT INTO `eduscope_db`.`PHOTO` (`PhotoName`,`Description`,`IdSchool`,`GroupView`,`IdRpi`,`IdUserCreate`,`PathParent`,`Status`)
		 VALUES ('$_photoName','$_description',$idsch,$_groupview,$idrpi,$iduser,'$path',1)";
		$idPhoto = parent::execSQLReturnID($sqlinsert);
		if($idPhoto == 0){
			return 42;
		}
        
        $sqlinsertAP = "INSERT INTO `eduscope_db`.`ALBUM_PHOTO` (`IdAlbum`,`IdPhoto`,`Note`,`IdUserCreate`,`Status`) VALUES ($_albumId,$idPhoto,'',$iduser,1)";
        if (!parent::execSQL($sqlinsertAP)) {
            return 42;
        }
        
		$dir_image = $dir_image."/".strval($idPhoto);
		if (file_exists($dir_image)){
			return 42;
		}
		mkdir($dir_image,0777,true);
		mkdir($dir_image."/F",0777,true);
		mkdir($dir_image."/I",0777,true);
		mkdir($dir_image."/M",0777,true);
		move_uploaded_file($_data["tmp_name"],$dir_image."/F/".$_photoName);
		$this->makeThumbnails($dir_image."/M/", $dir_image."/F/".$_photoName, $_photoName, 1200, 720);
		$this->makeThumbnails($dir_image."/I/", $dir_image."/F/".$_photoName, $_photoName, 640, 480);
		return 0;
	}
    
	public function checkAlbum($_albumId,$_iduser) {
		$idsch = $this->getIdSchool($_iduser);
		$idpro = $this->getLocationName($idsch)[2];
		$this->createDir($_iduser);
		if ($_albumId==0) {
			$dir = "../uploads/".strval($idpro)."/".strval($idsch)."/".strval($_albumId);
			if (!file_exists($dir)){
				mkdir($dir,0777,true);
			}
			return $dir;
		}
		$dir = "../uploads/".strval($idpro)."/".strval($idsch)."/".strval($_iduser)."/".strval($_albumId);
		if (!file_exists($dir)) {
			mkdir($dir,0777,true);
		}
		return $dir;
	}
}
?>