<?php
$user_id=$id; 


$title = "Editar User";

require("models/mod.users.php");

$model = new Users();
$user = $model->getUser($id);


$check_admin = $user["is_admin"] == 0 ? "" : "checked";


require("models/mod.countries.php");

$modelC = new Countries();
$countries = $modelC->getCountries();






/* 

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





if(isset($_POST["update"])) {
    if( isset($_POST["user_name"] &&
        mb_strlen($_POST["user_name"]) >= 4 &&
        mb_strlen($_POST["user_name"]) <= 20 ||
        isset($_POST["first_name"] &&
        mb_strlen($_POST["first_name"]) >= 3 &&
        mb_strlen($_POST["first_name"]) <= 30 ||
        
        mb_strlen($_POST["last_name"]) >= 3 &&
        mb_strlen($_POST["last_name"]) <= 30 ||
       
        mb_strlen($_POST["phone"]) <= 9 &&
        mb_strlen($_POST["phone"]) <= 40 ||

        mb_strlen($_POST["address"]) >= 4 &&
        mb_strlen($_POST["address"]) <= 100 ||

        mb_strlen($_POST["postal_code"]) >= 4 &&
        mb_strlen($_POST["postal_code"]) <= 40 ||

        in_array($_POST["country_code"], $countryCodes) ||

        filter_var($_POST["email"], FILTER_VALIDATE_EMAIL) ||
        FALTA AQUI IS_ADMIN VALIDDDDDDDDDD
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
                $support_msg = "User já existe!";
            }   
                
        }
        else {
            $support_msg = "Nome de User ou Email já em uso!";
        }
        
    
    }
    else {
        $support_msg = "Erro de preenchimento ou E-mail já registado!";
    }

}
 */






require("views/view.users.php");
