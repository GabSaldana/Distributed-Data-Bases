<?php
    
    //CONEXION HACIA OXXO   
    
    $conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD,DB3);

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    } 

    //echo "Connected successfully  ";
	
?>