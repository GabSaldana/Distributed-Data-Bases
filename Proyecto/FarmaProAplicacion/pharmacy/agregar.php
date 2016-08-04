<?php

session_start();

$_SESSION["id"]= $_POST['id'];//reciimos con post el id medicine
$idmedicine=$_SESSION["id"];

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
        $query = " INSERT INTO `farmapro_db`.`pharmacy_has_medicine` (`idPharmacy`, `idMedicine`) VALUES ('3', '$idmedicine');";//valor de la session del usuario de la farmacia a la que se esta agregando
        
    $result= $con->query($query);

    if(!$result){ 
        echo "error al conectar la BD";
    }
    echo $con->connect_error;    

    header('Location: anadir_medicamentos.php');
?>