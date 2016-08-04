<?php
    
    //CONEXION HACIA CURSO
    
    $conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD,DB2);

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    } 

    //echo "Connected successfully";
	
?>