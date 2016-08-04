<?php

        $idlab;$idpre;
        session_start();

        $_SESSION["nombre"]= $_POST['nombre1'];
        $_SESSION["precio"]= $_POST['precio1'];
        $_SESSION["cantidad"]= $_POST['cantidad1'];
        $_SESSION["unidad"]= $_POST['unidad1'];
        $_SESSION["via"]= $_POST['via1'];
        $_SESSION["forma"]= $_POST['forma1'];

    $id=$_SESSION["id"];
    $nombre=$_SESSION["nombre"];
    $precio=$_SESSION["precio"];
    $cantidad=$_SESSION["cantidad"];
    $unidad=$_SESSION["unidad"];
    $via=$_SESSION["via"];
    $forma=$_SESSION["forma"];
    //

//Este programa almacena la infromacion de los horarios en la misma sesion

    echo $id ."</br>";
    echo $nombre."</br>";
    echo $precio. "</br>";
    echo $cantidad. "</br>";
    echo $unidad. "</br>";
    echo $via. "</br>";
    echo $forma. "</br>";
    //

//datos para la conexion a la BD
    $host= "localhost";
    $user ="root";
    $pw="";
    $db ="farmapro_db";
//conectando con la db
    $con= new mysqli($host,$user,$pw,$db);
    if(!$con){ 
        die(mysqli_error()); 
    }

    echo $con->connect_error;
//pasamos como parametros el id de la medicina seleccionada y el id de el usuario e¡dentro de la session
        
        $labprequery ="SELECT p.idAdministration
                        FROM  presentation p
                        WHERE medicine_idmedicine=$id
                        ";
        $result= $con->query($labprequery);
        if(!$result){ 
            echo "error al conectar la BD";
        }
            echo $con->connect_error;

         while($record= mysqli_fetch_array($result,MYSQLI_NUM)){
             $idad=$record[0];
         }

        echo "EL ID DE ADMINISTRACION ES:" .$idad;

        $medicinequery = " UPDATE medicine 
                   SET name='$nombre',price=$precio
                   WHERE idmedicine=$id
                   ";

        
        $presentationquery = " UPDATE presentation 
                            SET quantityPresentation=$cantidad, unitpresentation='$unidad'
                            WHERE medicine_idmedicine=$id ";
        
       $administrationquery=" UPDATE administration 
                   SET type='$via', shape='$forma'
                   WHERE idadministration=$idad ";

        
    

    if ($con->query($medicinequery) === TRUE) { echo "Record updated successfully";} else { echo "Error updating record: " . $con->error; }
    if ($con->query($presentationquery) === TRUE) { echo "Record updated successfully";} else { echo "Error updating record: " . $con->error; }
    if ($con->query($administrationquery) === TRUE) { echo "Record updated successfully";} else { echo "Error updating record: " . $con->error; }
    


header('Location: mis_medicamentos.php');
?>