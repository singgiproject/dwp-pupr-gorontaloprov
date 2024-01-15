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

if ($rowSession["level"] === $levelUser) {
  header("Location:login");
  exit;
}

include("proses-login.php");
include("../includes/account/level.php");
include("../includes/table/query.php");
include("../includes/head/data-head.php");

$pageTitle = "Register Berhasil";
?>
<!DOCTYPE html>
<html lang="en">

<?php include("../admin/includes/templates/head.php"); ?>

<body class="body-sign-image">

  <main>
    <div class="container sign">

      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-5 col-md-7 d-flex flex-column align-items-center justify-content-center">

              <div class="mb-3 mt-5 card-sign">

                <div class="card-body">

                  <div class="d-flex justify-content-center">
                    <a href="<?= $url; ?>" class="align-items-center w-auto card-sign-logo">
                      <img src="<?= $logo; ?>" alt="Logo <?= $title; ?>" width="100">
                    </a>
                  </div>

                  <div class="pt-2 pb-3">
                    <h5 class="card-title text-center pb-0 fs-4"><?= $pageTitle; ?></h5>
                  </div>

                  <?php if ($rowSession["level"] === $levelSuperAdmin) : ?>
                    <?php if (isset($_POST["register"])) : ?>
                      <?php if (register($_POST) > 0) : ?>
                        <a href="<?= $url; ?>auth/register" class="btn btn-primary mb-2">Kembali</a>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                          <strong><i class="bi bi-check"></i></strong> Registrasi Akun berhasil.
                          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                      <?php endif; ?>
                    <?php endif; ?>
                    <?php if (!isset($_POST["register"])) : ?>
                      <?php header("Location:register");
                      exit; ?>
                    <?php endif; ?>
                  <?php endif; ?>

                  <?php if ($rowSession["level"] === $levelAdmin) : ?>
                    <?php if (isset($_POST["register"])) : ?>
                      <?php if (register_level_admin($_POST) > 0) : ?>
                        <a href="<?= $url; ?>auth/register" class="btn btn-primary mb-2">Kembali</a>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                          <strong><i class="bi bi-check"></i></strong> Registrasi Akun berhasil.
                          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                      <?php endif; ?>
                    <?php endif; ?>
                    <?php if (!isset($_POST["register"])) : ?>
                      <?php header("Location:register");
                      exit; ?>
                    <?php endif; ?>
                  <?php endif; ?>


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

  <!-- Script untuk lihat/hide password -->
  <script>
    const togglePassword = document.querySelector('#togglePassword');
    const password = document.querySelector('#password');

    togglePassword.addEventListener('click', function(e) {
      // toggle tipe attribute
      const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
      password.setAttribute('type', type);
      // toggle ikon mata
      this.querySelector('i').classList.toggle('bi-eye');
      this.querySelector('i').classList.toggle('bi-eye-slash');
    });
  </script>

</body>

</html>