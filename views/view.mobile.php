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
                    <p style="margin-top: 0; margin-bottom: 0;"><?= $contt_mobile["item_1"] ?></p>
                    <form id="rating-form" method="post" action="/mobile/" data-mobid="<?= $id ?>">
                        <input type="button" class="w3-hover-text-orange" value="&#9734;" data-urating="1">
                        <input type="button" class="w3-hover-text-orange" value="&#9734;" data-urating="2">
                        <input type="button" class="w3-hover-text-orange" value="&#9734;" data-urating="3">
                        <input type="button" class="w3-hover-text-orange" value="&#9734;" data-urating="4">
                        <input type="button" class="w3-hover-text-orange" value="&#9734;" data-urating="5">
                    </form>
                </div>
<?php
    $hide_null = $mobile["camera"] || $mobile["video"]  != NULL ?: 'style="display:none"';

    $icon_boll = $mobile["is_smartphone"] || 
                $mobile["is_dualsim"] || 
                $mobile["has_cardslot"] ||
                $mobile["has_bluetooth"] == 1 ? '&#10003;' : '&#10007';
?>
                <dl style="display: grid; grid-template-columns: 50% auto; font-size: 14px">
                    <dt>Smartphone :</dt>
                    <dd><?=$icon_boll?></dd>
                    <dt><?= $contt_mobile["item_6"] ?> :</dt>
                    <dd><?=$mobile["size"]?></dd>
                    <dt><?= $contt_mobile["item_7"] ?> :</dt>
                    <dd><?=$mobile["weight"]?></dd>
                    <dt><?= $contt_mobile["item_8"] ?> :</dt>
                    <dd><?=$mobile["display_resolution"]?></dd>
                    <dt><?= $contt_mobile["item_9"] ?> :</dt>
                    <dd><?=$mobile["display_inches"]?></dd>
                    <dt><?= $contt_mobile["item_10"] ?> :</dt>
                    <dd><?=$icon_boll?></dd>
                    <dt><?= $contt_mobile["item_11"] ?> :</dt>
                    <dd><?=$icon_boll?></dd>
                    <dt><?= $contt_mobile["item_12"] ?> :</dt>
                    <dd><?=$mobile["memory_rom_ram"]?></dd>
                    <dt <?=$hide_null?>>Camera :</dt>
                    <dd <?=$hide_null?>><?=$mobile["camera"]?></dd>
                    <dt <?=$hide_null?>>Video :</dt>
                    <dd <?=$hide_null?>><?=$mobile["video"]?></dd>
                    <dt>Bluetooth :</dt>
                    <dd><?=$icon_boll?></dd>
                    <dt><?= $contt_mobile["item_13"] ?> :</dt>
                    <dd><?=$mobile["battery"]?></dd>
                    <dt><?= $contt_mobile["item_14"] ?> :</dt>
                    <dd><?=$mobile["released_date"]?></dd>
                    <dt><?= $contt_mobile["item_15"] ?> :</dt>
                    <dd><?=$mobile["platform"]?></dd>
                    <dt><?= $contt_mobile["item_16"] ?> :</dt>
                    <dd><?=$mobile["unit_sold"]?></dd>
                </dl>               
            </div>           
        </section>
<?php 
    $hide_btn = !empty($_SESSION["user_id"])? "" :"display:none"; 
?>
        <section class="w3-row" style="width:80%; margin:auto; padding:16px;">
            <button id="comment-btn" type="button" class="w3-text-brown w3-sand w3-button w3-round-large w3-hover-dark-grey w3-margin-top" style="text-transform:uppercase;<?= $hide_btn ?>"><?= $contt_mobile["item_2"] ?></button>   
            <form id="comment-form" method="post" action="/mobile/<?= $id ?>" style="display:none; margin-bottom:30px">
                <div>
                    <textarea name="txt_comment" required style="resize:none; width:100%; height:30vh; margin-top:15px"></textarea>
                </div>
                <div style="display:flex; justify-content:flex-end">
                    <button id="confirm-btn" class="w3-text-sand w3-red w3-button w3-round-large w3-hover-grey" type="submit" name="send_comment" style="margin-top:8px"><?= $contt_mobile["item_4"] ?></button>
                </div>
            </form>      
     
        
<?php


    foreach($comments as $comment){
        
        if ($comment["reply_to"] == NULL) {
            $comm_style = "border:3px solid white; padding:10px; background-color:rgb(255,255,255,0.1); margin-top:15px; width:100%";
        }

        else {            
            $comm_style = "border:3px solid white; padding:10px; background-color:rgb(255,255,255,0.1); margin-top:7px; width:80%";
        }
       
              
?>

            <div style="display:flex; flex-direction:column; align-items:flex-end">      
                <div class="w3-round-xlarge" style="<?= $comm_style ?>">
                    <div class="w3-left w3-margin-right">               
                        <img class="w3-circle" src="<?= $comment["user_photo"] ?>" alt="foto de perfil" style="width:60px; height:60px; object-fit:cover">
                    </div>
                    <div><span style="font-weight:bold"><?= $comment["user_name"] ?></span><?= " " .$reply_info ?></div>
                    <div class="w3-container">
                        <p><?= $comment["comment_txt"] ?></p>
                        <time><?= date("j M Y H:i", strtotime($comment["comment_date"])) ?></time>
                    </div> 
                    <div>
                        <button class="reply-btn" data-commid="<?= $comment["comment_id"] ?>" style="background:none; color:inherit; font-weight:bold; border:none; cursor:pointer"><?= $contt_mobile["item_3"] ?></button>
                    </div>                              
                </div>
                <form class="reply-form" method="post" action="/mobile/<?= $mobile["mobile_id"]?>" style="display:none">
                    <div>                           
                        <textarea name="txt_reply" required ></textarea>
                    </div>
                    <div>
                        <input type="hidden" name="comment_id" value="<?= $comment["comment_id"] ?>">
                        <button class="confirmrep-btn" type="submit" name="send_reply"><?= $contt_mobile["item_4"] ?></button>
                    </div>
                </form> 
            </div>
<?php                
 
            
    }

    
?>
        </section>
        <div class="w3-center">
            <a href="/mobileslist" class="w3-text-brown w3-sand w3-button w3-round-large w3-hover-dark-grey w3-margin-top" style="text-transform: uppercase"><?= $contt_mobile["item_5"] ?></a>                         
        </div>


<?php
require("layout/footer.php");

