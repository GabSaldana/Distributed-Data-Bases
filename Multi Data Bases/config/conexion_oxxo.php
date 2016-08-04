<?php
    
    //CONEXION HACIA OXXO   
    
    $conn = mysqli_connect(DB_SERVERp, DB_USERNAME, DB_PASSWORD,DB2);

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    } 

    //echo "Connected successfully  ";
	
?>