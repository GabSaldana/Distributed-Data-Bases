<?php 
include('../sessionPharmacy.php');

//obtener valor del input en el search box

if (isset($_POST['searchButton'])) {
    $search = $_POST['search'];

} else {
    $search = '';
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
    $query = " SELECT * FROM laboratory ";
    $result = $con->query($query);
} else {
    $query = " SELECT * FROM laboratory WHERE name LIKE '%$search%' ";
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

    <title>Laboratorios | Farmacia | FarmaPro</title>
    <!--Personalizado homeLaboratory.css-->
    <link type="text/css" rel="stylesheet" href="../css/laboratory.css" />
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
                <li><a href="mi_inventario.php">Mi inventario</a></li>
                <li><a href="anadir_medicamentos.php">Añadir medicamentos</a></li>
                <li class="active"><a href="laboratory.php">Laboratorios</a></li>
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
                <li><a href="mi_inventario.php">Mi inventario</a></li>
                <li><a href="anadir_medicamentos.php">Añadir medicamentos</a></li>
                <li class="active"><a href="laboratory.php">Laboratorios</a></li>
                <li class="active">
                    <a class="dropdown-button" href="#!" data-activates="cuenta1">
                        <b><?php echo "Farmacia "; ?></b> <?php echo $user_check; ?>
                        <i class="material-icons right">arrow_drop_down</i></a>
                </li>
            </ul>

        </div>
    </nav>

    <div class="col s12 z-depth-6 card-panel hoverable">

        <h5 class="center">Laboratorios</h5>

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



        <form method="get" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <table class = "responsive-table highlight">
                <tr>
                    <thead>
                    <!--<th class='th'>ID</th>-->
                    <th class='th'>Nombre</th>
                    <th class='th'></th>
                </thead>
                </tr>
                <?php 

while ($record = mysqli_fetch_array($result, MYSQLI_NUM)) {
    $i = 0;
    echo "<tr>";
    $id = 0;
    for ($i = 0; $i <= 2; $i++) {


        if ($i == 0) { //columna id
           // echo "<td>".$record[$i]."</td>";
            $id = $record[$i];
        }

        if ($i == 1) { //columna nombre
            echo "<td>".$record[$i]."</td>";
        }

        if ($i == 2) { //columna check
            echo '<td >
                    <input type="checkbox" id="'.$id.'" name="checked[]" value="'.$id.'" >
                    <label for="'.$id.'"></label>
                  </td>';
        }

    }
    echo "</form> </tr>";
}
echo "</tbody></table>
           <button class='teal btn waves-effect waves-light' type='submit' name='btn1' value='ver'>
                Ver
                 <i class='material-icons right'>pageview</i>
            </button>
         </form>";

//GUARDANDO LOS DATOS DE LA BUSQUEDA WHERE AL PRESIONAR VER

$var0 = "";
$var1 = "";
$var2 = "";
$var3 = "";
$var4 = "";
$var5 = "";
$var6 = "";
$var7 = "";
$var8 = "";


if (isset($_GET["btn1"])) { //si dimos click a un boton

    $btn = $_GET["btn1"];

    if ($btn == "ver") { //si hemos dado click al boton ver   


        echo "
	<div class='card-1' ><table class = 'responsive-table highlight'>
	 <tr>
                    <thead>
	<!--<th class='th'>Id</th>-->
	<th class='th'>Nombre</th>
	<th class='th'>Estado</th>
	<th class='th'>Dirección</th>
    <th class='th'>Teléfono</th>
    <th class='th'>Horario Desde</th>
    <th class='th'>Horario Hasta</th>
    <th class='th'>Días de trabajo</th>
    <!--<th class='th'>User ID</th>-->
	 </thead>
                </tr>
	";

        if (!empty($_GET["checked"]) && is_array($_GET["checked"])) { // y tenemos chech box seleccionados
            $checked = $_GET["checked"]; //guardamos el array de id's 
            $nc = count($checked);
            for ($i = 0; $i < $nc; $i++) { //por cada id que queremos buscar su info

                $query = " SELECT * FROM laboratory WHERE idLaboratory='$checked[$i]' ";
                $result = $con->query($query); //ejecutamos la query y obtenemos las tuplas que cumplan la condicion
                while ($record = mysqli_fetch_array($result, MYSQLI_NUM)) { //mientras tengamos tuplas

                    //GUARDAMOS EL VALOR DE CADA COLUMNA EN LAS VARIABLES
                    $var0 = $record[0]; //idLaboratory
                    $var1 = $record[1]; //name
                    $var2 = $record[2]; //state
                    $var3 = $record[3]; //address
                    $var4 = $record[4]; //phone
                    $var5 = $record[5]; //timeStart
                    $var6 = $record[6]; //timeEnd
                    $var7 = $record[7]; //day
                    $var8 = $record[8]; //user_id

                    echo "<tr>
                        
                           <!-- <td >$var0</td>&nbsp; -->
                            <td>$var1</td>&nbsp;
                            <td>$var2</td>&nbsp;
                            <td>$var3</td>&nbsp;
                            <td>$var4</td>&nbsp;
                            <td>$var5</td>&nbsp;
                            <td>$var6</td>&nbsp;
                            <td>$var7</td>&nbsp;
                            <!--<td>$var8</td></br>-->
                        
                        </tr>";


                }

            }
            echo "</table>";
        }
    }
}

?>
</body>

</html>