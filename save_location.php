<?php
require('funct/functions.php');

date_default_timezone_set('Asia/Makassar');

// Menerima data lokasi dari permintaan POST
$idUser = $_POST['id_user'];
$latitude = $_POST['latitude'];
$longitude = $_POST['longitude'];
$date = date("Y-m-d") . " " . date("H:i");
// Menyimpan data lokasi ke dalam database
$sql = "INSERT INTO tb_locations (id_user, latitude, longitude, date) VALUES ('$idUser', '$latitude', '$longitude', '$date')";

if ($conn->query($sql) === TRUE) {
  echo "Data lokasi berhasil disimpan ke dalam database.";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

// Menutup koneksi
