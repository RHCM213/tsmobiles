<?php
require("layout/basicheader.php");
require("layout/adminnav.php");
?> 
              
    
<?php
//section 1 » home admin
if($section == 1 || $section == ""){

    if(isset($support_msg)) {
        echo '<p role="alert" class="w3-center w3-red w3-text-sand" style="font-weight:bold">' .$support_msg. '</p>';
        
    }
?>
            <section>
                <form method="post" action="/admin/<?= $section ?>" enctype="multipart/form-data" style="padding:0 50px">
                    <div style="display:flex; justify-content:flex-end; align-content:center">    
                        <label class="w3-text-sand w3-brown w3-button w3-round-large w3-hover-grey w3-margin-top w3-margin-bottom">Carregar Foto Home
                            <input type="file" name="pic" required accept="image/jpeg" style="display:none">
                        </label> 
                        <button class="w3-text-sand w3-red w3-button w3-round-large w3-hover-grey w3-margin-top w3-margin-bottom" type="submit" name="home_pic" style="margin-top:7px; margin-left:7px; font-size:20px; padding:4px 10px 10px">&#8634;</button>  
                    </div>
                </form>
                <form method="post" action="/admin/<?= $section ?>" style="padding:0 50px">
                    <div>
                        <div>                           
                            <textarea name="tit" placeholder="Tit PT" style="resize:none; width:100%; height:5vh"></textarea>
                        </div>
                        <div>                           
                            <textarea name="txt" placeholder="Text PT" style="resize:none; width:100%; height:18vh"></textarea>
                        </div>
                    </div>
                    <div style="display:flex; justify-content:flex-end">
                        <button class="w3-text-sand w3-red w3-button w3-round-large w3-hover-grey w3-margin-bottom" type="submit" name="home_pt" style="margin-top:7px; font-size:20px; padding:4px 10px">&#8634;</button>
                    </div>
                </form>
                <form method="post" action="/admin/<?= $section ?>" style="padding:0 50px">
                    <div style="width:100%">
                        <div>                           
                            <textarea name="tit" placeholder="Tit EN" style="resize:none; width:100%; height:5vh"></textarea>
                        </div>
                        <div>                           
                            <textarea name="txt" placeholder="Text EN" style="resize:none; width:100%; height:18vh"></textarea>
                        </div>
                    </div>
                    <div style="display:flex; justify-content:flex-end">
                        <button class="w3-text-sand w3-red w3-button w3-round-large w3-hover-grey w3-margin-bottom" type="submit" name="home_en" style="margin-top:7px; font-size:20px; padding:4px 10px">&#8634;</button>
                    </div>
                </form>  
                <form method="post" action="/admin/<?= $section ?>" style="padding:0 50px">
                    <div style="width:100%">
                        <div>                           
                            <textarea name="tit" placeholder="Tit FR" style="resize:none; width:100%; height:5vh"></textarea>
                        </div>
                        <div>                           
                            <textarea name="txt" placeholder="Text FR" style="resize:none; width:100%; height:18vh"></textarea>
                        </div>
                    </div>
                    <div style="display:flex; justify-content:flex-end">
                        <button class="w3-text-sand w3-red w3-button w3-round-large w3-hover-grey" type="submit" name="home_fr" style="margin-top:7px; font-size:20px; padding:4px 10px">&#8634;</button>
                    </div>
                </form>   
                <div class="w3-center w3-margin-bottom">
                    <a href="#top" class="w3-text-sand w3-brown w3-button w3-round-large w3-hover-dark-grey w3-margin-top" style="text-transform: uppercase">voltar ao topo</a>                         
                </div>           
            </section>
<?php
}


