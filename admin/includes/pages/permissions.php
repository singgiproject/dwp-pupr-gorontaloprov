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

// === INCLUDES ===
include("../../../includes/account/level.php");
include("../../../includes/table/query.php");
include("../../../includes/visitor/counter.php");
include("../../../includes/count/counts.php");
include("../../../includes/logic/time-ago.php");
include("../../../includes/logic/shuffle.php");
include("../../../includes/head/data-head.php");
include("../../../includes/logic/date-id.php");
include("../../../includes/date/date.php");

if ($_GET["permissions"] === "locations") {
  $pageTitle = "Izinkan Lokasi Anda";
}

?>
<!DOCTYPE html>
<html lang="en">

<?php include("../../includes/templates/head.php"); ?>

<body class="toggle-sidebar">

  <!-- ======= Header ======= -->
  <?php include("../templates/header.php"); ?>
  <!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <?php include("../templates/sidebar.php"); ?>
  <!-- End Sidebar-->

  <?php if ($_GET["permissions"] === "locations") : ?>
    <!-- ======= Get Location ======= -->
    <?php include("../templates/get-locations.php"); ?>
    <!-- End Get Location -->
  <?php endif; ?>

  <!-- ======= Footer ======= -->
  <?php include("../templates/footer.php"); ?>
  <!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <?php if ($rowSession["level"] !== $levelSuperAdmin) : ?>
    <?php include("../templates/chat.php"); ?>
  <?php endif; ?>

  <?php include("../templates/modals.php"); ?>

  <?php include("../templates/javascripts.php"); ?>

  <!-- Template Main JS File Loading Animation-->
  <script src="<?= $url; ?>assets/js/jquery.min.js"></script>
  <script src="<?= $url; ?>assets/js/welcome-loading.js"></script>

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
              window.location.href = "<?= $url ?>admin/includes/pages/send-location.php";
            } else if (permissionStatus.state === 'prompt') {
              // Izin belum diberikan, pengguna harus memberikan izin
              permissionStatus.onchange = function() {
                if (permissionStatus.state === 'granted') {
                  window.location.href = "<?= $url ?>admin/includes/pages/send-location.php";
                } else {
                  alert("Anda harus memberikan izin lokasi untuk mengakses situs ini.");
                }
              };
              navigator.geolocation.getCurrentPosition(function() {
                // Izin diberikan
                window.location.href = "<?= $url ?>admin/includes/pages/send-location.php";
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
        window.location.href = "<?= $url ?>admin/includes/pages/send-location.php";
      }
    }
  </script>


</body>

</html>