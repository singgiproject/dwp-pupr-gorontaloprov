<?php
// ========================================
// BANNER CAROUSEL
// ========================================
// === CHECK BANNER CAROUSEL SUCCESS ADD ===
if (isset($_POST["add_banner_carousel"])) {
  if (addBannerCarousel($_POST) > 0) {
    echo "
    <script>
      alert('Data berhasil ditambahkan!');
      document.location.href = 'banner-carousel';
    </script>
    ";
  }
}


// === CHECK BANNER CAROUSEL SUCCESS UPDATE/EDIT ===
if (isset($_GET["id_banner_carousel"])) {
  $idBannerCarousel = base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode($_GET["id_banner_carousel"])))))))));
  $queryBannerCarousel = query("SELECT * FROM tb_carousel WHERE id = '$idBannerCarousel' ")[0];

  // VALIDATION URL
  if (empty($idBannerCarousel)) {
    header("Location:banner-carousel");
    exit;
  }

  if (base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode($idBannerCarousel)))))))))) {
    header("Location:banner-carousel");
    exit;
  }
}

if (isset($_POST["edit_banner_carousel"])) {
  if (editBannerCarousel($_POST) > 0) {
    echo "
    <script>
      alert('Data berhasil diubah!');
      document.location.href = 'banner-carousel';
    </script>
    ";
  }
}

// ========================================
// SERVICE
// ========================================
// === CHECK SERVICE SUCCESS ADD ===
if (isset($_POST["add_service"])) {
  if (addService($_POST) > 0) {
    echo "
    <script>
      alert('Data berhasil ditambahkan!');
      document.location.href = 'services';
    </script>
    ";
  }
}

// === CHECK SERVICE SUCCESS UPDATE/EDIT ===
if (isset($_GET["id_service"])) {
  $idService = base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode($_GET["id_service"])))))))));
  $queryService = query("SELECT * FROM tb_service WHERE id = '$idService' ")[0];

  // VALIDATION URL
  if (empty($idService)) {
    header("Location:services");
    exit;
  }

  if (base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode($idService)))))))))) {
    header("Location:services");
    exit;
  }
}

if (isset($_POST["edit_service"])) {
  if (editService($_POST) > 0) {
    echo "
    <script>
      alert('Data berhasil diubah!');
      document.location.href = 'services';
    </script>
    ";
  }
}


// ========================================
// VISI & MISI
// ========================================
// === CHECK VISI & MISI SUCCESS ADD ===
if (isset($_POST["add_visi_misi"])) {
  if (addVisiMisi($_POST) > 0) {
    echo "
    <script>
      alert('Data berhasil ditambahkan!');
      document.location.href = 'visi-misi';
    </script>
    ";
  }
}

// === CHECK VISI MISI SUCCESS UPDATE/EDIT ===
if (isset($_GET["id_visi_misi"])) {
  $idVisiMisi = base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode($_GET["id_visi_misi"])))))))));
  $queryVisiMisi = query("SELECT * FROM tb_visi_misi WHERE id = '$idVisiMisi' ")[0];

  // VALIDATION URL
  if (empty($idVisiMisi)) {
    header("Location:visi-misi");
    exit;
  }

  if (base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode($idVisiMisi)))))))))) {
    header("Location:visi-misi");
    exit;
  }
}

if (isset($_POST["edit_visi_misi"])) {
  if (editVisiMisi($_POST) > 0) {
    echo "
    <script>
      alert('Data berhasil diubah!');
      document.location.href = 'visi-misi';
    </script>
    ";
  }
}

// ========================================
// CATEGORY
// ========================================
// === CHECK CATEGORY SUCCESS ADD ===
if (isset($_POST["add_category"])) {
  if (addCategory($_POST) > 0) {
    echo "
    <script>
      alert('Data Kategori Baru Berhasil Ditambahkan!');
      document.location.href = '';
    </script>
    ";
  }
}

// ========================================
// GALLERY
// ========================================
// === CHECK GALLERY SUCCESS ADD ===
if (isset($_POST["add_gallery"])) {
  if (addGallery($_POST) > 0) {
    echo "
    <script>
      alert('Data Berhasil Ditambahkan!');
      document.location.href = 'gallery';
    </script>
    ";
  }
}

// === CHECK GALLERY SUCCESS UPDATE/EDIT ===
if (isset($_GET["id_gallery"])) {
  $idGallery = base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode($_GET["id_gallery"])))))))));
  $queryGallery = query("SELECT * FROM tb_gallery WHERE id = '$idGallery' ")[0];

  // VALIDATION URL
  if (empty($idGallery)) {
    header("Location:gallery");
    exit;
  }

  if (base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode($idGallery)))))))))) {
    header("Location:gallery");
    exit;
  }
}

