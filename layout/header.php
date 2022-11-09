<!DOCTYPE html>
<html lang="pt">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link rel="stylesheet" href="/css/global.css">
        <script type="text/javascript" src="/js/global.js"></script>
        <title><?= $title; ?> - TSM</title> 
        <link rel="icon" type="image/x-icon" href="/images/favicon.svg">      
       
        <style></style>
    </head>
    <body id="top" class="w3-brown w3-padding-large" style="background-image:linear-gradient(to bottom right,#40261D,#795548 30%,#795548 20%,#40261D)">
        <header class="w3-row w3-padding-large w3-bottombar w3-border-sand" role="banner" style="margin-bottom: 100px">
            <div class="w3-col s6 w3-left-align">
                <h1><a href="/home/<?= $lang ?>"><img src="/images/logo_tsm.svg" alt="tsm logo" style="width:40%"></a></h1>
            </div>
            <div class="w3-col s6 w3-right-align">
                <nav style="display:inline-block; text-transform:uppercase; color:#fdf5e6; vertical-align: middle">                
                    
            <?php
                if(!empty($_SESSION["user_id"]) && !empty($_SESSION["is_admin"])) {
                    echo '<a href="/logout">' . $contt_home["hdr_2"] . '</a> |';
                    echo '<a href="/admin">admin</a>';
                }
                else if(!empty($_SESSION["user_id"])){
                    echo '<a href="/logout">' . $contt_home["hdr_2"] . '</a>';
                    
                }
                else {
                    echo '
                    <a href="/login/'. $lang . '">' . $contt_home["hdr_1"] . '</a> |
                    <a href="/register/'. $lang . '">' . $contt_home["hdr_3"] . '</a>
                    ';
                }
            ?>  
                </nav> 
<?php
    if($controller == "mobile") { $mob_url = "/".$id;}
    else{ $mob_url = "";}
?>          
                <div id="lang" style="display:inline-block; margin-left:10px"> 
                    <a href="/<?= $controller ?>/pt<?= $mob_url ?>" class="w3-button w3-sand w3-round" style="padding:0px; width:28px; height:22px">🇵🇹</a>
                    <a href="/<?= $controller ?>/en<?= $mob_url ?>" class="w3-button w3-sand w3-round" style="padding:0px; width:28px; height:22px">🇬🇧</a>
                    <a href="/<?= $controller ?>/fr<?= $mob_url ?>" class="w3-button w3-sand w3-round" style="padding:0px; width:28px; height:22px">🇫🇷</a>
                </div>           
            </div>
        </header>
        <main>


    