<?php

$conn = mysqli_connect("localhost","id10009706_root","bangsat123","id10009706_rpl");

$jadwal = query("SELECT * FROM jadwalpelajaran");

function query($query) {
	global $conn;
	$result = mysqli_query($conn,$query);
	$rows = [];
	while ($row = mysqli_fetch_assoc($result) ) {
		$rows[] = $row;
	}

	return $rows;
} 

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Jadwal Pelajaran RPL X 1</title>
	<link rel="stylesheet" type="text/css" href="css/waw.css">
</head>
<body>
		<a href="index.html" class="link">Home</a>
		<a href="" class="link">About</a>
		<a href="siswa.php" class="link">Daftar Siswa</a>
		<a href="jadwalpelajaran.php" class="link">Jadwal Pelajaran</a>
		<a href="jadwalpiket.php" class="link">jadwal piket</a>
	<br><br>

	<div class="e">
		<h1>Jadwal Pelajaran XI RPL 1</h1>
	</div>
	<br>

	<form actio="" method="post">
		

	</form>

	<table border="1" cellpadding="10" class="d">
		<tr>
			<th>Senin</th>
			<th>Selasa</th>
			<th>Rabu</th>
			<th>Kamis</th>
			<th>Jum'at</th>
		</tr>

		<?php foreach ($jadwal as $rew ) : ?>

		<tr>
			<td><?php echo $rew ["Senin"] ?></td>
			<td><?php echo $rew ["Selasa"]?></td>
			<td><?php echo $rew ["Rabu"]?></td>
			<td><?php echo $rew ["Kamis"]?></td>
			<td><?php echo $rew ["Jumat"]?></td>
		</tr>

		<?php endforeach; ?>

	</table>

</body>
</html>