<?php include"header.php";?>

<div id="content">
	<div class="jarak">
	<?php 
	$idproduk=$_GET['id'];
	$urut2=0;
	$produk_show = mysqli_query($koneksidb, "SELECT * FROM produk where id_produk='$idproduk'");

	while ($hs_show=mysqli_fetch_array($produk_show)) {
		$urut2++;
		$idProduk2="$hs_show[id_produk]";
		$namaProduk2="$hs_show[nama_produk]";
		$qtyProduk2="$hs_show[qty_produk]";
		$qtyProduk2=number_format($qtyProduk2, 0, ",", ".");
		$hargaProduk2="$hs_show[harga_produk]";
		$hargaProduk2=number_format($hargaProduk2, 0, ",", ".");
		$kategoriProduk2="$hs_show[kategori_produk]";

	 } ?>
<div class="img-produk"></div>

<div class="detail-produk">
	<div class="title-sidebar">Detail Produk</div>
</div>
<table>
	<tr>
		<td>Kode Produk</td>
		<td>: <?php echo"$idProduk";?></td>
	</tr>
	<tr>
		<td>Nama Produk</td>
		<td>: <?php echo"$namaProduk2";?></td>
	</tr>
	<tr>
		<td>Stok Produk</td>
		<td>: <?php echo"$qtyProduk2";?></td>
	</tr>
	<tr>
		<td>Harga Produk</td>
		<td>: RP. <?php echo"$hargaProduk2";?></td>
	</tr>
	<tr>
		<td>Kategori Produk</td>
		<td>: <?php echo"$kategoriProduk2";?></td>
	</tr>
	<tr>
		<td>Deskripsi</td>
		<td>: </td>
	</tr>
</table>
</div>

<div style="clear: both;"></div>
<hr/>
<div class="komentar">
	<div class="title-sidebar">Komentar
</div>

<form method="POST" action="<?php $_SERVER['PHP_SELF'] ?>" target="_self">
	<table width="100%" class="jarak">
		<tr>
			<td>Nama</td>
			<td><input type="text" name="nama" style="width:100%;"></td>
		</tr>
		<tr>
			<td>Alamat Email</td>
			<td><input type="text" name="email" style="width:100%;"></td>
		</tr>
		<tr>
			<td>Komentar</td>
			<td><textarea name="komentar" style="width:100%;"></textarea></td>
		</tr>
	</table>
	<hr>
	<input type="submit" name="kirimkomentar" value="KIRIM" style="width:100%;">
</form>

<?php
if (isset($_POST['kirimkomentar'])){

	$nama=$_POST["nama"];
	$email=$_POST["email"];
	$komentar=$_POST["komentar"];

	?>

	<hr/>
	Terimakasih sudah memberi komentar.
	<br>
	Berikut data anda :
	<br>
	Nama : <?php echo"$nama"; ?><br>
	Email : <?php echo"$email"; ?><br>
	Catatan : <?php echo"$komentar"; ?><br>

<?php } ?>
</div>
</div>
</div>

<div style="clear: both;"></div>
<div id="footer">
	<div class="jarak"> Copyright &copy 2021 Zahrai</div>
</div>
</div>
</div>
</body>

</html>