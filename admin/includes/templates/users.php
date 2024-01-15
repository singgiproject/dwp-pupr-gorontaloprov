<?php if ($rowSession["level"] === $levelUsers) : ?>
  <script>
    document.location.href = '<?= $url ?>admin/dashboard/home';
  </script>
<?php endif ?>

<!-- Level User -->
<?php if ($rowSession["level"] === $levelSuperAdmin or $rowSession["level"] === $levelAdmin) : ?>
  <main id="main" class="main pa-puskesmas">

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
    <!-- PAGE TITLE -->

    <!-- ====================================
       TEMPLATE USERS
       ===================================-->
    <section class="section dashboard users">
      <div class="row">

        <!-- TABLE DATA USERS -->
        <div class="col-lg-12">
          <div class="row">

            <div class="col-12" id="code_access">

              <div class="card recent-sales overflow-auto">

                <div class="card-body">
                  <h5 class="card-title">
                    <strong>Users</strong>
                  </h5>

                  <div class="filter mx-4">
                    <a href="<?= $url; ?>auth/register" class="btn bg-success text-white"><i class="bi bi-plus-circle"></i> Tambah User</a>
                  </div>

                  <table class="table table-borderless datatable">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Opsi</th>
                        <th scope="col">Akun</th>
                        <th scope="col">Nama</th>
                        <th scope="col">No. HP</th>
                        <th scope="col">Level Akun</th>
                        <th scope="col">Status Akun</th>
                      </tr>
                    </thead>

                    <?php if ($rowSession["level"] === $levelSuperAdmin) : ?>
                      <!-- Level Super Admin -->
                      <tbody>
                        <?php $noTable = 1; ?>
                        <?php foreach ($users as $rowUsers) : ?>
                          <?php
                          if ($rowUsers["level"] === $levelAdmin or $rowUsers["level"] === $levelUser) : ?>
                            <tr>
                              <th scope="row"><a href="#"><?= $noTable; ?></a></th>
                              <td>
                                <?php if ($rowUsers["status_account"] === "0") : ?>
                                  <form action="" method="post">
                                    <input type="text" name="id" hidden value="<?= base64_encode(base64_encode(base64_encode(base64_encode(base64_encode(base64_encode(base64_encode(base64_encode(base64_encode($rowUsers["id"]))))))))); ?>">
                                    <input hidden type="text" name="status_account" value="1">
                                    <button type="submit" name="unverified_account_user" title="verified" class="action action-active mb-1"><i class="bi bi-check-lg"></i> Aktifkan</button>
                                  </form>
                                <?php endif; ?>

                                <?php if ($rowUsers["status_account"] === "1") : ?>
                                  <form action="" method="post">
                                    <input type="text" name="id" hidden value="<?= base64_encode(base64_encode(base64_encode(base64_encode(base64_encode(base64_encode(base64_encode(base64_encode(base64_encode($rowUsers["id"]))))))))); ?>">
                                    <input hidden type="text" name="status_account" value="0">
                                    <button type="submit" name="unverified_account_user" title="Unverified" class="action action-nonactive mb-1"><i class="bi bi-x-lg"></i> Nonaktifkan</button>
                                  </form>
                                <?php endif; ?>

                                <a href="#" class="action rounded-pill btn btn-danger text-white" data-bs-toggle="modal" data-bs-target="#modalDeleteAccountUser<?= $rowUsers["id"]; ?>" title="Hapus"><i class="bi bi-trash"></i> Hapus</a>
                              </td>
                              <td>
                                <a href="#" data-bs-toggle="modal" data-bs-target="#modalViewPassword<?= $rowUsers["id"]; ?>">
                                  <span class="badge rounded-pill btn btn-info" style="font-size: 14px;"><i class="bi bi-eye-fill"></i> Username & Password</span>
                                </a>
                              </td>
                              <td>
                                <?= $rowUsers["full_name"]; ?>
                              </td>
                              <td>
                                <?= $rowUsers["no_hp"]; ?>
                              </td>
                              <td>
                                <?= ucwords($rowUsers["level"]); ?>
                              </td>
                              <td>
                                <?php if ($rowUsers["status_account"] === "0") : ?>
                                  <span class="badge rounded-pill text-bg-danger">Belum Diverifikasi</span>
                                <?php endif; ?>

                                <?php if ($rowUsers["status_account"] === "1") : ?>
                                  <span class="badge rounded-pill text-bg-success">Diverifikasi</span>
                                <?php endif; ?>
                              </td>
                            </tr>
                            <?php $noTable++; ?>
                          <?php endif; ?>
                        <?php endforeach; ?>
                      </tbody>
                      <!-- end Level Super Admin -->
                    <?php endif; ?>

                    <?php if ($rowSession["level"] === $levelAdmin) : ?>
                      <!-- Level Admin -->
                      <tbody>
                        <?php $noTable = 1; ?>
                        <?php foreach ($users as $rowUsers) : ?>
                          <?php
                          if ($rowUsers["level"] === $levelAdmin or $rowUsers["level"] === $levelUser) : ?>
                            <?php if ($rowUsers["level"] === $levelUser) : ?>
                              <tr>
                                <th scope="row"><a href="#"><?= $noTable; ?></a></th>
                                <td>
                                  <?php if ($rowUsers["status_account"] === "0") : ?>
                                    <form action="" method="post">
                                      <input type="text" name="id" hidden value="<?= base64_encode(base64_encode(base64_encode(base64_encode(base64_encode(base64_encode(base64_encode(base64_encode(base64_encode($rowUsers["id"]))))))))); ?>">
                                      <input hidden type="text" name="status_account" value="1">
                                      <button type="submit" name="unverified_account_user" title="verified" class="action action-active mb-1"><i class="bi bi-check-lg"></i> Aktifkan</button>
                                    </form>
                                  <?php endif; ?>

                                  <?php if ($rowUsers["status_account"] === "1") : ?>
                                    <form action="" method="post">
                                      <input type="text" name="id" hidden value="<?= base64_encode(base64_encode(base64_encode(base64_encode(base64_encode(base64_encode(base64_encode(base64_encode(base64_encode($rowUsers["id"]))))))))); ?>">
                                      <input hidden type="text" name="status_account" value="0">
                                      <button type="submit" name="unverified_account_user" title="Unverified" class="action action-nonactive mb-1"><i class="bi bi-x-lg"></i> Nonaktifkan</button>
                                    </form>
                                  <?php endif; ?>
                                </td>
                                <td>
                                  <a href="#" data-bs-toggle="modal" data-bs-target="#modalViewPassword<?= $rowUsers["id"]; ?>">
                                    <span class="badge rounded-pill btn btn-info" style="font-size: 14px;"><i class="bi bi-eye-fill"></i> Username & Password</span>
                                  </a>
                                </td>
                                <td>
                                  <?= $rowUsers["full_name"]; ?>
                                </td>
                                <td>
                                  <?= $rowUsers["no_hp"]; ?>
                                </td>
                                <td>
                                  <?= ucwords($rowUsers["level"]); ?>
                                </td>
                                <td>
                                  <?php if ($rowUsers["status_account"] === "0") : ?>
                                    <span class="badge rounded-pill text-bg-danger">Belum Diverifikasi</span>
                                  <?php endif; ?>

                                  <?php if ($rowUsers["status_account"] === "1") : ?>
                                    <span class="badge rounded-pill text-bg-success">Diverifikasi</span>
                                  <?php endif; ?>
                                </td>
                              </tr>
                              <?php $noTable++; ?>
                            <?php endif; ?>
                          <?php endif; ?>
                        <?php endforeach; ?>
                      </tbody>
                      <!-- end Level Admin -->
                    <?php endif; ?>

                  </table>

                </div>

              </div>
            </div>

          </div>
        </div>
        <!-- TABLE DATA USERS -->

        <?php if ($rowSession["level"] === $levelSuperAdmin) : ?>
          <!-- MODAL DELETE USERS -->
          <?php foreach ($users as $rowUsers) : ?>
            <div class="modal modal-dark-mode fade" id="modalDeleteAccountUser<?= $rowUsers["id"]; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus?</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <p>Akun yang dihapus tidak dapat dikembalikan. Anda yakin ingin menghapus data ini?</p>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batalkan</button>
                    <form action="" method="post">
                      <input type="text" name="deleted_success" value="deleted_success" hidden>
                      <input type="text" name="id" hidden value="<?= $rowUsers["id"]; ?>">
                      <button type="submit" name="del_account_users" class="btn btn-danger">Hapus</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          <?php endforeach; ?>
          <!-- end MODAL DELETE USERS -->
        <?php endif; ?>

        <!-- MODAL VIEW KET USERS -->
        <?php foreach ($users as $rowUsers) : ?>
          <div class="modal modal-dark-mode fade" id="modalViewPassword<?= $rowUsers["id"]; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5>Akses Login <strong><?= $rowUsers["faskes_name"]; ?></strong></h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <table>
                    <tr>
                      <td>Username</td>
                      <td>: <input type="text" value="<?= $rowUsers["username"]; ?>" readonly style="border: none; outline:none;" class="text-danger"></td>
                    </tr>
                    <tr>
                      <td>Password</td>
                      <td>: <input type="text" value="<?= $rowUsers["password2"]; ?>" readonly style="border: none; outline:none;" class="text-danger"></td>
                    </tr>
                  </table>
                  <p class="bg-warning mt-2 p-2 rounded-2"><i class="bi bi-info-circle"></i> Harap menjaga setiap akses akun untuk mencegah kebocoran data.</p>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                </div>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
        <!-- end MODAL DELETE USERS -->

      </div>

      </div>
    </section>
    <!-- ====================================
       end TEMPLATE USERS 
       ===================================-->

  </main>

  <!-- ========= NOTIFICATIONS SWEET ALERT =========-->
  <!-- Notification Deleted Success -->
  <?php
  // Tampilkan session jika ada dan belum kadaluarsa
  if (isset($_SESSION["session_deleted_success"]) && isset($_SESSION["expiry_time_deleted_success"]) && $_SESSION["expiry_time_deleted_success"] > time()) : ?>
    <script>
      document.addEventListener('DOMContentLoaded', function() {
        Swal.fire({
          title: "Akun berhasil dihapus!",
          icon: "success",
          position: "center",
          timer: 4000 // 
        });
      });
      unset($_SESSION["session_deleted_success"]); // Clear the notification session
    </script>
  <?php endif; ?>
  <!-- ========= end NOTIFICATIONS SWEET ALERT =========-->


  <!-- === CONDITION DATA USERS === -->
  <?php if (isset($_POST["unverified_account_user"])) : ?>
    <?php if (unverifiedAccountUser($_POST) > 0) : ?>
      <script>
        document.location.href = '<?= $url; ?>admin/dashboard/users';
      </script>
    <?php endif; ?>
  <?php endif; ?>

  <?php if ($rowSession["level"] === $levelSuperAdmin) : ?>
    <?php if (isset($_POST["del_account_users"])) : ?>
      <?php if (deleteAccountUser($_POST["id"])) : ?>
        <?php
        echo "<script>document.location.href = '';</script>";
        $deletedSuccess = $_POST["deleted_success"];

        // Buat session dengan nama "session_deleted_success" dengan waktu kadaluarsa
        $_SESSION["session_deleted_success"] = $deletedSuccess;
        $_SESSION["expiry_time_deleted_success"] = time() + 6; // Waktu kadaluarsa dalam 5 detik
        ?>
      <?php endif; ?>
    <?php endif; ?>
  <?php endif; ?>

<?php endif; ?>
<!-- end Level User -->