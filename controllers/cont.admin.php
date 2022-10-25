<?php
$section=$id; 




$title = "Área Administrativa";




require("models/mod.mobiles.php");


$model = new Mobiles();
$admin_mobiles = $model->getAdminMobiles();


require("models/mod.comments.php");

$modelComm = new Comments();
$admin_comments = $modelComm->getAdminComments();


require("models/mod.users.php");    
$modelUsers = new Users();
$users = $modelUsers->getUsers();



if($_SERVER["REQUEST_METHOD"] === "GET") {

require("views/view.admin.php");

}

else if($_SERVER["REQUEST_METHOD"] === "DELETE") {
    if($model->delAdminMobiles($mobile_id)) {
        http_response_code(202);       
    }
    else {
        http_response_code(404);
    }


}
else {  
    http_response_code(405);
    exit;

}


