<main id="main" class="main">

  <!-- PAGE TITLE -->
  <div class="pagetitle">
    <h1><?= $pageTitle; ?></h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?= $url; ?>dashboard">Home</a></li>
        <li class="breadcrumb-item">Permissions</li>
        <li class="breadcrumb-item active"><?= $pageTitle; ?></li>
      </ol>
    </nav>
  </div>
  <!-- end PAGE TITLE -->

  <section class="section dashboard">
    <div class="row">
      <button class="btn btn-success" onclick="requestLocationPermission()">Izinkan Lokasi <i class="bi bi-geo-alt-fill"></i></button>
    </div>
  </section>

</main>