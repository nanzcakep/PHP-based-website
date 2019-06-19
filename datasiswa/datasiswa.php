<?php 

session_start();

if ( !isset ($_SESSION ["login"]) ) {
	header("Location: ../login.php");
	exit;
}

$conn = mysqli_connect("localhost","id10009706_root","bangsat123","id10009706_rpl");

$siswa = query("SELECT * FROM siswa");

function query($query) {
	global $conn;
	$result = mysqli_query($conn,$query);
	$rows = [];
	while ($row = mysqli_fetch_assoc($result) ) {
		$rows[] = $row;
	}

	return $rows;
}


function cari($keyword) {
	$query = "SELECT * FROM siswa WHERE
			  Nama LIKE '%$keyword%' OR
			  Email LIKE '%$keyword%' OR
			  Jurusan LIKE '%$keyword%' OR
			  Kota LIKE '%$keyword%' OR
			  No LIKE '%$keyword%' 
			  ";
	return query($query);		  
}


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
			<a href="datasiswa.php" class="link">data siswa</a>
			<a href="../Jadwalpelajaran/datapelajaran.php" class="link">Jadwal Pelajaran</a>
			<a href="../jadwalpiket/datapiket.php" class="link">Jadwal Piket</a>
		</div>

		<br><br><br>

		<a href="tambah.php" class="link">tambah siswa </a>

		<br><br><br>

		<from>
			
		</from>

		<table border="1" cellpadding="10" cellspacing="0">
			<tr>
				<th>No</th>
				<th>Aksi</th>
				<th>Gambar</th>
				<th>Nama</th>
				<th>Email</th>
				<th>Jurusan</th>
				<th>Kota</th>
				<th>Nomer</th>
			</tr>

		<?php $i = 1; ?>
		<?php foreach ($siswa as $rew ) : ?>

		<tr>
			<td><?php echo $i ?></td>
			<td><a href="ubah.php?id=<?php echo $rew ["id"] ?>">Ubah</a> | 
				<a href="hapus.php?id=<?php echo $rew ["id"] ?>">Hapus</a></td>
			<td><img src="../img/<?php echo $rew["Gambar"]?>" width="50"></td>
			<td><?php echo $rew ["Nama"]?></td>
			<td><?php echo $rew ["Email"]?></td>
			<td><?php echo $rew ["Jurusan"]?></td>
			<td><?php echo $rew ["Kota"]?></td>
			<td><?php echo $rew ["No"]?></td>
		</tr>
		<?php $i++; ?>
		<?php endforeach; ?>
			
		</table>
	</body>
</html>
