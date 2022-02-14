<?php include"header.php";?>

<div id="content">
	<div class="jarak">

		<center><h1>INPUT BARANG</h1></center>

		<b>TAMBAH DATA</b>
		<form method="POST" action="<?php $_SERVER['PHP_SELF'] ?>" target="_self">
			<table>
				<tr>
					<td>ID Produk</td>
					<td> <input type="text" name="idproduk1"></td>
				</tr>
				<tr>
					<td>Nama Produk</td>
					<td> <input type="text" name="namaproduk1"></td>
				</tr>
				<tr>
					<td>Stok Produk</td>
					<td><input type="text" name="qtyproduk1"></td>
				</tr>
				<tr>
					<td>Harga Produk</td>
					<td><input type="text" name="hargaproduk1"></td>
				</tr>
				<tr>
					<td>Kategori Produk</td>
					<td><select name="kategoriproduk1">
						<option value="Sendal">Sendal</option>
						<option value="Sepatu">Sepatu</option>
					</select></td>
				</tr>
			</table>
			<input type="submit" name="tambahdata" value="TAMBAH">
		</form>

		<?php if(isset($_POST['tambahdata'])) {

			$idProduk1=$_POST["idproduk1"];
			$namaProduk1=$_POST["namaproduk1"];
			$qtyProduk1=$_POST["qtyproduk1"];
			$hargaProduk1=$_POST["hargaproduk1"];
			$kategoriProduk1=$_POST["kategoriproduk1"];

			$tambahData= $koneksidb->query("INSERT INTO produk (id_produk, nama_produk, qty_produk, harga_produk, kategori_produk) values ('$idProduk1', '$namaProduk1', '$qtyProduk1', '$hargaProduk1', '$kategoriProduk1')");
			?>

			<hr/>
			Data Sudah ditambah
		</hr>

	<?php } ?>

<center><h1>DATA BARANG</h1></center>

<table border="1" width="100%">
	<tr>
		<th>NO</th>
		<th>ID</th>
		<th>NAMA</th>
		<th>STOK</th>
		<th>HARGA</th>
		<th>KATEGORI</th>
		<th>ACTION</th>
	</tr>
	<?php 
	$urut2=0;
	$produk_show = mysqli_query($koneksidb, "SELECT * FROM produk");

	while ($hs_show=mysqli_fetch_array($produk_show)) {
		$urut2++;
		$idProduk2="$hs_show[id_produk]";
		$namaProduk2="$hs_show[nama_produk]";
		$qtyProduk2="$hs_show[qty_produk]";
		$qtyProduk2=number_format($qtyProduk2, 0, ",", ".");
		$hargaProduk2="$hs_show[harga_produk]";
		$hargaProduk2=number_format($hargaProduk2, 0, ",", ".");
		$kategoriProduk2="$hs_show[kategori_produk]";

		?>

		<form method="POST" action="<?php $_SERVER['PHP_SELF'] ?>" target="_self">

			<tr>
				<td><?php echo "$urut2"; ?></td>
				<td><?php echo "$idProduk2"; ?>
				<input type="hidden" name="id_produk" value='<?php echo"$idProduk2"; ?>'>
			</td>
			<td><?php echo "$namaProduk2"; ?></td>
			<td><?php echo "$qtyProduk2"; ?></td>
			<td>Rp.
				<?php echo "$hargaProduk2"; ?>	
			</td>
			<td><?php echo "$kategoriProduk2"; ?></td>
			<td>
				<input type="submit" name="hapusdata" value="HAPUS">
				<button name="editdata">EDIT</button>
			</td>
		</tr>

	</form>

<?php } ?>

</table>

<?php if (isset($_POST['hapusdata'])) {
		$idProduk2=$_POST["id_produk"];
		$hapus= $koneksidb->query("DELETE FROM produk where id_produk = '$idProduk2'");
		?>

		<hr>
		Data Dengan ID Produk <?php echo "$idProduk2"; ?> Sudah Dihapus
	</hr>

<?php } ?>

<?php if (isset($_POST['editdata'])) {
	$idProduk3=$_POST["id_produk"];
	$showEdit=mysqli_query($koneksidb, "SELECT * FROM produk where id_produk='$idProduk3'");
	while ($hs_showEdit=mysqli_fetch_array($showEdit)) {
		$namaProduk3="$hs_showEdit[nama_produk]";
		$qtyProduk3="$hs_showEdit[qty_produk]";
		$hargaProduk3="$hs_showEdit[harga_produk]";
		$kategoriProduk3="$hs_showEdit[kategori_produk]";
	} ?>

	<hr>
	<b>EDIT DATA</b>
	<form method="POST" action="<?php $_SERVER['PHP_SELF'] ?>" target="_self">

		<table>
			<tr>
				<td>ID Produk</td>
				<td> <input type="text" disabled value='<?php echo"$idProduk3"; ?>'> <input type="hidden" name="idproduk2" value='<?php echo"$idProduk3"; ?>'></td>
			</tr>
			<tr>
				<td>Nama Produk</td>
				<td><input type="text" name="namaproduk2" value='<?php echo"$namaProduk3"; ?>'></td>
			</tr>
			<tr>
				<td>Stok Produk</td>
				<td><input type="text" name="qtyproduk2" value='<?php echo"$qtyProduk3"; ?>'></td>
			</tr>
			<tr>
				<td>Harga Produk</td>
				<td><input type="text" name="hargaproduk2" value='<?php echo"$hargaProduk3"; ?>'></td>
			</tr>
			<tr>
				<td>Kategori Produk</td>
				<td><select name="kategoriproduk2">
					<option value="Sendal" <?php if ($kategoriProduk3=="Sendal") {
						echo"selected";
					} ?>>Sendal</option>
					<option value="Sepatu" <?php if ($kategoriProduk3=="Sepatu") {
						echo"selected";
					} ?>>Sepatu</option>
				</select>
			</td>
		</tr>
	</table>
	<button name="editdatafinal">UPDATE</button>
</form>
<hr>

<?php } ?>

<?php if (isset($_POST['editdatafinal'])) {
	$idProduk3=$_POST["idproduk2"];
	$namaProduk3=$_POST["namaproduk2"];
	$qtyProduk3=$_POST["qtyproduk2"];
	$hargaProduk3=$_POST["hargaproduk2"];
	$kategoriProduk3=$_POST["kategoriproduk2"];

	$update= $koneksidb->query("UPDATE produk SET nama_produk='$namaProduk3', qty_produk='$qtyProduk3', harga_produk='$hargaProduk3', kategori_produk='$kategoriProduk3' WHERE id_produk='$idProduk3'");
	?>

	<hr>
	DATA <?php echo"$namaProduk3"; ?> Sudah Di Update
</hr>

<?php } ?>

</div>
</div>

<div style="clear: both;"></div>

<div id="footer">
	<div class="jarak"> Copyright &copy 2021 Zahrai</div> 
</div>
</div>
</body>

</html>