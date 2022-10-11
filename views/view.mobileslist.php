<?php 
require("layout/header.php");
?>
            <h2 class="w3-center">TELÉMOVEIS COM MAIS DE 50 MILHÕES DE UNIDADES VENDIDAS</h2>
            <div class="w3-row" style="width:80%; margin:auto">
                <table class="w3-table-all w3-centered w3-hoverable">
                    <thead>
                        <tr class="w3-sand w3-text-brown">
                            <th>MODELO</th>
                            <th>ANO</th>
                            <th>UNID VENDIDAS (Milhões)</th>
                            <th>USER RATING</th>
                        </tr>
                    </thead>
            
<?php        
        $i=1;     
        foreach($mobiles as $mobile) {                 
                echo '
                    <a href="/mobile/' . $mobile["mobile_id"] . '">
                        <tr class="w3-text-brown w3-hover-text-red w3-ripple">
                            <td class="w3-left-align">' . $i++ . '. ' . $mobile["mobile_name"] . '</td>
                            <td>' . $mobile["released_date"] . '</td>
                            <td>' . $mobile["unit_sold"] . '</td>
                            <td>' . $mobile["avg_rating"] . ' &#x2B50;</td>                   
                        </tr>
                    <a>
                ';
        }
?>                
                </table>
            </div>

<?php
require("layout/footer.php");






/* 
EM CIMA ESTÁ A DAR ERRO, ESTE ABAIXO DA CERTO MAS SO LINKA O NOME:
<?php        
        $i=1;     
        foreach($mobiles as $mobile) {
                 
                echo '
                    <tr class="w3-text-brown w3-hover-text-red w3-ripple">
                        <td class="w3-left-align"><a href="/mobile/' . $mobile["mobile_id"] . '">' . $i++ . '. ' . $mobile["mobile_name"] . '</td>
                        <td>' . $mobile["released_date"] . '</td>
                        <td>' . $mobile["unit_sold"] . '</td>
                        <td>' . $mobile["avg_rating"] . ' &#x2B50;</td>                   
                    </tr>
                ';
        }
?>                
                </table>
            </div> 



*/