//section 2 » mobile insert admin
else if($section == 2){
?>
            <section class="w3-panel w3-center">
                <form method="post" action="/admin/<?= $section ?>" enctype="multipart/form-data" style="display: inline-grid; grid-template-columns: auto auto auto">                
                    <div class="w3-white w3-text-brown w3-center w3-margin-bottom">
                        <label>Nome do Modelo
                            <input class="w3-input w3-center" type="text" name="mobile_name" required minlength="5" maxlength="60" style="width:100%">
                        </label>
                    </div>
                    <div class="w3-white w3-text-brown w3-center w3-margin-bottom" style="margin:0px 20px">
                        <label>Unid.Vendidas(Milhões)
                            <input class="w3-input w3-center" type="number" name="unit_sold" required max="99999" style="width:100%">
                        </label>
                    </div>
                    <div class="w3-white w3-text-brown w3-center w3-margin-bottom">
                        <label>Smartphone
                            <input class="w3-input" type="checkbox" name="is_smartphone" style="width:30%; display:inline-block">
                        </label>
                    </div>                  
                    <div class="w3-white w3-text-brown w3-center w3-margin-bottom">
                        <label>Lançamento
                            <input class="w3-input w3-center" type="number" name="released_date" required min="1994" max="9999" style="width:100%">
                        </label>
                    </div>
                    <div class="w3-white w3-text-brown w3-center w3-margin-bottom" style="margin:0px 20px">
                        <label>Tamanho
                            <input class="w3-input w3-center" type="text" name="size" required minlength="2" maxlength="60" style="width:100%">
                        </label>
                    </div>
                    <div class="w3-white w3-text-brown w3-center w3-margin-bottom">
                        <label>Peso (gramas)
                            <input class="w3-input w3-center" type="text" name="weight" required minlength="2" maxlength="8" style="width:100%">
                        </label>
                    </div>
                    <div class="w3-white w3-text-brown w3-center w3-margin-bottom">
                        <label>Resolução
                            <input class="w3-input w3-center" type="text" name="display_resolution" required minlength="2" maxlength="20" style="width:100%">
                        </label>
                    </div>
                    <div class="w3-white w3-text-brown w3-center w3-margin-bottom" style="margin:0px 20px">
                        <label>Display (Polegadas)
                            <input class="w3-input" type="text" name="display_inches" required minlength="2" maxlength="8" style="width:100%">
                        </label>
                    </div>
                    <div class="w3-white w3-text-brown w3-center w3-margin-bottom">
                        <label>Plataforma
                            <input class="w3-input" type="text" name="platform" required minlength="2" maxlength="20" style="width:100%">
                        </label>
                    </div>
                    <div class="w3-white w3-text-brown w3-center w3-margin-bottom">
                        <label>Dual Sim
                            <input class="w3-input" type="checkbox" name="is_dualsim" style="width:30%; display:inline-block">
                        </label>
                    </div>
                    <div class="w3-white w3-text-brown w3-center w3-margin-bottom" style="margin:0px 20px">
                        <label>Card Slot
                            <input class="w3-input" type="checkbox" name="has_cardslot" style="width:30%; display:inline-block">
                        </label>
                    </div>
                    <div class="w3-white w3-text-brown w3-center w3-margin-bottom">
                        <label>Memórias ROM/RAM
                            <input class="w3-input" type="text" name="memory_rom_ram" minlength="2" maxlength="80" style="width:100%">
                        </label>
                    </div>
                    <div class="w3-white w3-text-brown w3-center w3-margin-bottom">
                        <label>Camera 
                            <input class="w3-input w3-center" type="text" name="camera" minlength="2" maxlength="60" style="width:100%">
                        </label>
                    </div>
                    <div class="w3-white w3-text-brown w3-center w3-margin-bottom" style="margin:0px 20px">
                        <label>Video
                            <input class="w3-input w3-center" type="text" name="video" minlength="2" maxlength="80" style="width:100%">
                        </label>
                    </div>
                    <div class="w3-white w3-text-brown w3-center w3-margin-bottom">
                        <label>Bluetooth 
                            <input class="w3-input w3-center" type="checkbox" name="has_bluetooth" style="width:30%; display:inline-block">
                        </label>
                    </div>
                    <div class="w3-white w3-text-brown w3-center">
                        <label>Bateria
                            <input class="w3-input w3-center" type="text" name="battery" required minlength="2" maxlength="30" style="width:100%">
                        </label>
                    </div>
                    <div class="w3-center">
                        <label class="w3-text-sand w3-brown w3-button w3-round-large w3-hover-grey w3-margin-top">Carregar Foto Mobile
                            <input type="file" name="mobile_img" required accept="image/jpeg" style="display:none">
                        </label>
                    </div>
                    <div style="display:flex; justify-content:flex-end">
                        <button class="w3-text-sand w3-red w3-button w3-round-large w3-hover-grey w3-margin-top" type="submit" name="send_mobile" style="margin-top:7px; font-size:20px; padding:4px 22px">&#8634;</button>
                    </div>                   
                </form>
            </section>    



<?php    
} 



