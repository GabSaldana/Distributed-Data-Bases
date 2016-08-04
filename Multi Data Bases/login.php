<?php
    session_start();
    include 'querys.php';
    include 'config/databases.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    //LOGIN VARIABLES**********************************
    $number_db= (int)$_POST['DB'];
    $user='usr'.$number_db;
    $idnum='id'.$number_db;
    $usr= $_POST[$user];
    $id= (int)$_POST[$idnum];
    
    $_SESSION['number_db']=$number_db;
    //printf("%d<br/>\n", $number_db);
    //printf("%s<br/>\n", $usr);
    //printf("%d<br/>\n", $id);
    
    if($number_db == 1){
        
        //echo "FP";
        include 'config/conexion_fp.php';
        select_Usr_FP($conn,$id,$usr);
        $_SESSION['login_user']=$usr;
        $_SESSION['login_id']=$id;
    }
    if($number_db == 2){
        
        //echo "OXXO";
        include 'config/conexion_oxxo.php';
        select_Usr_OXXO($conn,$id,$usr);
        $_SESSION['login_user']=$usr;
        $_SESSION['login_id']=$id;
    }
    if($number_db == 3){
        
        //echo "TIENDA";
        include 'config/conexion_tienda.php';
        select_Usr_TIENDA($conn,$id,$usr);
        $_SESSION['login_user']=$usr;
        $_SESSION['login_id']=$id;
    }
    if($number_db == 4){
        
        //echo "OPTICA";
        include 'config/conexion_optica.php';
        select_Usr_OPTICA($conn,$id,$usr);
        $_SESSION['login_user']=$usr;
        $_SESSION['login_id']=$id;
    }
}  
    
?>

<!DOCTYPE html>

<html>
    <head>
        <title> LOG IN</title>
        <meta charset="UTF-8">
        <script src="js/jquery-2.1.4.js" type="text/javascript"></script>
        <script src="js/divs.js" type="text/javascript"></script>
        <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" type="text/css" href="bootstrap/bootstrap-theme.min.css">
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
        <div class="title">
            <h1>LOGIN!</h1>
        </div>
        <div id="login-page"> 
            <h1>Elige donde laboras:</h1>

            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">    
               
                  <select name="DB" id="select1" >
                      <option value="1">FarmaPro</option>
                      <option value="2">Oxxo</option>  
                      <option value="3">Tienda</option>  
                      <option value="4">Optica</option>  
                  </select>

                 <!--LOGIN HIDDEN DIVS-->    
                  <br/><br/>
                
                 <div id="1" hidden>                      
                     <h2>FARMAPRO</h2><br/>
                     ID:
                        <input type="text" name="id1">
                      Nombre de Usuario:
                        <input type="text" name="usr1">
                      <input type="submit"  value="enviar" >
                  </div>
                
                 <div id="2" hidden>                      
                      <h2>OXXO</h2><br/>
                      ID:
                        <input type="text" name="id2">
                      Nombre de Usuario:
                        <input type="text" name="usr2">
                      <input type="submit"  value="enviar" >
                  </div>
                
                <div id="3" hidden>                      
                      <h2>TIENDA</h2><br/>
                      ID:
                        <input type="text" name="id3">
                      Nombre de Usuario:
                        <input type="text" name="usr3">
                      <input type="submit"  value="enviar" >
                  </div>
                
                <div id="4" hidden>                      
                     <h2>OPTICA</h2> <br/>
                      ID:
                        <input type="text" name="id4">
                      Nombre de Usuario:
                        <input type="text" name="usr4">
                      <input type="submit"  value="enviar" >
                  </div>
                
                <a id="register" href="register.php" >Registrate ahora!</a>
            </form>
        </div>
    
    </body>
</html>