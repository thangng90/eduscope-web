<?php
    include_once("models/UsersModel.php");
    session_start(); 

    if(isset($_POST['type']) && isset($_POST['page'])) {
        $page = $_POST['page'];
        $type = $_POST['type'];
        $model = new UsersModel();
        $data = array();
        switch($type) {
            case 'all':
                $result = $model->getScrollListAlbum(0, $page);
                break;
            case 'mine':
                if(isset($_SESSION['user'])) {
                    $result = $model->getScrollListAlbum($_SESSION['user']->idUser, $page);
                }
                break;
        }
        if($result != NULL) {
            foreach($result as $r) {
                $data[] = array('id' => $r->id, 
                                'name' => $r->albumName, 
                                'description' => $r->description, 
                                'thumbnail' => "http://placehold.it/640x480", 
                                'created_date' => date("d/m/Y", strtotime($r->dateCreated)), 
                                'url' => "#album", 
                                "author" => array('id' => '00010',
                                                  'name' => $r->ownerName, 
                                                  'avatar' => "http://placehold.it/60x60", 
                                                  'url' => '#user'));
            }
            
            $toEncode = array('success' => true, 'data' => $data);
            echo json_encode($toEncode);
        } else {
            echo "No album";
        }
    }
?>