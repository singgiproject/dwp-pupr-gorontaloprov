<?php if (!isset($_GET["search"])) : ?>
  <!-- Modal Search -->
  <div class="modal fade" id="modalSearch" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="search search-modal">
            <form class="fixed-form" action="<?= $url; ?>" method="get">
              <img src="<?= $logo; ?>" alt="" class="logo-search">
              <div class="input-group flex-nowrap">
                <input type="search" class="form-control search-input" placeholder="Cari berita..." aria-label="Username" name="query" aria-describedby="addon-wrapping" value="<?= str_replace("-", " ", $_GET["search"]); ?>" autocomplete="off">
                <button type="button" id="voiceBtn" class="input-group-text" onclick="startDictation()"><i class="bi bi-mic-fill"></i></button>
                <button type="submit" name="search" class="input-group-text" id="addon-wrapping"><i class="bi bi-search"></i></button>
              </div>
              <!-- Suggestions Container -->
              <div id="suggestions-container" class="suggestions-container"></div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php endif; ?>

<!-- Organization Sturctur -->
<div class="modal fade modal-lg organization-structur" id="organizationStructurModal" tabindex="-1" aria-labelledby="organizationStructurModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="organizationStructurModalLabel">Struktur Organisasi</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <?php foreach ($organization as $row) : ?>
          <img src="<?= $url; ?>assets/img/gallery/<?= $row["gambar"]; ?>" alt="" width="100%">
        <?php endforeach; ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal View Detail About-->
<div class="modal fade" id="modalDetailAbout" tabindex="-1" aria-labelledby="modalDetailAboutLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="modalDetailAboutLabel">Tentang - <?= $title; ?></h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <img src="<?= $url; ?>assets/img/about/<?= $rowAbout["image"]; ?>?img=<?= time(); ?>" class="img-fluid animated" alt="" width="300px" style="border-radius:10px;float: left;margin-right:20px;margin-bottom:10px;">
        <?= $rowAbout["description"]; ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
      </div>
    </div>
  </div>
</div>


<?php if (!isset($_SESSION["login"])) : ?>
  <!-- Modal auth -->
  <div class="modal fade" id="signModal" tabindex="-1" aria-labelledby="organizationStucturModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="d-grid gap-2 col-6 mx-auto">
            <a href="<?= $url; ?>auth/login" class="btn btn-success" type="button">Login</a>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
        </div>
      </div>
    </div>
  </div>
<?php endif; ?>


<?php if (isset($_SESSION["login"])) : ?>
  <!-- Modal profile -->
  <div class="modal fade" id="signModal" tabindex="-1" aria-labelledby="organizationStucturModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="d-grid gap-2 col-6 mx-auto">
            <a href="<?= $url; ?>auth/login" class="btn btn-success" type="button">Profil Saya</a>
            <a href="<?= $url; ?>auth/logout" class="btn btn-danger" type="button">Keluar</a>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
        </div>
      </div>
    </div>
  </div>
<?php endif; ?>