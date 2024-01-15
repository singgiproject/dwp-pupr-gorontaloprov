<?php
session_start();

// CONNECT FUNCTIONS
require('../../../funct/functions.php');

// SESSION USER LOGIN
if (isset($_SESSION["login"])) {
  $userSession = $_SESSION["username"];
  $resultSession = $conn->query("SELECT * FROM tb_users WHERE username = '$userSession' ");
  $rowSession = mysqli_fetch_assoc($resultSession);
  $idSession = $rowSession["id"];
}

// === INCLUDES ===
include("../../../includes/table/query.php");
include("../../../includes/visitor/counter.php");
include("../../../includes/count/counts.php");
include("../../../includes/logic/date-id.php");
include("../../../includes/logic/day-id.php");
include("../../../includes/date/date.php");

?>
<!DOCTYPE html>
<html lang="en">

<!-- head -->
<?php include("../../../includes/head/head.php"); ?>

<body>

  <!-- Spinner Start -->
  <!-- <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50  align-items-center justify-content-center load-welcome">
    <img src="<?= $logo; ?>" alt="" class="loading-animation loading-logo">
    <p class="loading-text">Loading...</p>
    <p><?= $title; ?></p>
  </div> -->
  <!-- Spinner End -->

  <!-- ======= Header ======= -->
  <?php include("../../../includes/frontend/templates/header.php"); ?>
  <!-- End Header -->


  <main id="main">
    <!-- ======= Work Program ======= -->
    <?php include("../../../includes/frontend/templates/work-program.php"); ?>
    <!-- End Work Program -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <?php include("../../../includes/frontend/templates/footer.php"); ?>
  <!-- End Footer -->

  <!-- ======= Mobile ======= -->
  <?php include("../../../includes/frontend/mobile/bottom-bar.php"); ?>
  <!-- End Mobile -->

  <!-- ======= Modals ======= -->
  <?php include("../../../includes/frontend/alerts/modals.php"); ?>
  <!-- ======= end Modal ======= -->


  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- ======= Inlcude Javascript in file PHP  ======= -->
  <?php include("../../../includes/frontend/templates/javascripts.php"); ?>
  <!-- ======= end Inlcude Javascript in file PHP  ======= -->

</body>

</html>