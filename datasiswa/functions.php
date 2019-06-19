<?php

session_start();

if ( !isset ($_SESSION ["login"]) ) {
	header("Location: ../login.php");
	exit;
}

$conn = mysqli_connect("localhost","root","bangsat123","rpl");

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

function hapus($id) {
	global $conn;
	mysqli_query($conn,"DELETE FROM siswa WHERE id = $id");
	return mysqli_affected_rows ($conn);
}


function ubah($data) {

	global $conn;
	$id = $data["id"];
	$Nama = htmlspecialchars($data["Nama"]);
	$Email = htmlspecialchars($data["Email"]);
	$Jurusan = htmlspecialchars($data["Jurusan"]);
	$Kota = htmlspecialchars($data["Kota"]);
	$No = htmlspecialchars($data["No"]);
	$Gambar = htmlspecialchars($data["Gambar"]);

	$insertQuery = "UPDATE siswa SET 
					Nama = '$Nama',
					Email = '$Email',
					Jurusan = '$Jurusan',
					Kota = '$Kota',
					No = '$No',
					Gambar = '$Gambar'
					WHERE id = $id
					";

	mysqli_query($conn,$insertQuery);
	return mysqli_affected_rows($conn);

}

function cari($keyword) {
	$query = "SELECT * FROM siswa WHERE
			  Nama LIKE '%$keyword%' OR
			  nohp LIKE '%$keyword%' OR
			  Jurusan LIKE '%$keyword%' OR
			  Email LIKE '%$keyword%' 
			  ";
	return query($query);		  
}
 
 //TB_jadwal Pelajaran  

function tambah($data){
	//ambil data dari tiap elemn
	global $conn;
	$Senin = htmlspecialchars($data["Senin"]);
	$Selasa = htmlspecialchars($data["Selasa"]);
	$Rabu = htmlspecialchars($data["Rabu"]);
	$Kamis = htmlspecialchars($data["Kamis"]);
	$Jumat = htmlspecialchars($data["Jumat"]);

	//query insert data
	$insertQuery = "INSERT INTO jadwalpelajaran 
			  VALUES
			  (NULL,'$Senin','$Selasa','$Rabu','$Kamis','$Jumat')
	";

	mysqli_query ($conn,$insertQuery);

	return mysqli_affected_rows($conn);

}

function hapus($id) {
	global $conn;
	mysqli_query($conn,"DELETE FROM siswa WHERE id = $id");
	return mysqli_affected_rows ($conn);
}


function ubah($data) {

	global $conn;
	$id = $data["id"];
	$Nama = htmlspecialchars($data["Nama"]);
	$Email = htmlspecialchars($data["Email"]);
	$Jurusan = htmlspecialchars($data["Jurusan"]);
	$Kota = htmlspecialchars($data["Kota"]);
	$No = htmlspecialchars($data["No"]);
	$Gambar = htmlspecialchars($data["Gambar"]);

	$insertQuery = "UPDATE siswa SET 
					Nama = '$Nama',
					Email = '$Email',
					Jurusan = '$Jurusan',
					Kota = '$Kota',
					No = '$No',
					Gambar = '$Gambar'
					WHERE id = $id
					";

	mysqli_query($conn,$insertQuery);
	return mysqli_affected_rows($conn);

}

function cari($keyword) {
	$query = "SELECT * FROM siswa WHERE
			  Nama LIKE '%$keyword%' OR
			  nohp LIKE '%$keyword%' OR
			  Jurusan LIKE '%$keyword%' OR
			  Email LIKE '%$keyword%' 
			  ";
	return query($query);		  
}

?>