<?php
require("layout/header.php");

if(isset($support_msg)) {
    echo '<p role="alert" class="w3-center w3-sand w3-text-red" style="font-weight:bold">' .$support_msg. '</p>';
    
}


?>


        <div class="w3-row" style="width:60%; margin:auto"> 
            <h2 class="w3-center" style="margin:0"><?= $title ?></h2>
            <form method="post" action="/register" enctype="multipart/form-data" style="margin-top:40px">
                <div>
                    <div class="w3-half w3-container">
                        <label><?= $contt_regist["item_4"] ?>
                            <input class="w3-input" type="text" name="user_name" autofocus required minlength="4" maxlength="20">
                        </label>
                    </div>
                    <div class="w3-half w3-container"">
                        <label><?= $contt_regist["item_5"] ?>
                            <input class="w3-input" type="text" name="first_name" required minlength="3" maxlength="30">
                        </label>
                    </div>
                </div>
                <div>
                    <div class="w3-half w3-container">
                        <label><?= $contt_regist["item_6"] ?>
                            <input class="w3-input" type="text" name="last_name" required minlength="3" maxlength="30">
                        </label>
                    </div>
                    <div class="w3-half w3-container">
                        <label><?= $contt_regist["item_7"] ?>
                            <input class="w3-input" type="text" name="phone" required minlength="9" maxlength="40">
                        </label>
                    </div>
                </div>
                <div>
                    <div class="w3-twothird w3-container">
                        <label><?= $contt_regist["item_8"] ?>
                            <input class="w3-input" type="text" name="address" required minlength="4" maxlength="100">
                        </label>
                    </div>
                    <div class="w3-third w3-container">
                        <label><?= $contt_regist["item_9"] ?>
                            <input class="w3-input" type="text" name="postal_code" required minlength="4" maxlength="40">
                        </label>
                    </div>
                </div>
                <div>
                    <div class="w3-third w3-container">                      
                        <label><?= $contt_regist["item_10"] ?>
                            <select class="w3-input" name="country_code" required>
                                <option value="" disabled selected></option>
            <?php
                foreach($countries as $country) {
                    echo '<option value="' .$country["country_code"]. '">' . $country["country_name"] . '</option>';
                } 
            ?>                  
                            </select>
                        </label>
                    </div>
                    <div class="w3-twothird w3-container">
                        <label> E-mail
                            <input class="w3-input" type="email" name="email" required>
                        </label>
                    </div>
                </div>
                <div>
                    <div class="w3-half w3-container">
                        <label><?= $contt_regist["item_11"] ?>
                            <input class="w3-input" type="password" name="password" required minlength="8" maxlength="255">
                        </label>
                    </div>
                    <div class="w3-half w3-container">
                        <label><?= $contt_regist["item_12"] ?>
                            <input class="w3-input" type="password" name="confirm_password" required minlength="8" maxlength="255">
                        </label>
                    </div>
                    <div class="w3-container">
	                    <label class="w3-button w3-text-brown w3-sand w3-round-large w3-hover-dark-grey w3-margin-top"><?= $contt_regist["item_2"] ?> 
        	            <input type="file" name="user_photo" required accept="image/jpeg" total-max-size="3145728" style="display:none">
                         </label>
                    </div>   
                </div>
                <div class="w3-center" style="margin-top:30px">
                    <button class="w3-text-brown w3-sand w3-button w3-round-large w3-hover-dark-grey w3-margin-top" type="submit" name="send"><?= $contt_regist["item_3"] ?></button>
                </div>
            </form>
        </div>
            

            
<?php
require("layout/footer.php");