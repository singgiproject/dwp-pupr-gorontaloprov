<?php
session_start();
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

  <?php if (isset($_SESSION["login"])) : ?>
    <!-- Splash Screen Login-->
    <div class="splash-screen-login">
      <h1 class="logo-header">
        <!-- <img src="<?= $logo; ?>" class="logo"> -->
        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="margin: auto;/* background: rgb(241, 242, 243); */display: block;" width="144px" height="144px" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid" class="logo">
          <circle cx="50" cy="50" r="28" stroke="#11b468" stroke-width="10" fill="none"></circle>
          <circle cx="50" cy="50" r="28" stroke="#fcee23" stroke-width="8" stroke-linecap="round" fill="none">
            <animateTransform attributeName="transform" type="rotate" repeatCount="indefinite" dur="1.5384615384615383s" values="0 50 50;180 50 50;720 50 50" keyTimes="0;0.5;1"></animateTransform>
            <animate attributeName="stroke-dasharray" repeatCount="indefinite" dur="1.5384615384615383s" values="17.59291886010284 158.33626974092556;63.33450789637023 112.59468070465817;17.59291886010284 158.33626974092556" keyTimes="0;0.5;1"></animate>
          </circle>
        </svg>
        <h4 class="logo text-loading">Berhasil login...</h4>
      </h1>
    </div>
    <!-- //END Splash Screen Login -->
  <?php endif; ?>

  <?php if (!isset($_SESSION["login"])) : ?>
    <!-- Splash Screen Landing -->
    <div class="splash-screen-landing">
      <h1 class="logo-header">
        <img src="<?= $logo; ?>" class="logo">
        <h4 class="logo text-loading">Selamat datang!</h4>
      </h1>
    </div>
    <!-- //END Splash Screen Landing -->
  <?php endif; ?>


  <!-- ======= Header ======= -->
  <?php include("includes/frontend/templates/header.php"); ?>
  <!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <?php include("includes/frontend/templates/hero.php"); ?>
  <!-- End Hero -->

  <main id="main">
    <!-- ======= About Section ======= -->
    <?php include("includes/frontend/templates/about.php"); ?>
    <!-- End About Section -->

    <!-- ======= News Section ======= -->
    <?php include("includes/frontend/templates/news.php"); ?>
    <!-- End News Section -->

    <!-- ======= Team Section ======= -->
    <?php include("includes/frontend/templates/team.php"); ?>
    <!-- End Team Section -->

    <!-- ======= Videos Section ======= -->

    <!-- End Videos Section -->

    <!-- ======= Gallery Section ======= -->
    <?php include("includes/frontend/templates/gallery.php"); ?>
    <!-- End Gallery Section -->

    <!-- ======= Counts Section ======= -->
    <?php include("includes/frontend/templates/counts.php"); ?>
    <!-- End Counts Section -->

    <!-- ======= Contact Section ======= -->
    <?php include("includes/frontend/templates/contact.php"); ?>
    <!-- End Contact Section -->

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

</body>

</html>