        </main>
        <footer class="w3-right w3-padding-large" style="margin-top: 100px">
        <?php
            if($_SESSION["lang"] == "pt"){
                $locale1 = "PT_pt";
                $locale2 = "pt_PT";
              
            }
            else if($_SESSION["lang"] == "en"){
                $locale1 = "GB_en";
                $locale2 = "en_GB";
            }
            else{
                $locale1 = "FR_fr";
                $locale2 = "fr_FR";
            }
        ?>
            <p><time><?php setlocale(LC_ALL, "$locale1" , "$locale2"); echo ucwords(strftime("%d %B, %Y")) ?></time> |
            <a href="mailto:example@example.com">geral@tsm.com</a> | Top Selling Mobiles&#174;</p>            
        </footer> 
    </body>
</html>

