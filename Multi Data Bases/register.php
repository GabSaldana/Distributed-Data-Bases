<?php
    
    include 'config/databases.php';
?>

<html>
    <head>
        <title> REGISTER</title>
        <meta charset="UTF-8">
        <script src="js/jquery-2.1.4.js" type="text/javascript"></script>
        <script src="js/divs.js" type="text/javascript"></script>
        <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" type="text/css" href="bootstrap/bootstrap-theme.min.css">
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
       <form action="register_data.php" method="post">
        
           <select name="DB2" id="select2">
                <option value="1">FarmaPro</option>
                <option value="2">Oxxo</option>  
                <option value="3">Tienda</option>  
                <option value="4">Optica</option>  
           </select>
           <!--REGISTER HIDDEN DIVS-->    
                <br/><br/>   
                <div id="reg_fp" hidden>                      
                      FARMAPRO<br/>
                      
                      Nombre de Usuario:
                        <input type="text" name="username">
                      Password:
                        <input type="text" name="password">
                      Email:
                        <input type="text" name="email">
                      Tipo:
                        <select name="type" id="type">
                            <option value="1">Farmacia</option>
                            <option value="2">Laboratorio</option>  
                        </select>
                      <input type="submit"  value="OK" >
                </div>
                
                <div id="reg_oxxo" hidden>                      
                      OXXO<br/>
                      ID:
                        <input type="text" name="idasociado">
                      Sueldo:
                        <input type="text" name="sueldoasociado">
                      Nombre:
                        <input type="text" name="nombreasociado">
                      Apellido Paterno:
                        <input type="text" name="eapellido_paterno_oxxo">
                      Tipo:
                        <select name="typeasoc" id="typeasoc">
                            <option value="1">1</option>
                            <option value="2">2</option>  
                            <option value="3">3</option>  
                        </select>
                      Sucursal:
                        <!--SELECT PARA SACAR LAS SUCURSALES EXISTENTES-->
                        <?php
                            include 'config/conexion_oxxo.php';
                            $result = mysqli_query($conn, "select distinct idsurcursal from surcursal order by idsurcursal");
                            echo "<select name='Sucursales'>";
                            while ($row = mysqli_fetch_array($result)){
                                echo "<option value=".$row['idsurcursal'].">" . $row['idsurcursal'] . "</option>";
                            }
                            mysqli_close($conn);
                            echo "</select>";
                        ?>
                        
                      Contraseña:
                        <input type="text" name="contra">
                      Estatus:
                        <select name="status" >
                            <option value="Activo">Activo</option>
                            <option value="Inactivo">Inactivo</option>  
                        </select>
                      <input type="submit"  value="OK" >
                </div>
           
                <div id="reg_tienda" hidden>                      
                      TIENDA<br/>
                      ID:
                        <input type="text" name="idempleado">
                      Nombre de Usuario:
                        <input type="text" name="nombreempleado">
                      Direccion:
                        <input type="text" name="direccion">
                      Telefono:
                        <input type="text" name="telefono">
                      Antiguedad(d&iacute;as, semanas o meses):
                        <input type="text" name="antiguedad">
                      Rango:
                        <?php
                            include 'config/conexion_tienda.php';
                            $result = mysqli_query($conn, "select distinct idrango from rango order by idrango");
                            echo "<select name='Rangos'>";
                            while ($row = mysqli_fetch_array($result)){
                                echo "<option value=".$row['idrango'].">" . $row['idrango'] . "</option>";
                            }
                            mysqli_close($conn);
                            echo "</select>";
                        ?>
                      Tienda:
                        <?php
                            include 'config/conexion_tienda.php';
                            $result = mysqli_query($conn, "select distinct idtienda from tienda order by idtienda");
                            echo "<select name='Tiendas'>";
                            while ($row = mysqli_fetch_array($result)){
                                echo "<option value=".$row['idtienda'].">" . $row['idtienda'] . "</option>";
                            }
                            mysqli_close($conn);
                            echo "</select>";
                        ?>
                      <input type="submit"  value="OK" >
                </div>
           
                <div id="reg_op" hidden>                      
                      OPTICA<br/>
                      ID:
                        <input type="text" name="idcatempleado">
                      Nombre de Usuario:
                        <input type="text" name="nombrecatempleado">
                      Apellido Paterno:
                        <input type="text" name="apellido_paterno_optica">
                      Apellido Materno:
                        <input type="text" name="apellido_materno_optica">
                      Puesto:
                        <?php
                            include 'config/conexion_optica.php';
                            $result = mysqli_query($conn, "select distinct id_puesto from cat_puesto order by id_puesto");
                            echo "<select name='Puestos'>";
                            while ($row = mysqli_fetch_array($result)){
                                echo "<option value=".$row['id_puesto'].">" . $row['id_puesto'] . "</option>";
                            }
                            mysqli_close($conn);
                            echo "</select>";
                        ?>
                      Estatus:
                        <select name="status_op" >
                            <option value="1">Activo</option>
                            <option value="0">Inactivo</option>  
                        </select>
                    
                      <input type="submit"  value="OK" >
                </div>
                
        </form>  
    </body>

</html>