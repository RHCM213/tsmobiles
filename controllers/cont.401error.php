<?php

require("models/mod.contents.php");
$modelContt = new Contents();
$contt_401 = $modelContt->getContents(8, $_SESSION["lang"]);

$title = $contt_401["title"];
$alert = $contt_401["item_1"];
$back_home = $contt_401["item_2"];



require("views/view.error.php");


