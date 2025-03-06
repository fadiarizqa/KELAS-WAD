<?php
// include database connection file
include_once("config.php");
 
// Check if form is submitted for user update, then redirect to homepage after update
if(isset($_POST['update']))
{	
	$id = $_POST['id'];
	
	$nama_produk=$_POST['nama_produk'];
	$harga=$_POST['harga'];
	$jumlah_stok=$_POST['jumlah_stok'];
		
	// update user data
	$result = mysqli_query($mysqli, "UPDATE produk SET nama_produk='$nama_produk',harga='$harga',jumlah_stok='$jumlah_stok' WHERE id=$id");
	
	// Redirect to homepage to display updated user in list
	header("Location: index.php");
}
?>
<?php
// Display selected user data based on id
// Getting id from url
$id = $_GET['id'];
 
// Fetech user data based on id
$result = mysqli_query($mysqli, "SELECT * FROM produk WHERE id=$id");
 
while($user_data = mysqli_fetch_array($result))
{
	$nama_produk = $user_data['nama_produk'];
	$harga = $user_data['harga'];
	$jumlah_stok = $user_data['jumlah_stok'];
}
?>
<html>
<head>	
	<title>Edit User Data</title>
</head>
 
<body>
	<a href="index.php">Home</a>
	<br/><br/>
	
	<form name="update_user" method="post" action="edit.php">
		<table border="0">
			<tr> 
				<td>Nama Produk</td>
				<td><input type="text" name="nama_produk" value=<?php echo $nama_produk;?>></td>
			</tr>
			<tr> 
				<td>Harga</td>
				<td><input type="text" name="harga" value=<?php echo $harga;?>></td>
			</tr>
			<tr> 
				<td>Stok</td>
				<td><input type="text" name="jumlah_stok" value=<?php echo $jumlah_stok;?>></td>
			</tr>
			<tr>
				<td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
				<td><input type="submit" name="update" value="Update"></td>
			</tr>
		</table>
	</form>
</body>
</html>