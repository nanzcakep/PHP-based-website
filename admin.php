<?php 

session_start();

if ( !isset ($_SESSION ["login"]) ) {
	header("Location: login.php");
	exit;
}


?>

<html>
	<head>
	<title>HOME</title>
	<link rel="stylesheet" type="text/css" href="css/waw.css">
	</head>

	<div>
		<a href="#" class="link">Home</a>
		<a href="datasiswa/datasiswa.php" class="link">Data siswa</a>
		<a href="Jadwalpelajaran/datapelajaran.php" class="link">Data Pelajaran</a>
		<a href="jadwalpiket/datapiket.php" class="link">Jadwal piket</a>
	</div>

	<body>
		<div class="a">
			<br><br><br><br><br><br><br>
			<h1>Selamat Datang</h1>
			<font size="7">Admin Ganteng</font>
		<div>

			<br><br><br>

		<div class="b">
			<input type="submit" value="Gasspol" class="c">
		</div>
	</body>
</html>