<?php
// CONNECT FUNCTIONS
require('../funct/functions.php');

// === INCLUDES ===
include("../includes/table/query.php");
include("../includes/visitor/counter.php");
include("../includes/count/counts.php");
include("../includes/date/date-id.php");
include("../includes/date/date.php");

// head
include("../includes/head/head.php");

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Website dalam pemeliharaan</title>
  <meta name="keywords" content="<?= $keywords; ?>">
  <meta name="description" content="<?= $description; ?>">
  <meta name="author" content="<?= $author; ?>">

  <!-- Favicons -->
  <link href="<?= $icon; ?>" rel="icon">
  <link href="<?= $icon; ?>" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- CDN BOOTSTRAP 5.3 (CSS) -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css?id=v<?= time(); ?>" rel="stylesheet">

  <!-- Fontawesome -->
  <link href="../assets/fontawesome/css/fontawesome.css" rel="stylesheet">
  <link href="../assets/fontawesome/css/brands.css" rel="stylesheet">
  <link href="../assets/fontawesome/css/solid.css" rel="stylesheet">

  <!-- Icon Bootstrap -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">

</head>

<body>

  <!-- ======= Messenger Plugin Obrolan Code ======= -->
  <?php include("../includes/plugins/messenger-live-chat.php"); ?>
  <!-- ======= end Messenger Plugin Obrolan Code ======= -->

  <div class="container">
    <div class="img-fix">
      <img src="../assets/img/logo/logo-deliyana2.png" alt="DALAM PERBAIKAN">
      <h1>Saat ini aplikasi <?= $title; ?> dalam pemeliharaan</h1>
      <h4>Mohon atas ketidaknyamanannya untuk sementara sistem aplikasi <?= $title; ?> Sedang Dalam perbaikan oleh Developer kami.</h4>
      <br>
      <p>by. Singgi Mokodompit</p>
    </div>
    <div class="contact-maintenence">
      <div class="row md-6 justify-content-center text-center">
        <h4>Anda juga dapat menghubungi kami melalui :</h4>
        <div class="col-md-2">
          <a href="https://wa.me/62082319514419?text=Assalamu'alaikum+saya+butuh+informasi.."><i class="bi bi-whatsapp"></i> WhatsApp</a>
        </div>
        <div class="col-md-2">
          <a href="https://www.instagram.com/deliyanadentalcare"><i class="bi bi-instagram"></i> Instagram</a>
        </div>
        <div class="col-md-2">
          <a href="https://t.me/deliyanadentalcare"><i class="bi bi-telegram"></i> Telegram</a>
        </div>
      </div>
    </div>
  </div>

  <!-- CDN BOOTSTRAP 5.3 (JS)  -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

</body>

</html>