<?php 
include("sessionLaboratory.php");

$id = $row['idUser'];
//echo "SELECT * FROM Laboratory WHERE idUser =  $id ";
$s = mysqli_query($db, "SELECT * FROM Laboratory WHERE User_idUser =  $id ");
$row2 = mysqli_fetch_array($s, MYSQLI_ASSOC);

//Procesamiento de la cadena del horario ya que es de tipo TIME
//Y con eso prellenar los SELECT HTML

$token = strtok($row2['timeStart'], ":");
$hourIni = $token;
$token = strtok(":");
$minIni = $token;
$token = strtok($row2['timeEnd'], ":");
$hourFin = $token;
$token = strtok(":");
$minFin = $token;

//Procesamiento de la cadena de dias de atención

$len = strlen($row2['day']);

$L = 0;
$M = 0;
$R = 0;
$J = 0;
$V = 0;
$S = 0;
$D = 0;

for ($i = 0; $i < $len; $i++) {
    if ($row2['day'][$i] == 'L') {
        $L = 1;
    }
    if ($row2['day'][$i] == 'M') {
        $M = 1;
    }
    if ($row2['day'][$i] == 'R') {
        $R = 1;
    }
    if ($row2['day'][$i] == 'J') {
        $J = 1;
    }
    if ($row2['day'][$i] == 'V') {
        $V = 1;
    }
    if ($row2['day'][$i] == 'S') {
        $S = 1;
    }
    if ($row2['day'][$i] == 'D') {
        $D = 1;
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $type = 2;
    $username = $row['username'];
    $password = mysqli_real_escape_string($db, $_POST['password']);
    $confirm = mysqli_real_escape_string($db, $_POST['password2']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $name = mysqli_real_escape_string($db, $_POST['name']);
    $state = mysqli_real_escape_string($db, $_POST['state']);
    $address = mysqli_real_escape_string($db, $_POST['address']);
    $phone = mysqli_real_escape_string($db, $_POST['phone']);
    $timeStart = mysqli_real_escape_string($db, $_POST['horaIni'])
        .':'.mysqli_real_escape_string($db, $_POST['minIni']).':00';
    $timeEnd = mysqli_real_escape_string($db, $_POST['horaFin'])
        .':'.mysqli_real_escape_string($db, $_POST['minFin']).':00';
    $day = '';
    foreach($_POST['day'] as $check) {

        $day .= $check;
    }


    $query = "UPDATE User SET username = '$username', password = '$password',  email = '$email' 
    WHERE iduser = $id";
    if (!mysqli_query($db, $query)) {
        echo $query.'<br/>';
    }

    if ($type == 1) {
        $query = "UPDATE Pharmacy SET name = '$name', state = '$state', address = '$address', 
            phone = $phone, timeStart = '$timeStart', timeEnd = '$timeEnd', day = '$day'
            WHERE User_idUser = $id";
        if (!mysqli_query($db, $query)) {
            echo $query.'<br/>';
        }
        header("location: homePharmacy.php");
    }
    if ($type == 2) {
        $query = "UPDATE Laboratory SET name = '$name', state = '$state', address = '$address', 
            phone = $phone, timeStart = '$timeStart', timeEnd = '$timeEnd', day = '$day'
            WHERE User_idUser = $id";
        if (!mysqli_query($db, $query)) {
            echo $query.'<br/>';
        }
        header("location: homeLaboratory.php");

    }


}

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

    <title>Modificar Datos | Laboratorio | FarmaPro</title>
    <!--Personalizado css-->
    <link type="text/css" rel="stylesheet" href="css/updateInfo.css" />

</head>

<body>
    <!--jquery-2.1.1.min.js y materialize.js-->
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script type="text/javascript" src="js/materialize.min.js"></script>


    <!--Toda la sección del registro-->
    <nav class="navbar-material teal lighten-2">
        <div class="nav-wrapper">
            <a href="homeLaboratory.php" class="brand-logo">
                <img src="image/logo2.png" height="50" width="50" class="responsive-img"></a>
            <a href="homeLaboratory.php" class="brand-logo">
                <div id="logo">FarmaPro</div>
            </a>
            <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
            <ul id="cuenta" class="dropdown-content">
                <li>
                    <a href="updateInfo.php">
                        <i class="material-icons left">settings</i> Modificar mis datos</a>
                </li>
                <li class="divider"></li>
                <li>
                    <a href="logout.php">
                        <i class="material-icons left">power_settings_new</i> Cerrar sesión</a>
                </li>
            </ul>
            <ul class="right hide-on-med-and-down">
                <li><a href="medicineRegister.php">Registro de Medicamentos</a></li>
                <li><a href="myMedicines.php">Mis medicamentos</a></li>
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
                    <a href="modificarDatos.php">
                        <i class="material-icons left">settings</i> Modificar mis datos</a>
                </li>
                <li class="divider"></li>
                <li>
                    <a href="logout.php">
                        <i class="material-icons left">power_settings_new</i> Cerrar sesión</a>
                </li>
            </ul>
            <ul class="side-nav" id="mobile-demo">
                <li><a href="medicineRegister.php">Registro de Medicamentos</a></li>
                <li><a href="myMedicines.php">Mis medicamentos</a></li>
                <li>
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

    <!--Inicia el formulario-->
    <div class="row" id="cart">

        <script>
            $(document).ready(function() {
                $('select').material_select();
            });
        </script>
        <!--Sección del panel de registro-->
        <div class="col s12 z-depth-6 card-panel hoverable">

            <h5 class="center">Modificar datos</h5>
            <!-- Forma de registro -->
            <div class="row">
                <form class="login-form" method="post">
                    <div class="row">

                        <div class="input-field col s12">
                            <i class="mdi-social-person-outline prefix"></i>
                            <input value="<?php echo(isset($row['username'])) ? $row['username'] : ''; ?>" id="username" type="text" name="username" disabled>
                            <label for="username" class="center-align">
                                Nombre de Usuario
                            </label>
                        </div>
                        <div class="input-field col s6">
                            <i class="mdi-action-lock-outline prefix"></i>
                            <input id="password" type="password" name="password">
                            <label for="password">
                                Contraseña
                            </label>
                        </div>
                        <div class="input-field col s6">
                            <i class="mdi-action-lock-outline prefix"></i>
                            <input id="password2" type="password" name="password2">
                            <label for="password2">Confirma contraseña</label>
                        </div>
                        <div class="input-field col s12">
                            <input value="<?php echo(isset($row['email'])) ? $row['email'] : ''; ?>" id="email" type="email" class="validate" name="email">
                            <label for="email">Correo electrónico de contacto</label>
                        </div>
                        <div class="input-field col s12">
                            <input value="<?php echo(isset($row2['name'])) ? $row2['name'] : ''; ?>" id="name" type="text" name="name">
                            <label for="name">
                                Nombre de tú empresa
                            </label>
                        </div>
                        <div class="input-field col s12">
                            <select id="state" name="state">
                                <option <?php echo($row2['state'] == "Aguascalientes") ? 'selected="selected" ' : ''; ?> value="Aguascalientes">Aguascalientes</option>
                                <option <?php echo($row2['state'] == "Baja California") ? 'selected="selected" ' : ''; ?>value="Baja California">Baja California</option>
                                <option <?php echo($row2['state'] == "Baja California Sur") ? 'selected="selected"' : ''; ?>value="Baja California Sur">Baja California Sur</option>
                                <option <?php echo($row2['state'] == "Campeche") ? 'selected="selected" ' : ''; ?> value="Campeche">Campeche</option>
                                <option <?php echo($row2['state'] == "Chiapas") ? 'selected="selected" ' : ''; ?> value="Chiapas">Chiapas</option>
                                <option <?php echo($row2['state'] == "Chihuahua") ? 'selected="selected" ' : ''; ?> value="Chihuahua">Chihuahua</option>
                                <option <?php echo($row2['state'] == "Coahuila") ? 'selected="selected" ' : ''; ?> value="Coahuila">Coahuila</option>
                                <option <?php echo($row2['state'] == "Colima") ? 'selected="selected" ' : ''; ?> value="Colima">Colima</option>
                                <option <?php echo($row2['state'] == "Distrito Federal") ? 'selected="selected" ' : ''; ?>value="Distrito Federal">Distrito Federal</option>
                                <option <?php echo($row2['state'] == "Durango") ? 'selected="selected"' : ''; ?> value="Durango">Durango</option>
                                <option <?php echo($row2['state'] == "Estado de México") ? 'selected="selected"' : ''; ?>value="Estado de México">Estado de México</option>
                                <option <?php echo($row2['state'] == "Guanajuato") ? 'selected="selected"' : ''; ?> value="Guanajuato">Guanajuato</option>
                                <option <?php echo($row2['state'] == "Guerrero") ? 'selected="selected"' : ''; ?> value="Guerrero">Guerrero</option>
                                <option <?php echo($row2['state'] == "Hidalgo") ? 'selected="selected"' : ''; ?> value="Hidalgo">Hidalgo</option>
                                <option <?php echo($row2['state'] == "Jalisco") ? 'selected="selected"' : ''; ?> value="Jalisco">Jalisco</option>
                                <option <?php echo($row2['state'] == "Michoacán") ? 'selected="selected"' : ''; ?> value="Michoacán">Michoacán</option>
                                <option <?php echo($row2['state'] == "Morelos") ? 'selected="selected"' : ''; ?> value="Morelos">Morelos</option>
                                <option <?php echo($row2['state'] == "Nayarit") ? 'selected="selected"' : ''; ?> value="Nayarit">Nayarit</option>
                                <option <?php echo($row2['state'] == "Nuevo León") ? 'selected="selected"' : ''; ?> value="Nuevo León">Nuevo León</option>
                                <option <?php echo($row2['state'] == "Oaxaca") ? 'selected="selected"' : ''; ?> value="Oaxaca">Oaxaca</option>
                                <option <?php echo($row2['state'] == "Puebla") ? 'selected="selected"' : ''; ?> value="Puebla">Puebla</option>
                                <option <?php echo($row2['state'] == "Querétaro") ? 'selected="selected"' : ''; ?> value="Querétaro">Querétaro</option>
                                <option <?php echo($row2['state'] == "Quintana Roo") ? 'selected="selected"' : ''; ?> value="Quintana Roo">Quintana Roo</option>
                                <option <?php echo($row2['state'] == "San Luis Potosí") ? 'selected="selected"' : ''; ?>value="San Luis Potosí">San Luis Potosí</option>
                                <option <?php echo($row2['state'] == "Sinaloa") ? 'selected="selected"' : ''; ?> value="Sinaloa">Sinaloa</option>
                                <option <?php echo($row2['state'] == "Sonora") ? 'selected="selected"' : ''; ?> value="Sonora">Sonora</option>
                                <option <?php echo($row2['state'] == "Tabasco") ? 'selected="selected"' : ''; ?> value="Tabasco">Tabasco</option>
                                <option <?php echo($row2['state'] == "Tamaulipas") ? 'selected="selected"' : ''; ?> value="Tamaulipas">Tamaulipas</option>
                                <option <?php echo($row2['state'] == "Tlaxcala") ? 'selected="selected"' : ''; ?> value="Tlaxcala">Tlaxcala</option>
                                <option <?php echo($row2['state'] == "Veracruz") ? 'selected="selected"' : ''; ?> value="Veracruz">Veracruz</option>
                                <option <?php echo($row2['state'] == "Yucatán") ? 'selected="selected"' : ''; ?> value="Yucatán">Yucatán</option>
                                <option <?php echo($row2['state'] == "Zacatecas") ? 'selected="selected"' : ''; ?> value="Zacatecas">Zacatecas</option>
                            </select>
                            <label for="state">Estado</label>
                        </div>
                        <div class="input-field col s12">
                            <textarea id="address" class="materialize-textarea" type="text" name="address"><?php echo(isset($row2['address'])) ? $row2['address'] : ''; ?></textarea>
                            <label for="address">
                                Dirección
                            </label>
                        </div>
                        <div class="input-field col s12">
                            <input value="<?php echo(isset($row2['phone'])) ? $row2['phone'] : ''; ?>" id="phone" type="tel" class="validate" name="phone">
                            <label data-error="Debe ser un teléfono valido" for="phone">
                                Teléfono principal de contacto
                            </label>
                        </div>
                        <div class="col s12">
                            <span class="grey-text">Horario de atención</span>
                        </div>
                        <div class="input-field col s2">
                            <select name="horaIni">
                                <option <?php echo($hourIni == "00") ? 'selected="selected"' : ''; ?> value="00">00</option>
                                <option <?php echo($hourIni == "01") ? 'selected="selected"' : ''; ?> value="01">01</option>
                                <option <?php echo($hourIni == "02") ? 'selected="selected"' : ''; ?> value="02">02</option>
                                <option <?php echo($hourIni == "03") ? 'selected="selected"' : ''; ?> value="03">03</option>
                                <option <?php echo($hourIni == "04") ? 'selected="selected"' : ''; ?> value="04">04</option>
                                <option <?php echo($hourIni == "05") ? 'selected="selected"' : ''; ?> value="05">05</option>
                                <option <?php echo($hourIni == "06") ? 'selected="selected"' : ''; ?> value="06">06</option>
                                <option <?php echo($hourIni == "07") ? 'selected="selected"' : ''; ?> value="07">07</option>
                                <option <?php echo($hourIni == "08") ? 'selected="selected"' : ''; ?> value="08">08</option>
                                <option <?php echo($hourIni == "09") ? 'selected="selected"' : ''; ?> value="09">09</option>
                                <option <?php echo($hourIni == "10") ? 'selected="selected"' : ''; ?> value="10">10</option>
                                <option <?php echo($hourIni == "11") ? 'selected="selected"' : ''; ?> value="11">11</option>
                                <option <?php echo($hourIni == "12") ? 'selected="selected"' : ''; ?> value="12">12</option>
                                <option <?php echo($hourIni == "13") ? 'selected="selected"' : ''; ?> value="13">13</option>
                                <option <?php echo($hourIni == "14") ? 'selected="selected"' : ''; ?> value="14">14</option>
                                <option <?php echo($hourIni == "15") ? 'selected="selected"' : ''; ?> value="15">15</option>
                                <option <?php echo($hourIni == "16") ? 'selected="selected"' : ''; ?> value="16">16</option>
                                <option <?php echo($hourIni == "17") ? 'selected="selected"' : ''; ?> value="17">17</option>
                                <option <?php echo($hourIni == "18") ? 'selected="selected"' : ''; ?> value="18">18</option>
                                <option <?php echo($hourIni == "19") ? 'selected="selected"' : ''; ?> value="19">19</option>
                                <option <?php echo($hourIni == "20") ? 'selected="selected"' : ''; ?> value="20">20</option>
                                <option <?php echo($hourIni == "21") ? 'selected="selected"' : ''; ?> value="21">21</option>
                                <option <?php echo($hourIni == "22") ? 'selected="selected"' : ''; ?> value="22">22</option>
                                <option <?php echo($hourIni == "23") ? 'selected="selected"' : ''; ?> value="23">23</option>
                                <option <?php echo($hourIni == "24") ? 'selected="selected"' : ''; ?> value="24">24</option>
                            </select>
                            <label>Desde</label>
                        </div>
                        <div class="input-field col s2">
                            <select name="minIni">
                                <option <?php echo($minIni == "00") ? 'selected="selected"' : ''; ?> value="00">00</option>
                                <option <?php echo($minIni == "01") ? 'selected="selected"' : ''; ?> value="01">01</option>
                                <option <?php echo($minIni == "02") ? 'selected="selected"' : ''; ?> value="02">02</option>
                                <option <?php echo($minIni == "03") ? 'selected="selected"' : ''; ?> value="03">03</option>
                                <option <?php echo($minIni == "04") ? 'selected="selected"' : ''; ?> value="04">04</option>
                                <option <?php echo($minIni == "05") ? 'selected="selected"' : ''; ?> value="05">05</option>
                                <option <?php echo($minIni == "06") ? 'selected="selected"' : ''; ?> value="06">06</option>
                                <option <?php echo($minIni == "07") ? 'selected="selected"' : ''; ?> value="07">07</option>
                                <option <?php echo($minIni == "08") ? 'selected="selected"' : ''; ?> value="08">08</option>
                                <option <?php echo($minIni == "09") ? 'selected="selected"' : ''; ?> value="09">09</option>
                                <option <?php echo($minIni == "10") ? 'selected="selected"' : ''; ?> value="10">10</option>
                                <option <?php echo($minIni == "11") ? 'selected="selected"' : ''; ?> value="11">11</option>
                                <option <?php echo($minIni == "12") ? 'selected="selected"' : ''; ?> value="12">12</option>
                                <option <?php echo($minIni == "13") ? 'selected="selected"' : ''; ?> value="13">13</option>
                                <option <?php echo($minIni == "14") ? 'selected="selected"' : ''; ?> value="14">14</option>
                                <option <?php echo($minIni == "15") ? 'selected="selected"' : ''; ?> value="15">15</option>
                                <option <?php echo($minIni == "16") ? 'selected="selected"' : ''; ?> value="16">16</option>
                                <option <?php echo($minIni == "17") ? 'selected="selected"' : ''; ?> value="17">17</option>
                                <option <?php echo($minIni == "18") ? 'selected="selected"' : ''; ?> value="18">18</option>
                                <option <?php echo($minIni == "19") ? 'selected="selected"' : ''; ?> value="19">19</option>
                                <option <?php echo($minIni == "20") ? 'selected="selected"' : ''; ?> value="20">20</option>
                                <option <?php echo($minIni == "21") ? 'selected="selected"' : ''; ?> value="21">21</option>
                                <option <?php echo($minIni == "22") ? 'selected="selected"' : ''; ?> value="22">22</option>
                                <option <?php echo($minIni == "23") ? 'selected="selected"' : ''; ?> value="23">23</option>
                                <option <?php echo($minIni == "24") ? 'selected="selected"' : ''; ?> value="24">24</option>
                                <option <?php echo($minIni == "25") ? 'selected="selected"' : ''; ?> value="25">25</option>
                                <option <?php echo($minIni == "26") ? 'selected="selected"' : ''; ?> value="26">26</option>
                                <option <?php echo($minIni == "27") ? 'selected="selected"' : ''; ?> value="27">27</option>
                                <option <?php echo($minIni == "28") ? 'selected="selected"' : ''; ?> value="28">28</option>
                                <option <?php echo($minIni == "29") ? 'selected="selected"' : ''; ?> value="29">29</option>
                                <option <?php echo($minIni == "30") ? 'selected="selected"' : ''; ?> value="30">30</option>
                                <option <?php echo($minIni == "31") ? 'selected="selected"' : ''; ?> value="31">31</option>
                                <option <?php echo($minIni == "32") ? 'selected="selected"' : ''; ?> value="32">32</option>
                                <option <?php echo($minIni == "33") ? 'selected="selected"' : ''; ?> value="33">33</option>
                                <option <?php echo($minIni == "34") ? 'selected="selected"' : ''; ?> value="34">34</option>
                                <option <?php echo($minIni == "35") ? 'selected="selected"' : ''; ?> value="35">35</option>
                                <option <?php echo($minIni == "36") ? 'selected="selected"' : ''; ?> value="36">36</option>
                                <option <?php echo($minIni == "37") ? 'selected="selected"' : ''; ?> value="37">37</option>
                                <option <?php echo($minIni == "38") ? 'selected="selected"' : ''; ?> value="38">38</option>
                                <option <?php echo($minIni == "39") ? 'selected="selected"' : ''; ?> value="39">39</option>
                                <option <?php echo($minIni == "40") ? 'selected="selected"' : ''; ?> value="40">40</option>
                                <option <?php echo($minIni == "41") ? 'selected="selected"' : ''; ?> value="41">41</option>
                                <option <?php echo($minIni == "42") ? 'selected="selected"' : ''; ?> value="42">42</option>
                                <option <?php echo($minIni == "43") ? 'selected="selected"' : ''; ?> value="43">43</option>
                                <option <?php echo($minIni == "44") ? 'selected="selected"' : ''; ?> value="44">44</option>
                                <option <?php echo($minIni == "45") ? 'selected="selected"' : ''; ?> value="45">45</option>
                                <option <?php echo($minIni == "46") ? 'selected="selected"' : ''; ?> value="46">46</option>
                                <option <?php echo($minIni == "47") ? 'selected="selected"' : ''; ?> value="47">47</option>
                                <option <?php echo($minIni == "48") ? 'selected="selected"' : ''; ?> value="48">48</option>
                                <option <?php echo($minIni == "49") ? 'selected="selected"' : ''; ?> value="49">49</option>
                                <option <?php echo($minIni == "50") ? 'selected="selected"' : ''; ?> value="50">50</option>
                                <option <?php echo($minIni == "51") ? 'selected="selected"' : ''; ?> value="51">51</option>
                                <option <?php echo($minIni == "52") ? 'selected="selected"' : ''; ?> value="52">52</option>
                                <option <?php echo($minIni == "53") ? 'selected="selected"' : ''; ?> value="53">53</option>
                                <option <?php echo($minIni == "54") ? 'selected="selected"' : ''; ?> value="54">54</option>
                                <option <?php echo($minIni == "55") ? 'selected="selected"' : ''; ?> value="55">55</option>
                                <option <?php echo($minIni == "56") ? 'selected="selected"' : ''; ?> value="56">56</option>
                                <option <?php echo($minIni == "57") ? 'selected="selected"' : ''; ?> value="57">57</option>
                                <option <?php echo($minIni == "58") ? 'selected="selected"' : ''; ?> value="58">58</option>
                                <option <?php echo($minIni == "59") ? 'selected="selected"' : ''; ?> value="59">59</option>
                            </select>
                        </div>
                        <div class="input-field col s2"> </div>
                        <!-- Hora final -->
                        <div class="input-field col s2">
                            <select name="horaFin">
                                <option <?php echo($hourFin == "00") ? 'selected="selected"' : ''; ?> value="00">00</option>
                                <option <?php echo($hourFin == "01") ? 'selected="selected"' : ''; ?> value="01">01</option>
                                <option <?php echo($hourFin == "02") ? 'selected="selected"' : ''; ?> value="02">02</option>
                                <option <?php echo($hourFin == "03") ? 'selected="selected"' : ''; ?> value="03">03</option>
                                <option <?php echo($hourFin == "04") ? 'selected="selected"' : ''; ?> value="04">04</option>
                                <option <?php echo($hourFin == "05") ? 'selected="selected"' : ''; ?> value="05">05</option>
                                <option <?php echo($hourFin == "06") ? 'selected="selected"' : ''; ?> value="06">06</option>
                                <option <?php echo($hourFin == "07") ? 'selected="selected"' : ''; ?> value="07">07</option>
                                <option <?php echo($hourFin == "08") ? 'selected="selected"' : ''; ?> value="08">08</option>
                                <option <?php echo($hourFin == "09") ? 'selected="selected"' : ''; ?> value="09">09</option>
                                <option <?php echo($hourFin == "10") ? 'selected="selected"' : ''; ?> value="10">10</option>
                                <option <?php echo($hourFin == "11") ? 'selected="selected"' : ''; ?> value="11">11</option>
                                <option <?php echo($hourFin == "12") ? 'selected="selected"' : ''; ?> value="12">12</option>
                                <option <?php echo($hourFin == "13") ? 'selected="selected"' : ''; ?> value="13">13</option>
                                <option <?php echo($hourFin == "14") ? 'selected="selected"' : ''; ?> value="14">14</option>
                                <option <?php echo($hourFin == "15") ? 'selected="selected"' : ''; ?> value="15">15</option>
                                <option <?php echo($hourFin == "16") ? 'selected="selected"' : ''; ?> value="16">16</option>
                                <option <?php echo($hourFin == "17") ? 'selected="selected"' : ''; ?> value="17">17</option>
                                <option <?php echo($hourFin == "18") ? 'selected="selected"' : ''; ?> value="18">18</option>
                                <option <?php echo($hourFin == "19") ? 'selected="selected"' : ''; ?> value="19">19</option>
                                <option <?php echo($hourFin == "20") ? 'selected="selected"' : ''; ?> value="20">20</option>
                                <option <?php echo($hourFin == "21") ? 'selected="selected"' : ''; ?> value="21">21</option>
                                <option <?php echo($hourFin == "22") ? 'selected="selected"' : ''; ?> value="22">22</option>
                                <option <?php echo($hourFin == "23") ? 'selected="selected"' : ''; ?> value="23">23</option>
                                <option <?php echo($hourFin == "24") ? 'selected="selected"' : ''; ?> value="24">24</option>
                            </select>
                            <label>Hasta</label>
                        </div>
                        <div class="input-field col s2">
                            <select name="minFin">
                                <option <?php echo($minFin == "00") ? 'selected="selected"' : ''; ?> value="00">00</option>
                                <option <?php echo($minFin == "01") ? 'selected="selected"' : ''; ?> value="01">01</option>
                                <option <?php echo($minFin == "02") ? 'selected="selected"' : ''; ?> value="02">02</option>
                                <option <?php echo($minFin == "03") ? 'selected="selected"' : ''; ?> value="03">03</option>
                                <option <?php echo($minFin == "04") ? 'selected="selected"' : ''; ?> value="04">04</option>
                                <option <?php echo($minFin == "05") ? 'selected="selected"' : ''; ?> value="05">05</option>
                                <option <?php echo($minFin == "06") ? 'selected="selected"' : ''; ?> value="06">06</option>
                                <option <?php echo($minFin == "07") ? 'selected="selected"' : ''; ?> value="07">07</option>
                                <option <?php echo($minFin == "08") ? 'selected="selected"' : ''; ?> value="08">08</option>
                                <option <?php echo($minFin == "09") ? 'selected="selected"' : ''; ?> value="09">09</option>
                                <option <?php echo($minFin == "10") ? 'selected="selected"' : ''; ?> value="10">10</option>
                                <option <?php echo($minFin == "11") ? 'selected="selected"' : ''; ?> value="11">11</option>
                                <option <?php echo($minFin == "12") ? 'selected="selected"' : ''; ?> value="12">12</option>
                                <option <?php echo($minFin == "13") ? 'selected="selected"' : ''; ?> value="13">13</option>
                                <option <?php echo($minFin == "14") ? 'selected="selected"' : ''; ?> value="14">14</option>
                                <option <?php echo($minFin == "15") ? 'selected="selected"' : ''; ?> value="15">15</option>
                                <option <?php echo($minFin == "16") ? 'selected="selected"' : ''; ?> value="16">16</option>
                                <option <?php echo($minFin == "17") ? 'selected="selected"' : ''; ?> value="17">17</option>
                                <option <?php echo($minFin == "18") ? 'selected="selected"' : ''; ?> value="18">18</option>
                                <option <?php echo($minFin == "19") ? 'selected="selected"' : ''; ?> value="19">19</option>
                                <option <?php echo($minFin == "20") ? 'selected="selected"' : ''; ?> value="20">20</option>
                                <option <?php echo($minFin == "21") ? 'selected="selected"' : ''; ?> value="21">21</option>
                                <option <?php echo($minFin == "22") ? 'selected="selected"' : ''; ?> value="22">22</option>
                                <option <?php echo($minFin == "23") ? 'selected="selected"' : ''; ?> value="23">23</option>
                                <option <?php echo($minFin == "24") ? 'selected="selected"' : ''; ?> value="24">24</option>
                                <option <?php echo($minFin == "25") ? 'selected="selected"' : ''; ?> value="25">25</option>
                                <option <?php echo($minFin == "26") ? 'selected="selected"' : ''; ?> value="26">26</option>
                                <option <?php echo($minFin == "27") ? 'selected="selected"' : ''; ?> value="27">27</option>
                                <option <?php echo($minFin == "28") ? 'selected="selected"' : ''; ?> value="28">28</option>
                                <option <?php echo($minFin == "29") ? 'selected="selected"' : ''; ?> value="29">29</option>
                                <option <?php echo($minFin == "30") ? 'selected="selected"' : ''; ?> value="30">30</option>
                                <option <?php echo($minFin == "31") ? 'selected="selected"' : ''; ?> value="31">31</option>
                                <option <?php echo($minFin == "32") ? 'selected="selected"' : ''; ?> value="32">32</option>
                                <option <?php echo($minFin == "33") ? 'selected="selected"' : ''; ?> value="33">33</option>
                                <option <?php echo($minFin == "34") ? 'selected="selected"' : ''; ?> value="34">34</option>
                                <option <?php echo($minFin == "35") ? 'selected="selected"' : ''; ?> value="35">35</option>
                                <option <?php echo($minFin == "36") ? 'selected="selected"' : ''; ?> value="36">36</option>
                                <option <?php echo($minFin == "37") ? 'selected="selected"' : ''; ?> value="37">37</option>
                                <option <?php echo($minFin == "38") ? 'selected="selected"' : ''; ?> value="38">38</option>
                                <option <?php echo($minFin == "39") ? 'selected="selected"' : ''; ?> value="39">39</option>
                                <option <?php echo($minFin == "40") ? 'selected="selected"' : ''; ?> value="40">40</option>
                                <option <?php echo($minFin == "41") ? 'selected="selected"' : ''; ?> value="41">41</option>
                                <option <?php echo($minFin == "42") ? 'selected="selected"' : ''; ?> value="42">42</option>
                                <option <?php echo($minFin == "43") ? 'selected="selected"' : ''; ?> value="43">43</option>
                                <option <?php echo($minFin == "44") ? 'selected="selected"' : ''; ?> value="44">44</option>
                                <option <?php echo($minFin == "45") ? 'selected="selected"' : ''; ?> value="45">45</option>
                                <option <?php echo($minFin == "46") ? 'selected="selected"' : ''; ?> value="46">46</option>
                                <option <?php echo($minFin == "47") ? 'selected="selected"' : ''; ?> value="47">47</option>
                                <option <?php echo($minFin == "48") ? 'selected="selected"' : ''; ?> value="48">48</option>
                                <option <?php echo($minFin == "49") ? 'selected="selected"' : ''; ?> value="49">49</option>
                                <option <?php echo($minFin == "50") ? 'selected="selected"' : ''; ?> value="50">50</option>
                                <option <?php echo($minFin == "51") ? 'selected="selected"' : ''; ?> value="51">51</option>
                                <option <?php echo($minFin == "52") ? 'selected="selected"' : ''; ?> value="52">52</option>
                                <option <?php echo($minFin == "53") ? 'selected="selected"' : ''; ?> value="53">53</option>
                                <option <?php echo($minFin == "54") ? 'selected="selected"' : ''; ?> value="54">54</option>
                                <option <?php echo($minFin == "55") ? 'selected="selected"' : ''; ?> value="55">55</option>
                                <option <?php echo($minFin == "56") ? 'selected="selected"' : ''; ?> value="56">56</option>
                                <option <?php echo($minFin == "57") ? 'selected="selected"' : ''; ?> value="57">57</option>
                                <option <?php echo($minFin == "58") ? 'selected="selected"' : ''; ?> value="58">58</option>
                                <option <?php echo($minFin == "59") ? 'selected="selected"' : ''; ?> value="59">59</option>
                            </select>
                        </div>
                        <!--Dias de atención-->
                        <div class="col s12">
                            <span class="grey-text">Dias de atención</span>
                        </div>
                        <div class="input-field col s3">
                            <input type="checkbox" id="lunes" name="day[]" value="L" <?php echo($L == 1) ? 'checked' : ''; ?>/>
                            <label for="lunes">Lunes</label>
                        </div>
                        <div class="input-field col s3">
                            <input type="checkbox" id="martes" name="day[]" value="M" <?php echo($M == 1) ? 'checked' : ''; ?>/>
                            <label for="martes">Martes</label>
                        </div>
                        <div class="input-field col s3">
                            <input type="checkbox" id="miercoles" name="day[]" value="R" <?php echo($R == 1) ? 'checked' : ''; ?>/>
                            <label for="miercoles">Miércoles</label>
                        </div>
                        <div class="input-field col s3">
                            <input type="checkbox" id="jueves" name="day[]" value="J" <?php echo($J == 1) ? 'checked' : ''; ?>/>
                            <label for="jueves">Jueves</label>
                        </div>
                        <div class="input-field col s3">
                            <input type="checkbox" id="viernes" name="day[]" value="V" <?php echo($V == 1) ? 'checked' : ''; ?>/>
                            <label for="viernes">Viernes</label>
                        </div>
                        <div class="input-field col s3">
                            <input type="checkbox" id="sabado" name="day[]" value="S" <?php echo($S == 1) ? 'checked' : ''; ?>/>
                            <label for="sabado">Sábado</label>
                        </div>
                        <div class="input-field col s3">
                            <input type="checkbox" id="domingo" name="day[]" value="D" <?php echo($D == 1) ? 'checked' : ''; ?>/>
                            <label for="domingo">Domingo</label>
                        </div>
                    </div>
                    <div class="row">
                        <button class="btn waves-effect waves-light col s12" type="submit">
                            Actualizar
                        </button>

                    </div>
                </form>
            </div>
        </div>



    </div>


</body>

</html>