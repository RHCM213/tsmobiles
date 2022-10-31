<?php
require("models/mod.contents.php");
$modelContt = new Contents();
$contt_home = $modelContt->getContents(1, $_SESSION["lang"]);
$contt_moblist = $modelContt->getContents(2, $_SESSION["lang"]);

$title = $contt_moblist["title"];

require("models/mod.mobiles.php");
$model = new Mobiles();
$mobiles = $model->getMobiles();




require("views/view.mobileslist.php");
