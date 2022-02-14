<?php include_once "../koneksi.php"; 
session_write_close();
session_set_cookie_params('3600');
if (!isset ($_SESSION)){
	session_start();
}

$userlogin=$_SESSION['userlogin'];
$levellogin=$_SESSION['levellogin'];
$namalogin=$_SESSION['namalogin'];

if (! (($userlogin) && ($levellogin))) {
	header ("location: ../index.php");
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>LATIHAN 4</title>
	<link rel="stylesheet" type="text/css" href="../styles.css">
</head>
<body>
<div id="container">
<div id="menu">
	<ul class="ulmenu">
		<li><a href="index.php">HOME</a></li>
		<li><a href="store.php">PRODUK</a></li>
		<?php if ($levellogin=="Admin") { ?>
			<li><a href="user.php">USER</a></li>
		<?php } ?>
		<li><a href="logout.php">LOGOUT</a></li>
</ul>
</div>
<br>
<br>