<?php
require("models/mod.mobiles.php");

$title = "Telemóveis mais Vendidos de Sempre";

$model = new Mobiles();
$mobiles = $model->getmobiles();


//print_r($mobiles);

require("views/view.mobileslist.php");
