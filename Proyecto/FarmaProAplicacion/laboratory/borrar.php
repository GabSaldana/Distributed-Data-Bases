<?php

session_start();
echo "estamos en borrar";

    $id=$_SESSION["id"];

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
    
    $labprequery ="SELECT m.laboratory_idlaboratory
                        FROM medicine m
                        WHERE idmedicine=$id
                        ";
        $result= $con->query($labprequery);
        if(!$result){ 
            echo "error al conectar la BD";
        }
            echo $con->connect_error;

         while($record= mysqli_fetch_array($result,MYSQLI_NUM)){
             $idlab=$record[0];
         }

        echo "EL ID DEL LABORATORIO ES:" .$idlab;


    $deletepresentation="
                        DELETE FROM presentation
    WHERE medicine_idmedicine=$id
    AND medicine_laboratory_idlaboratory=$idlab
    ";

    $deletemedicine="DELETE FROM medicine
    WHERE idmedicine=$id
    AND laboratory_idlaboratory=$idlab
    ";

if ($con->query($deletepresentation) === TRUE) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . $con->error;
}


if ($con->query($deletemedicine) === TRUE) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . $con->error;
}

session_destroy();
$con->close();

//header('Location: anadir_medicamentos.php');
?>