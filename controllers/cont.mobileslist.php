<?php
require("models/mod.mobiles.php");

$model = new Mobiles();

$mobiles = $model->getmobiles();

$title = "Telemóveis mais Vendidos de Sempre";

//print_r($mobiles);

require("views/view.mobileslist.php");
