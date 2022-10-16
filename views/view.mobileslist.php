<?php 
require("layout/header.php");
?>



            <h2 class="w3-center" style="text-transform: uppercase">telemóveis com mais de 50 milhões de unidades vendidas</h2>
            <div class="w3-row" style="width:80%; margin:auto">
                <table class="w3-table-all w3-centered w3-hoverable">
                    <thead>
                        <tr class="w3-sand w3-text-brown" style="text-transform: uppercase">
                            <th class="w3-xlarge" style="padding-left: 8px; padding-top: 2.5px;">&#127894;</th>
                            <th>modelo</th>
                            <th>ano</th>
                            <th>unid vendidas (milhões)</th>
                            <th>users rating</th>
                        </tr>
                    </thead>
                    <tbody>          
<?php        
        $i=1;     
        foreach($mobiles as $mobile) {                 
                echo '                    
                        <tr class="w3-text-brown w3-hover-text-red w3-ripple" style="cursor: pointer">
                            <td>' . $i++ . '. </td>
                            <td class="w3-left-align"><a id="'. $mobile["mobile_id"] .'" style="text-decoration:none" href="/mobile/' . $mobile["mobile_id"] . '">' . $mobile["mobile_name"] . '</a></td>
                            <td>' . $mobile["released_date"] . '</td>
                            <td>' . $mobile["unit_sold"] . '</td>
                            <td>' . $mobile["avg_rating"] . ' &#x2B50;</td>                   
                        </tr>
                    
                ';
        }
?>                  </tbody>  
                </table>
            </div>



<?php
require("layout/footer.php");
