<?php
require("models/mod.mobiles.php");

$model = new Mobiles();


$mobile = $model->getmobile($id);

$title = $mobile["mobile_name"];

$hide_null = $mobile["camera"] || $mobile["video"]  != NULL ?: 'style="display:none"';
$icon_boll = $mobile["is_smartphone"] || 
            $mobile["is_dualsim"] || 
            $mobile["has_cardslot"] ||
            $mobile["has_bluetooth"] == 1 ? '&#10003;' : '&#10007';

require("views/view.mobile.php");
