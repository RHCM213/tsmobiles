<?php
if(empty($id) || !is_numeric($id)) {
    http_response_code(400);
    header("Location: /400error/" . $lang);
    exit;
}

require("models/mod.contents.php");
$modelContt = new Contents();
$contt_mobile = $modelContt->getContents(3, $lang);
$contt_home = $modelContt->getContents(1, $lang);



require("models/mod.mobiles.php");

$model = new Mobiles();
$mobile = $model->getMobile($id);

if(empty($mobile)) {
    http_response_code(404);
    header("Location: /404error/" . $lang);
}



require("models/mod.ratings.php");
$modelRat = new Ratings();



if(!empty($_SESSION["user_id"])) {
    $rating = $modelRat->getRating($id);  

    if(empty($_POST) && $_SERVER["REQUEST_METHOD"] === "POST") {
        $rat = json_decode( file_get_contents("php://input"), true );
        $rating_chosen = $rat["user_rating"];
        

        if(empty($rating["rating"])) {            
            $modelRat->createRating($id, $rating_chosen); 
                
        }
        
        else {
            $modelRat->updateRating($id, $rating_chosen);
                                
        }             
        echo '{"msg":"OK"}';
        exit;
    }
    $rating = $modelRat->getRating($id);
}

require("models/mod.comments.php");
$modelComm = new Comments();

if(isset($_POST["send_comment"]) && isset($_SESSION["user_id"])) {

    if(
        !empty($_POST["txt_comment"]) &&
        mb_strlen($_POST["txt_comment"]) >= 8 &&
        mb_strlen($_POST["txt_comment"]) <= 65535
    ) {
        $modelComm->createComment($_POST, $id);
        header("Location:" . $_SERVER["REQUEST_URI"]);
    }
}     


if(isset($_POST["send_reply"]) && isset($_SESSION["user_id"])) {

    if(
        !empty($_POST["txt_reply"]) &&
        mb_strlen($_POST["txt_reply"]) >= 8 &&
        mb_strlen($_POST["txt_reply"]) <= 65535
    ) {
        $modelComm->createReply($_POST, $id);
        header("Location:" . $_SERVER["REQUEST_URI"]);
    }
}     
    


$comments = $modelComm->getComments($id);


$comments_with_replies = [];

foreach($comments as $comment){
    if(empty($comment["reply_to"])){

        $comments_with_replies[ $comment["comment_id"] ] = $comment;
    
    }
    else {
        $comments_with_replies[ $comment["reply_to"] ]["replies"][] = $comment;
    }
}





$title = $mobile["mobile_name"];

require("views/view.mobile.php");


	
  
