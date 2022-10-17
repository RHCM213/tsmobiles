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
                <div>
                    <p style="margin-top: 0; margin-bottom: 0;">Avalie o modelo</p>
                    <!-- <form method="post" action="/mobile">
                    <label> 
                        <select id="cars" name="cars" class="w3-text-orange">
                            <option value="1">&#9733;</option>
                            <option value="2">&#9733;&#9733;</option>
                            <option value="3">&#9733;&#9733;&#9733;</option>
                            <option value="4">&#9733;&#9733;&#9733;&#9733;</option>
                            <option value="5">&#9733;&#9733;&#9733;&#9733;&#9733;</option>
                        </select>
                        <button type="submit" name="send">Avaliar</button>
                    </label>
                    </form>   -->
                <form id="rating-form" method="post" action="/mobile" data-mobile_id="<?= $id ?>">
                        <input type="button" class="w3-hover-text-orange" value="&#9734;" data-urating="1">
                        <input type="button" class="w3-hover-text-orange" value="&#9734;" data-urating="2">
                        <input type="button" class="w3-hover-text-orange" value="&#9734;" data-urating="3">
                        <input type="button" class="w3-hover-text-orange" value="&#9734;" data-urating="4">
                        <input type="button" class="w3-hover-text-orange" value="&#9734;" data-urating="5">
                    </form>
                </div>
                <dl style="display: grid; grid-template-columns: 50% auto; font-size: 14px">
                    <dt>Smartphone :</dt>
                    <dd><?=$icon_boll?></dd>
                    <dt>Tamanho :</dt>
                    <dd><?=$mobile["size"]?></dd>
                    <dt>Peso :</dt>
                    <dd><?=$mobile["weight"]?></dd>
                    <dt>Resolução :</dt>
                    <dd><?=$mobile["display_resolution"]?></dd>
                    <dt>Display(Polegadas) :</dt>
                    <dd><?=$mobile["display_inches"]?></dd>
                    <dt>DualSim :</dt>
                    <dd><?=$icon_boll?></dd>
                    <dt>CardSlot :</dt>
                    <dd><?=$icon_boll?></dd>
                    <dt>Memórias ROM/RAM :</dt>
                    <dd><?=$mobile["memory_rom_ram"]?></dd>
                    <dt <?=$hide_null?>>Camera :</dt>
                    <dd <?=$hide_null?>><?=$mobile["camera"]?></dd>
                    <dt <?=$hide_null?>>Video :</dt>
                    <dd <?=$hide_null?>><?=$mobile["video"]?></dd>
                    <dt>Bluetooth :</dt>
                    <dd><?=$icon_boll?></dd>
                    <dt>Battery :</dt>
                    <dd><?=$mobile["battery"]?></dd>
                    <dt>Lançamento :</dt>
                    <dd><?=$mobile["released_date"]?></dd>
                    <dt>Milhões Unid. Vendidas :</dt>
                    <dd><?=$mobile["unit_sold"]?></dd>
                </dl>               
            </div>           
        </section>
        <div class="w3-center">
            <a href="/mobileslist" class="w3-text-brown w3-sand w3-button w3-round-large w3-hover-dark-grey w3-margin-top" style="text-transform: uppercase">voltar à lista</a>                         
        </div>

<?php
require("layout/footer.php");
?>
