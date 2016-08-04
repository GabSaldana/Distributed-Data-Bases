<?php 
include("config/database.php");//jalamos la conexion
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $type = mysqli_real_escape_string($db, $_POST['tipo']); //1 si es farmacia o 2 si es laboratorio
    $username = mysqli_real_escape_string($db, $_POST['username']);
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

    $query = "INSERT INTO User VALUES (NULL, '$username', '$password', '$email', $type)";
    if (!mysqli_query($db, $query)) {
        echo $query.'<br/>';
    }
    $last_id = mysqli_insert_id($db);

    if ($type == 1) {
        $query = "INSERT INTO Pharmacy VALUES (NULL, '$name', '$state', '$address', 
            $phone, '$timeStart', '$timeEnd', '$day', $last_id)";
        if (!mysqli_query($db, $query)) {
            echo $query.'<br/>';
        }
        header("location: login.php");
    }
    if ($type == 2) {
        $query = "INSERT INTO Laboratory VALUES (NULL, '$name', '$state', '$address', 
            '$phone', '$timeStart', '$timeEnd', '$day', '$last_id')";
        if (!mysqli_query($db, $query)) {
            echo $query.'<br/>';
        }
        header("location: login.php");

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
    <title>Registrarse | FarmaPro</title>
    <!--Personalizado login.css-->
    <link type="text/css" rel="stylesheet" href="css/register.css" />
</head>

