<?php 
include("../sessionPharmacy.php");
//obtener valor del input en el search box

if (isset($_POST['searchButton'])) {
    $search = $_POST['search'];

} else {
    $search = '';
}

if (isset($_POST['borrar'])) {

    $_SESSION["id"] = $_POST['id'];
    echo $_SESSION["id"]; //id de la medicina a borrar
    header('Location: borrar_inventario.php');

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
    $query = " select distinct pm.idmedicine,m.name,m.price,p.unitpresentation,p.quantitypresentation,a.type,a.shape,m.laboratory_idlaboratory 
from medicine m, presentation p, 
administration a, pharmacy_has_medicine pm
where pm.idpharmacy= '$idPharmacy'
and pm.idmedicine = m.idmedicine 
and m.idmedicine = p.medicine_idmedicine
and p.idadministration = a.idadministration;
                    ";

    $result = $con->query($query);
} else {
    $query = " select distinct pm.idmedicine,m.name,m.price,p.unitpresentation,p.quantitypresentation,a.type,a.shape,m.laboratory_idlaboratory 
from medicine m, presentation p, 
administration a, pharmacy_has_medicine pm
where pm.idpharmacy='$idPharmacy'
and pm.idmedicine = m.idmedicine 
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

    <title>Mi Inventario | Farmacia | FarmaPro</title>
    <!--Personalizado homeLaboratory.css-->
    <link type="text/css" rel="stylesheet" href="../css/mi_inventario.css" />
</head>

<body>

    <!--jquery-2.1.1.min.js y materialize.js-->
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script type="text/javascript" src="../js/materialize.min.js"></script>
    <script>
        $(document).ready(function() {
            $(".button-collapse").sideNav();
            $(".dropdown-button").dropdown();
        })
    </script>

    <!--Toda la sección del registro-->
    <nav class="navbar-material light-blue darken-4">
        <div class="nav-wrapper">
            <a href="../homePharmacy.php" class="brand-logo">
                <img src="../image/logo2.png" height="50" width="50" class="responsive-img"></a>
            <a href="../homePharmacy.php" class="brand-logo">
                <div id="logo">FarmaPro</div>
            </a>
            <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
            <ul id="cuenta" class="dropdown-content">
                <li>
                    <a href="../updateInfo2.php">
                        <i class="material-icons left">settings</i> Modificar mis datos</a>
                </li>
                <li class="divider"></li>
                <li>
                    <a href="../logout.php">
                        <i class="material-icons left">power_settings_new</i> Cerrar sesión</a>
                </li>
            </ul>
            <ul class="right hide-on-med-and-down">
                <li class="active"><a href="mi_inventario.php">Mi inventario</a></li>
                <li><a href="anadir_medicamentos.php">Añadir medicamentos</a></li>
                <li><a href="laboratory.php">Laboratorios</a></li>
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
                    <a href="../updateInfo2.php">
                        <i class="material-icons left">settings</i> Modificar mis datos</a>
                </li>
                <li class="divider"></li>
                <li>
                    <a href="../logout.php">
                        <i class="material-icons left">power_settings_new</i> Cerrar sesión</a>
                </li>
            </ul>
            <ul class="side-nav" id="mobile-demo">
                <li class="active"><a href="mi_inventario.php">Mi inventario</a></li>
                <li><a href="anadir_medicamentos.php">Añadir medicamentos</a></li>
                <li><a href="laboratory.php">Laboratorios</a></li>
                <li class="active">
                    <a class="dropdown-button" href="#!" data-activates="cuenta1">
                        <b><?php echo "Farmacia "; ?></b> <?php echo $user_check; ?>
                        <i class="material-icons right">arrow_drop_down</i></a>
                </li>
            </ul>

        </div>
    </nav>

    <div class="col s12 z-depth-6 card-panel hoverable">

        <h5 class="center">Mi inventario</h5>

        <div class="row">
            <!--SEARCH BAR-->
            <form method="post" class="login-form" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                <div class="input-field col s3">
                    <input type="text" id="txt" name="search">
                    <label for="txt">Filtrar</label>
                </div>
                <div class="input-field col s6" style="padding-top: 1%;" >
                    <button type="submit" name="searchButton" class="btn waves-effect waves-light" value="Search">Filtrar</button>
                </div>
                 </form>
        </div>

       



        <?php 
echo '
            <table class = "responsive-table highlight">
            <tr>
                    <thead>
            <!--<th data-field="id">ID</th>-->
            <th data-field="name">Medicamento</th>
            <th data-field="price">Precio</th>
            <th data-field="name">Unidad</th>
            <th data-field="name">Cantidad</th>
            <th data-field="name">V&iacute;a de Administraci&oacute;n</th>
            <th data-field="name">Forma de Administraci&oacute;n</th>    
            <th data-field="name">Laboratorio</th>
            <th data-field="name"></th>
                    </thead>

            </tr><tbody>';


while ($record = mysqli_fetch_array($result, MYSQLI_NUM)) {
    $i = 0;
    echo "<tr><form  action='mi_inventario.php' method='POST' name='form' id='form'>";

    for ($i = 0; $i < 9; $i++) {

        if ($i == 0) {
            //echo "<td><input class='columna0' type ='text'  name='id'  id='id' value=".$record[$i]." readonly></input> </td>";
        }
        if (1 <= $i && $i <= 7) {
            echo "<td>".$record[$i]."</td>";
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
echo "</tbody></table>";

?>
    </div>
</body>

</html>