<?php
error_reporting(1);
// =======================================
// CHECK ACTIVE MENU SIDEBAR
// =======================================

// MENU ACTIVE HOME
if ($_GET["pages"] === "home" or $_GET["pages"] === "welcome") {
  $homeActive1 = "active-sidebar";
}

// MENU ACTIVE PAGE COMPONENT
if (
  $_GET["pages"] === "news" or
  $_GET["pages"] === "work-program"
) {
  $componentActive = "active-sidebar";
}

// ACTIVE PUBLICATION
if (
  $_GET["pages"] === "news"
) {
  $newsActive = "active-sidebar-list";
}
if (
  $_GET["pages"] === "work-program"
) {
  $workProgramActive = "active-sidebar-list";
}

// MENU ACTIVE PAGE SISTEM
if (
  $_GET["pages"] === "gallery" or
  $_GET["pages"] === "team"
) {
  $pageSystemActive = "active-sidebar";
}

if (
  $_GET["pages"] === "gallery"
) {
  $galleryActive = "active-sidebar-list";
}
if (
  $_GET["pages"] === "team"
) {
  $teamActive = "active-sidebar-list";
}


if (
  $_GET["pages"] === "contact" or
  $_GET["pages"] === "about" or
  $_GET["pages"] === "informations"
) {
  $settingsAppActive = "active-sidebar";
}

if (
  $_GET["pages"] === "contact"
) {
  $contactActive = "active-sidebar-list";
}

if (
  $_GET["pages"] === "about"
) {
  $aboutActive = "active-sidebar-list";
}

if (
  $_GET["pages"] === "informations"
) {
  $informationsActive = "active-sidebar-list";
}

// MENU ACTIVE ACCOUNT USER
if (
  $_GET["pages"] === "users" or
  $_GET["pages"] === "users-add-success" or
  $_GET["pages"] === "users-edit-success" or
  $_GET["pages"] === "users-deleted-success"
) {
  $AccountUserActive = "active-sidebar";
}

// MENU ACTIVE ACCOUNT
if (
  $_GET["pages"] === "profile"
) {
  $AccountActive = "active-sidebar";
}

?>
<aside id="sidebar" class="sidebar">

  <ul class="sidebar-nav" id="sidebar-nav">

    <li class="nav-heading">Umum</li>
    <li class="nav-item <?= $homeActive1; ?>">
      <a class="nav-link" href="<?= $url; ?>admin/dashboard/home">
        <i class="bi bi-grid"></i>
        <span>Dashboard</span>
      </a>
    </li>


    <?php if ($rowSession["level"] === $levelSuperAdmin or $rowSession["level"] === $levelAdmin) : ?>
      <li class="nav-heading">Komponen</li>

      <li class="nav-item">
        <a class="nav-link <?= $componentActive; ?> collapsed" data-bs-target="#page-component" data-bs-toggle="collapse" href="#">
          <i class="bi bi-journals"></i><span>Publikasi</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="page-component" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li class="<?= $newsActive; ?>">
            <a href="<?= $url; ?>admin/dashboard/news/page/1">
              <i class="bi bi-circle"></i><span>Berita</span>
            </a>
          </li>

          <li class="<?= $workProgramActive; ?>">
            <a href="<?= $url; ?>admin/dashboard/work-program/page/1">
              <i class="bi bi-circle"></i><span>Program Kerja</span>
            </a>
          </li>
        </ul>

      </li>
    <?php endif; ?>

    <?php if ($rowSession["level"] === "superadmin") : ?>
      <li class="nav-heading">Sistem</li>

      <li class="nav-item">
        <a class="nav-link <?= $pageSystemActive; ?> collapsed" data-bs-target="#page-website-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-globe"></i><span>Halaman Aplikasi</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="page-website-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li class="<?= $galleryActive; ?>">
            <a href="<?= $url; ?>admin/dashboard/gallery">
              <i class="bi bi-circle"></i><span>Galeri</span>
            </a>
          </li>
          <li class="<?= $teamActive; ?>">
            <a href="<?= $url; ?>admin/dashboard/team">
              <i class="bi bi-circle"></i><span>Tim</span>
            </a>
          </li>
        </ul>

      </li>

      <li class="nav-item">
        <a class="nav-link <?= $settingsAppActive; ?> collapsed" data-bs-target="#page-setting-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-gear"></i><span>Pengaturan Aplikasi</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="page-setting-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li class="<?= $contactActive; ?>">
            <a href="<?= $url; ?>admin/dashboard/contact">
              <i class="bi bi-circle"></i><span>Info Kontak Aplikasi</span>
            </a>
          </li>
          <li class="<?= $aboutActive; ?>">
            <a href="<?= $url; ?>admin/dashboard/about">
              <i class="bi bi-circle"></i><span>Info Tentang Aplikasi</span>
            </a>
          </li>
          <li class="<?= $informationsActive; ?>">
            <a href="<?= $url; ?>admin/dashboard/informations">
              <i class="bi bi-circle"></i><span>Informasi</span>
            </a>
          </li>
        </ul>

      </li>
      <!-- End Components Nav -->
    <?php endif; ?>


    <li class="nav-heading">Akun</li>

    <?php if ($rowSession["level"] === $levelSuperAdmin or $rowSession["level"] === $levelAdmin) : ?>
      <li class="nav-item <?= $AccountUserActive; ?>">
        <a class="nav-link" href="<?= $url; ?>admin/dashboard/users">
          <i class="bi bi-people"></i>
          <span>Akun User</span>
        </a>
      </li>
    <?php endif; ?>

    <li class="nav-item <?= $AccountActive; ?>">
      <a class="nav-link" href="<?= $url; ?>admin/dashboard/profile">
        <i class="bi bi-gear-fill"></i>
        <span>Pengaturan Akun</span>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#modalLogout">
        <i class="bi bi-box-arrow-right"></i>
        <span>Keluar</span>
      </a>
    </li>

  </ul>

</aside>


<!-- Modals Sidebar -->
<div class="modal fade" id="modalAppointments" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Pilih Jenis Pasien</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row m-2">
          <a href="appointments-bpjs" class="col-md-6 btn bg-purple-1 text-light">Pasien BPJS</a>
          <a href="appointments-umum" class=" col-md-6 btn bg-purple-1 text-light">Pasien Umum</a>
        </div>
        <div class="row m-2">
          <a href="appointments-inhealth" class=" col-md-6 btn bg-purple-1 text-light">Pasien InHealth</a>
          <a href="appointments-pln" class=" col-md-6 btn bg-purple-1 text-light">Pasien Karyawan PLN</a>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
      </div>
    </div>
  </div>
</div>