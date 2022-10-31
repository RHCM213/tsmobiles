<?php

require("models/mod.contents.php");
$modelContt = new Contents();
$contt_login = $modelContt->getContents(4, $_SESSION["lang"]);

$title = $contt_login["title"];


if(isset($_POST["send"])) {
    if(
        !empty($_POST["login_ref"]) &&
        !empty($_POST["password"]) &&        
        mb_strlen($_POST["password"]) >= 8 &&
        mb_strlen($_POST["password"]) <= 255
       
        ) {
            require("models/mod.users.php");
            
            $model = new Users();
            $user = $model->login($_POST);

            if(!empty($user)) {
                $_SESSION["user_id"] = $user["user_id"];
                $_SESSION["is_admin"] = $user["is_admin"];
                header("Location: /");
                exit;
            }
    }
        
        $support_msg = "Dados incorrectos ou User não registado!";       
}
    


require("views/view.login.php");