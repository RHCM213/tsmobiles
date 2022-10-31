<?php

require("models/mod.contents.php");
$modelContt = new Contents();
$contt_400 = $modelContt->getContents(6, $_SESSION["lang"]);

$title = $contt_400["title"];
$alert = $contt_400["item_1"];
$back_home = $contt_400["item_2"];



require("views/view.error.php");


