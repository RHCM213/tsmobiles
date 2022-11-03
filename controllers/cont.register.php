<?php
require("models/mod.contents.php");
$modelContt = new Contents();
$contt_error = $modelContt->getContents(0, $_SESSION["lang"]);
$contt_regist = $modelContt->getContents(5, $_SESSION["lang"]);

$title = $contt_regist["title"];

require("models/mod.countries.php");
$model = new Countries();
$countries = $model->getCountries();

require("models/mod.users.php");    
$modelUsers = new Users();
$users = $modelUsers->getUsers();

//arrays p/ validação
foreach($countries as $country) {
    $countryCodes[] = $country["country_code"];
}

$usernames = [];
$emails = [];

foreach($users as $user) {
    $usernames[] = $user["user_name"];
    $emails[] = $user["email"];
}





if(isset($_POST["send"])) {

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
        filter_var($_POST["email"], FILTER_VALIDATE_EMAIL) &&
        mb_strlen($_POST["password"]) >= 8 &&
        mb_strlen($_POST["password"]) <= 255 &&
        $_POST["password"] === $_POST["confirm_password"] &&
        $_FILES["user_photo"]["error"] === 0 &&
        $_FILES["user_photo"]["type"] === "image/jpeg" &&
        $_FILES["user_photo"]["size"] > 0 &&
        $_FILES["user_photo"]["size"] < 3 * 1024 * 1024
    
    ) {
       
        if(in_array($_POST["email"], $emails) == false && in_array($_POST["user_name"], $usernames) == false) {
            

            $filename = "userphoto_" . mt_rand(10000000, 99999999) . ".jpg";       
            move_uploaded_file($_FILES["user_photo"]["tmp_name"], "./images/img_profile/" . $filename);

            $_POST["user_photo"] = "/images/img_profile/" . $filename;
            
            $user_id = $modelUsers->create($_POST);

        
            if(!empty($user_id)) {                 
                $_SESSION["user_id"] = $user_id;
                header("Location: /");
            }
            else {
                $support_msg = $contt_error["item_2"];
            }   
                
        }
       
        else {
            $support_msg = $contt_error["item_1"] . " " . $contt_error["item_2"] . " / " . $contt_error["item_3"];
        }
        
    
    }
    else {
        $support_msg = $contt_error["item_5"] . " " . $contt_error["item_7"];
    }

}

require("views/view.register.php");


