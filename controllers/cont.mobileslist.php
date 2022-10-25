<?php
require("models/mod.mobiles.php");

$title = "Telemóveis mais Vendidos de Sempre";

$model = new Mobiles();
$mobiles = $model->getMobiles();





require("views/view.mobileslist.php");
