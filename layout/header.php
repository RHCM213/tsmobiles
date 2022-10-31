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
    <body id="top" class="w3-brown w3-padding-large">
        <header class="w3-row w3-padding-large w3-bottombar w3-border-sand" role="banner" style="margin-bottom: 100px">
            <div class="w3-col s6 w3-left-align">
                <h1><a href="/"><img src="/images/logo_tsm.svg" alt="tsm logo" style="width:40%"></a></h1>
            </div>
            <div class="w3-col s6 w3-right-align">
                <nav style="display:inline-block; text-transform: uppercase; color:#fdf5e6">                
                    
            <?php
                if(isset($_SESSION["user_id"]) && $_SESSION["is_admin"]) {
                    echo '<a href="/logout">' . $_SESSION["logout"] . '</a> |';
                    echo '<a href="/admin">admin</a>';
                }
                else if(isset($_SESSION["user_id"])){
                    echo '<a href="/logout">' . $_SESSION["logout"] . '</a>';
                    
                }
                else {
                    echo '
                    <a href="/login">' . $_SESSION["login"] . '</a> |
                    <a href="/register">' . $_SESSION["regist"] .'</a>
                    ';
                }
            ?>  
                </nav>
                <div style="display:inline-block; margin-left:10px data">
                    <form id="lang-form" method="post" action="/home">
                        <input type="button" class="w3-button w3-sand w3-round" style="padding:0px; width:28px; height:30px" value=🇵🇹 data-lang="pt">
                        <input type="button" class="w3-button w3-sand w3-round" style="padding:0px; width:28px; height:30px" value=🇬🇧 data-lang="en">
                        <input type="button" class="w3-button w3-sand w3-round" style="padding:0px; width:28px; height:30px" value=🇫🇷 data-lang="fr">
                    </form>
                </div>
            </div>
        </header>
        <main>


    