<?php 

session_start();
include_once "../koneksidb.php";

$_SESSION['userlogin'];
$_SESSION['levellogin'];
$_SESSION['namalogin'];

session_destroy();

header("location: ../index.php");
exit;

 ?>