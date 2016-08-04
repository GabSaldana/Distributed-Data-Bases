<!DOCTYPE html>

<html>
    <head>
        <title>DDB</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="bootstrap/css/estilo.css">
        <link rel="stylesheet" type="text/css" href="bootstrap/css/miestilo.css">
    </head>
    <body>
        
        <?php
    
        
            include 'config/databases.php'; 
            include 'querys.php';  
        
            $idProveedor = (int)($_POST['idProveedor']);
            if ($idProveedor == null) {
                $idProveedor = null;
            }
            
            $Calle = $_POST['Calle'];
            $Numero = $_POST['Numero'];
            $Colonia = $_POST['Colonia'];
            
          
            if ($Calle == null && $Numero == null && $Colonia == null) {
                $Direccion = null;
            }
            
            if($Calle== null && $Colonia==null && $Numero!=null){
                $Direccion = $Numero;
            }
            
            if($Calle== null && $Colonia!=null && $Numero==null){
                $Direccion = $Colonia;
            }
            
            if($Calle!= null && $Colonia==null && $Numero==null){
                $Direccion = $Calle;
            }
            
            if($Calle== null && $Colonia!=null && $Numero!=null){
                $Direccion = $Colonia.$Numero;
            }
            
            if($Calle!= null && $Colonia==null && $Numero!=null){
                $Direccion = $Calle.$Numero;
            }
            
            if($Calle!= null && $Colonia!=null && $Numero!=null){
            $Direccion = $Calle.$Numero.$Colonia;
            }

            $Telefono = $_POST['Telefono'];
            if ($Telefono == null) {
                $Telefono = null;
            }
            else{
                $Telefono = $_POST['Telefono'];
            }
                                
            
            if ( $Calle== null) {
                $Calle = null;
            }
            else{
                $Calle = $_POST['Calle'];
            }
            
            if ($Numero == null) {
                $Numero = null;
            }
            else{
                $Numero = $_POST['Numero'];
            }
           
            if ($Colonia == null) {
                $Colonia = null;
            }
            else{
                $Colonia = $_POST['Colonia'];
            }
            
                        
            /*Base de Datos oxxo*/ 
           
            include 'config/conexion_oxxo.php';
                
            // Realizar una consulta MySQL
            insert_Proveedor_oxxo($conn,$idProveedor,$Calle,$Numero,$Colonia,$Telefono);
            
            /*Base de Datos Tienda*/
            include 'config/conexion_tienda.php';
                        
            // Realizar una consulta MySQL
            insert_Proveedor_tienda($conn,$idProveedor,$Direccion,$Telefono);
            
            /*Base de Datos Farmacia*/
           
            include 'config/conexion_fp.php';
                            
            // Realizar una consulta MySQL
            $id=2;//porque es laboratorista
            insert_Proveedor_fp($conn,$idProveedor,$Direccion,$Telefono,$id);
        ?>
        
        <script src="bootstrap/js/jquery.js"></script>
        <script src="bootstrap/js/bootstrap.min.js"></script>
    </body>
</html>
