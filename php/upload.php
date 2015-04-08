<?php
if(isset($_FILES["file"])) {
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["file"]["name"]);
    $uploadOk = 1;
    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
    $check = getimagesize($_FILES["file"]["tmp_name"]);
    $message = array();
    if($check !== false) {
        if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
            if(false) { // anh khong hop le
                header("HTTP/1.0 400 Bad Request");
                echo "Ảnh không hợp lệ";
            }
            
            header('Content-Type: application/json');
            $return = $_POST;
            $return["success"] = true;
            echo json_encode($return);
        } else {
           header("HTTP/1.0 400 Bad Request");
           echo "Lỗi: không thể upload file";
        }
        
    } else {
        header("HTTP/1.0 400 Bad Request");
        $message["error"] =  "Chỉ chấp nhận file ảnh";
    }
}
?>