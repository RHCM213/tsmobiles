<?php
if(empty($id) || !is_numeric($id)) {
    http_response_code(400);
    header("Location: /400error");
    exit;
}

require("models/mod.contents.php");
$modelContt = new Contents();
$contt_mobile = $modelContt->getContents(3, $_SESSION["lang"]);


require("models/mod.mobiles.php");

$model = new Mobiles();
$mobile = $model->getMobile($id);

if(empty($mobile)) {
    http_response_code(404);
    header("Location: /404error");
}

$title = $mobile["mobile_name"];


if(!empty($_SESSION["user_id"])) {

    require("models/mod.ratings.php");
    $modelRat = new Ratings();

    $ratings = $modelRat->getRating($id);


    if( $_SERVER["REQUEST_METHOD"] === "POST") {
        $rating = json_decode( file_get_contents("php://input"), true );
        
        $modelRat->createRating($id, $rating);

        $model->avgRating();
        
    }
     
}


  

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


	
  
