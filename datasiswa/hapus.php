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

function hapus($id) {
	global $conn;
	mysqli_query($conn,"DELETE FROM siswa WHERE id = $id");
	return mysqli_affected_rows ($conn);
}

$id = $_GET["id"];

if (hapus ($id) > 0 ) {
	echo "<script>
			alert ('data berhasil di hapus !')
			document.location.href = 'datasiswa.php';
		  </script>

		  ";

} else {
	echo " <script>
			alert ('data berhasil dihapus !')
			documnet.location.href = 'datasiswa.php'
		   </script>

	";
}



?>