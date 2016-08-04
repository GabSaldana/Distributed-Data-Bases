<?php 
include("sessionPharmacy.php");
?>

<!DOCTYPE html>
<html>

<head>

    <!--Google Icon Font-->
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--materialize.css-->
    <link type="text/css" rel="stylesheet" href="css/materialize.min.css" media="screen,projection" />

    <!--Optimización a dispositivos móviles-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!--UTF-8-->
    <meta charset="UTF-8">

    <title>Inicio | Farmacia | FarmaPro</title>
    <!--Personalizado homeLaboratory.css-->
    <link type="text/css" rel="stylesheet" href="css/homePharmacy.css" />


</head>

<body>
    <!--jquery-2.1.1.min.js y materialize.js-->
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script type="text/javascript" src="js/materialize.min.js"></script>


    <!--Toda la sección del registro-->
    <nav class="navbar-material light-blue darken-4">
        <div class="nav-wrapper">
            <a href="homePharmacy.php" class="brand-logo">
                <img src="image/logo2.png" height="50" width="50" class="responsive-img"></a>
            <a href="homePharmacy.php" class="brand-logo">
                <div id="logo">FarmaPro</div>
            </a>
            <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
            <ul id="cuenta" class="dropdown-content">
                <li>
                    <a href="updateInfo2.php">
                        <i class="material-icons left">settings</i> Modificar mis datos</a>
                </li>
                <li class="divider"></li>
                <li>
                    <a href="logout.php">
                        <i class="material-icons left">power_settings_new</i> Cerrar sesión</a>
                </li>
            </ul>
            <ul class="right hide-on-med-and-down">
                <li><a href="pharmacy/mi_inventario.php">Mi inventario</a></li>
                <li><a href="pharmacy/anadir_medicamentos.php">Añadir medicamentos</a></li>
                <li><a href="pharmacy/laboratory.php">Laboratorios</a></li>
                <li class="active">
                    <a class="dropdown-button" href="#!" data-activates="cuenta">
                        <i class="material-icons left">perm_identity</i>
                        <b><?php echo "Farmacia "; ?></b> &nbsp;&nbsp; <?php echo $user_check; ?>
                        <i class="material-icons right">arrow_drop_down</i>
                    </a>
                </li>
            </ul>
            <ul id="cuenta1" class="dropdown-content">
                <li>
                    <a href="updateInfo2.php">
                        <i class="material-icons left">settings</i> Modificar mis datos</a>
                </li>
                <li class="divider"></li>
                <li>
                    <a href="logout.php">
                        <i class="material-icons left">power_settings_new</i> Cerrar sesión</a>
                </li>
            </ul>
            <ul class="side-nav" id="mobile-demo">
                <li><a href="pharmacy/mi_inventario.php">Mi inventario</a></li>
                <li><a href="pharmacy/anadir_medicamentos.php">Añadir medicamentos</a></li>
                <li><a href="pharmacy/laboratory.php">Laboratorios</a></li>
                <li class="active">
                    <a class="dropdown-button" href="#!" data-activates="cuenta1">
                        <b><?php echo "Farmacia "; ?></b> <?php echo $user_check; ?>
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

    <div class="row">
        <div class="col s12 center-align">
            <h1 id="hero-title" itemprop="description" style="font-size: 40px;"><span class="bold">FarmaPro
                        </span><span class="thin"> es una plataforma simple<br> para la conexión entre laboratorios y farmacias. </span></h1>
        </div>
    </div>


</body>

</html>