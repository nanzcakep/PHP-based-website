<?php

session_start();

if ( !isset ($_SESSION ["login"]) ) {
	header("Location: ../login.php");
	exit;
}

//ambbil data dari db

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

function tambah($data){
	//ambil data dari tiap elemn
	global $conn;
	$Nama = htmlspecialchars($data["Nama"]);
	$Email = htmlspecialchars($data["Email"]);
	$No = htmlspecialchars($data["No"]);
	$Jurusan = htmlspecialchars($data["Jurusan"]);
	$Kota = htmlspecialchars($data["Kota"]);
	$Gambar = htmlspecialchars($data["Gambar"]);

	//query insert data
	$insertQuery = "INSERT INTO siswa 
			  VALUES
			  (NULL,'$Nama','$Email','$Jurusan','$Kota','$No','$Gambar')
	";

	mysqli_query ($conn,$insertQuery);

	return mysqli_affected_rows($conn);

}

if (isset ($_POST["submit"]) ) {



	if (tambah($_POST) > 0 ) {
		echo "
		<script>
			alert('data berhasil ditambahkan !');
			document.location.href = 'datasiswa.php';
		</script>
		";
	} else {
		echo "
		<script>
			alert('data gagal ditambahkan !');
			document.location.href = 'datasiswa.php';
		</script>
		";
	}
	 
	
}

?>
<html>
	<head>
		<title>Tambah Data</title>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="../css/mmx.css">
	</head>
	<body>
		
		<h1>Tambah data Siswa</h1>

		<form action="" method="post">
			<ul>

			<li>	
				<label for="Nama">Nama : </label> <br>
				<input type="text" name="Nama" id="Nama" required="" class="link">
			</li>
			<li>
				<label for="Email">Email : </label> <br>
				<input type="text" name="Email" id="Email" required="" class="link" > 
			</li>
			<li>
				<label for="No">NoHp : </label> <br> 
				<input type="number" name="No" id="No" required="" class="link">
			</li>
			<li>
				<label for="Jurusan">Jurusan : </label> <br>
				<input type="text" name="Jurusan" id="Jurusan" required="" class="link">
			</li>
			<li>
				<label for="Kota">Kota : </label> <br>
				<input type="text" name="Kota" id="Kota" required="" class="link">
			</li>
			<li>
				<label for="Gambar">Gambar : </label> <br>
				<input type="text" name="Gambar" id="Gambar"> 
			</li>
			<li>
				<button type="submit" name="submit">Tambah Data!</button>
			</li>

			</ul>
		</form>	


	</body>
</html>