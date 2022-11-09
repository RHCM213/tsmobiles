<?php 
require("layout/header.php");
?>



            <h2 class="w3-center" style="text-transform: uppercase"><?= $contt_home["item_1"] ?></h2>
            <div class="w3-row" style="width:80%; margin:auto">
                <table id="mobilelist" class="w3-table-all w3-centered w3-hoverable">
                    <thead>
                        <tr class="w3-sand w3-text-brown" style="text-transform: uppercase">
                            <th class="w3-xlarge" style="padding-left: 8px; padding-top: 2.5px;">&#127894;</th>
                            <th><?= $contt_moblist["item_1"] ?></th>
                            <th><?= $contt_moblist["item_2"] ?></th>
                            <th><?= $contt_moblist["item_3"] ?></th>
                            <th><?= $contt_moblist["item_4"] ?></th>
                        </tr>
                    </thead>
                    <tbody>          
<?php  
               
        $i = 1; 
        foreach($mobiles as $key => $mobile) {

                echo '                    
                        <tr class="w3-text-brown w3-hover-text-red w3-ripple" style="cursor:pointer">
                            <td>' . $i++ . '. </td>
                            <td class="w3-left-align"><a id="'. $mobile["mobile_id"] .'" href="/mobile/' . $lang . '/' . $mobile["mobile_id"] . '">' . $mobile["mobile_name"] . '</a></td>
                            <td>' . $mobile["released_date"] . '</td>
                            <td>' . $mobile["unit_sold"] . '</td>
                            <td>' . (!empty($avg_rating[$key]) ? $avg_rating[$key]["average"] . ' &#9733;' : "") . '</td>                   
                        </tr>
                    
                ';
                
        }
?>                  

                    </tbody>  
                </table>
                <div class="w3-center">
                    <a href="#top" class="w3-text-brown w3-sand w3-button w3-round-large w3-hover-dark-grey w3-margin-top" style="text-transform: uppercase"><?= $contt_moblist["item_5"] ?></a>                         
                </div>
            </div>



<?php
require("layout/footer.php");
