<?php
header('Content-Type: application/json');

// Tentukan folder tempat gambar akan diunggah
$uploadFolder = 'upload/';

// Periksa apakah folder upload sudah ada, jika tidak, buat folder tersebut
if (!file_exists($uploadFolder)) {
  mkdir($uploadFolder, 0777, true);
}

// Dapatkan file yang diunggah
$uploadedFile = $_FILES['upload'];

// Buat nama unik untuk file
$uniqueFilename = uniqid('image_') . '_' . time() . '.' . pathinfo($uploadedFile['name'], PATHINFO_EXTENSION);

// Tentukan path lengkap untuk menyimpan file
$targetPath = $uploadFolder . $uniqueFilename;

// Pindahkan file ke folder upload
if (move_uploaded_file($uploadedFile['tmp_name'], $targetPath)) {
  $response = [
    'uploaded' => 1,
    'fileName' => $uniqueFilename,
    'url' => $targetPath,
  ];
} else {
  $response = [
    'uploaded' => 0,
    'error' => ['message' => 'Gagal mengunggah file.'],
  ];
}

// Keluarkan respons sebagai JSON
echo json_encode($response);
