<?php

session_start();

if ( !isset ($_SESSION ["login"]) ) {
	header("Location: ../login.php");
	exit;
}

//Ambil data dari db

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
	$Senin = htmlspecialchars($data["Senin"]);
	$Selasa = htmlspecialchars($data["Selasa"]);
	$Rabu = htmlspecialchars($data["Rabu"]);
	$Kamis = htmlspecialchars($data["Kamis"]);
	$Jumat = htmlspecialchars($data["Jumat"]);

	//query insert data
	$insertQuery = "INSERT INTO jadwalpiket 
			  VALUES
			  (NULL,'$Senin','$Selasa','$Rabu','$Kamis','$Jumat')
	";

	mysqli_query ($conn,$insertQuery);

	return mysqli_affected_rows($conn);

}

/////////////

if (isset ($_POST["submit"]) ) {



	if (tambah($_POST) > 0 ) {
		echo "
		<script>
			alert('data berhasil ditambahkan !');
			document.location.href = 'datapiket.php';
		</script>
		";
	} else {
		echo "
		<script>
			alert('data gagal ditambahkan !');
			document.location.href = 'jadwalpiket.php';
		</script>
		";
	}
	 
	
}

?>
<html>
	<head>
		<title>Tambah Data</title>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="mmx.css">
	</head>
	<body>
		
		<h1>Tambah data Siswa</h1>

		<form action="" method="post">
			<ul>

			<li>	
				<label for="Senin">Senin : </label> <br>
				<input type="text" name="Senin" id="Senin" required="">
			</li>
			<li>
				<label for="Selasa">Selasa : </label> <br>
				<input type="text" name="Selasa" id="Selara" required=""> 
			</li>
			<li>
				<label for="Rabu">Rabu : </label> <br> 
				<input type="text" name="Rabu" id="Rabu" required="">
			</li>
			<li>
				<label for="Kamis">Kamis : </label> <br>
				<input type="text" name="Kamis" id="Kamis" required="">
			</li>
			<li>
				<label for="Jumat">Jumat : </label> <br>
				<input type="text" name="Jumat" id="Jumat"> 
			</li>
			<li>
				<button type="submit" name="submit">Tambah Data!</button>
			</li>

			</ul>
		</form>	


	</body>
</html>