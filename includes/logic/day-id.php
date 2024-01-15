<?php
function day_id($day)
{
  // Set zona waktu ke zona waktu Indonesia
  date_default_timezone_set('Asia/Makassar');

  // Array nama hari dalam bahasa Indonesia
  $dayId = array("Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu");

  // Mendapatkan indeks hari dari tanggal yang diberikan
  $indeksHari = date('w', strtotime($day));

  // Mendapatkan nama hari dalam bahasa Indonesia
  $dayIdLang = $dayId[$indeksHari];

  return $dayIdLang;
}
