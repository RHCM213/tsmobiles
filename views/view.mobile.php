<?php
require("layout/header.php");
?>

       
        <section class="w3-row" style="width:80%; margin:auto">
            <div class="w3-half w3-padding">
            <figure style="margin:0">
               <img src="<?= "/images/img_mobiles/" . $mobile["mobile_img"]; ?>" alt="" style="width:100%; border: 10px solid white">            
            </figure>
            </div>
            <div class="w3-half w3-padding" style="padding: 0 16px;">
                <h2 style="margin:0"><?= $mobile["mobile_name"]; ?></h2>
                <div><?= $mobile["avg_rating"]; ?></div>
                <dl style="display: grid; grid-template-columns: 50% auto; font-size: 14px">
                    <dt>Smartphone :</dt>
                    <dd><?=$mobile["is_smartphone"]; ?></dd>
                    <dt>Tamanho :</dt>
                    <dd><?=$mobile["size"]?></dd>
                    <dt>Peso :</dt>
                    <dd><?=$mobile["weight"]?></dd>
                    <dt>Resolução :</dt>
                    <dd><?=$mobile["display_resolution"]?></dd>
                    <dt>Display(Polegadas) :</dt>
                    <dd><?=$mobile["display_inches"]?></dd>
                    <dt>DualSim :</dt>
                    <dd><?=$mobile["is_dualsim"]?></dd>
                    <dt>CardSlot :</dt>
                    <dd><?=$mobile["has_cardslot"]?></dd>
                    <dt>Memórias ROM/RAM :</dt>
                    <dd><?=$mobile["memory_rom_ram"]?></dd>
                    <dt>Camera :</dt>
                    <dd><?=$mobile["camera"]?></dd>
                    <dt>Video :</dt>
                    <dd id="acceptnull"><?=$mobile["video"]?></dd>
                    <dt>Bluetooth :</dt>
                    <dd id="boolValue"><?=$mobile["has_bluetooth"]?></dd>
                    <dt>Battery :</dt>
                    <dd><?=$mobile["battery"]?></dd>
                    <dt>Lançamento :</dt>
                    <dd><?=$mobile["released_date"]?></dd>
                    <dt>Milhões Unid. Vendidas :</dt>
                    <dd><?=$mobile["unit_sold"]?></dd>
                </dl>               
            </div>           
        </section>

<?php
require("layout/footer.php");
?>
