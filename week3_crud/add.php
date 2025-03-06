<html>
<head>
	<title>Add Users</title>
</head>
 
<body>
	<a href="index.php">Go to Home</a>
	<br/><br/>
 
	<form action="add.php" method="post" name="form1">
		<table width="25%" border="0">
			<tr> 
				<td>Nama Produk</td>
				<td><input type="text" name="nama_produk"></td>
			</tr>
			<tr> 
				<td>Harga</td>
				<td><input type="text" name="harga"></td>
			</tr>
			<tr> 
				<td>Jumlah Stok</td>
				<td><input type="text" name="jumlah_stok"></td>
			</tr>
			<tr> 
				<td></td>
				<td><input type="submit" name="Submit" value="Add"></td>
			</tr>
		</table>
	</form>
	
	<?php
 
	// Check If form submitted, insert form data into users table.
	if(isset($_POST['Submit'])) {
		$nama_produk = $_POST['nama_produk'];
		$harga = $_POST['harga'];
		$jumlah_stok = $_POST['jumlah_stok'];
		
		// include database connection file
		include_once("config.php");
				
		// Insert user data into tabl
		$result = mysqli_query($mysqli, "INSERT INTO produk(nama_produk,harga,jumlah_stok) VALUES('$nama_produk','$harga','$jumlah_stok')");
		
		// Show message when user added
		echo "User added successfully. <a href='index.php'>View Products</a>";
	}
	?>
</body>
</html>