<?php
    include_once("models/UsersModel.php");
    //session_start(); 

    /*if (!isset($_SESSION['user']))
    {
        header("HTTP/1.0 400 Bad Request");
        echo "Have to login first";
        return; 
    }*/

    // type = schoolId ==> schoolId
    // type = provinceId ==> provinceId
    // type = albumId ==> albumId
    // type = default ==> photoId

    if(isset($_POST['type']) && isset($_POST['param']) && isset($_POST['page'])) {
        $page = $_POST['page'];
        $type = $_POST['type'];
        $param = $_POST['param'];
        $model = new UsersModel();
        $data = array();
        $result = $model->getListPhoto($type,$param,$page);

        if($result != NULL) {
            foreach($result as $r) {
                $data[] = array('id' => $r->id, 
                                'name' => basename($r->snippet['photoName'], '.jpg'), 
                                'description' => $r->snippet['description'], 
                                'thumbnail' => $r->snippet['path'].'/'.$r->id.'/I/'.$r->snippet['photoName'], 
                                'created_date' => date("d/m/Y", strtotime($r->snippet['dateUploaded'])),
                                'url' => "#album", 
                                'location'=> $r->snippet['provinceName'],
                                'album'=>array(
                                    'id' => $r->snippet['albumId'],
                                    'name'=> $r->snippet['albumName'],
                                    'url'=> "#albumh1"
                                ),
                                'rating'=>array(
                                    'count'=> $r->statistics['rating']['total'],
                                    'star'=> $r->statistics['rating']['average']
                                )
                                );
            }
            
            $toEncode = array('success' => true, 'data' => $data);
            echo json_encode($toEncode);
        } else {
            echo "No album";
        }
    }
?>