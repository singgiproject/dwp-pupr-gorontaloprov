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

if ($rowSession["level"] === "user") {
  header("Location:../../");
  exit;
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
include("../../../includes/logic/day-id.php");
include("../../../includes/date/date.php");

// Page Title
if ($_GET["pages"] === "home" or $_GET["pages"] === "welcome") {
  $pageTitle = "Dashboard";
}

if ($_GET["pages"] === "locations") {
  $pageTitle = "Izinkan Lokasi Anda";
}

if ($_GET["pages"] === "services") {
  $pageTitle = "Layanan";
}
if ($_GET["pages"] === "gallery") {
  $pageTitle = "Galeri";
}
if ($_GET["pages"] === "team") {
  $pageTitle = "Tim";
}
if ($_GET["pages"] === "about") {
  $pageTitle = "Tentang";
}
if ($_GET["pages"] === "contact") {
  $pageTitle = "Kontak";
}
if ($_GET["pages"] === "informations") {
  $pageTitle = "Informasi";
}
if ($_GET["pages"] === "messages") {
  $pageTitle = "Pesan";
}
if ($_GET["pages"] === "profile") {
  $pageTitle = "Profil";
}

// ------ PAGE TITLE NEWS ------
if ($_GET["pages"] === "news") {
  $pageTitle = "Berita";
}
// ------ end PAGE TITLE NEWS ------

// ------ PAGE WORK PROGRAM ------
if ($_GET["pages"] === "work-program") {
  $pageTitle = "Program Kerja";
}
// ------ end PAGE WORK PROGRAM ------

// ------ PAGE DOCUMENTS ------
if ($_GET["pages"] === "documents") {
  $pageTitle = "Dokumen";
}
// ------ end PAGE DOCUMENTS ------

if ($_GET["pages"] === "users") {
  $pageTitle = "Akun User";
}


// Checked Url Manipulation
if (
  $_GET["pages"] !== "home" and
  $_GET["pages"] !== "welcome" and
  $_GET["pages"] !== "locations" and
  $_GET["pages"] !== "gallery" and
  $_GET["pages"] !== "team" and
  $_GET["pages"] !== "about" and
  $_GET["pages"] !== "contact" and
  $_GET["pages"] !== "informations" and
  $_GET["pages"] !== "messages" and
  $_GET["pages"] !== "profile" and
  $_GET["pages"] !== "news" and
  $_GET["pages"] !== "users" and
  $_GET["pages"] !== "work-program" and
  $_GET["pages"] !== "documents"
) {
  header("Location:home");
  exit;
}


?>
<!DOCTYPE html>
<html lang="en">

<?php include("../../includes/templates/head.php"); ?>

<body>

  <!-- ======= Header ======= -->
  <?php include("../templates/header.php"); ?>
  <!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <?php include("../templates/sidebar.php"); ?>
  <!-- End Sidebar-->

  <?php if ($_GET["pages"] === "home" or $_GET["pages"] === "welcome") : ?>
    <!-- ======= Dashboard ======= -->
    <?php include("../templates/dashboard.php"); ?>
    <!-- End Dashboard -->
  <?php endif; ?>

  <?php if (
    $_GET["pages"] === "news"
  ) : ?>
    <!-- ======= News ======= -->
    <?php include("../templates/news.php"); ?>
    <!-- End News -->
  <?php endif; ?>

  <?php if ($_GET["pages"] === "work-program") : ?>
    <!-- ======= Work Program ======= -->
    <?php include("../templates/work-program.php"); ?>
    <!-- End Work Program -->
  <?php endif; ?>

  <?php if ($_GET["pages"] === "documents") : ?>
    <!-- ======= Documents ======= -->
    <?php include("../templates/documents.php"); ?>
    <!-- End Documents -->
  <?php endif; ?>


  <?php if ($_GET["pages"] === "gallery") : ?>
    <!-- ======= Gallery ======= -->
    <?php include("../templates/gallery.php"); ?>
    <!-- End Gallery -->
  <?php endif; ?>

  <?php if ($_GET["pages"] === "team") : ?>
    <!-- ======= Team ======= -->
    <?php include("../templates/team.php"); ?>
    <!-- End Team -->
  <?php endif; ?>

  <?php if ($_GET["pages"] === "about") : ?>
    <!-- ======= About ======= -->
    <?php include("../templates/about.php"); ?>
    <!-- End About -->
  <?php endif; ?>

  <?php if ($_GET["pages"] === "contact") : ?>
    <!-- ======= Contact ======= -->
    <?php include("../templates/contact.php"); ?>
    <!-- End Contact -->
  <?php endif; ?>

  <?php if ($_GET["pages"] === "informations") : ?>
    <!-- ======= Informations ======= -->
    <?php include("../templates/informations.php"); ?>
    <!-- End Informations -->
  <?php endif; ?>

  <?php if ($_GET["pages"] === "users") : ?>
    <!-- ======= users ======= -->
    <?php include("../templates/users.php"); ?>
    <!-- End users -->
  <?php endif; ?>

  <?php if ($_GET["pages"] === "messages") : ?>
    <!-- ======= Messages ======= -->
    <?php include("../templates/messages.php"); ?>
    <!-- End Messages -->
  <?php endif; ?>

  <?php if ($_GET["pages"] === "profile") : ?>
    <!-- ======= Profile ======= -->
    <?php include("../templates/profile.php"); ?>
    <!-- End Profile -->
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

  <!-- Check Location -->
  <script>
    function checkLocationPermission() {
      if (navigator.permissions) {
        navigator.permissions.query({
            name: 'geolocation'
          })
          .then(function(permissionStatus) {
            if (permissionStatus.state !== 'granted') {
              // Izin belum diberikan, arahkan kembali ke index.php
              window.location.href = "<?= $url; ?>admin/permissions/locations";
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