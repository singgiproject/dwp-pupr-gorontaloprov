<?php
session_start();
if (!isset($_SESSION["login"])) {
  header("Location:login");
  exit;
}

require('../funct/functions.php');

// SESSION USER LOGIN
if (isset($_SESSION["login"])) {
  $userSession = $_SESSION["username"];
  $resultSession = $conn->query("SELECT * FROM tb_users WHERE username = '$userSession' ");
  $rowSession = mysqli_fetch_assoc($resultSession);
  $idSession = $rowSession["id"];
}


include("proses-login.php");
include("../includes/account/level.php");
include("../includes/table/query.php");
include("../includes/head/data-head.php");

$pageTitle = "Register";

?>
<!DOCTYPE html>
<html lang="en">

<?php include("../admin/includes/templates/head.php"); ?>

<body class="body-sign-image">

  <?php if ($rowSession["level"] === $levelUser) : ?>
    <script>
      document.location.href = '<?= $url ?>admin/dashboard/home';
    </script>
  <?php endif ?>

  <main>
    <div class="container sign">

      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-6 col-md-7 d-flex flex-column align-items-center justify-content-center">

              <div class="mb-3 mt-5 card-sign">

                <div class="card-body">

                  <div class="d-flex justify-content-center">
                    <a href="<?= $url; ?>" class="align-items-center w-auto card-sign-logo">
                      <img src="<?= $logo; ?>" alt="Logo <?= $title; ?>" width="100">
                    </a>
                  </div>

                  <div class="pt-2 pb-3">
                    <h5 class="card-title text-center pb-0 fs-4"><?= $pageTitle; ?> Akun</h5>
                  </div>

                  <form action="register-success" class="row g-3 needs-validation" novalidate method="post">
                    <div class="col-12">
                      <div class="input-group has-validation">
                        <span class="input-group-text" id="inputGroupPrepend"><i class="bi bi-gear-fill"></i></span>
                        <div class="form-floating">
                          <select name="level" id="level" class="form-control" required>
                            <?php if ($rowSession["level"] === $levelSuperAdmin) : ?>
                              <option value="">--- Pilih Level User ---</option>
                              <option value="admin">Admin</option>
                              <option value="user">User</option>
                            <?php endif; ?>
                            <?php if ($rowSession["level"] === $levelAdmin) : ?>
                              <option value="user">User</option>
                            <?php endif; ?>
                          </select>
                          <label for="floatingInputGroup1">Level User</label>
                          <div class="invalid-feedback">Pilih level user.</div>
                        </div>
                      </div>
                    </div>

                    <div class="col-12">
                      <div class="input-group has-validation">
                        <span class="input-group-text" id="inputGroupPrepend"><i class="bi bi-person-fill"></i></span>
                        <div class="form-floating">
                          <input type="text" class="form-control" id="full_name" name="full_name" placeholder="Nama Lengkap" autofocus required>
                          <label for="floatingInputGroup1">Nama Lengkap</label>
                          <div class="invalid-feedback">Harap masukan nama lengkap.</div>
                        </div>
                      </div>
                    </div>


                    <div class="col-12">
                      <div class="input-group has-validation">
                        <span class="input-group-text" id="inputGroupPrepend"><i class="bi bi-telephone-fill"></i></span>
                        <div class="form-floating">
                          <input type="text" class="form-control" id="no_hp" name="no_hp" placeholder="Nomor HP" required maxlength="15" minlength="8">
                          <label for="floatingInputGroup1">Nomor HP</label>
                          <div class="invalid-feedback">Nomor HP Tidak Valid.</div>
                        </div>
                      </div>
                    </div>

                    <div class="col-12">
                      <div class="input-group has-validation">
                        <span class="input-group-text" id="inputGroupPrepend"><i class="bi bi-envelope-fill"></i></span>
                        <div class="form-floating">
                          <input type="email" class="form-control" id="username" name="username" placeholder="Alamat Email" required>
                          <label for="floatingInputGroup1">Alamat Email</label>
                          <div class="invalid-feedback">Alamat email anda tidak valid.</div>
                        </div>
                      </div>
                    </div>

                    <div class="col-12">
                      <div class="input-group has-validation">
                        <span class="input-group-text" id="inputGroupPrepend"></span>
                        <div class="form-check form-check-inline">
                          <input type="checkbox" name="sk" id="sk" value="1" required>
                          <label for="sk" title="Syarat & Ketentuan">
                            Saya mematuhi Syarat & Ketentuan
                          </label>
                          <div class="invalid-feedback">Centang untuk menyetujui Syarat & Ketentuan.</div>
                        </div>
                      </div>
                    </div>

                    <div class="col-12">
                      <button class="btn text-white w-100" type="submit" name="register"><?= $pageTitle; ?></button>
                    </div>
                    <div class="col-12">
                      <a href="">Pelajari Syarat & Ketentuan</a>
                      <br>
                      <br>
                      <p class="small mb-0">Kembali ke <a href="<?= $url; ?>admin/dashboard/users">Dashboard Users</a></p>
                    </div>
                  </form>

                </div>
              </div>

              <footer>
                <div class="credits">
                  <p class="mt-4">Dirancang oleh <a href="<?= $url; ?>" class="mt-4"><?= $title; ?></a></p>
                </div>
              </footer>

            </div>
          </div>
        </div>

      </section>

    </div>
  </main><!-- End #main -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <?php include("../admin/includes/templates/javascripts.php"); ?>

  <!-- VIEW / HIDE PASSWORD -->
  <script>
    const togglePassword = document.querySelector('#togglePassword');
    const password = document.querySelector('#id_password');

    togglePassword.addEventListener('click', function(e) {
      // toggle the type attribute
      const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
      password.setAttribute('type', type);
      // toggle the eye slash icon
      this.classList.toggle('bi-eye');
    });
  </script>

</body>

</html>