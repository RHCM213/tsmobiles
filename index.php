<?php
define("ENV",parse_ini_file(".env"));

$url_parts = explode("/", $_SERVER["REQUEST_URI"]);

$controller = $url_parts[1] ?: "home";
$id = $url_parts[2] ?? "";

require("controllers/cont." . $controller . ".php");





