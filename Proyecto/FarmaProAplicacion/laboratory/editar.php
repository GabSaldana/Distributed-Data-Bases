<?php 
        include('../sessionLaboratory.php');

//Este programa almacena la infromacion de los horarios en la misma sesion
$id = $_SESSION["id"];
$nombre = $_SESSION["nombre"];
$precio = $_SESSION["precio"];
$cantidad = $_SESSION["cantidad"];
$unidad = $_SESSION["unidad"];
$via = $_SESSION["via"];
$forma = $_SESSION["forma"];
//

//echo $id;
//echo $nombre;
//echo $precio;
//echo $cantidad;
//echo $unidad;
//echo $via;
//echo $forma;
//
?>

<!DOCTYPE html>
<html>

<head>

    <!--Google Icon Font-->
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--materialize.css-->
    <link type="text/css" rel="stylesheet" href="../css/materialize.min.css" media="screen,projection" />

    <!--Optimización a dispositivos móviles-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!--UTF-8-->
    <meta charset="UTF-8">

    <title>Modificar medicamento | Laboratorio | FarmaPro</title>
    <!--Personalizado homeLaboratory.css-->
    <link type="text/css" rel="stylesheet" href="../css/mi_inventario.css" />


</head>

<body>
    <!--jquery-2.1.1.min.js y materialize.js-->
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script type="text/javascript" src="../js/materialize.min.js"></script>


    <!--Toda la sección del registro-->
    <nav class="navbar-material teal lighten-2">
        <div class="nav-wrapper">
            <a href="../homeLaboratory.php" class="brand-logo">
                <img src="../image/logo2.png" height="50" width="50" class="responsive-img"></a>
            <a href="../homeLaboratory.php" class="brand-logo">
                <div id="logo">FarmaPro</div>
            </a>
            <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
            <ul id="cuenta" class="dropdown-content">
                <li>
                    <a href="../updateInfo.php">
                        <i class="material-icons left">settings</i> Modificar mis datos</a>
                </li>
                <li class="divider"></li>
                <li>
                    <a href="../logout.php">
                        <i class="material-icons left">power_settings_new</i> Cerrar sesión</a>
                </li>
            </ul>
            <ul class="right hide-on-med-and-down">
                <li><a href="agreagar.php">Registro de Medicamentos</a></li>
                <li class="active"><a href="mis_medicamentos.php">Mis medicamentos</a></li>
                <li class="active">
                    <a class="dropdown-button" href="#!" data-activates="cuenta">
                        <i class="material-icons left">perm_identity</i>
                        <b><?php echo "Laboratorio"; ?></b> &nbsp;&nbsp; <?php echo $user_check; ?>
                        <i class="material-icons right">arrow_drop_down</i>
                    </a>
                </li>
            </ul>
            <ul id="cuenta1" class="dropdown-content">
                <li>
                    <a href="../updateInfo.php">
                        <i class="material-icons left">settings</i> Modificar mis datos</a>
                </li>
                <li class="divider"></li>
                <li>
                    <a href="../logout.php">
                        <i class="material-icons left">power_settings_new</i> Cerrar sesión</a>
                </li>
            </ul>
            <ul class="side-nav" id="mobile-demo">
                <li><a href="agreagar.php">Registro de Medicamentos</a></li>
                <li class="active"><a href="mis_medicamentos.php">Mis medicamentos</a></li>
                <li class="active">
                    <a class="dropdown-button" href="#!" data-activates="cuenta1">
                        <b><?php echo "Laboratorio "; ?></b> <?php echo $user_check; ?>
                        <i class="material-icons right">arrow_drop_down</i></a>
                </li>
            </ul>

        </div>
    </nav>
    <script>
        $(document).ready(function() {
            $(".button-collapse").sideNav();
            $(".dropdown-button").dropdown();
        })
    </script>

    <div class="col s12 z-depth-6 card-panel hoverable">

        <h5 class="center">Modificar medicamento</h5> <?php 

echo "
       
        <table>
            <form name='formulario' method='post' action='updating.php' >
                    
            <tr><td>Nombre:&nbsp;<input type='text' name='nombre1' value='$nombre' placeholder='Coloca tu nombre completo' required ></td></tr>
                <tr><td>Precio:&nbsp;<input type='text' name='precio1' value='$precio' placeholder='
    </div>
</body>

</html> required ></td></tr>
                
                <tr><td>Cantidad:&nbsp;<input type='text' name='cantidad1' value='$cantidad' required ></td></tr>
                <tr><td>Unidad:&nbsp;<input type='text' name='unidad1' value='$unidad' required ></td></tr>
                
                <tr><td>Via de Administraci&oacute;n:&nbsp;<input type='text' name='via1' value='$via' required ></td></tr>
                <tr><td>Forma de Administraci&oacute;n:&nbsp;<input type='text' name='forma1' value='$forma' required ></td></tr>
                <td> <button name='Guardar' value='Guardar' class='btn waves-effect waves-light col s12' type='submit'  >
                            Actualizar
                        </button></td>  
                     
                </form></table>";


?>
    </div>
</body>

</html>