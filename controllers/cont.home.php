<?php
require("models/mod.contents.php");
$model = new Contents();
$contt_home = $model->getContents(1, $lang);




$title = "Top Selling Mobiles";

require("views/view.home.php");

?>