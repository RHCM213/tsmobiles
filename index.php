<?php
session_start();


define("ENV",parse_ini_file(".env"));

$url_parts = explode("/", $_SERVER["REQUEST_URI"]);



$controller = $url_parts[1] ?: "home";
$lang = $url_parts[2] ?? "pt";
$id = $url_parts[3] ?? "";



$controllers = ["home", "mobileslist", "mobile", "register", "400error", "401error", "404error", "login", "logout", "admin", "users", "msgr", "captcha"];

if (!in_array($controller, $controllers)){
    http_response_code(404);
    header("Location: /404error/". $lang);
}





require("controllers/cont." . $controller . ".php");









