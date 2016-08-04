<?php
include 'config/databases.php';
include 'config/conexion_fp.php';


if(isset($_POST["relation_name"]) && !empty($_POST["relation_name"])){
       
    //conexion
   $relacion="SHOW COLUMNS FROM ". $_POST["relation_name"];
   $result = mysqli_query($conn,$relacion) or die('Consulta fallida: ' . mysqli_error());
   echo '<br/><br/><br/><table class="table">';
    echo '<tr>
                <th >ATRIBUTOS</th>
            </tr>';    
    echo '<tr>';
    while ($line = mysqli_fetch_array($result, MYSQLI_NUM)) {
            
            
                echo '<td>'. $line[0] .'</td>';
                
        }
        echo '</tr>';
        echo '</table>';
        mysqli_close($conn);   
    
}

?>

