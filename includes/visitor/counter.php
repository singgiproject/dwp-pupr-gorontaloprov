<?php
// mengetahui IP ADDRESS
$ipUser = base64_encode(base64_encode(base64_encode(base64_encode(base64_encode(base64_encode(base64_encode(base64_encode(base64_encode($_SERVER['REMOTE_ADDR'])))))))));

// Result Date
date_default_timezone_set('Asia/Makassar');
$date = base64_encode(base64_encode(base64_encode(base64_encode(base64_encode(base64_encode(base64_encode(base64_encode(base64_encode(date('Y-m-d H:i'))))))))));

$sql = "SELECT * FROM tb_visitor WHERE ip_visitor='$ipUser'";
$query = mysqli_query($conn, $sql) or die(mysqli_error($conn));

$data = mysqli_fetch_array($query);

// cek jika ada ip baru
if ($data == 0) {
  $ipUserDecode = base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode($ipUser)))))))));
  $date = base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode($date)))))))));

  $result = mysqli_query($conn, "SELECT ip_visitor FROM tb_visitor WHERE ip_visitor = '$ipUserDecode' ");
  if (mysqli_fetch_assoc($result)) {
    return false;
  }

  $sql = "INSERT INTO tb_visitor(ip_visitor, date) VALUES('$ipUserDecode', '$date')";
  $query = mysqli_query($conn, $sql) or die(mysqli_error($conn));
}
