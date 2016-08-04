<?php
include 'config/databases.php';
include 'config/conexion_fp.php';


if(isset($_POST["relation_name"]) && !empty($_POST["relation_name"])){
       
    //conexion
   $relacion="SHOW COLUMNS FROM ". $_POST["relation_name"];
   $result = mysqli_query($conn,$relacion) or die('Consulta fallida: ' . mysqli_error());
   
    $i=0;
    
    while ($line = mysqli_fetch_array($result, MYSQLI_NUM)) {
            
        if($i == 0){
            
            echo ' <div class="checkbox">';
            echo    '<label><input type="checkbox" value="'. $line[0]. '" name="atributos[]" checked   readonly><h3>'. $line[0].'</h3></label>';
            echo '</div>';   
            $i++;
        }else{
            
            
            echo ' <div class="checkbox">';
            echo    '<label><input type="checkbox" value="'. $line[0]. '" name="atributos[]"><h3>'. $line[0].'</h3></label>';
            echo '</div>';           
        }
        
    }
        mysqli_close($conn);   
    
}

?>

