<?php
require("models/mod.countries.php");

$title = "Registo";

$model = new Countries();
$countries = $model->getcountries();

require("models/mod.users.php");    
$modelUsers = new Users();
$usernames = $modelUsers->getusernames();

//arrays p/ validação
foreach($countries as $country) {
    $countryCodes[] = $country["country_code"];
}

foreach($usernames as $username) {
    $userNames[] = $username["user_name"];
}

if(isset($_POST["send"])) {
    //validação
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
        in_array($_POST["country"], $countryCodes) &&
        filter_var($_POST["email"], FILTER_VALIDATE_EMAIL) &&
        mb_strlen($_POST["password"]) >= 8 &&
        mb_strlen($_POST["password"]) <= 255 &&
        $_POST["password"] === $_POST["confirm_password"]
    ) {
       
        if(in_array($_POST["user_name"], $userNames) == false){
            
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
            $support_msg = "Escolha outro Nome de User!";
        }
        
    
    }
    else {
        $support_msg = "Erro de preenchimento ou E-mail já registado!";
    }

}


require("views/view.register.php");