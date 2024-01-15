<?php
session_start();
if (!isset($_SESSION["login"])) {
  header("Location:auth/login");
  exit;
}
// CONNECT FUNCTIONS
require('funct/functions.php');

// SESSION USER LOGIN
if (isset($_SESSION["login"])) {
  $userSession = $_SESSION["username"];
  $resultSession = $conn->query("SELECT * FROM tb_users WHERE username = '$userSession' ");
  $rowSession = mysqli_fetch_assoc($resultSession);
  $idSession = $rowSession["id"];
}

// === INCLUDES ===
include("includes/table/query.php");
include("includes/visitor/counter.php");
include("includes/count/counts.php");
include("includes/logic/date-id.php");
include("includes/logic/day-id.php");
include("includes/date/date.php");

?>
<!DOCTYPE html>
<html lang="en">

<!-- head -->
<?php include("includes/head/head.php"); ?>

<body>

  <!-- ======= Header ======= -->
  <?php include("includes/frontend/templates/header.php"); ?>
  <!-- End Header -->

  <main id="main">
    <!-- ======= permissions Section ======= -->
    <?php include("includes/frontend/templates/get-permissions.php"); ?>
    <!-- End permissions Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <?php include("includes/frontend/templates/footer.php"); ?>
  <!-- End Footer -->

  <!-- ======= Mobile ======= -->
  <?php include("includes/frontend/mobile/bottom-bar.php"); ?>
  <!-- End Mobile -->

  <!-- ======= Modals ======= -->
  <?php include("includes/frontend/alerts/modals.php"); ?>
  <!-- ======= end Modal ======= -->


  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- ======= Inlcude Javascript in file PHP  ======= -->
  <?php include("includes/frontend/templates/javascripts.php"); ?>
  <!-- ======= end Inlcude Javascript in file PHP  ======= -->


  <!-- Request Location -->
  <script>
    function requestLocationPermission() {
      if (navigator.permissions) {
        navigator.permissions.query({
            name: 'geolocation'
          })
          .then(function(permissionStatus) {
            if (permissionStatus.state === 'granted') {
              // Izin sudah diberikan, lanjutkan ke ...
              window.location.href = "<?= $url ?>send-location.php";
            } else if (permissionStatus.state === 'prompt') {
              // Izin belum diberikan, pengguna harus memberikan izin
              permissionStatus.onchange = function() {
                if (permissionStatus.state === 'granted') {
                  window.location.href = "<?= $url ?>send-location.php";
                } else {
                  alert("Anda harus memberikan izin lokasi untuk mengakses situs ini.");
                }
              };
              navigator.geolocation.getCurrentPosition(function() {
                // Izin diberikan
                window.location.href = "<?= $url ?>send-location.php";
              }, function() {
                // Izin ditolak
                alert("Anda harus memberikan izin lokasi untuk mengakses situs ini.");
              });
            } else {
              // Izin ditolak, arahkan ke halaman lain atau tampilkan pesan error
              alert("Anda harus memberikan izin lokasi untuk mengakses situs ini.");
            }
          })
          .catch(function(error) {
            console.error("Error requesting location permission:", error);
          });
      } else {
        // Navigator.permissions tidak didukung, lanjutkan ke ...
        window.location.href = "<?= $url ?>send-location.php";
      }
    }
  </script>

</body>

</html>