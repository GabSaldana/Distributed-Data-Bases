<?php 
include("config/database.php");
session_start();

if (!isset($_SESSION['login_user'])) {
    header("location:login.php");
}

$user_check = $_SESSION['login_user'];
$ses_sql = mysqli_query($db, "SELECT u.*, l.* FROM User u, Laboratory l WHERE username = '$user_check' ");
$row = mysqli_fetch_array($ses_sql, MYSQLI_ASSOC);
$type = $row['type'];

$idLab = $row['idLaboratory'];


if ($type == 1) {
    header("location:homePharmacy.php");
}
?>