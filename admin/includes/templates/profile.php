<main id="main" class="main">

  <!-- PAGE TITLE -->
  <div class="pagetitle">
    <h1><?= $pageTitle; ?></h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?= $url; ?>dashboard">Home</a></li>
        <li class="breadcrumb-item active"><?= $pageTitle; ?></li>
      </ol>
    </nav>
  </div>
  <!-- End PAGE TITLE -->

  <section class="section profile">
    <div class="row">
      <div class="col-xl-4">

        <div class="card">
          <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

            <img src="<?= $url; ?>assets/img/users/<?= $rowSession["gambar"]; ?>" alt="Profile" class="rounded-circle">
            <h2>
              <center><?= $rowSession["full_name"]; ?></center>
            </h2>
            <h3>
              <?php if ($levelSuperAdmin === $rowSession["level"]) : ?>
                Super Admin
              <?php endif; ?>
              <?php if ($rowSession["level"] === $levelAdmin) : ?>
                Admin
              <?php endif; ?>
              <?php if ($rowSession["level"] === $levelUser) : ?>
                User
              <?php endif; ?>
            </h3>
          </div>
        </div>

      </div>

      <div class="col-xl-8">

        <div class="card">
          <div class="card-body pt-3">
            <!-- Bordered Tabs -->
            <ul class="nav nav-tabs nav-tabs-bordered">

              <li class="nav-item">
                <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview"><i class="bi bi-list-columns-reverse"></i> Ringkasan</button>
              </li>

              <li class="nav-item">
                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit"><i class="bi bi-person-fill"></i> Ubah Profil</button>
              </li>

              <li class="nav-item">
                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password"><i class="bi bi-lock-fill"></i> Ubah Kata Sandi</button>
              </li>

            </ul>
            <div class="tab-content pt-2">

              <div class="tab-pane fade show active profile-overview" id="profile-overview">

                <h5 class="card-title">Profil Lengkap</h5>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label ">Nama Akun</div>
                  <div class="col-lg-9 col-md-8">
                    <?= $rowSession["full_name"]; ?>
                  </div>
                </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label ">Nama Pengguna</div>
                  <div class="col-lg-9 col-md-8">
                    <?= $rowSession["username"]; ?>
                  </div>
                </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label ">Level Akun</div>
                  <div class="col-lg-9 col-md-8">
                    <?php if ($levelSuperAdmin === $rowSession["level"]) : ?>
                      Super Admin
                    <?php endif; ?>
                    <?php if ($rowSession["level"] === $levelAdmin) : ?>
                      Admin
                    <?php endif; ?>
                    <?php if ($rowSession["level"] === $levelUser) : ?>
                      User
                    <?php endif; ?>
                  </div>
                </div>

              </div>

              <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                <!-- Profile Edit Form -->
                <div class="card-body">
                  <!-- Custom Styled Validation (Name)-->
                  <form action="" class="row g-3 needs-validation" method="post" enctype="multipart/form-data" novalidate>
                    <input type="text" hidden name="id" value="<?= base64_encode(base64_encode(base64_encode(base64_encode(base64_encode(base64_encode(base64_encode(base64_encode(base64_encode($rowSession["id"]))))))))); ?>">
                    <input type="text" hidden name="old_file" value="<?= $rowSession["gambar"]; ?>">
                    <div class="col-md-12">
                      <label for="full_name" class="form-label">Nama Akun</label>
                      <input type="text" class="form-control" name="full_name" id="full_name" required placeholder="Nama Akun" value="<?= $rowSession["full_name"]; ?>">
                      <div class="invalid-feedback">
                        Harap Berikan Nama Akun
                      </div>
                    </div>
                    <div class="col-md-12">
                      <label for="username" class="form-label">Nama Pengguna</label>
                      <input type="text" class="form-control" name="username" id="username" required placeholder="Nama pengguna" value="<?= $rowSession["username"]; ?>">
                      <div class="invalid-feedback">
                        Harap Berikan Nama Pengguna
                      </div>
                    </div>

                    <div class="col-md-12">
                      <label for="fileInputImg" class="custom-file-upload form-label">
                        <i class="fas fa-cloud-upload-alt"></i> Pilih Gambar
                      </label>
                      <br>
                      <input type="file" class="form-control" name="gambar" id="fileInputImg" accept="image/*">
                      <small>
                        Format File : <strong>jpg, jpeg, png</strong> dengan ukuran Maks : <strong>1 MB</strong>
                      </small>

                      <div class="preview">
                        <img id="previewImage" src="#" alt="Preview Gambar" />
                      </div>
                    </div>
                    <div class="col-12">
                      <button class="btn bg-purple-1 text-white" type="submit" name="edit_profile"><i class="bi bi-save"></i> Simpan</button>
                    </div>
                  </form>
                  <!-- End Custom Styled Validation (Name)-->
                </div>

              </div>

              <div class="tab-pane fade pt-3" id="profile-change-password">
                <!-- Change Password Form -->
                <form action="" class="row g-3 needs-validation" method="post" enctype="multipart/form-data" novalidate>
                  <input type="text" hidden name="id" value="<?= base64_encode(base64_encode(base64_encode(base64_encode(base64_encode(base64_encode(base64_encode(base64_encode(base64_encode($rowSession["id"]))))))))); ?>">
                  <div class="col-md-12">
                    <label for="password_old" class="form-label">Kata Sandi Saat Ini</label>
                    <input type="password" class="form-control" name="password_old" id="password_old" required placeholder="Kata Sandi Saat Ini">
                    <div class="invalid-feedback">
                      Harap Berikan Kata Sandi Saat Ini
                    </div>
                  </div>
                  <div class="col-md-12">
                    <label for="password" class="form-label">Kata Sandi Baru</label>
                    <input type="password" class="form-control" name="password" id="password" required placeholder="Kata Sandi Baru">
                    <div class="invalid-feedback">
                      Harap Berikan Kata Sandi Baru
                    </div>
                  </div>
                  <div class="col-md-12">
                    <label for="password2" class="form-label">Konfirmasi Kata Sandi Baru</label>
                    <input type="password" class="form-control" name="password2" id="password2" required placeholder="Konfirmasi Kata Sandi Baru">
                    <div class="invalid-feedback">
                      Harap Berikan Konfirmasi Kata Sandi Baru
                    </div>
                  </div>
                  <div class="col-12">
                    <button class="btn bg-purple-1 text-white" type="submit" name="edit_password"><i class="bi bi-save"></i> Simpan</button>
                  </div>
                </form>
                <!-- End Change Password Form -->

              </div>

            </div><!-- End Bordered Tabs -->

          </div>
        </div>

      </div>
    </div>
  </section>

</main>

<!-- === CONDITION DATA === -->
<?php if (isset($_POST["edit_profile"])) : ?>
  <?php if (editProfile($_POST) > 0) : ?>
    <script>
      alert('Profil Berhasil Diubah');
      document.location.href = '';
    </script>
  <?php endif; ?>
<?php endif; ?>

<?php if (isset($_POST["edit_password"])) : ?>
  <?php if ($rowSession["password2"] !== $_POST["password_old"]) : ?>
    <script>
      alert('Kata sandi saat ini tidak sesuai!');
      document.location.href = '';
    </script>
  <?php endif; ?>
  <?php if ($rowSession["password2"] === $_POST["password_old"]) : ?>
    <?php if (editPassword($_POST) > 0) : ?>
      <script>
        alert('Kata Sandi Berhasil Diubah');
        document.location.href = '';
      </script>
    <?php endif; ?>
  <?php endif; ?>
<?php endif; ?>