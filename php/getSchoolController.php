<?php
    include_once("models/UsersModel.php");
    if(isset($_POST['provinceId'])) {
        $id = $_POST['provinceId'];
        $model = new UsersModel();
        $results = $model->getListSchool($id);
        
        $data = array();
        foreach($results as $r) {
            //echo $r->name;
            $data[] = array('id' => $r->id, 'name' => $r->name);
        }
        
        $toEncode = array('success' => 1, 'data' => $data);
        
        echo json_encode($toEncode);
    }
?>