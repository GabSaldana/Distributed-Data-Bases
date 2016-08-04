<!DOCTYPE html>

<html>
    <head>
        <title>DDB</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="bootstrap/bootstrap-theme.min.css">
        <link rel="stylesheet" type="text/css" href="style.css">
        <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
    </head>
    <body>
       <div class="title">
            <h1> Proveedores:</h1>
        </div>
        <br/><br/>
        <?php
            
            include 'config/databases.php'; 
            include 'querys.php';    
        
            $idProveedor = $_POST['id'];
            if ($idProveedor == null) {
                $idProveedor = "'%'";
            }
            
            $Calle = $_POST['Calle'];
            $Numero = $_POST['Numero'];
            $Colonia = $_POST['Colonia'];
            
          
            if ($Calle == null && $Numero == null && $Colonia == null) {
                $Direccion = "'%'";
            }
            
            if($Calle== null && $Colonia==null && $Numero!=null){
                $Direccion = "'%'".$Numero."'%'";
            }
            
            if($Calle== null && $Colonia!=null && $Numero==null){
                $Direccion = "'%'".$Colonia."'%'";
            }
            
            if($Calle!= null && $Colonia==null && $Numero==null){
                $Direccion = "'%'".$Calle."'%'";
            }
            
            if($Calle== null && $Colonia!=null && $Numero!=null){
                $Direccion = "'%'".$Colonia." ".$Numero."'%'";
            }
            
            if($Calle!= null && $Colonia==null && $Numero!=null){
                $Direccion = "'%'".$Calle." ".$Numero."'%'";
            }
            
            if($Calle!= null && $Colonia!=null && $Numero!=null){
                $Direccion = "'%'".$Calle." ".$Numero." ".$Colonia."'%'";
            }

            $Telefono = $_POST['Telefono'];
            if ($Telefono == null) {
                $Telefono = "'%'";
            }
            else{
                $Telefono = "'%'".$_POST['Telefono']."'%'";
            }
        
                    
            /*Base de Datos Tienda*/
            include 'config/conexion_tienda.php';
                
            // Realizar una consulta MySQL
            select_Proveedor_tienda($conn,$idProveedor,$Direccion,$Telefono);
            
            /*Base de Datos Farmacia*/
           
            include 'config/conexion_fp.php';
                
            // Realizar una consulta MySQL
            select_Proveedor_fp($conn,$idProveedor,$Direccion,$Telefono);
                
            if ( $Calle== null) {
                $Calle = "'%'";
            }
            else{
                $Calle = "'%'".$_POST['Calle']."'%'";
            }
            
            if ($Numero == null) {
                $Numero = "'%'";
            }
            else{
                $Numero = "'%'".$_POST['Numero']."'%'";
            }
           
            if ($Colonia == null) {
                $Colonia = "'%'";
            }
            else{
                $Colonia = "'%'".$_POST['Colonia']."'%'";
            } 
            
            /*Base de Datos oxxo */
           include 'config/conexion_oxxo.php';
                
            // Realizar una consulta MySQL
            select_Proveedor_oxxo($conn,$idProveedor,$Direccion,$Telefono);
        
                
        ?>
        
        <script src="bootstrap/js/jquery.js"></script>
        <script src="bootstrap/js/bootstrap.min.js"></script>
    </body>
</html>
