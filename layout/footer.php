        </main>
        <footer class="w3-right w3-padding-large" style="margin-top: 100px; color:#fdf5e6">
        <?php
            if($lang == "pt"){
                $locale1 = "PT_pt";
                $locale2 = "pt_PT";
              
            }
            else if($lang == "en"){
                $locale1 = "GB_en";
                $locale2 = "en_GB";
            }
            else{
                $locale1 = "FR_fr";
                $locale2 = "fr_FR";
            }
        ?>
            <p><time><?php setlocale(LC_ALL, "$locale1" , "$locale2"); echo ucwords(strftime("%d %B, %Y")) ?></time> |
            <a href="/msgr/<?= $lang ?>" style="font-size:20px">&#9993;</a> | Top Selling Mobiles&#174;</p>            
        </footer> 
    </body>
</html>

