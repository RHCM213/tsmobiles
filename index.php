<?php
session_start();

define("ENV",parse_ini_file(".env"));

$url_parts = explode("/", $_SERVER["REQUEST_URI"]);


$controllers = ["home", "mobileslist", "mobile", "register", "404error", "400error", "login", "logout", "admin", "users", "msgr", "captcha"];


$controller = $url_parts[1] ?: "home";
$id = $url_parts[2] ?? "";


require("controllers/cont." . $controller . ".php");