<body>
    <!--jquery-2.1.1.min.js y materialize.js-->
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script type="text/javascript" src="js/materialize.min.js"></script>
    <script>
        $(document).ready(function() {
            $('select').material_select();
        });
    </script>
    <!--Sección del panel de registro-->
    <div class="col s12 z-depth-6 card-panel hoverable">
        <div class="row">
            <div class="input-field col s12">
                <p class="margin medium-small">
                    <b>¿Ya tienes cuenta?&nbsp;
                        <a href="login.php">Ingresa aquí</a>
                        </b>
                </p>

            </div>
        </div>
        <h5 class="center">Regístrate</h5>
        <!-- Forma de registro -->
        <div class="row">
            <form class="login-form" method="post" action="register.php">
                <div class="row">
                    <div class="input-field col s12">
                        <select name="tipo">
                            <option value="" disabled selected>Elige una opción</option>
                            <option value="1">Farmacia</option>
                            <option value="2">Laboratorio</option>
                        </select>
                        <label>¿Qué tipo de usuario eres?</label>
                    </div>
                    <div class="input-field col s12">
                        <i class="mdi-social-person-outline prefix"></i>
                        <input id="username" type="text" name="username">
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
                        <input id="email" type="email" class="validate" name="email">
                        <label for="email">Correo electrónico de contacto</label>
                    </div>
                    <div class="input-field col s12">
                        <input id="name" type="text" name="name">
                        <label for="name">
                            Ingresa el nombre de tu empresa
                        </label>
                    </div>
                    <div class="input-field col s12">
                        <select id="state" name="state">
                            <option value="" disabled selected>Elige una opción</option>
                            <option value="Aguascalientes">Aguascalientes</option>
                            <option value="Baja California">Baja California</option>
                            <option value="Baja California Sur">Baja California Sur</option>
                            <option value="Campeche">Campeche</option>
                            <option value="Chiapas">Chiapas</option>
                            <option value="Chihuahua">Chihuahua</option>
                            <option value="Coahuila">Coahuila</option>
                            <option value="Colima">Colima</option>
                            <option value="Distrito Federal">Distrito Federal</option>
                            <option value="Durango">Durango</option>
                            <option value="Estado de México">Estado de México</option>
                            <option value="Guanajuato">Guanajuato</option>
                            <option value="Guerrero">Guerrero</option>
                            <option value="Hidalgo">Hidalgo</option>
                            <option value="Jalisco">Jalisco</option>
                            <option value="Michoacán">Michoacán</option>
                            <option value="Morelos">Morelos</option>
                            <option value="Nayarit">Nayarit</option>
                            <option value="Nuevo León">Nuevo León</option>
                            <option value="Oaxaca">Oaxaca</option>
                            <option value="Puebla">Puebla</option>
                            <option value="Querétaro">Querétaro</option>
                            <option value="Quintana Roo">Quintana Roo</option>
                            <option value="San Luis Potosí">San Luis Potosí</option>
                            <option value="Sinaloa">Sinaloa</option>
                            <option value="Sonora">Sonora</option>
                            <option value="Tabasco">Tabasco</option>
                            <option value="Tamaulipas">Tamaulipas</option>
                            <option value="Tlaxcala">Tlaxcala</option>
                            <option value="Veracruz">Veracruz</option>
                            <option value="Yucatán">Yucatán</option>
                            <option value="Zacatecas">Zacatecas</option>
                        </select>
                        <label for="state">Estado</label>
                    </div>
                    <div class="input-field col s12">
                        <textarea id="address" class="materialize-textarea" type="text" name="address"></textarea>
                        <label for="address">
                            Dirección
                        </label>
                    </div>
                    <div class="input-field col s12">
                        <input id="phone" type="tel" class="validate" name="phone">
                        <label data-error="Debe ser un teléfono valido" for="phone">
                            Teléfono principal de contacto
                        </label>
                    </div>
                    <div class="col s12">
                        <span class="grey-text">Horario de atención</span>
                    </div>
                    <div class="input-field col s2">
                        <select name="horaIni">
                            <option value="00">00</option>
                            <option value="01">01</option>
                            <option value="02">02</option>
                            <option value="03">03</option>
                            <option value="04">04</option>
                            <option value="05">05</option>
                            <option value="06">06</option>
                            <option value="07">07</option>
                            <option value="08">08</option>
                            <option value="09">09</option>
                            <option value="10">10</option>
                            <option value="11">11</option>
                            <option value="12">12</option>
                            <option value="13">13</option>
                            <option value="14">14</option>
                            <option value="15">15</option>
                            <option value="16">16</option>
                            <option value="17">17</option>
                            <option value="18">18</option>
                            <option value="19">19</option>
                            <option value="20">20</option>
                            <option value="21">21</option>
                            <option value="22">22</option>
                            <option value="23">23</option>
                            <option value="24">24</option>
                        </select>
                        <label>Desde</label>
                    </div>
                    <div class="input-field col s2">
                        <select name="minIni">
                            <option value="00">00</option>
                            <option value="01">01</option>
                            <option value="02">02</option>
                            <option value="03">03</option>
                            <option value="04">04</option>
                            <option value="05">05</option>
                            <option value="06">06</option>
                            <option value="07">07</option>
                            <option value="08">08</option>
                            <option value="09">09</option>
                            <option value="10">10</option>
                            <option value="11">11</option>
                            <option value="12">12</option>
                            <option value="13">13</option>
                            <option value="14">14</option>
                            <option value="15">15</option>
                            <option value="16">16</option>
                            <option value="17">17</option>
                            <option value="18">18</option>
                            <option value="19">19</option>
                            <option value="20">20</option>
                            <option value="21">21</option>
                            <option value="22">22</option>
                            <option value="23">23</option>
                            <option value="24">24</option>
                            <option value="25">25</option>
                            <option value="26">26</option>
                            <option value="27">27</option>
                            <option value="28">28</option>
                            <option value="29">29</option>
                            <option value="30">30</option>
                            <option value="31">31</option>
                            <option value="32">32</option>
                            <option value="33">33</option>
                            <option value="34">34</option>
                            <option value="35">35</option>
                            <option value="36">36</option>
                            <option value="37">37</option>
                            <option value="38">38</option>
                            <option value="39">39</option>
                            <option value="40">40</option>
                            <option value="41">41</option>
                            <option value="42">42</option>
                            <option value="43">43</option>
                            <option value="44">44</option>
                            <option value="45">45</option>
                            <option value="46">46</option>
                            <option value="47">47</option>
                            <option value="48">48</option>
                            <option value="49">49</option>
                            <option value="50">50</option>
                            <option value="51">51</option>
                            <option value="52">52</option>
                            <option value="53">53</option>
                            <option value="54">54</option>
                            <option value="55">55</option>
                            <option value="56">56</option>
                            <option value="57">57</option>
                            <option value="58">58</option>
                            <option value="59">59</option>
                        </select>
                    </div>
                    <div class="input-field col s2"> </div>
                    <!-- Hora final -->
                    <div class="input-field col s2">
                        <select name="horaFin">
                            <option value="00">00</option>
                            <option value="01">01</option>
                            <option value="02">02</option>
                            <option value="03">03</option>
                            <option value="04">04</option>
                            <option value="05">05</option>
                            <option value="06">06</option>
                            <option value="07">07</option>
                            <option value="08">08</option>
                            <option value="09">09</option>
                            <option value="10">10</option>
                            <option value="11">11</option>
                            <option value="12">12</option>
                            <option value="13">13</option>
                            <option value="14">14</option>
                            <option value="15">15</option>
                            <option value="16">16</option>
                            <option value="17">17</option>
                            <option value="18">18</option>
                            <option value="19">19</option>
                            <option value="20">20</option>
                            <option value="21">21</option>
                            <option value="22">22</option>
                            <option value="23">23</option>
                            <option value="24">24</option>
                        </select>
                        <label>Hasta</label>
                    </div>
                    <div class="input-field col s2">
                        <select name="minFin">
                            <option value="00">00</option>
                            <option value="01">01</option>
                            <option value="02">02</option>
                            <option value="03">03</option>
                            <option value="04">04</option>
                            <option value="05">05</option>
                            <option value="06">06</option>
                            <option value="07">07</option>
                            <option value="08">08</option>
                            <option value="09">09</option>
                            <option value="10">10</option>
                            <option value="11">11</option>
                            <option value="12">12</option>
                            <option value="13">13</option>
                            <option value="14">14</option>
                            <option value="15">15</option>
                            <option value="16">16</option>
                            <option value="17">17</option>
                            <option value="18">18</option>
                            <option value="19">19</option>
                            <option value="20">20</option>
                            <option value="21">21</option>
                            <option value="22">22</option>
                            <option value="23">23</option>
                            <option value="24">24</option>
                            <option value="25">25</option>
                            <option value="26">26</option>
                            <option value="27">27</option>
                            <option value="28">28</option>
                            <option value="29">29</option>
                            <option value="30">30</option>
                            <option value="31">31</option>
                            <option value="32">32</option>
                            <option value="33">33</option>
                            <option value="34">34</option>
                            <option value="35">35</option>
                            <option value="36">36</option>
                            <option value="37">37</option>
                            <option value="38">38</option>
                            <option value="39">39</option>
                            <option value="40">40</option>
                            <option value="41">41</option>
                            <option value="42">42</option>
                            <option value="43">43</option>
                            <option value="44">44</option>
                            <option value="45">45</option>
                            <option value="46">46</option>
                            <option value="47">47</option>
                            <option value="48">48</option>
                            <option value="49">49</option>
                            <option value="50">50</option>
                            <option value="51">51</option>
                            <option value="52">52</option>
                            <option value="53">53</option>
                            <option value="54">54</option>
                            <option value="55">55</option>
                            <option value="56">56</option>
                            <option value="57">57</option>
                            <option value="58">58</option>
                            <option value="59">59</option>
                        </select>
                    </div>
                    <!--Dias de atención-->
                    <div class="col s12">
                        <span class="grey-text">Dias de atención</span>
                    </div>
                    <div class="input-field col s3">
                        <input type="checkbox" id="lunes" name="day[]" value="L" />
                        <label for="lunes">Lunes</label>
                    </div>
                    <div class="input-field col s3">
                        <input type="checkbox" id="martes" name="day[]" value="M" />
                        <label for="martes">Martes</label>
                    </div>
                    <div class="input-field col s3">
                        <input type="checkbox" id="miercoles" name="day[]" value="R" />
                        <label for="miercoles">Miércoles</label>
                    </div>
                    <div class="input-field col s3">
                        <input type="checkbox" id="jueves" name="day[]" value="J" />
                        <label for="jueves">Jueves</label>
                    </div>
                    <div class="input-field col s3">
                        <input type="checkbox" id="viernes" name="day[]" value="V" />
                        <label for="viernes">Viernes</label>
                    </div>
                    <div class="input-field col s3">
                        <input type="checkbox" id="sabado" name="day[]" value="S" />
                        <label for="sabado">Sábado</label>
                    </div>
                    <div class="input-field col s3">
                        <input type="checkbox" id="domingo" name="day[]" value="D" />
                        <label for="domingo">Domingo</label>
                    </div>
                </div>
                <div class="row">
                    <button class="btn waves-effect waves-light col s12" type="submit">
                        ¡Listo!
                    </button>

                </div>
            </form>
        </div>
    </div>
</body>

</html>