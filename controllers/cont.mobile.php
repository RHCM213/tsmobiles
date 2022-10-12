<?php
require("models/mod.mobiles.php");

$model = new Mobiles();


$mobile = $model->getmobile($id);

$title = $mobile["mobile_name"];


//print_r($mobile);

require("views/view.mobile.php");
