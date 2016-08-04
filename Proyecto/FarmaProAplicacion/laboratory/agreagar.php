<?php
include('../sessionLaboratory.php');


if ($_SERVER["REQUEST_METHOD"] == "POST") {
   $name =  mysqli_real_escape_string($db, $_POST['name']);
   $price =  mysqli_real_escape_string($db, $_POST['price']);
   $unit =  mysqli_real_escape_string($db, $_POST['unit']);
   $quan =  mysqli_real_escape_string($db, $_POST['quan']);
   $via =  mysqli_real_escape_string($db, $_POST['via']);
   $adm =  mysqli_real_escape_string($db, $_POST['adm']);

   
     $query = "INSERT INTO administration VALUES (NULL, '$via', '$adm' )";
    if (!mysqli_query($db, $query)) {
        echo $query.'<br/>';
    }
     $last_id = mysqli_insert_id($db);
    
    $query = "INSERT INTO medicine VALUES (NULL, '$name', '$price', '$idLab' )";
    if (!mysqli_query($db, $query)) {
        echo $query.'<br/>';
    }
    $last_id1 = mysqli_insert_id($db);

    $query = "INSERT INTO presentation VALUES (NULL, '$unit', '$quan', '$last_id', $last_id1, $idLab)";
        if (!mysqli_query($db, $query)) {
            echo $query.'<br/>';
        }
        header("location: ../homeLaboratory.php");


}
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

        <h5 class="center">Registro de medicamento</h5> 
  
        <div class="row">
                <form class="login-form" method="post">
                    <div class="row">

                         <div class="input-field col s12">
                            <input id="name" type="text" name="name">
                            <label for="name" class="center-align">
                                Nombre del medicamento
                            </label>
                        </div>
                        
                         <div class="input-field col s12">
                            <input id="price" type="number" name="price">
                            <label for="price" class="center-align">
                                Precio unitario
                            </label>
                        </div>
                        
                         <div class="input-field col s12">
                            <input id="unit" type="text" name="unit">
                            <label for="unit" class="center-align">
                                Unidad
                            </label>
                        </div>
                        
                        <div class="input-field col s12">
                            <input id="quan" type="text" name="quan">
                            <label for="quan" class="center-align">
                                Cantidad
                            </label>
                        </div>
                        
                        <div class="input-field col s12">
                            <input id="via" type="text" name="via">
                            <label for="via" class="center-align">
                                Vía de administración
                            </label>
                        </div>
                        
                        <div class="input-field col s12">
                            <input id="adm" type="text" name="adm">
                            <label for="adm" class="center-align">
                                Forma de administración
                            </label>
                        </div>
                                                
                     </div>
                     
                     <div class="row">
                        <button class="btn waves-effect waves-light col s12" type="submit">
                            Agregar
                        </button>

                    </div>
                 </form>
             </div>
                    
          
    </div>
</body>

</html>