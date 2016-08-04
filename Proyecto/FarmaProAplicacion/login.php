<?php 
include("config/database.php");
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $password = mysqli_real_escape_string($db, $_POST['password']);
    $query = "SELECT * FROM User WHERE username = '$username' AND password = '$password' ";
    /*echo "<script>alert('".$query."');</script>";*/

    $result = mysqli_query($db, $query);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

    $type = $row['type'];

    $count = mysqli_num_rows($result);

    if ($count == 1) {
        $_SESSION['login_user'] = $username;

        if ($type == 1) header("location: homePharmacy.php");
        else header("location: homeLaboratory.php");

    } else {
        $error = "Error de autenticación.";
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

    <title>Iniciar Sesión | FarmaPro</title>
    <!--Personalizado login.css-->
    <link type="text/css" rel="stylesheet" href="css/login.css" />

</head>

<body>
    <!--jquery-2.1.1.min.js y materialize.js-->
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script type="text/javascript" src="js/materialize.min.js"></script>

    <!--Comenzamos!!!-->

    <!--Toda la sección del login-->
    <!--Toda la sección del login-->
    <div id="login-page" class="row">
        <div class="col s12 z-depth-6 card-panel hoverable">
            <form class="login-form" method="post">
                <div class="row">
                    <div class="input-field col s12 center">
                        <img src="image/logo.png" height="105" width="105" class="responsive-img valign profile-image-login">
                        <h5 class="center login-form-text grey-text text-darken-3">FarmaPro</h5>
                    </div>
                </div>
                <div class="row margin">
                    <div class="input-field col s12">
                        <i class="mdi-social-person-outline prefix"></i>
                        <input id="user" type="text" name="username">
                        <label for="email" class="center-align">
                            Nombre de Usuario
                        </label>
                    </div>
                </div>
                <div class="row margin">
                    <div class="input-field col s12">
                        <i class="mdi-action-lock-outline prefix"></i>
                        <input id="password" type="password" name="password">
                        <label for="password">Contraseña</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <button class="btn waves-effect waves-light col s12" type="submit">
                            Ingresar
                        </button>
                    </div>
                </div>
                <div class="row">
                    <b>
                            <div class="input-field col s6 m6 l6">
                                <p class="margin medium-small"><a href="register.php">¡Registrarse ahora!</a></p>
                            </div>
                            <div class="input-field col s6 m6 l6">
                                <p class="margin right-align medium-small"><a href="forgot-password.php">¿Olvidaste tu contraseña?</a></p>
                            </div>
                            </b>
                </div>
            </form>
        </div>
    </div>

</body>

</html>