<?php
require("layout/header.php");

if(isset($support_msg)) {
    echo '<p role="alert" class="w3-center w3-sand w3-text-red" style="font-weight:bold">' .$support_msg. '</p>';
    
}
?>


        <div class="w3-row" style="width:60%; margin:auto"> 
            <h2 class="w3-center" style="margin:0"><?= $contt_msgr["item_1"] ?></h2>
            <form method="post" action="/msgr" style="margin-top:40px">
                <div>
                    <div class="w3-container">
                        <label><?= $contt_msgr["item_3"] ?> 
                            <input class="w3-input" type="text" name="sender" required minlength="4" maxlength="90">
                        </label>
                    </div>
                    <div class=" w3-container">
                        <label><?= $contt_msgr["item_4"] ?>
                            <textarea class="w3-input" name="message" required minlength="8" maxlength="3000" style="resize:none; height:18vh"></textarea>
                        </label>
                    </div>
                    <div class="w3-container">
                        <label><?= $contt_msgr["item_5"] ?>
                            <textarea class="w3-input" name="contacts" required minlength="9" maxlength="400" style="resize:none; height:10vh"></textarea>
                        </label>
                    </div>
                    <div style="display:flex; align-content:center; justify-content:center; margin-top:8px">
                        <div class="w3-show-inline-block w3-margin">
                            <img src="/captcha" alt="captcha">
                        </div>
                        <div class="w3-show-inline-block w3-margin">
                            <input type="text" name="captcha" required autofocus maxlength="4" autocomplete="off" style="text-align:center; font-size:33px; margin:0; width:120px; height:80px">
                        </div>
                    </div>            
                </div>
                <div class="w3-center">
                    <button class="w3-text-brown w3-sand w3-button w3-round-large w3-hover-dark-grey" type="submit" name="send_msg" style="margin-top:20px"><?= $contt_msgr["item_2"] ?></button>
                </div>         
            </form>
        </div>


<?php
require("layout/footer.php");