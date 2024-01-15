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

  <!-- Splash Screen -->
  <div class="splash-screen-attendances">
    <h1 class="logo-header">
      <!-- <img src="<?= $logo; ?>" class="logo"> -->
      <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="margin: auto;/* background: rgb(221, 221, 221); */display: block;" width="164px" height="164px" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid" class="logo">
        <g transform="translate(50 50)">
          <g transform="scale(0.72)">
            <g transform="translate(-50 -50)">
              <g>
                <animateTransform attributeName="transform" type="translate" repeatCount="indefinite" dur="1.639344262295082s" values="-20 -20;20 -20;0 20;-20 -20" keyTimes="0;0.33;0.66;1"></animateTransform>
                <path fill="#ffffff" d="M44.19 26.158c-4.817 0-9.345 1.876-12.751 5.282c-3.406 3.406-5.282 7.934-5.282 12.751 c0 4.817 1.876 9.345 5.282 12.751c3.406 3.406 7.934 5.282 12.751 5.282s9.345-1.876 12.751-5.282 c3.406-3.406 5.282-7.934 5.282-12.751c0-4.817-1.876-9.345-5.282-12.751C53.536 28.033 49.007 26.158 44.19 26.158z"></path>
                <path fill="#11b468" d="M78.712 72.492L67.593 61.373l-3.475-3.475c1.621-2.352 2.779-4.926 3.475-7.596c1.044-4.008 1.044-8.23 0-12.238 c-1.048-4.022-3.146-7.827-6.297-10.979C56.572 22.362 50.381 20 44.19 20C38 20 31.809 22.362 27.085 27.085 c-9.447 9.447-9.447 24.763 0 34.21C31.809 66.019 38 68.381 44.19 68.381c4.798 0 9.593-1.425 13.708-4.262l9.695 9.695 l4.899 4.899C73.351 79.571 74.476 80 75.602 80s2.251-0.429 3.11-1.288C80.429 76.994 80.429 74.209 78.712 72.492z M56.942 56.942 c-3.406 3.406-7.934 5.282-12.751 5.282s-9.345-1.876-12.751-5.282c-3.406-3.406-5.282-7.934-5.282-12.751 c0-4.817 1.876-9.345 5.282-12.751c3.406-3.406 7.934-5.282 12.751-5.282c4.817 0 9.345 1.876 12.751 5.282 c3.406 3.406 5.282 7.934 5.282 12.751C62.223 49.007 60.347 53.536 56.942 56.942z"></path>
              </g>
            </g>
          </g>
        </g>
      </svg>
      <h4 class="logo text-loading">Mengambil data anda...</h4>
    </h1>
  </div>
  <!-- //END Splash Screen -->

  <!-- ======= Header ======= -->
  <?php include("includes/frontend/templates/header.php"); ?>
  <!-- End Header -->

  <main id="main">
    <!-- ======= Attendances Section ======= -->
    <?php include("includes/frontend/templates/attendances.php"); ?>
    <!-- End Attendances Section -->

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




  <!-- Check Location -->
  <script>
    function checkLocationPermission() {
      if (navigator.permissions) {
        navigator.permissions.query({
            name: 'geolocation'
          })
          .then(function(permissionStatus) {
            if (permissionStatus.state !== 'granted') {
              // Izin belum diberikan, arahkan kembali ke permissions
              window.location.href = "<?= $url; ?>permissions";
            }
          })
          .catch(function(error) {
            console.error("Error checking location permission:", error);
          });
      }
    }

    // Panggil fungsi untuk memeriksa izin lokasi saat halaman dimuat
    checkLocationPermission();
  </script>

</body>

</html>