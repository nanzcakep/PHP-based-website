<?php 

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

if (isset ($_POST["cari"]) ) {
	$siswa = cari($_POST["keyword"]);
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Halaman Admin</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="css/waw.css">
</head>
<body>
	<div>
		<a href="index.html" class="link">Home</a>
		<a href="" class="link">About</a>
		<a href="siswa.php" class="link">Daftar Siswa</a>
		<a href="jadwalpelajaran.php" class="link">Jadwal Pelajaran</a>
		<a href="jadwalpiket.php" class="link">jadwal piket</a>
	</div>
	<br><br>

	<form action="" method="post">
		
		<input type="text" name="keyword" size="40" autofocus="" placeholder="masukan keyword pencarian" autocomplete="off" >
		<button type="submit" name="cari">CARI!</button>

	</form>
	<br>
	<table border="1" cellpadding="10" cellspacing="0" class="d">
		
		<tr>
			<th>No Absen</th>
			<th>Gambar</th>
			<th>Nama</th>
			<th>Email</th>
			<th>Jurusan</th>
			<th>Kota</th>
			<th>NoHP</th>
		</tr>

		<?php $i = 1; ?>
		<?php foreach ($siswa as $rew ) : ?>

		<tr>
			<td><?php echo $i ?></td>
			<td><img src="img/<?php echo $rew["Gambar"]?>" width="50"></td>
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