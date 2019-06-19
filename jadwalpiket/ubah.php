<?php 

session_start();

if ( !isset ($_SESSION ["login"]) ) {
	header("Location: ../login.php");
	exit;
}

$conn = mysqli_connect("localhost","id10009706_root","bangsat123","id10009706_rpl");

function query($query) {
	global $conn;
	$result = mysqli_query($conn,$query);
	$rows = [];
	while ($row = mysqli_fetch_assoc($result) ) {
		$rows[] = $row;
	}

	return $rows;
}

function ubah($data) {

	global $conn;
	$id = $data["id"];
	$Senin = htmlspecialchars($data["Senin"]);
	$Selasa = htmlspecialchars($data["Selasa"]);
	$Rabu = htmlspecialchars($data["Rabu"]);
	$Kamis = htmlspecialchars($data["Kamis"]);
	$Jumat = htmlspecialchars($data["Jumat"]);

	$insertQuery = "UPDATE jadwalpiket SET 
					Senin = '$Senin',
					Selasa = '$Selasa',
					Rabu = '$Rabu',
					Kamis = '$Kamis',
					Jumat = '$Jumat'
					WHERE id = $id
					";

	mysqli_query($conn,$insertQuery);
	return mysqli_affected_rows($conn);

}

//ambil data di url
$id = $_GET['id'];


//query data mahasiswa berdasarkan query
$sws = query("SELECT * FROM jadwalpiket WHERE id = $id")[0];

if (isset ($_POST["submit"]) ) {



	if (ubah($_POST) > 0 ) {
		echo "
		<script>
			alert('data berhasil diubah !');
			document.location.href = 'jadwalpiket.php';
		</script>
		";
	} else {
		echo "
		<script>
			alert('data gagal diubah !');
			document.location.href = 'jadwalpiket.php';
		</script>
		";
	}
	 
	
}




?>

<!DOCTYPE html>
<html>
<head>
	<meta charset ="utf-8">
	<title></title>
	<link rel="stylesheet" type="text/css" href="mmx.css">
</head>
<body>

	<h1>Update data Siswa</h1>

	
		<form action="" method="post">

		<input type="hidden" name="id" value="<?php echo $sws["id"];?>">

			<ul>

			<li>	
				<label for="Nama">Nama : </label><br>
				<input type="text" name="Nama" id="Nama" required value="<?php echo $sws["Nama"];?>">
			</li>
			<li>
				<label for="Email">Email : </label><br>
				<input type="text" name="Email" id="Email" required value="<?php echo $sws["Email"];?>">
			</li>
			<li>
				<label for="No">NoHp : </label><br>
				<input type="number" name="No" id="No" required value="<?php echo $sws["No"];?>">
			</li>
			<li>
				<label for="Jurusan">Jurusan : </label><br>
				<input type="text" name="Jurusan" id="Jurusan" required value="<?php echo $sws["Jurusan"];?>">
			</li>
			<li>
				<label for="Kota">Kota : </label><br>
				<input type="text" name="Kota" id="Kota" required value="<?php echo $sws["Kota"];?>">
			</li>
			<li>
				<label for="Gambar">Gambar : </label><br>
				<input type="text" name="Gambar" id="Gambar" value="<?php echo $sws["Gambar"];?>">
			</li>
			<li>
				<button type="submit" name="submit">ubah Data!</button>
			</li>

			</ul>
		</form>	

</body>
</html>