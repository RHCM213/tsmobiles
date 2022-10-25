<?php
require("layout/basicheader.php");
require("layout/adminnav.php");
?> 
              
    
<?php
if($section == 1 || $section == ""){
?>
            <section>
                <form id="uphome-form" method="post" action="/admin" enctype="multipart/form-data">
                    <div>
	                    <label class="w3-text-sand w3-brown w3-button w3-round-large w3-hover-grey w3-margin-top w3-margin-bottom">Carregar Foto Home
        	                <input type="file" name="user_photo" required accept="image/jpeg" style="display:none">
                         </label>
                    </div>  
                    <div>                           
                        <textarea name="txt_home" required></textarea>
                    </div>
                    <div>
                        <button class="w3-text-sand w3-red w3-button w3-round-large w3-hover-grey w3-margin-top" type="submit" name="send_home" form="uphome-form">Actualizar Home</button>
                    </div>
                </form>    
            </section>
<?php
}

else if($section == 2){
?>
            <section class="w3-panel">
                <form id="upmobile-form" class="w3-text-brown" method="post" action="/admin" enctype="multipart/form-data" style="display: inline-grid; grid-template-columns: auto auto auto">                
                    <div>
                        <label>Nome do Modelo
                            <input class="w3-input" type="text" name="mobile_name" required minlength="5" maxlength="60" style="width:100%">
                        </label>
                    </div>
                    <div style="margin:0px 20px">
                        <label>Unid.Vendidas(Milhões)
                            <input class="w3-input" type="number" name="unit_sold" required max="99999" style="width:60%">
                        </label>
                    </div>
                    <div>
                        <label>Smartphone
                            <input class="w3-input" type="checkbox" name="is_smartphone" style="width:30%; display:inline-block">
                        </label>
                    </div>                  
                    <div>
                        <label>Lançamento
                            <input class="w3-input" type="number" name="released_date" required min="1994" max="9999" style="width:60%">
                        </label>
                    </div>
                    <div style="margin:0px 20px">
                        <label>Tamanho
                            <input class="w3-input" type="text" name="size" required minlength="2" maxlength="60" style="width:80%">
                        </label>
                    </div>
                    <div>
                        <label>Peso (gramas)
                            <input class="w3-input" type="text" name="weight" required minlength="2" maxlength="8" style="width:60%">
                        </label>
                    </div>
                    <div>
                        <label>Resolução
                            <input class="w3-input" type="text" name="display_resolution" required minlength="2" maxlength="20" style="width:80%">
                        </label>
                    </div>
                    <div style="margin:0px 20px">
                        <label>Display (Polegadas)
                            <input class="w3-input" type="text" name="display_inches" required minlength="2" maxlength="8" style="width:60%">
                        </label>
                    </div>
                    <div>
                        <label>Plataforma
                            <input class="w3-input" type="text" name="platform" required minlength="2" maxlength="20" style="width:80%">
                        </label>
                    </div>
                    <div>
                        <label>Dual Sim
                            <input class="w3-input" type="checkbox" name="is_dualsim" style="width:30%; display:inline-block">
                        </label>
                    </div>
                    <div style="margin:0px 20px">
                        <label>Card Slot
                            <input class="w3-input" type="checkbox" name="has_cardslot" style="width:30%; display:inline-block">
                        </label>
                    </div>
                    <div>
                        <label>Memórias ROM/RAM
                            <input class="w3-input" type="text" name="memory_rom_ram" required  minlength="2" maxlength="80" style="width:100%">
                        </label>
                    </div>
                    <div>
                        <label>Camera 
                            <input class="w3-input" type="text" name="camera" required minlength="2" maxlength="60" style="width:100%">
                        </label>
                    </div>
                    <div style="margin:0px 20px">
                        <label>Video
                            <input class="w3-input" type="text" name="video" required minlength="2" maxlength="80" style="width:100%">
                        </label>
                    </div>
                    <div>
                        <label>Bluetooth 
                            <input class="w3-input" type="checkbox" name="has_bluetooth" style="width:30%; display:inline-block">
                        </label>
                    </div>
                    <div>
                        <label>Bateria
                            <input class="w3-input" type="text" name="battery" required minlength="2" maxlength="30" style="width:80%">
                        </label>
                    </div>
                    <div>
                        <label class="w3-text-sand w3-brown w3-button w3-round-large w3-hover-grey w3-margin-top">Carregar Foto Mobile
                            <input type="file" name="mobile_img" required accept="image/jpeg" style="display:none">
                        </label>
                    </div>
                    <div>
                        <button class="w3-text-sand w3-red w3-button w3-round-large w3-hover-grey w3-margin-top" type="submit" name="send_mobile" form="uphome-form">Inserir Mobile</button>
                    </div>                   
                </form>
            </section>    



<?php    
} 

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
                    <tr class="w3-text-brown w3-ripple" data-toremove="' . $admin_mobile["mobile_id"] .'">
                        <td class="w3-left-align">' . $admin_mobile["mobile_name"] . '</td>
                        <td class="w3-right-align"><button class="remove-btn w3-text-sand w3-red w3-button w3-round-large w3-hover-grey" type="button" style="padding:2px 8px">X</button></td>               
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
                    <tr class="w3-text-brown w3-ripple" data-comtoremove="' . $admin_comment["comment_id"] .'">
                        <td class="w3-left-align" style="font-weight:bold; font-size:13px">' . $admin_comment["user_name"] . '</td>
                        <td class="w3-left-align" style="font-weight:bold; font-size:12px">' . $admin_comment["comment_date"] . '</td>
                        <td class="w3-left-align">' . $admin_comment["comment_txt"] . '</td>
                        <td class="w3-right-align"><button class="remove-btn w3-text-sand w3-red w3-button w3-round-large w3-hover-grey" type="button" style="padding:2px 8px">X</button></td>               
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

else {
?>

<section class="w3-panel">
                <table class="w3-table-all w3-centered w3-ripple">
                    <tr class="w3-sand w3-text-brown" style="text-transform: uppercase">
                        <th class="w3-brown w3-text-sand" colspan="4">editar / eliminar users</th>
                    </tr>  
<?php             
        foreach($users as $user) {                 
                echo '                    
                    <tr class="w3-text-brown w3-ripple" data-comtoremove="' . $user["user_id"] .'">
                        <td class="w3-left-align"><img class="w3-circle" src="' . $user["user_photo"] . '" alt="foto de perfil" style="width:60px; height:60px; object-fit:cover"></td>
                        <td class="w3-left-align" style="font-weight:bold; font-size:13px; vertical-align:middle" style="text-align: center">' . $user["user_name"] . '</td>
                        <td class="w3-right-align"><a href="/users/'. $user["user_id"] .'" class="w3-text-sand w3-brown w3-button w3-round-large w3-hover-dark-grey w3-margin-top" style="vertical-align:middle">Editar</a></td>   
                        <td class="w3-right-align"><button class="remove-btn w3-text-sand w3-red w3-button w3-round-large w3-hover-grey" type="button" style="padding:2px 8px; vertical-align:middle">X</button></td>               
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