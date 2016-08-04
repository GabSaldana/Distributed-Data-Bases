<?php
    
    //OBTENER INFO SOBRE LOS USUSARIOS PERTENECIENTES A FARMAPRO
    function select_Usr_FP($conn,$id,$usr){
        
        $registro=null;
        $select_fp= 
        "SELECT *
        FROM user
        WHERE idUser='$id'
        AND username='$usr'
        ";
        //echo $select_fp;
        $result = mysqli_query($conn, $select_fp);
        $row = mysqli_fetch_array($result);

        $count = mysqli_num_rows($result);
         if ($count == 1) {
             $registro=$row;
             header("location:home.html");
         }else{
             session_destroy();
             header("location: index.php");
         }
        mysqli_close($conn);
    }
    
    //OBTENER INFO SOBRE LOS ASOCIADOS PERTENECIENTES A OXXO

    function select_Usr_OXXO($conn,$id,$usr){
        
        $registro=null;
        $select_oxxo= "
            SELECT a.*
            FROM asociado a
            WHERE idAsociado='$id'
            AND nombre='$usr'
            ";
        $result = mysqli_query($conn, $select_oxxo);
        $row = mysqli_fetch_array($result);
        $count = mysqli_num_rows($result);
         if ($count == 1) {
             $registro=$row;
             header("location:home.html");
         }else{
             session_destroy();
             header("location: index.php");
         }
        mysqli_close($conn);    
    }
    

    //OBTENER INFO SOBRE LOS EMPLEADOS PERTENECIENTES A TIENDA

    function select_Usr_TIENDA($conn,$id,$usr){
        
        $registro=null;
        $select_tienda= "
        SELECT * 
        FROM empleado
        WHERE idempleado='$id'
        AND nombre='$usr' 
        ";
        $result = mysqli_query($conn, $select_tienda);
        $row = mysqli_fetch_array($result);
        $count = mysqli_num_rows($result);
         if ($count == 1) {
             $registro=$row;
             header("location:home.html");
         }else{
             session_destroy();
             header("location: index.php");
         }
        mysqli_close($conn);  
        
    }

    //OBTENER INFO SOBRE LOS EMPLEADOS PERTENECIENTES A CURSO
    
    function select_Usr_OPTICA($conn,$id,$usr){
        
        $registro=null;
        $select_optica= "
        SELECT *
        FROM cat_empleado
        WHERE id_empleado='$id'
        AND nombre='$usr'
        ";    
        $result = mysqli_query($conn, $select_optica);
        $row = mysqli_fetch_array($result);
        $count = mysqli_num_rows($result);
         if ($count == 1) {
             $registro=$row;
             header("location:home.html");
         }else{
             session_destroy();
             header("location: index.php");
         }
        mysqli_close($conn);  
    }
    

    //INSERTAR UN USUARIO PERTENECIENTE A FARMAPRO
    function insert_FP($conn,$username,$password,$email,$type){
        
        $insert_fp="INSERT INTO User VALUES (NULL, '$username', '$password', '$email', $type)"; 
        $result = mysqli_query($conn, $insert_fp);
        if($result ){
            echo "EXITO AL INSERTAR";
        }else{
            
            echo "FALLO AL INSERTAR";
        }
        mysqli_close($conn);
    }

    //INSERTAR UN ASOCIADO PERTENECIENTE A OXXO
    function insert_OXXO($conn,$idasociado,$sueldoasociado,$nombreasociado,$eapellido_paterno_oxxo,$typeasoc,$Sucursales,$contra,$status){
        
        $insert_oxxo="INSERT INTO asociado VALUES ('$idasociado', '$sueldoasociado', '$nombreasociado', '$eapellido_paterno_oxxo', '$typeasoc', '$Sucursales', '$contra', '$status', 'null')";
        
        $result = mysqli_query($conn, $insert_oxxo);
        if($result ){
            echo "EXITO AL INSERTAR";
        }else{
            
            echo "FALLO AL INSERTAR";
        }
        mysqli_close($conn);
    }
    
    //INSERTAR UN EMPLEADO PERTENECIENTE A LA TIENDA
    function insert_TIENDA($conn,$idempleado, $nombreempleado,$direccion, $telefono,$antiguedad,$Rangos,$Tiendas){
    
        $insert_tienda="INSERT INTO empleado VALUES ('$idempleado', '$nombreempleado', '$direccion', '$telefono', '$antiguedad', '$Rangos', '$Tiendas')";
        
        $result = mysqli_query($conn, $insert_tienda);
        if($result ){
            echo "EXITO AL INSERTAR";
        }else{
            
            echo "FALLO AL INSERTAR";
        }
        mysqli_close($conn);
    }

    //INSERTAR UN EMPLEADO PERTENECIENTE A LA OPTICA
    function insert_OPTICA($conn,$idcatempleado,$nombrecatempleado,$apellido_paterno_optica,$apellido_materno_optica,$Puestos,$status_op){
    
        $insert_optica="INSERT INTO cat_empleado VALUES ('$idcatempleado', '$nombrecatempleado', '$apellido_paterno_optica', '$apellido_materno_optica', '$Puestos', NOW(), '$status_op')";
        
        $result = mysqli_query($conn, $insert_optica);
        if($result ){
            echo "EXITO AL INSERTAR";
        }else{
            
            echo "FALLO AL INSERTAR";
        }
        mysqli_close($conn);
    }


    /*******************************PROVEEDORES**************************************/

    function select_Proveedor_tienda($conn,$idProveedor,$Direccion,$Telefono){
        
        $query = "SELECT * FROM Proveedor WHERE idProveedor=" . $idProveedor;
        //$query = "SELECT * FROM Proveedor WHERE idProveedor = ".$idProveedor." AND direccion LIKE ".'"%'.$Direccion.'%"'." AND telefono LIKE ".'"%'.$Telefono.'%"';
        //echo $select_fp;
        $result = mysqli_query($conn,$query) or die('Consulta fallida: ' . mysql_error());

        // Imprimir los resultados en HTML
        echo "<table class='table table-bordered'>\n";
        while ($line = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            echo "\t<tr>\n";
            foreach ($line as $col_value) {
                echo "\t\t<td>$col_value</td>\n";
            }
                echo "\t</tr>\n";
        }
        echo "</table>\n";
        mysqli_close($conn);
    }

    function select_Proveedor_fp($conn,$idProveedor,$Direccion,$Telefono){
        
        $query = "SELECT idLaboratory,address,phone FROM laboratory WHERE idLaboratory = ".$idProveedor;
        //$query = "SELECT idLaboratory,address,phone FROM laboratory WHERE idLaboratory LIKE ".$idProveedor." AND address LIKE ".$Direccion." AND phone LIKE ".$Telefono;
        $result = mysqli_query($conn,$query) or die('Consulta fallida: ' . mysqli_error());

                // Imprimir los resultados en HTML
                echo "<table class='table table-bordered'>\n";
                while ($line = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                    echo "\t<tr>\n";
                    foreach ($line as $col_value) {
                        echo "\t\t<td>$col_value</td>\n";
                    }
                    echo "\t</tr>\n";
                }
                echo "</table>\n";

            mysqli_close($conn);
    }

    function select_Proveedor_oxxo($conn,$idProveedor,$Direccion,$Telefono){
        
        $query = "SELECT idSurcursal,calle,numero,colonia,telefono FROM surcursal WHERE idSurcursal =".$idProveedor;
        //$query = "SELECT idSurcursal,calle,numero,colonia,telefono FROM surcursal WHERE idSurcursal LIKE ".$idProveedor." AND calle LIKE ".$Calle." AND numero LIKE ".$Numero." AND colonia LIKE ".$Colonia." AND telefono LIKE ".$Telefono;
        $result = mysqli_query($conn,$query) or die('Consulta fallida: ' . mysqli_error());

                // Imprimir los resultados en HTML
                echo "<table class='table table-bordered'>\n";
                while ($line = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                    echo "\t<tr>\n";
                    foreach ($line as $col_value) {
                        echo "\t\t<td>$col_value</td>\n";
                    }
                    echo "\t</tr>\n";
                }
                echo "</table>\n";

            mysqli_close($conn);
    }


    function insert_Proveedor_oxxo($conn,$idProveedor,$Calle,$Numero,$Colonia,$Telefono){
        
         $query = "INSERT INTO surcursal (idSurcursal,calle,numero,colonia,telefono)  VALUES ($idProveedor, '$Calle',' $Numero', '$Colonia', '$Telefono')";
                
        echo $query;
        $result = mysqli_query($conn,$query) or die('Error OXXO: ' . mysqli_error($conn));
                
        mysqli_close($conn);    
        echo 'Agregado Exitosamente a OXXO \n';
        header("location:index.html");
    }
    

    function insert_Proveedor_tienda($conn,$idProveedor,$Direccion,$Telefono){
        
         $query = "INSERT INTO Proveedor VALUES ( $idProveedor,' $Direccion',' $Telefono')";
         $result = mysqli_query($conn,$query) or die('Error: Tienda' . mysqli_error($conn));
   
        mysqli_close($conn);
        echo "Agregado Exitosamente a Tienda"."\n";
        header("location:index.html");
    }

    function insert_Proveedor_fp($conn,$idProveedor,$Direccion,$Telefono,$idusr){
        
         $query = "INSERT INTO laboratory (idLaboratory,address,phone,user_iduser) VALUES ( $idProveedor, '$Direccion', '$Telefono',$idusr)";
        $result = mysqli_query($conn,$query) or die('Error: Tienda' . mysqli_error($conn));
   
        mysqli_close($conn);    
        echo "Agregado Exitosamente a Farma \n";
        header("location:index.html");
    }


    function delete_Proveedor_tienda($conn,$idProveedor,$Direccion,$Telefono){
        
        $query = "DELETE FROM Proveedor WHERE idProveedor = " . $idProveedor ;  
        //$query = "DELETE FROM Proveedor WHERE idProveedor = ".$idProveedor." and direccion like ".$Direccion." and telefono like ".$Telefono.")";
        $result = mysqli_query($conn,$query) or die('Error: Tienda' . mysqli_error($conn));
   
        mysqli_close($conn);    
        echo "Borrado Exitosamente de Tienda \n";
        header("location:index.html");
    }

    function delete_Proveedor_oxxo($conn,$idProveedor,$Calle,$Numero, $Colonia, $Telefono){
        
        
        $query = "DELETE FROM surcursal WHERE idSurcursal = " . $idProveedor ;
        //$query = "DELETE FROM surcursal WHERE idSurcursal = ".$idProveedor." and calle like ".$Calle." and numero like ".$Numero."and colonia like ".$Colonia."and telefono like ".$Telefono.")";
        $result = mysqli_query($conn,$query) or die('Error: Tienda' . mysqli_error($conn));
   
        mysqli_close($conn);
        echo "Borrado Exitosamente de OXXO \n";
        header("location:index.html");
    }
    
    function delete_Proveedor_fp($conn,$idProveedor,$Direccion, $Telefono){
        
        $query = "DELETE FROM laboratory WHERE idLaboratory = ".$idProveedor;
        //$query = "DELETE FROM laboratory WHERE idLaboratory = ".$idProveedor." and address like ".$Direccion." and phone like ".$Telefono.")";
        $result = mysqli_query($conn,$query) or die('Error: Tienda' . mysqli_error($conn));
   
        mysqli_close($conn);
        echo "Borrado Exitosamente de FARMAPRO \n";
        header("location:index.html");
    }
?>