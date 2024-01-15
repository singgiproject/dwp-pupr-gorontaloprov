<?php
session_start();
if (!isset($_SESSION["login"])) {
  header("Location:../../auth/login");
  exit;
}
// CONNECT FUNCTIONS
require('../../../funct/functions.php');

// SESSION USER LOGIN
if (isset($_SESSION["login"])) {

  $userSession = $_SESSION["username"];
  $resultSession = $conn->query("SELECT * FROM tb_users WHERE username = '$userSession' ");
  $rowSession = mysqli_fetch_assoc($resultSession);
  $idSession = $rowSession["id"];
}

// CHECK EMPTY ACCOUNT
if (empty($rowSession["id"])) {
  header("Location:../../auth/logout");
  exit;
}
?>
<script>
  // Fungsi untuk mengirim data lokasi ke server
  function sendLocationToServer() {
    if (navigator.geolocation) {
      navigator.geolocation.getCurrentPosition(function(position) {
        var latitude = position.coords.latitude;
        var longitude = position.coords.longitude;

        // Mendapatkan id_user (misalnya dari variabel JavaScript)
        var id_user = <?= $idSession; ?>; // Gantilah dengan cara Anda mendapatkan id_user

        // Kirim data ke server
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "save_location.php", true);
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function() {
          if (xhr.readyState === 4 && xhr.status === 200) {
            // Tanggapan dari server
            console.log(xhr.responseText);
          }
        };

        // Buat string data dengan id_user di urutan pertama
        var data = "id_user=" + id_user + "&latitude=" + latitude + "&longitude=" + longitude;
        xhr.send(data);
      });
    } else {
      alert("Geolocation tidak didukung oleh browser ini.");
    }
  }

  // Panggil fungsi untuk mengirim data lokasi ke server saat halaman dimuat
  sendLocationToServer();
  document.location.href = '../../';
</script>