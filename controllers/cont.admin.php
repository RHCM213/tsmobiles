<?php
if(empty($_SESSION["is_admin"])) {
    http_response_code(401);
    header("Location: /401error");
}

$section=$id;

$title = "Área Administrativa";



require("models/mod.mobiles.php");


$model = new Mobiles();
$admin_mobiles = $model->getAdminMobiles();


require("models/mod.comments.php");

$modelComm = new Comments();
$admin_comments = $modelComm->getAdminComments();


require("models/mod.users.php");    
$modelUsers = new Users();
$users = $modelUsers->getUsers();


require("models/mod.contents.php");   
$modelContt = new Contents();
$contt_home = $modelContt->getContents(1, $_SESSION["lang"]);


if(isset($_POST["home_pic"])) {

    if(isset($_FILES["pic"]) &&
        $_FILES["pic"]["error"] === 0 &&
        $_FILES["pic"]["type"] === "image/jpeg" &&
        $_FILES["pic"]["size"] > 0 &&
        $_FILES["pic"]["size"] < 3 * 1024 * 1024
    ) {
        
        $pathname = $contt_home["pic"];       
        move_uploaded_file($_FILES["pic"]["tmp_name"], "." . $pathname);
        $_POST["pic"] = $pathname;

        $modelContt->updatePicHome($_POST);
        header("Location: /");
        exit;
    }
    

    else if(!isset($_FILES["pic"])) {
        $_FILES["pic"] = $contt_home["pic"];

        $modelContt->updatePicHome($_POST);
        header("Location: /");
        exit;
    }

    else {
        $support_msg = "Erro no envio (ficheiro incorrecto ou falha no envio)";
    }

}




if(isset($_POST["home_pt"])) { 
        
    if(empty($_POST["tit"])) {
        $lang = "PT";
        $_POST["tit"] = $contt_home["item_1"];
    }

    if(empty($_POST["txt"])) {
        $lang = "PT";
        $_POST["txt"] = $contt_home["item_2"];
    }

    if(
        mb_strlen($_POST["tit"]) >= 3 &&
        mb_strlen($_POST["tit"]) <= 255 &&   
        mb_strlen($_POST["txt"]) >= 8 &&
        mb_strlen($_POST["txt"]) <= 65535
    ) {
        
        $modelContt->updateTxtHome($_POST, $lang);
    }

    else {
        $support_msg = "Erro de preenchimento!";
    }

}





if(isset($_POST["home_en"])) {
    
    $lang = "EN";   
        
    if(empty($_POST["tit"])) {
        $lang = "EN";
        $_POST["tit"] = $contt_home["item_1"];
    }

    if(empty($_POST["txt"])) {
        $lang = "EN";
        $_POST["txt"] = $contt_home["item_2"];
    }

    if(
        mb_strlen($_POST["tit"]) >= 3 &&
        mb_strlen($_POST["tit"]) <= 255 &&   
        mb_strlen($_POST["txt"]) >= 8 &&
        mb_strlen($_POST["txt"]) <= 65535
    ) {
        
        $modelContt->updateTxtHome($_POST, $lang);
    }

    else {
        $support_msg = "Erro de preenchimento!";
    }

}





if(isset($_POST["home_fr"])) {
    
    $lang = "FR";   
        
    if(empty($_POST["tit"])) {
        $lang = "FR";
        $_POST["tit"] = $contt_home["item_1"];
    }

    if(empty($_POST["txt"])) {
        $lang = "FR";
        $_POST["txt"] = $contt_home["item_2"];
    }

    if(
        mb_strlen($_POST["tit"]) >= 3 &&
        mb_strlen($_POST["tit"]) <= 255 &&   
        mb_strlen($_POST["txt"]) >= 8 &&
        mb_strlen($_POST["txt"]) <= 65535
    ) {
        
        $modelContt->updateTxtHome($_POST, $lang);
    }

    
    else {
        $support_msg = "Erro de preenchimento!";
    }

}


$mobilenames = [];

foreach($admin_mobiles as $mobile) {
    $mobilenames[] = $mobile["mobile_name"];
}



if(isset($_POST["send_mobile"])) {

    if(
        mb_strlen($_POST["mobile_name"]) >= 5 &&
        mb_strlen($_POST["mobile_name"]) <= 60 &&
        mb_strlen($_POST["unit_sold"]) >= 1 &&
        mb_strlen($_POST["unit_sold"]) <= 99999 &&
        //filter_var($_POST["is_smartphone"], FILTER_VALIDATE_BOOLEAN) &&
        mb_strlen($_POST["released_date"]) >= 1994 &&
        mb_strlen($_POST["released_date"]) <= 9999 &&
        mb_strlen($_POST["size"]) >= 2 &&
        mb_strlen($_POST["size"]) <= 60 &&
        mb_strlen($_POST["weight"]) >= 2 &&
        mb_strlen($_POST["weight"]) <= 8 &&
        mb_strlen($_POST["display_resolution"]) >= 2 &&
        mb_strlen($_POST["display_resolution"]) <= 20 &&
        mb_strlen($_POST["display_inches"]) >= 2 &&
        mb_strlen($_POST["display_inches"]) <= 8 &&
        mb_strlen($_POST["platform"]) >= 2 &&
        mb_strlen($_POST["platform"]) <= 20 &&
        //filter_var($_POST["is_dualsim"], FILTER_VALIDATE_BOOLEAN) &&
        //filter_var($_POST["has_cardslot"], FILTER_VALIDATE_BOOLEAN) &&
        mb_strlen($_POST["memory_rom_ram"]) >= 2 &&
        mb_strlen($_POST["memory_rom_ram"]) <= 80 &&
        mb_strlen($_POST["camera"]) == NULL ||
        mb_strlen($_POST["camera"]) >= 2 &&
        mb_strlen($_POST["camera"]) <= 60 &&
        mb_strlen($_POST["video"]) == NULL ||
        mb_strlen($_POST["video"]) >= 2 &&
        mb_strlen($_POST["video"]) <= 80 &&
        //filter_var($_POST["has_bluetooth"], FILTER_VALIDATE_BOOLEAN) &&
        mb_strlen($_POST["battery"]) >= 2 &&
        mb_strlen($_POST["battery"]) <= 30 &&
        $_FILES["mobile_img"]["error"] === 0 &&
        $_FILES["mobile_img"]["type"] === "image/jpeg" &&
        $_FILES["mobile_img"]["size"] > 0 &&
        $_FILES["mobile_img"]["size"] < 3 * 1024 * 1024
    
    ) {
       
        if(in_array($_POST["mobile_name"], $mobilenames) == false) { 
            

            $filename = str_replace(" ", "_", strtolower($_POST["mobile_name"])) . ".jpg";       
            move_uploaded_file($_FILES["mobile_img"]["tmp_name"], "./images/img_mobiles/" . $filename);

            $_POST["mobile_img"] = "/images/img_mobiles/" . $filename;
            
            
            $model->createAdminMobiles($_POST);
        }

        else {
            $support_msg = "Mobile já estava registado!";
        }
    }
    
    else {
        $support_msg = "Erro de preenchimento!";
    }

}

















    





if($_SERVER["REQUEST_METHOD"] === "GET") {

require("views/view.admin.php");

}

else if($_SERVER["REQUEST_METHOD"] === "DELETE") {
    if($model->delAdminMobiles($mobile_id)) {
        http_response_code(202);       
    }
    else {
        http_response_code(404);
    }


}
else {  
    http_response_code(405);
    exit;

}


