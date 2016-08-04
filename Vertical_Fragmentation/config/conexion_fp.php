<?php
    
    //CONEXION HACIA FARMAPRO
    
    $conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD,DB1) ;
    
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    } 

    //echo "Connected successfully";
	
?>