<?php
require("models/mod.contents.php");
$modelContt = new Contents();
$contt_moblist = $modelContt->getContents(2, $lang);
$contt_home = $modelContt->getContents(1, $lang);


$title = $contt_moblist["title"];

require("models/mod.mobiles.php");
$modelMob = new Mobiles();
$mobiles = $modelMob->getMobiles();


     

require("models/mod.ratings.php");
$modelRat = new Ratings();


foreach($mobiles as $mobile) {
    $mobile_id [] = $mobile["mobile_id"];      
}

foreach($mobile_id as $mob_id) { 
    $avg_rating []= $modelRat->avgRating($mob_id); 
}  



require("views/view.mobileslist.php");