if (isset($_POST["edit_gallery"])) {
  if (editGallery($_POST) > 0) {
    echo "
    <script>
      alert('Data berhasil diubah!');
      document.location.href = 'gallery';
    </script>
    ";
  }
}


// ========================================
// TESTIMONIAL
// ========================================
// === CHECK TESTIMONIAL SUCCESS UPDATE/EDIT ===
if (isset($_GET["id_testimonial"])) {
  $idTestimonial = base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode($_GET["id_testimonial"])))))))));
  $queryTestimonial = query("SELECT * FROM tb_testimonial WHERE id = '$idTestimonial' ")[0];

  // VALIDATION URL
  if (empty($idTestimonial)) {
    header("Location:testimonial");
    exit;
  }

  if (base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode($idTestimonial)))))))))) {
    header("Location:testimonial");
    exit;
  }
}

if (isset($_POST["edit_testimonial"])) {
  if (editTestimonial($_POST) > 0) {
    echo "
    <script>
      alert('Data berhasil diubah!');
      document.location.href = 'testimonial';
    </script>
    ";
  }
}


// ========================================
// USERS PROFILE
// ========================================
// === CHECK USERS PROFILE SUCCESS UPDATE/EDIT ===
if (isset($_GET["my_account"])) {
  $idAccount = base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode($_GET["my_account"])))))))));
  $queryAccount = query("SELECT * FROM tb_users WHERE id = '$idAccount' ")[0];

  // VALIDATION URL
  if (empty($idAccount)) {
    header("Location:javascript:window.history.go(-2)");
    exit;
  }

  if (base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode($idAccount)))))))))) {
    header("Location:javascript:window.history.go(-2)");
    exit;
  }

  // CHANGE PROFILE
  if (isset($_POST["edit_profile"])) {
    if (editProfile($_POST) > 0) {
      echo "
      <script>
        alert('Data berhasil diubah!');
        document.location.href = '';
      </script>
      ";
    }
  }

  // query password old
  $passwordOld = $_POST["password_old"];

  // CHANGE PASSWORD
  if (isset($_POST["edit_password"])) {
    if ($passwordOld !== $queryAccount["password2"]) {
      echo "
      <script>
        alert('Kata sandi saat ini tidak sesuai!');
        document.location.href = '';
      </script>
      ";
    } else {
      if (editPassword($_POST) > 0) {
        echo "
      <script>
        alert('Kata sandi berhasil diubah!. Silahkan Masuk Kembali');
        document.location.href = '../auth/logout';
      </script>
      ";
      }
    }
  }
}



// ========================================
// TEAM
// ========================================
// === CHECK TEAM SUCCESS ADD ===
if (isset($_POST["add_team"])) {
  if (addTeam($_POST) > 0) {
    echo "
    <script>
      alert('Data berhasil ditambahkan!');
      document.location.href = 'team';
    </script>
    ";
  }
}

// === CHECK TEAM SUCCESS UPDATE/EDIT ===
if (isset($_GET["id_team"])) {
  $idTeam = base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode($_GET["id_team"])))))))));
  $queryTeam = query("SELECT * FROM tb_team WHERE id = '$idTeam' ")[0];

  // VALIDATION URL
  if (empty($idTeam)) {
    header("Location:team");
    exit;
  }

  if (base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode($idTeam)))))))))) {
    header("Location:team");
    exit;
  }
}

if (isset($_POST["edit_team"])) {
  if (editTeam($_POST) > 0) {
    echo "
    <script>
      alert('Data berhasil diubah!');
      document.location.href = 'team';
    </script>
    ";
  }
}


// ========================================
// ABOUT
// ========================================
// === CHECK ABOUT SUCCESS ADD ===
if (isset($_POST["add_about"])) {
  if (addAbout($_POST) > 0) {
    echo "
    <script>
      alert('Data berhasil ditambahkan!');
      document.location.href = 'about';
    </script>
    ";
  }
}

// === CHECK ABOUT SUCCESS UPDATE/EDIT ===
if (isset($_GET["id_about"])) {
  $idAbout = base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode($_GET["id_about"])))))))));
  $queryAbout = query("SELECT * FROM tb_about WHERE id = '$idAbout' ")[0];

  // VALIDATION URL
  if (empty($idAbout)) {
    header("Location:about");
    exit;
  }

  if (base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode($idAbout)))))))))) {
    header("Location:about");
    exit;
  }
}

if (isset($_POST["edit_about"])) {
  if (editAbout($_POST) > 0) {
    echo "
    <script>
      alert('Data berhasil diubah!');
      document.location.href = 'about';
    </script>
    ";
  }
}
