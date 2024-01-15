<header id="header" class="header fixed-top">
  <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

    <a href="<?= $url; ?>" class="logo d-flex align-items-center">
      <img src="<?= $logo; ?>" alt="Logo <?= $title; ?>">
      <h5><?= $shorTitle; ?></h5>
    </a>

    <nav id="navbar" class="navbar">
      <ul>
        <li>
          <a class="nav-link scrollto active" href="<?= $url; ?>#hero">
            <span class="bi bi-house-fill"></span> Beranda
          </a>
        </li>
        <li class="dropdown"><a class="nav-link scrollto" href="<?= $url; ?>#"><span>Profil</span> <i class="bi bi-chevron-down"></i></a>
          <ul>
            <li><a class="nav-link scrollto link-dropdown" href="<?= $url; ?>#" data-bs-toggle="modal" data-bs-target="#organizationStructurModal">Struktur Organisasi</a></li>
            <li><a class="nav-link scrollto link-dropdown" href="<?= $url; ?>#portfolio">Galeri</a></li>
            <li><a class="nav-link scrollto link-dropdown" href="<?= $url; ?>#contact">Kontak</a></li>
            <li><a class="nav-link scrollto link-dropdown" href="<?= $url; ?>#about">Tentang</a></li>
          </ul>
        </li>
        <li class="nav-link scrollto"><a class="nav-link scrollto" href="<?= $url; ?>#news"><span>Berita</span></a></li>
        <li class="nav-link scrollto"><a class="nav-link scrollto" href="<?= $url; ?>#team"><span>Tim</span></a></li>
        <li class="nav-link scrollto"><a class="nav-link scrollto" href="<?= $url; ?>work-program"><span>Program Kerja</span></a></li>

        <?php if (isset($_SESSION["login"])) : ?>
          <li class="nav-link scrollto"><a class="nav-link scrollto" href="<?= $url; ?>attendances"><span>Absensi</span></a></li>

          <li class="nav-link scrollto"><a class="nav-link scrollto" href="<?= $url; ?>documents"><span>Dokumen</span></a></li>
        <?php endif; ?>

        <?php if (!isset($_GET["search"])) : ?>
          <li><a class="nav-link scrollto" href="#" data-bs-toggle="modal" data-bs-target="#modalSearch"><span class="bi bi-search fs-6"></span></a></li>
        <?php endif; ?>

        <?php if (!isset($_SESSION["login"])) : ?>
          <li><a class="getstarted text-light scrollto" href="#" data-bs-toggle="modal" data-bs-target="#signModal">Login</a></li>
        <?php endif; ?>

        <?php if (isset($_SESSION["login"])) : ?>
          <li><a class="getstarted text-light scrollto" href="#" data-bs-toggle="modal" data-bs-target="#signModal"><?= $rowSession["full_name"]; ?></a></li>
        <?php endif; ?>
      </ul>
      <i class="bi bi-list mobile-nav-toggle"></i>
    </nav><!-- .navbar -->

  </div>
</header>