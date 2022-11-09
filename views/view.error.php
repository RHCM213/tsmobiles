<?php
require("layout/basicheader.php");
?>

    <body>
        <div class="w3-container w3-center">
            <p class="w3-xlarge w3-text-red" role="alert"><?= $alert ?></p>
            <img src="/images/error.png" alt="mobiles pensativos" style="width:30%">
            <div class="w3-center">
                <a href="/home/<?= $lang ?>" class="w3-red w3-button w3-round-large w3-hover-brown" style="text-transform: uppercase"><?= $back_home ?></a>
            </div>
        </div>   
    </body>
</html>