//section 3 » mobile del admin
else if($section == 3){
?>
            
            
            <section class="w3-panel">
                <table class="w3-table-all w3-centered w3-ripple">
                    <tr class="w3-sand w3-text-brown" style="text-transform: uppercase">
                        <th class="w3-brown w3-text-sand" colspan="2">eliminar mobile</th>
                    </tr>  
<?php             
        foreach($admin_mobiles as $admin_mobile) {                 
                echo '                    
                    <tr class="w3-text-brown w3-ripple" data-mobremove="' . $admin_mobile["mobile_id"] .'">
                        <td class="w3-left-align">' . $admin_mobile["mobile_name"] . '</td>
                        <td class="w3-right-align"><button class="remove-mobbtn w3-text-sand w3-red w3-button w3-round-large w3-hover-grey" type="button" style="padding:2px 8px">X</button></td>               
                    </tr>
                    
                ';
        }
?>                  
  
                </table>
                <div class="w3-center">
                    <a href="#top" class="w3-text-sand w3-brown w3-button w3-round-large w3-hover-dark-grey w3-margin-top" style="text-transform: uppercase">voltar ao topo</a>                         
                </div>
            </section>


<?php    
} 



//section 4 » comments del admin
else if($section == 4){
?>
  
  

            <section class="w3-panel">
                <table class="w3-table-all w3-centered w3-ripple">
                    <tr class="w3-sand w3-text-brown" style="text-transform: uppercase">
                        <th class="w3-brown w3-text-sand" colspan="4">eliminar comentários</th>
                    </tr>  
<?php             
        foreach($admin_comments as $admin_comment) { 
            
                echo '                    
                    <tr class="w3-text-brown w3-ripple" data-comremove="' . $admin_comment["comment_id"] .'">
                        <td class="w3-left-align" style="font-weight:bold; font-size:13px">' . $admin_comment["user_name"] . '</td>
                        <td class="w3-left-align" style="font-weight:bold; font-size:12px">' . $admin_comment["comment_date"] . '</td>
                        <td class="w3-left-align">' . $admin_comment["comment_txt"] . '</td>
                        <td class="w3-right-align"><button class="remove-combtn w3-text-sand w3-red w3-button w3-round-large w3-hover-grey" type="button" style="padding:2px 8px">X</button></td>               
                    </tr>
                    
                ';
        }
?>                  
  
                </table>
                <div class="w3-center">
                    <a href="#top" class="w3-text-sand w3-brown w3-button w3-round-large w3-hover-dark-grey w3-margin-top" style="text-transform: uppercase">voltar ao topo</a>                         
                </div>
            </section>

   
<?php    
} 


//section 5 » users del admin
else {
?>

<section class="w3-panel">
                <table class="w3-table-all w3-centered w3-ripple">
                    <tr class="w3-sand w3-text-brown" style="text-transform: uppercase">
                        <th class="w3-brown w3-text-sand" colspan="4">editar / eliminar users</th>
                    </tr>  
<?php             
        foreach($users as $user) { 
            
            $user_style = $user["is_admin"] != 1 ?: "color:red";            
               
                echo '                    
                    <tr class="w3-text-brown w3-ripple" data-usrremove="' . $user["user_id"] .'">
                        <td class="w3-left-align"><img class="w3-circle" src="' . $user["user_photo"] . '" alt="foto de perfil" style="width:60px; height:60px; object-fit:cover"></td>
                        <td class="w3-left-align" style="' . $user_style . '; font-weight:bold; font-size:13px; vertical-align:middle; text-align: center">' . $user["user_name"] . '</td>
                        <td class="w3-right-align"><a href="/users/'. $user["user_id"] .'" class="w3-text-sand w3-brown w3-button w3-round-large w3-hover-dark-grey w3-margin-top" style="vertical-align:middle">Editar</a></td>   
                        <td class="w3-right-align"><button class="remove-usrbtn w3-text-sand w3-red w3-button w3-round-large w3-hover-grey" type="button" style="padding:2px 8px; vertical-align:middle">X</button></td>               
                    </tr>
                    
                ';
        }
?>                  
  
                </table>
                <div class="w3-center">
                    <a href="#top" class="w3-text-sand w3-brown w3-button w3-round-large w3-hover-dark-grey w3-margin-top" style="text-transform: uppercase">voltar ao topo</a>                         
                </div>
            </section>


<?php    
} 
?>
            
        </main>   
    </body>
</html>