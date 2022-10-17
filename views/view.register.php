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
            <form method="post" action="/register" style="margin-top:40px">
                <div>
                    <div class="w3-half w3-container">
                        <label>Nome de User
                            <input class="w3-input" type="text" name="user_name" required minlength="4" maxlength="20">
                        </label>
                    </div>
                    <div class="w3-half w3-container"">
                        <label> Primeiro Nome
                            <input class="w3-input" type="text" name="first_name" required minlength="3" maxlength="30">
                        </label>
                    </div>
                </div>
                <div>
                    <div class="w3-half w3-container">
                        <label> Último Nome
                            <input class="w3-input" type="text" name="last_name" required minlength="3" maxlength="30">
                        </label>
                    </div>
                    <div class="w3-half w3-container">
                        <label> Telefone
                            <input class="w3-input" type="text" name="phone" required minlength="9" maxlength="40">
                        </label>
                    </div>
                </div>
                <div>
                    <div class="w3-twothird w3-container">
                        <label> Morada
                            <input class="w3-input" type="text" name="address" required minlength="4" maxlength="100">
                        </label>
                    </div>
                    <div class="w3-third w3-container">
                        <label> Código Postal
                            <input class="w3-input" type="text" name="postal_code" required minlength="4" maxlength="40">
                        </label>
                    </div>
                </div>
                <div>
                    <div class="w3-third w3-container">                      
                        <label> Pais
                            <select class="w3-input" name="country">
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
                        <label> Password
                            <input class="w3-input" type="password" name="password" required minlength="8" maxlength="255">
                        </label>
                    </div>
                    <div class="w3-half w3-container">
                        <label> Repetir Password
                            <input class="w3-input" type="password" name="confirm_password" required minlength="8" maxlength="255">
                        </label>
                    </div>
                </div>
                <div class="w3-container">
                    <label class="w3-button w3-text-brown w3-sand w3-round-large w3-hover-dark-grey w3-margin-top"> Foto Perfil 
                        <input type="file" name="user_photo" accept="image/jpeg, image/png" total-max-size="1572864" style="display: none">
                    </label>
                </div>   
                <div class="w3-center" style="margin-top:30px">
                    <button class="w3-text-brown w3-sand w3-button w3-round-large w3-hover-dark-grey w3-margin-top" type="submit" name="send">Confirmar Registo</button>
                </div>
            </form>
        </div>
            

            
<?php
require("layout/footer.php");