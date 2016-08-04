<?php

session_start();
echo "estamos en borrar";

    $id=$_SESSION["id"];//id de la medicina a borrar
    echo $_SESSION["id"];
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

    $deletequery="DELETE FROM pharmacy_has_medicine
    WHERE idmedicine='$id' AND idpharmacy='1'";

if ($con->query($deletequery) === TRUE) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . $con->error;
}

session_destroy();
$con->close();

header('Location: mi_inventario.php');
?>