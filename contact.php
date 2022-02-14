<?php include"header.php";?>

	<div id="content">
		<div class="jarak"></div>
		<center>
			<h1>HUBUNGI KAMI</h1>
		</center>

		<form method="POST" action="<?php $_SERVER['PHP_SELF'] ?>" target="_self">
			<table>
				<tr>
					<td>Nama</td>
					<td><input type="text" name="nama"></td>
				</tr>
				<tr>
					<td>NO. HP</td>
					<td><input type="text" name="hp"></td>
				</tr>
				<tr>
					<td>Jenis Kelamin</td>
					<td>
					<select name="jenisKelamin">
						<option value="laki-laki">Laki - Laki</option>
						<option value="perempuan">Perempuan</option>
					</select>
				</td>
				</tr>
				<tr>
					<td>Alamat Email</td>
					<td><input type="text" name="alamatEmail"></td>
				</tr>
				<tr>
					<td>Catatan</td>
					<td>
					<textarea name="catatan"></textarea>
					</td>
				</tr>
			</table>

			<input type="submit" name="kirimData" value="KIRIM DATA">
			
			<!--
				<button>KIRIM DATA</button>
			-->

		</form>

		<?php 
		if 
			(isset($_POST['kirimData'])) 
		{ ?>
			<?php

		$nama=$_POST['nama'];
		$hp=$_POST['hp'];
		$jenisKelamin=$_POST['jenisKelamin'];
		$alamatEmail=$_POST['alamatEmail'];
		$catatan=$_POST['catatan'];

		  ?>

		<hr>Terimakasih anda telah menghubungi kami. Kami akan segera menghubungi anda.</hr>
		<br>
		Berikut data anda :
		<br>
		NAMA : <?php echo "$nama";?> <br>
		No. HP : <?php echo "$hp";?> <br>
		Jenis Kelamin : <?php echo "$jenisKelamin";?> <br>
		Alamat Email : <?php echo "$alamatEmail";?> <br>
		Catatan : <?php echo "$catatan";?>
		<?php }
		 ?>

	</div>

	<div style="clear: both;"></div>

	<div id="footer">
		<div class="jarak"> Copyright &copy 2021 Zahrai</div> 
	</div>
	</div>
</body>

</html>