<?php
require("layout/header.php");
?>
       
        <section class="w3-row" style="width:80%; margin:auto"> 
            <div class="w3-half w3-padding">
                <img src=<?= $contt_home["pic"] ?> class="w3-round" alt="mobiles" style="width:100%; border: 10px solid white">
            </div>
            <div class="w3-half w3-padding">
                <h2><?= $contt_home["item_1"] ?></h2>
                <p class="home_txt"><?= $contt_home["item_2"] ?></p>
                <div class="w3-center">
                    <a href="/mobileslist/<?= $lang ?>" class="w3-text-brown w3-sand w3-button w3-round-large w3-hover-dark-grey" style="text-transform: uppercase"><?= $contt_home["item_3"] ?></a>                         
                </div>
            </div>           
        </section>
        
<?php
require("layout/footer.php");
?>
