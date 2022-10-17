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
       
        <style></style>
    </head>
    <body class="w3-brown w3-padding-large" >
        <header class="w3-row w3-padding-large w3-bottombar w3-border-white" role="banner" style="margin-bottom: 100px">
            <div class="w3-col s6 w3-left-align">
                <h1><a href="/"><img src="/images/logo_tsm.svg" alt="tsm logo" style="width:40%"></a></h1>
            </div>
            <nav class="w3-col s6 w3-right-align" style="text-transform: uppercase">
        <?php
            if(isset($_SESSION["user_id"])) {
                echo '<a href="/logout">logout</a> |';
            }
            else {
                echo '
                <a href="/login">login</a> |
                <a href="/register">regist</a> |
                ';
            }
        ?>
                <a href="/admin">admin</a>   
            </nav>
        </header>
        <main>


    