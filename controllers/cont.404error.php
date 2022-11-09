<?php

require("models/mod.contents.php");
$modelContt = new Contents();
$contt_404 = $modelContt->getContents(7, $lang);

$title = $contt_404["title"];
$alert = $contt_404["item_1"];
$back_home = $contt_404["item_2"];

require("views/view.error.php");


