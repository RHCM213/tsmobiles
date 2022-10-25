<?php 
require("layout/header.php");
?>



            <h2 class="w3-center" style="text-transform: uppercase">telemóveis com mais de 50 milhões de unidades vendidas</h2>
            <div class="w3-row" style="width:80%; margin:auto">
                <table id="mobilelist" class="w3-table-all w3-centered w3-hoverable">
                    <thead>
                        <tr class="w3-sand w3-text-brown" style="text-transform: uppercase">
                            <th class="w3-xlarge" style="padding-left: 8px; padding-top: 2.5px;">&#127894;</th>
                            <th>modelo</th>
                            <th>ano</th>
                            <th>unid vendidas (milhões)</th>
                            <th>avaliação</th>
                        </tr>
                    </thead>
                    <tbody>          
<?php        
        $i=1;     
        foreach($mobiles as $mobile) {                 
                echo '                    
                        <tr class="w3-text-brown w3-hover-text-red w3-ripple" style="cursor:pointer">
                            <td>' . $i++ . '. </td>
                            <td class="w3-left-align"><a id="'. $mobile["mobile_id"] .'" style="text-decoration:none" href="/mobile/' . $mobile["mobile_id"] . '">' . $mobile["mobile_name"] . '</a></td>
                            <td>' . $mobile["released_date"] . '</td>
                            <td>' . $mobile["unit_sold"] . '</td>
                            <td>' . $mobile["avg_rating"] . ' &#9733;</td>                   
                        </tr>
                    
                ';
        }
?>                  

                    </tbody>  
                </table>
                <div class="w3-center">
                    <a href="/" class="w3-text-brown w3-sand w3-button w3-round-large w3-hover-dark-grey w3-margin-top" style="text-transform: uppercase">voltar à home</a>                         
                </div>
            </div>



<?php
require("layout/footer.php");
