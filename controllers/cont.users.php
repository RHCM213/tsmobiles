<?php

$title = "Editar User";

require("models/mod.users.php");

$model = new Users();
$user = $model->getUser($id);


$check_admin = $user["is_admin"] == 0 ? "" : "checked";


require("models/mod.countries.php");

$modelC = new Countries();
$countries = $modelC->getCountries();


foreach($countries as $country) {
    $countryCodes[] = $country["country_code"];
}

$users = $model->getUsers();

$usernames = [];
$emails = [];

foreach($users as $usr) {
    $usernames[] = $usr["user_name"];
    $emails[] = $usr["email"];
}


if(isset($_POST["update_user"])) {

    if(!empty($_POST["user_name"]) && in_array($_POST["user_name"], $usernames) == true ) {
        $support_msg = "User já em uso!";
    }
    
    if(empty($_POST["user_name"])) {
        $_POST["user_name"] = $user["user_name"];
    }

    if(empty($_POST["first_name"])) {
        $_POST["first_name"] = $user["first_name"];
    }
    
    if(empty($_POST["last_name"])) {
        $_POST["last_name"] = $user["last_name"];
    }
    
    if(empty($_POST["phone"])) {
        $_POST["phone"] = $user["phone"];
    }
    
    if(empty($_POST["address"])) {
        $_POST["address"] = $user["address"];
    }
    
    if(empty($_POST["postal_code"])) {
        $_POST["postal_code"] = $user["postal_code"];
    }
    
    if(empty($_POST["country_code"])) {
        $_POST["country_code"] = $user["country_code"];
    }
    
    if(!empty($_POST["email"]) && in_array($_POST["email"], $emails) == true ) {
        $support_msg = "Email já em uso!";
    }

    if(empty($_POST["email"])) {
        $_POST["email"] = $user["email"];
    }
    
    if(!isset($_POST["is_admin"])) {
        $_POST["is_admin"] = $user["is_admin"];
    }
    
    if( isset($_FILES["user_photo"]) &&
        $_FILES["user_photo"]["error"] === 0 &&
        $_FILES["user_photo"]["type"] === "image/jpeg" &&
        $_FILES["user_photo"]["size"] > 0 &&
        $_FILES["user_photo"]["size"] < 3 * 1024 * 1024
    ) {
        
        $pathname = $user["user_photo"];       
        move_uploaded_file($_FILES["user_photo"]["tmp_name"], "." . $pathname);
        $_POST["user_photo"] = $pathname;
    }

    if(!isset($_FILES["user_photo"])) {
        $_FILES["user_photo"] = $user["user_photo"];
    }

    if(
        mb_strlen($_POST["user_name"]) >= 4 &&
        mb_strlen($_POST["user_name"]) <= 20 &&
        mb_strlen($_POST["first_name"]) >= 3 &&
        mb_strlen($_POST["first_name"]) <= 30 &&
        mb_strlen($_POST["last_name"]) >= 3 &&
        mb_strlen($_POST["last_name"]) <= 30 &&
        mb_strlen($_POST["phone"]) <= 9 &&
        mb_strlen($_POST["phone"]) <= 40 &&
        mb_strlen($_POST["address"]) >= 4 &&
        mb_strlen($_POST["address"]) <= 100 &&
        mb_strlen($_POST["postal_code"]) >= 4 &&
        mb_strlen($_POST["postal_code"]) <= 40 &&
        in_array($_POST["country_code"], $countryCodes) &&
        filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)
    ) { 

        $model->update($_POST, $id);

    }

    else {
        $support_msg = "Erro de preenchimento!";
    }

}



require("views/view.users.php");
