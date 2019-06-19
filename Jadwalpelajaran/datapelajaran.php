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

$datapelajaran = query("SELECT * FROM jadwalpelajaran");



?>

<!DOCTYPE html>
<html>
	<head>
		<title>data siswa</title>
		<link rel="stylesheet" type="text/css" href="../css/mmx.css">
	</head>
	<body>
		<div>
			<a href="../admin.php" class="link">Home</a>
			<a href="../datasiswa/datasiswa.php" class="link">data siswa</a>
			<a href="../Jadwalpelajaran/datapelajaran.php" class="link">Jadwal Pelajaran</a>
			<a href="../jadwalpiket/datapiket.php" class="link">Jadwal Piket</a>
		</div>

		<br><br><br>

		<a href="tambah.php" class="link">tambah pelajaran </a>

		<br><br><br>

		<from>
			
		</from>

		<table border="1" cellpadding="10" cellspacing="0">
			<tr>
				<th>No</th>
				<th>Aksi</th>
				<th>Senin</th>
				<th>Selasa</th>
				<th>Rabu</th>
				<th>Kamis</th>
				<th>Jumat</th>
			</tr>

		<?php $i = 1; ?>
		<?php foreach ($datapelajaran as $rew ) : ?>

		<tr>
			<td><?php echo $i ?></td>
			<td><a href="ubah.php?id=<?php echo $rew ["id"] ?>">Ubah</a> | 
				<a href="hapus.php?id=<?php echo $rew ["id"] ?>">Hapus</a></td>
			<td><?php echo $rew ["Senin"]?></td>
			<td><?php echo $rew ["Selasa"]?></td>
			<td><?php echo $rew ["Rabu"]?></td>
			<td><?php echo $rew ["Kamis"]?></td>
			<td><?php echo $rew ["Jumat"]?></td>
		</tr>
		<?php $i++; ?>
		<?php endforeach; ?>
			
		</table>
	</body>
</html>
