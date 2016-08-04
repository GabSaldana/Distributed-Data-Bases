<?php
include 'config/databases.php';
include 'config/conexion_fp.php';


if(isset($_POST["info"]) && !empty($_POST["info"])){
    
    if(isset($_POST["tabla"]) && !empty($_POST["tabla"])){
        
            
            $proy='';
            //conexion
            $arr= array();    
            $i=0;
        
            foreach($_POST["info"] as  $valor){ 
             
                $arr[$i]=$valor;
                $i++;
            } 
        
            $proy=implode(",",$arr);
            $Proyeccion= "SELECT ".$proy ;
            echo ' <div class="checkbox">';
            echo    '<label><input type="checkbox" value="'. $Proyeccion. '" name="expresiones[]"><h3>'. $Proyeccion.'</h3></label>';
            echo '</div>'; 
            echo '<div class="form-group">';
            echo    '<label class="col-md-2 control-label" for="inputdefault"><h3>Nombre del Fragmento:</h3></label>';
            echo  '  <input class="form-control  input-lg" name="nombre_frag[]"  type="text">';
            echo '</div><br/>';
                        
        
    }

}

?>