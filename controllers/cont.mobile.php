<?php
if(empty($id) || !is_numeric($id)) {
    http_response_code(400);
    header("Location: /400error");
    exit;
}

require("models/mod.mobiles.php");

$model = new Mobiles();
$mobile = $model->getMobile($id);

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




require("models/mod.ratings.php");

$modelRat = new Ratings();


if( $_SERVER["REQUEST_METHOD"] === "POST") {
    $rating = json_decode( file_get_contents("php://input"), true );
    
    if(
        !empty($_POST["txt_reply"]) &&
        mb_strlen($_POST["txt_reply"]) >= 8 &&
        mb_strlen($_POST["txt_reply"]) <= 65535
    ) {
        $modelRat->createRating($id, $_POST);

        $model->avgRating();
    }
     
}


  


$ratings = $modelRat->getRating($id);







require("models/mod.comments.php");

$modelComm = new Comments();







		



if(isset($_POST["send_comment"])) {

    if(
        !empty($_POST["txt_comment"]) &&
        mb_strlen($_POST["txt_comment"]) >= 8 &&
        mb_strlen($_POST["txt_comment"]) <= 65535
    ) {
        $modelComm = new Comments();
        $modelComm->createComment($_POST, $id);
    }
}     


if(isset($_POST["send_reply"])) {

    if(
        !empty($_POST["txt_reply"]) &&
        mb_strlen($_POST["txt_reply"]) >= 8 &&
        mb_strlen($_POST["txt_reply"]) <= 65535
    ) {
        $modelComm->createReply($_POST, $id);
    }
}     
    
$comments = $modelComm->getComments($id);  


require("views/view.mobile.php");


	
  
