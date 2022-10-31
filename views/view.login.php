<?php
require("layout/header.php");
?>

<?php
    if(isset($support_msg)) {
        echo '<p role="alert">' .$support_msg. '</p>';
    }
?>


        <div class="w3-row" style="width:60%; margin:auto"> 
            <h2 class="w3-center" style="margin:0"><?= $title ?></h2>
            <form method="post" action="/login" style="margin-top:40px">
                <div>
                    <div class="w3-half w3-container">
                        <label><?= $contt_login["item_2"] ?>
                            <input class="w3-input" type="text" name="login_ref">
                        </label>
                    </div>
                    <div class="w3-half w3-container"">
                        <label><?= $contt_login["item_3"] ?>
                            <input class="w3-input" type="password" name="password" required minlength="8" maxlength="255">
                        </label>
                    </div>
                </div>
                <div class="w3-center">
                    <button class="w3-text-brown w3-sand w3-button w3-round-large w3-hover-dark-grey" type="submit" name="send" style="margin-top:50px"><?= $contt_login["item_5"] ?></button>
                </div>         
            </form>
        </div>


<?php
require("layout/footer.php");