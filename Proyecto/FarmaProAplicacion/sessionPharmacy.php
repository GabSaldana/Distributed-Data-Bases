<?php 
include("config/database.php");
session_start();

if (!isset($_SESSION['login_user'])) {
    header("location:login.php");
}

$user_check = $_SESSION['login_user'];
$ses_sql = mysqli_query($db, "SELECT u.*, p.* FROM User u, Pharmacy p  
WHERE u.username = '$user_check' and u.iduser = p.user_iduser");
$row = mysqli_fetch_array($ses_sql, MYSQLI_ASSOC);
$type = $row['type'];

//echo $row['idUser'];
$idPharmacy = $row['idPharmacy'];

if ($type == 2) {
    header("location:homeLaboratory.php");
}
?>