<?php
    session_start();
    require "conecta.php";

   //lista os cadastros existentes no banco de dados
   $sqlc  = "SELECT *from `cadastros`";
   $respc = mysqli_query($con,$sqlc);

   while($row = mysqli_fetch_array($respc,MYSQLI_ASSOC)){
        echo  '<tr>
                  <td>'.$row['nome'].'</td>
                  <td>'.$row['mail'].'</td>
                  <td>'.$row['niver'].'</td>
               </tr>';
   }  


?>