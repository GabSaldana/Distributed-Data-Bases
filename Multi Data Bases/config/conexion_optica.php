<?php
    
    //CONEXION HACIA CURSO
    
    $conn = mysqli_connect(DB_SERVEROs, DB_USERNAME, DB_PASSWORD,DB4);

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    } 

    //echo "Connected successfully";
	
?>