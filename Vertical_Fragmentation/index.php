<?php

    include 'config/databases.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    
    $Relacion= $_POST['relation'];
    $NF= (int)$_POST['number_frag'];
    
    
    $Expresiones=array();
    $Nombres= array();
    
    $Expresiones=$_POST['expresiones'];
    
    $NS= (int)$_POST['number_site'];
    $Nombres=$_POST['nombre_frag'];
    
    /*printf("%d<br/>\n", $NF);
    printf("%d<br/>\n", $NS);
    echo "<ul>"
        
    if (is_array($Nombres) || is_object($Nombres)){
        foreach ($Nombres as $value)
        {
            echo "<li>";
            echo $value; 
            echo "</li>"; 
        }
    }
    echo "</ul>";   
    
    echo "<ul>";
    
    if (is_array($Expresiones) || is_object($Expresiones)){
        
        foreach ($Expresiones as $value)
        {
            echo "<li>";
            echo $value; 
            echo "</li>"; 
        }
    }
    echo "</ul>";   */
    
    if($NS == 1){//SITIO 1
        
        
        for($k=0; $k <$NF; $k++ ){
        
            include 'config/conexion_S1.php';
        
            
            $Atributos = array();
            $str=$Expresiones[$k];
            $str=substr($str,7);
            $Atributos=explode(",",$str);
            //print_r ($Atributos);
            //echo $str ."<br/>";
            
            $Nombre=$Nombres[$k];
            
            //CREAMOS LA SENTENCIA DDL (descripcion) 
            $queryDDL = "";
        
            if($Atributos[0] == "idPharmacy" && $Atributos[1] == "idMedicine"){
            
                $queryDDL = 
                "CREATE TABLE f1" .$Nombre. "(".
                $Atributos[0]. " int not null," .
                $Atributos[1].  " int not null," .   
                "primary key(".$Atributos[0].",".$Atributos[1]."));";    
            }else{
            
                $queryDDL = 
                "CREATE TABLE f1" .$Nombre. "(".
                $Atributos[0]. " int not null primary key," ;
            
                $add= array();        
                for($j=1; $j<count($Atributos) ; $j++){
            
                    $add[$j-1]=$Atributos[$j];
                }
            
                $temp = implode(" varchar(60),", $add);
                $temp = $temp . " varchar(60) );";
        
                $queryDDL = $queryDDL . $temp;
            }
        
            //echo $queryDDL . "<br/>";
        
            //CREAMOS LA SETENCIA DML (manejo)
        
            $queryDML = "INSERT INTO " . DB2 . ".f1".$Nombre." ".
            $Expresiones[$k] ." "."FROM " . DB1.".".$Relacion . ";";
        
            //echo $queryDML . "<br/>";
        
            //EJECUTAMOS
            $result = mysqli_query($conn,$queryDDL) or die('Consulta fallida: ' . mysqli_error($conn));
            if($result ){
                header('index.php');
                echo "EXITO AL CREAR TABLA";
            
            }else{
                header('index.php');
                echo "FALLO AL CREAR TABLA";
            }
        
            $result2 = mysqli_query($conn,$queryDML) or die('Consulta fallida: ' . mysqli_error($conn));
            if($result2 ){
                header('index.php');
                echo "EXITO AL INSERTAR";
            }else {
                header('index.php');
                echo "FALLO AL INSERTAR";
            }
            mysqli_close($conn);    
            
        }
        
    }
    if($NS == 2){//SITIO 2
        
        for($k=0; $k <$NF; $k++ ){
        
            include 'config/conexion_S2.php';
        
            $Atributos = array();
            $str=$Expresiones[$k];
            $str=substr($str,7);
            $Atributos=explode(",",$str);
            //print_r ($Atributos);
            //echo $str ."<br/>";
            
            $Nombre=$Nombres[$k];
            
            //CREAMOS LA SENTENCIA DDL (descripcion) 
            $queryDDL = "";
        
            if($Atributos[0] == "idPharmacy" && $Atributos[1] == "idMedicine"){
            
                $queryDDL = 
                "CREATE TABLE f2" .$Nombre. "(".
                $Atributos[0]. " int not null," .
                $Atributos[1].  " int not null," .   
                "primary key(".$Atributos[0].",".$Atributos[1]."));";    
            }else{
            
                $queryDDL = 
                "CREATE TABLE f2" .$Nombre. "(".
                $Atributos[0]. " int not null primary key," ;
            
                $add= array();        
                for($j=1; $j<count($Atributos) ; $j++){
            
                    $add[$j-1]=$Atributos[$j];
                }
            
                $temp = implode(" varchar(60),", $add);
                $temp = $temp . " varchar(60) );";
        
                $queryDDL = $queryDDL . $temp;
            }
        
            //echo $queryDDL . "<br/>";
        
            //CREAMOS LA SETENCIA DML (manejo)
        
            $queryDML = "INSERT INTO " . DB3 . ".f2".$Nombre." ".
            $Expresiones[$k] ." "."FROM " . DB1.".".$Relacion . ";";
        
            //echo $queryDML . "<br/>";
        
            //EJECUTAMOS
            $result = mysqli_query($conn,$queryDDL) or die('Consulta fallida: ' . mysqli_error($conn));
            if($result ){
                header('index.php');
                echo "EXITO AL CREAR TABLA";
            
            }else{
                header('index.php');
                echo "FALLO AL CREAR TABLA";
            }
        
            $result2 = mysqli_query($conn,$queryDML) or die('Consulta fallida: ' . mysqli_error($conn));
            if($result2 ){
                header('index.php');
                echo "EXITO AL INSERTAR";
            }else {
                header('index.php');
                echo "FALLO AL INSERTAR";
            }
            mysqli_close($conn);    
            
        }
    }
    if($NS == 3){//SITIO 3
        
       for($k=0; $k <$NF; $k++ ){
        
            include 'config/conexion_S3.php';
        
            $Atributos = array();
            $str=$Expresiones[$k];
            $str=substr($str,7);
            $Atributos=explode(",",$str);
            //print_r ($Atributos);
            //echo $str ."<br/>";
            
            $Nombre=$Nombres[$k];
            
            //CREAMOS LA SENTENCIA DDL (descripcion) 
            $queryDDL = "";
        
            if($Atributos[0] == "idPharmacy" && $Atributos[1] == "idMedicine"){
            
                $queryDDL = 
                "CREATE TABLE f3" .$Nombre. "(".
                $Atributos[0]. " int not null," .
                $Atributos[1].  " int not null," .   
                "primary key(".$Atributos[0].",".$Atributos[1]."));";    
            }else{
            
                $queryDDL = 
                "CREATE TABLE f3" .$Nombre. "(".
                $Atributos[0]. " int not null primary key," ;
            
                $add= array();        
                for($j=1; $j<count($Atributos) ; $j++){
            
                    $add[$j-1]=$Atributos[$j];
                }
            
                $temp = implode(" varchar(60),", $add);
                $temp = $temp . " varchar(60) );";
        
                $queryDDL = $queryDDL . $temp;
            }
        
            //echo $queryDDL . "<br/>";
        
            //CREAMOS LA SETENCIA DML (manejo)
        
            $queryDML = "INSERT INTO " . DB4 . ".f3".$Nombre." ".
            $Expresiones[$k] ." "."FROM " . DB1.".".$Relacion . ";";
        
            //echo $queryDML . "<br/>";
        
            //EJECUTAMOS
            $result = mysqli_query($conn,$queryDDL) or die('Consulta fallida: ' . mysqli_error($conn));
            if($result ){
                header('index.php');
                echo "EXITO AL CREAR TABLA";
            
            }else{
                header('index.php');
                echo "FALLO AL CREAR TABLA";
            }
        
            $result2 = mysqli_query($conn,$queryDML) or die('Consulta fallida: ' . mysqli_error($conn));
            if($result2 ){
                header('index.php');
                echo "EXITO AL INSERTAR";
            }else {
                header('index.php');
                echo "FALLO AL INSERTAR";
            }
            mysqli_close($conn);    
            
        }
    }
    
}

