<?php 
include("../sessionLaboratory.php");

//obtener valor del input en el search box

if (isset($_POST['searchButton'])) {
    $search = $_POST['search'];

} else {
    $search = '';
}

if (isset($_POST['editar'])) {

    $_SESSION["id"] = $_POST['id'];
    $_SESSION["nombre"] = $_POST['nombre'];
    $_SESSION["precio"] = $_POST['precio'];
    $_SESSION["cantidad"] = $_POST['cantidad'];
    $_SESSION["unidad"] = $_POST['unidad'];
    $_SESSION["via"] = $_POST['via'];
    $_SESSION["forma"] = $_POST['forma'];
    // 

    header('Location: editar.php');
}
if (isset($_POST['borrar'])) {
    $_SESSION["id"] = $_POST['id'];
    $_SESSION["nombre"] = $_POST['nombre'];
    $_SESSION["precio"] = $_POST['precio'];
    $_SESSION["cantidad"] = $_POST['cantidad'];
    $_SESSION["unidad"] = $_POST['unidad'];
    $_SESSION["via"] = $_POST['via'];
    $_SESSION["forma"] = $_POST['forma'];
    //

    header('Location: borrar.php');

}
//GENERANDO LA CONEXION************************************************************************

//datos para la conexion a la BD
$host = "localhost";
$user = "root";
$pw = "";
$db = "farmapro_db";
//conectando con la db
$con = new mysqli($host, $user, $pw, $db);
if (!$con) {
    die(mysqli_error());
}

echo $con->connect_error;
//equivalente a mysqli_query (coneccion y query), ejecutando query
if ($search == '') {

    $query = " SELECT m.idmedicine, m.name, m.price, p.quantityPresentation, p.unitPresentation, a.type,a.shape
                    FROM Medicine m, Presentation p, Administration a
                    WHERE m.laboratory_idlaboratory='$idLab'
                    and m.idmedicine = p.medicine_idmedicine
                    and p.idadministration = a.idadministration;
                    ";


    //$result= $con->query($query);
    $result = mysqli_query($con, $query);
    echo mysqli_error($con);
} else {
    $query = " SELECT m.idmedicine, m.name, m.price, p.quantityPresentation, p.unitPresentation, a.type,a.shape
                    FROM Medicine m, Presentation p, Administration a
                    WHERE m.laboratory_idlaboratory='$idLab'
                    and m.idmedicine = p.medicine_idmedicine
                    and p.idadministration = a.idadministration
                    AND m.name LIKE '%$search%' ";

    $result = $con->query($query);
}


if (!$result) {
    echo "error al conectar la BD";
}
echo $con->connect_error;

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

    <title>Mis medicamentos | Laboratorio | FarmaPro</title>
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

        <h5 class="center">Mis medicamentos</h5>

        <div class="row">
            <!--SEARCH BAR-->
            <form method="post" class="login-form" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                <div class="input-field col s3">
                    <input type="text" id="txt" name="search">
                    <label for="txt">Filtrar</label>
                </div>
                <div class="input-field col s6" style="padding-top: 1%;">
                    <button type="submit" name="searchButton" class="btn waves-effect waves-light" value="Search">Filtrar</button>
                </div>
            </form>
        </div>

        <?php 
echo " 
            <table class = 'responsive-table highlight'>
            <tr>
            <thead>
            <th class='th'></th>
            <th class='th'>Medicamento</th>
            <th class='th'>Precio</th>
            <th class='th'>Cantidad</th>
            <th class='th'>Unidad</th>
            <th class='th'>V&iacute;a de Administraci&oacute;n</th>
            <th class='th'>Forma de Administraci&oacute;n</th>    
            <th class='th'>Editar</th> 
            <th class='th'>Borrar</th>    
            </thead>
            </tr>";



while ($record = mysqli_fetch_array($result, MYSQLI_NUM)) {
    $i = 0;
    $idlab;
    $idpre;
    echo "<tr><form  action='mis_medicamentos.php' method='POST' name='form' id='form'>";

    for ($i = 0; $i < 9; $i++) {

        if ($i == 0) {
            echo "<td><input style='visibility: hidden;' class='columna0' type ='text'  name='id'  id='id' value=".$record[$i]." readonly></input> </td>";
        }

        if ($i == 1) {
            echo "<td><input  type ='text'  name='nombre'  id='nombre' value=".$record[$i]." readonly></input> </td>";
        }
        if ($i == 2) {
            echo "<td><input  type ='text'  name='precio'  id='precio' value=".$record[$i]." readonly></input> </td>";
        }
        if ($i == 3) {
            echo "<td><input class='columna0' type ='text'  name='cantidad'  id='cantidad' value=".$record[$i]." readonly></input> </td>";
        }
        if ($i == 4) {
            echo "<td><input class='columna0' type ='text'  name='unidad'  id='unidad' value=".$record[$i]." readonly></input> </td>";
        }
        if ($i == 5) {
            echo "<td><input type ='text'  name='via'  id='via' value=".$record[$i]." readonly></input> </td>";
        }
        if ($i == 6) {
            echo "<td><input  type ='text'  name='forma'  id='forma' value=".$record[$i]." readonly></input> </td>";
        }

        if ($i == 7) {
            echo '<td><button class="teal btn waves-effect waves-light" type="submit" name="editar" value="editar" >
                EDITAR
                 <i class="material-icons right">library_books</i>
            </button></td>';

        }
        if ($i == 8) {
            echo '<td><button class="red btn waves-effect waves-light" type="submit" name="borrar" >
                Borrar
                 <i class="material-icons right">new_releases</i>
            </button></td>';
        }


    }
    echo "</form> </tr>";
}
echo "</table>";

?>
    </div>
</body>

</html>