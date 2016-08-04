<?php

include 'querys.php';
include 'config/databases.php';
$number_db= (int)$_POST['DB2'];
echo $number_db;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if($number_db == 1){
        //*************FARMAPRO*************************
    
        $username= $_POST['username'];
        echo " " . $username;
        $password= $_POST['password'];
        echo " " . $password;
        $email= $_POST['email'];
        echo " " . $email;
        $type= (int)$_POST['type'];
        echo " " .$type;   
        
        include 'config/conexion_fp.php';
        insert_FP($conn,$username,$password,$email,$type);
    }
    

    if($number_db == 2){
            //*************OXXO****************************
        $idasociado= (int)$_POST['idasociado'];
        echo " " .$idasociado;
        $sueldoasociado= (int)$_POST['sueldoasociado'];
        echo " " . $sueldoasociado;
        $nombreasociado=$_POST['nombreasociado'];
        echo " " . $nombreasociado;
        $eapellido_paterno_oxxo=$_POST['eapellido_paterno_oxxo'];
        echo " " . $eapellido_paterno_oxxo;
        $typeasoc=(int)$_POST['typeasoc'];
        echo " " . $typeasoc;
        $Sucursales=(int)$_POST['Sucursales'];
        echo " " . $Sucursales;
        $contra=$_POST['contra'];
        echo " " . $contra;
        $status=$_POST['status'];
        echo " " . $status;
        
        include 'config/conexion_oxxo.php';
        insert_OXXO($conn,$idasociado,$sueldoasociado,$nombreasociado,$eapellido_paterno_oxxo,$typeasoc,$Sucursales,$contra,$status);
        
    }
    
    if($number_db == 3){
        //*************TIENDA****************************
        $idempleado=(int)$_POST['idempleado'];
        echo " " . $idempleado;
        $nombreempleado=$_POST['nombreempleado'];
        echo " " . $nombreempleado;
        $direccion=$_POST['direccion'];
        echo " " . $direccion;
        $telefono=$_POST['telefono'];
        echo " " . $telefono;
        $antiguedad=$_POST['antiguedad'];
        echo " " . $antiguedad;
        $Rangos=$_POST['Rangos'];
        echo " " . $Rangos;
        $Tiendas=$_POST['Tiendas'];
        echo " " . $Tiendas;
        
        include 'config/conexion_tienda.php';
        insert_TIENDA($conn,$idempleado, $nombreempleado,$direccion, $telefono,$antiguedad,$Rangos,$Tiendas);
        
    }

    if($number_db == 4){
        
           //*************OPTICA****************************
        $idcatempleado=(int)$_POST['idcatempleado'];
        echo " " . $idcatempleado;
        $nombrecatempleado=$_POST['nombrecatempleado'];
        echo " " . $nombrecatempleado;
        $apellido_paterno_optica=$_POST['apellido_paterno_optica'];
        echo " " . $apellido_paterno_optica;
        $apellido_materno_optica=$_POST['apellido_materno_optica'];
        echo " " . $apellido_materno_optica;
        $Puestos=$_POST['Puestos'];
        echo " " . $Puestos;
        $status_op =$_POST['status_op'];
        echo " " . $status_op;
        
        include 'config/conexion_optica.php';
        insert_OPTICA($conn,$idcatempleado,$nombrecatempleado,$apellido_paterno_optica,$apellido_materno_optica,$Puestos,$status_op);
    }
 
}
    
?>