?>


<html>

    <head>
        <title>Vertical Fragmentation</title>
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        
        <!--JS-->
        <script src="js/jquery-2.1.4.js" type="text/javascript"></script>
        <script src="js/bootstrap/bootstrap.min.js"></script>
        <script  src="js/table.js" type="text/javascript"></script>
        <!--CSS-->
        <link href="css/bootstrap/bootstrap.min.css" rel="stylesheet">
        <link href="css/principal.css" rel="stylesheet"/>
        <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        
    </head>
    <body>
        
        <div class="fluid">
            
            <div class="row">
                <div> 
                    <h1></h1>
                </div>
            </div><!--EMPTY ROW-->
            
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">   
            <!--<form action="" method="post">   -->
                
                <div class="row">
                    
                    <div class="Dom"> 
                            <div class="form-group">
                                <div class="trans"> <h1>ELECCI&Oacute;N DEL DOMINIO</h1></div> 
                                <br/><br/>
                                <label class="col-md-2 control-label"><h3>Relaci&oacute;n</h3></label>
                                <div class="col-md-8 selectContainer">
                                    <!--SELECT PARA SACAR LAS SUCURSALES EXISTENTES-->
                                    <?php
                                        include 'config/conexion_fp.php';
                                        $result = mysqli_query($conn, "SHOW TABLES FROM farmapro_db;");
                                        echo "<select id='relation'  class='form-control' name='relation' style='color:black;'>";
                                        while ($row = mysqli_fetch_array($result)){
                                            echo "<option value=".$row[0].">" . $row[0] . "</option>";
                                        }
                                        mysqli_close($conn);
                                        echo "</select>";
                                    ?>
                                </div>
                            </div><br/><br/><br/><br/><br/>
                            <div id="tabla_d" class="table-responsive col-md-6 ">  </div>
                        </div><!--DOMINIO-->
                    
                </div>
                
                <div class="row">
                <div> 
                    <h1></h1>
                </div>
            </div><!--EMPTY ROW-->
            
                <div class="row AttFrag">
                
                    <div class = "col-md-6 ">
                        
                        <div class="row">
                            <div class= "col-md-12 ">
                             
                                <div class="NoFrag"> 
                                    <div class="form-group">
                                
                                        <div class="trans"> <h1>N&Uacute;MERO DE FRAGMENTOS</h1></div> 
                                        <br/><br/>
                                        <label class="col-md-2 control-label"><h3>N&uacute;mero</h3></label>
                                        <div class="col-md-8 selectContainer">
                                            <select class="form-control" name="number_frag" id="number_frag">
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                            </select>
                                        </div>
                                    </div><br/><br/>
                                </div><!--NO FRAGMENTOS-->
                            </div>
                        </div>
                        <br/><br/>
                        <div class="row">
                            <div class= "col-md-12 ">
                        
                                <div class="Exp"> 
                        
                                    <div id="dinamico">
                                        <div class="trans"> <h1>EXPRESI&Oacute;NES</h1></div> 
                                        <br/><br/>
                                        <div id="exp_d"></div>
                                    </div>
                                </div><!--EXPRESIONES-->        
                            </div>
                        </div>
                    
                    </div>
                    <div class= "col-md-6 ">
                        
                        <div class="Att">
                        
                        <div class="trans"> <h1>ATRIBUTOS</h1></div> 
                                <br/><br/>
                        
                        <div id="att_d">
                            
                        </div>
                        
                        <button type="button" class=" btn-circle " id="Generar">
                            <span class="glyphicon glyphicon-refresh"></span>
                        </button>
                        <br/><br/><br/><br/>
                        
                    </div><!--ATRIBUTOS-->   
                    
                    </div>
                
                </div>
                
                <div class="row">
                <div> 
                    <h1></h1>
                </div>
            </div><!--EMPTY ROW-->
                
                <div class="row FragExp">
                    
                    <div class= "col-md-12 ">
                    
                        <div class="Frag"> 
                        <div class="form-group">
                              <div class="trans"> <h1>ELECCI&Oacute;N DEL SITIO</h1></div> 
                                <br/><br/>
                                <label class="col-md-2 control-label "><h3>Sitio</h3></label>
                                <div class="col-md-8 selectContainer">
                                    <select class="form-control " name="number_site" id="number_site">
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                    </select>
                                </div>
                         </div><br/><br/><br/>
                        <!--<div class="form-group">
                            <label class="col-md-2 control-label" for="inputdefault"><h3>Nombre del Fragmento:</h3></label>
                            <input class="form-control  input-lg" name="nombre_frag" id="nombre_frag" type="text">
                        </div>-->
                         
                        <div class="col-md-3"></div>    
                        <div class="col-md-3"></div>    
                        <div class="col-md-3">
                            <button type="submit" class=" btn-circle " id="Enviar">
                                <span class="glyphicon glyphicon-send"></span>
                            </button>    
                        </div>    
                        <div class="col-md-3"></div>    
                            
                        <br/><br/><br/><br/>
                    </div><!--SITIO-->
                    
                    </div>
                
                </div>
            
            </form>
            
            <div class="row">
                <div> 
                    <h1></h1>
                </div>
            </div><!--EMPTY ROW-->
        
        </div>
        
    </body>

</html>