<?php include_once "koneksi.php";  ?>
<!DOCTYPE html>
<link rel="stylesheet" type="text/css" href="styles.css">

<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title> latihan 4</title>
</head>

<body>
	<div id="container">

	<div id="menu">
				<ul class="ulmenu">
					<li>
						<a href="index.php">HOME</a>
					</li>

					<li>
						<a href="profil.php">PROFIL</a>
					</li>
					<li>
						<a href="store.php">STORE</a>
					</li>
					<!-- <li> <a href="user.php">USER</a></li> -->
					<li><a href="contact.php">CONTACT US</a></li>
					<li><a href="blog.php">BLOG</a></li>
				</ul>
		</div>

	<div id="header">
		<div class="logo"><img src="Koala.jpg" width="100" height="80">LOGO</div>
		<div class="iklan"><img src="Untitledcvr_fb.png" height="80" width="500"> 
			<!--<marquee>IKLAN BERJALAN</marquee>-->
		</div>
	</div>
	
	<div id="sidebar">
	<div class="title-sidebar"> FORM LOGIN</div>
		<div class="isi-sidebar">
		<form method="POST" action="<?php $_SERVER['PHP_SELF'] ?>" target="_self">
			<table>
				<tr>
					<td>User</td>
					<td><input type="text" name="iduser" /required></td>
				</tr>
				<tr>
					<td>Password</td>
					<td><input type="password" name="passworduser" /required></td>
				</tr>
			</table><br>

			<input type="submit" name="login" value="LOGIN" style="width: 100%;">

					<?php if (isset( $_POST['login'])) {
			$idUser1=$_POST["iduser"];
			$passwordUser1=md5($_POST["passworduser"]);

			session_set_cookie_params('3600');
			if (!isset($_SESSION)) {
				session_start();
			}

			$cekuser =mysqli_query($koneksidb, "SELECT * FROM user where id_user='$idUser1' AND password_user='$passwordUser1'");
			$ada =mysqli_fetch_row($cekuser);

			if ($ada){
				$_SESSION['userlogin'] = $idUser1;
				$_SESSION['namalogin'] = $ada [1];
				$_SESSION['levellogin'] = $ada [3];

				header("location: admin/index.php");
				exit;
			} else {
				echo "User / Password Salah";
			}
		} ?>

		</form>
		
	</div>

		<div class="title-sidebar"> DATA PRODUK</div>
		<div class="isi-sidebar"> 
			<ol type="number">
				<?php
				$produk_show=mysqli_query($koneksidb,"SELECT * FROM produk");
				while ($hs_show=mysqli_fetch_array($produk_show)){
					$idProduk="$hs_show[id_produk]";
					$namaProduk="$hs_show[nama_produk]";
					?>

					<li>
						<a href='viewstore.php?id=<?php echo"$idProduk";?>'>
						<?php echo"$namaProduk";?>
						</a>
				</li>
				<?php } ?>
			</ol>
		</div>

		<div class="title-sidebar"> JUDUL 3</div>
		<div class="isi-sidebar"> CONTENT 1 CONTENT 1 CONTENT 1 CONTENT 1 CONTENT 1 CONTENT 1 CONTENT 1 CONTENT 1 CONTENT 1 CONTENT 1 CONTENT 1 CONTENT 1 CONTENT 1 CONTENT 1 CONTENT 1 CONTENT 1 CONTENT 1 CONTENT 1 CONTENT 1 CONTENT 1 CONTENT 1 CONTENT 1 CONTENT 1 CONTENT 1 CONTENT 1 CONTENT 1 CONTENT 1 CONTENT 1 CONTENT 1 CONTENT 1 CONTENT 1 CONTENT 1 CONTENT 1 CONTENT 1 CONTENT 1 CONTENT 1</div>

	</div>