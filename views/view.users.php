<?php
require("layout/basicheader.php");
require("layout/adminnav.php");

if(isset($support_msg)) {
    echo '<p role="alert">' . $support_msg . '</p>';
}
?> 

            <div class="w3-row" style="width:60%; margin:auto"> 
                <h2 class="w3-center w3-text-brown" style="margin:0"><?= $title ?></h2>
                <form method="post" action="/users/pt/<?= $id ?>" enctype="multipart/form-data" class="w3-text-brown" style="margin-top:40px">
                    <div>
                        <div class="w3-half w3-container">
                            <label>Nome de User
                                <input class="w3-input" type="text" name="user_name" placeholder="<?= $user["user_name"] ?>" minlength="4" maxlength="20">
                            </label>
                        </div>
                        <div class="w3-half w3-container">
                            <label> Primeiro Nome
                                <input class="w3-input" type="text" name="first_name" placeholder="<?= $user["first_name"] ?>" minlength="3" maxlength="30">
                            </label>
                        </div>
                    </div>
                    <div>
                        <div class="w3-half w3-container">
                            <label> Último Nome
                                <input class="w3-input" type="text" name="last_name" placeholder="<?= $user["last_name"] ?>" minlength="3" maxlength="30">
                            </label>
                        </div>
                        <div class="w3-half w3-container">
                            <label> Telefone
                                <input class="w3-input" type="text" name="phone" placeholder="<?= $user["phone"] ?>" minlength="9" maxlength="40">
                            </label>
                        </div>
                    </div>
                    <div>
                        <div class="w3-twothird w3-container">
                            <label> Morada
                                <input class="w3-input" type="text" name="address" placeholder="<?= $user["address"] ?>" minlength="4" maxlength="100">
                            </label>
                        </div>
                        <div class="w3-third w3-container">
                            <label> Código Postal
                                <input class="w3-input" type="text" name="postal_code" placeholder="<?= $user["postal_code"] ?>" minlength="4" maxlength="40">
                            </label>
                        </div>
                    </div>
                    <div>
                        <div class="w3-third w3-container">                      
                            <label> Pais
                                <select class="w3-input" name="country_code">
                                    <option value="" disabled selected><?= $user["country_name"] ?></option>
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
                                <input class="w3-input" type="email" name="email" placeholder="<?= $user["email"] ?>">
                            </label>
                        </div>
                    </div>
                    <div>
                        <div class="w3-container">
                            <label>Administrador 
                                <input class="w3-input" type="checkbox" name="is_admin" <?= $check_admin ?> style="width:5%; display:inline-block">
                            </label>
                        </div>
                        <div class="w3-container">
                            <label class="w3-button w3-text-sand w3-brown w3-round-large w3-hover-dark-grey w3-margin-top"> Foto Perfil (max.3MB) 
                            <input type="file" name="user_photo" required accept="image/jpeg" total-max-size="3145728" style="display:none">
                            </label>
                        </div>   
                    </div>
                    <div class="w3-center" style="display:flex; justify-content:flex-end">
                        <button class="w3-text-sand w3-red w3-button w3-round-large w3-hover-dark-grey w3-margin-top" type="submit" name="update_user" style="margin-top:7px; font-size:20px; padding:4px 22px">&#8634;</button>
                    </div>
                </form>
            </div>
            
    





