<?php
require("models/mod.contents.php");
$model = new Contents();

$lang = "pt";

if( $_SERVER["REQUEST_METHOD"] === "POST") {
    
    $lang = json_decode( file_get_contents("php://input"), true );
    
}

$_SESSION["lang"] = $lang;

$contt_home = $model->getContents(1, $_SESSION["lang"]);

$_SESSION["login"] = $contt_home["hdr_1"];
$_SESSION["logout"] = $contt_home["hdr_2"];
$_SESSION["regist"] = $contt_home["hdr_3"];



$title = "Top Selling Mobiles";

require("views/view.home.php");

?>