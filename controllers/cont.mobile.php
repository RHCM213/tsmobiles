<?php
if(empty($id) || !is_numeric($id)) {
    http_response_code(400);
    header("Location: /400error");
    exit;
}

require("models/mod.mobiles.php");

$model = new Mobiles();
$mobile = $model->getmobile($id);

if(empty($mobile)) {
    http_response_code(404);
    header("Location: /404error");
}

$title = $mobile["mobile_name"];

$hide_null = $mobile["camera"] || $mobile["video"]  != NULL ?: 'style="display:none"';

$icon_boll = $mobile["is_smartphone"] || 
            $mobile["is_dualsim"] || 
            $mobile["has_cardslot"] ||
            $mobile["has_bluetooth"] == 1 ? '&#10003;' : '&#10007';




if( $_SERVER["REQUEST_METHOD"] === "POST") {
    
    
    $user_rating = json_decode( file_get_contents("php://input"), true );
    var_dump($user_rating); 
}






require("views/view.mobile.php");
