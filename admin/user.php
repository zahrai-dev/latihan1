<?php include"header.php";
if($levellogin!=="Admin") {
	header ("location: index.php");
}
?>

<?php 
if($levellogin=="Admin") {

?>

<div id="content">
	<div class="jarak">

		<b>TAMBAH USER</b>
		<form method="POST" action="<?php $_SERVER['PHP_SELF'] ?>" target="_self">
			<table>
				<tr>
					<td>ID User</td>
					<td> <input type="text" name="iduser"></td>
				</tr>
				<tr>
					<td>Nama User</td>
					<td> <input type="text" name="namauser"></td>
				</tr>
				<tr>
					<td>Password User</td>
					<td><input type="text" name="passworduser"></td>
				</tr>
				<tr>
					<td>Level User</td>
					<td><select name="leveluser">
						<option value="Admin">Admin</option>
						<option value="Teknisi">Teknisi</option>
						<option value="Sales">Sales</option>
						<option value="Direktur">Direktur</option>
						<option value="Manager">Manager</option>
						<option value="Operator">Operator</option>
						<option value="Marketing">Marketing</option>
					</select></td>
				</tr>
			</table>
			<input type="submit" name="tambahuser" value="TAMBAH">
		</form>

		<?php if(isset($_POST['tambahuser'])) {

			$idUser1=$_POST["iduser"];
			$namaUser1=$_POST["namauser"];
			$passwordUser1=md5($_POST["passworduser"]);
			$levelUser1=$_POST["leveluser"];

			$tambahUser= $koneksidb->query("INSERT INTO user (id_user, nama_user, password_user, level_user) values ('$idUser1', '$namaUser1', '$passwordUser1', '$levelUser1')");
			?>

			<hr/>
			User Sudah ditambah
		</hr>

	<?php } ?>

<center><h1>DATA USER</h1></center>

<table border="1" width="100%">
	<tr>
		<th>NO</th>
		<th>ID</th>
		<th>NAMA</th>
		<th>PASSWORD</th>
		<th>LEVEL</th>
		<th>ACTION</th>
	</tr>
	<?php 
	$urut2=0;
	$user_show = mysqli_query($koneksidb, "SELECT * FROM user");

	while ($hs_show=mysqli_fetch_array($user_show)) {
		$urut2++;
		$idUser2="$hs_show[id_user]";
		$namaUser2="$hs_show[nama_user]";
		$passwordUser2="$hs_show[password_user]";
		$levelUser2="$hs_show[level_user]";

		?>

		<form method="POST" action="<?php $_SERVER['PHP_SELF'] ?>" target="_self">

			<tr>
				<td><?php echo "$urut2"; ?></td>
				<td><?php echo "$idUser2"; ?>
				<input type="hidden" name="id_user" value='<?php echo"$idUser2"; ?>'>
			</td>
			<td><?php echo "$namaUser2"; ?></td>
			<td><?php echo "$passwordUser2"; ?></td>
			<td>
				<?php echo "$levelUser2"; ?>	
			</td>
			<td><input type="submit" name="hapususer" value="HAPUS">
			<button name="edituser">EDIT</button></td>

		</tr>

	</form>

<?php } ?>

</table>

	<?php if (isset($_POST['hapususer'])) {
		$idUser2=$_POST["id_user"];
		$hapus= $koneksidb->query("DELETE FROM user where id_user = '$idUser2'");
		?>

		<hr>
		Data Dengan ID User <?php echo "$idUser2"; ?> Sudah Dihapus
	</hr>

<?php } ?>

<?php if (isset($_POST['edituser'])) {
	$idUser3=$_POST["id_user"];
	$showEdit=mysqli_query($koneksidb, "SELECT * FROM user where id_user='$idUser3'");
	while ($hs_showEdit=mysqli_fetch_array($showEdit)) {
		$namaUser3="$hs_showEdit[nama_user]";
		$passwordUser3="$hs_showEdit[password_user]";
		$levelUser3="$hs_showEdit[level_user]";
	} ?>

	<hr>
	<b>EDIT USER</b>
	<form method="POST" action="<?php $_SERVER['PHP_SELF'] ?>" target="_self">

		<table>
			<tr>
				<td>ID User</td>
				<td> <input type="text" disabled value='<?php echo"$idUser3"; ?>'> <input type="hidden" name="iduser2" value='<?php echo"$idUser3"; ?>'></td>
			</tr>
			<tr>
				<td>Nama User</td>
				<td><input type="text" name="namauser2" value='<?php echo"$namaUser3"; ?>'></td>
			</tr>
			<tr>
				<td>Password User</td>
				<td><input type="text" name="passworduser2" value='<?php echo"$passwordUser3"; ?>'></td>
			</tr>
			<tr>
				<td>Level User</td>
				<td><select name="leveluser2">
					<option value="Admin" <?php if ($levelUser3=="Admin") {
						echo"selected";
					} ?>>Admin</option>
					<option value="Teknisi" <?php if ($levelUser3=="Teknisi") {
						echo"selected";
					} ?>>Teknisi</option>
					<option value="Sales" <?php if ($levelUser3=="Sales") {
						echo"selected";
					} ?>>Sales</option>
					<option value="Direktur" <?php if ($levelUser3=="Direktur") {
						echo"selected";
					} ?>>Direktur</option>
					<option value="Manager" <?php if ($levelUser3=="Manager") {
						echo"selected";
					} ?>>Manager</option>
					<option value="Operator" <?php if ($levelUser3=="Operator") {
						echo"selected";
					} ?>>Operator</option>
					<option value="Marketing" <?php if ($levelUser3=="Marketing") {
						echo"selected";
					} ?>>Marketing</option>
				</select>
			</td>
		</tr> 
	</table>
	<button name="edituserfinal">UPDATE</button>
</form>
<hr/>

<?php } ?>

<?php if (isset($_POST['edituserfinal'])) {
	$idUser3=$_POST["iduser2"];
	$namaUser3=$_POST["namauser2"];
	$passwordUser3=md5($_POST["passworduser2"]);
	$levelUser3=$_POST["leveluser2"];

	$update= $koneksidb->query("UPDATE user SET nama_user='$namaUser3', password_user='$passwordUser3', level_user='$levelUser3' WHERE id_user='$idUser3'");
	?>

	<hr>
	User <?php echo"$namaUser3"; ?> Sudah Di Update
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

<?php } else { header ("location: index.php"); } ?>