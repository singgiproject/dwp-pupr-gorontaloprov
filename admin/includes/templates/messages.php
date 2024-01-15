<?php if ($rowSession["level"] === $levelUser) : ?>
  <script>
    document.location.href = '<?= $url ?>admin/dashboard/home';
  </script>
<?php endif ?>
<main id="main" class="main">

  <div class="pagetitle">
    <h1><?= $pageTitle; ?></h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?= $url; ?>dashboard">Home</a></li>
        <li class="breadcrumb-item active"><?= $pageTitle; ?></li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section dashboard">
    <div class="row">

      <!-- === DATA TABLE //START === -->
      <?php if (empty($_GET["reply"])) : ?>
        <div class="col-lg-12">
          <div class="row">

            <!-- Recent Sales -->
            <div class="col-12" id="code_access">

              <div class="card recent-sales overflow-auto">

                <div class="card-body">
                  <h5 class="card-title">Data <span>| <?= $pageTitle; ?></span></h5>

                  <table class="table table-borderless datatable">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Opsi</th>
                        <th scope="col">Nama Lengkap</th>
                        <th scope="col">Alamat Email</th>
                        <th scope="col">Subjek</th>
                        <th scope="col">Deskripsi Pesan</th>
                        <th scope="col">Waktu Pengiriman</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $noTable = 1; ?>
                      <?php foreach ($messages as $row) : ?>
                        <tr>
                          <th scope="row"><a href="#"><?= $noTable; ?></a></th>
                          <td>
                            <a href="#" class="badge p-2 btn btn-danger text-white" data-bs-toggle="modal" data-bs-target="#modalDeleteMessage<?= $row["id"]; ?>" title="Hapus"><i class="bi bi-trash fs-6"></i></a>

                          </td>
                          <td><?= $row["name"]; ?></td>
                          <td><?= $row["email"]; ?></td>
                          <td><?= $row["subject"]; ?></td>
                          <td><?= $row["message"]; ?></td>
                          <td><?= time_ago($row["date"]); ?></td>
                        </tr>
                        <?php $noTable++; ?>
                      <?php endforeach; ?>
                    </tbody>
                  </table>

                </div>

              </div>
            </div><!-- End Recent Sales -->


          </div>
        </div>
        <!-- === DATA TABLE //END === -->
      <?php endif; ?>


      <!-- === ADD //START === -->
      <?php if ($_GET["reply"] === "message_whatsapp") : ?>
        <div class="col-lg-6">

          <a href="javascript:window.history.go(-1);" class="btn btn-light mb-2 bg-gradient shadow"><i class="bi bi-arrow-left"></i></a>

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Balas Pesan Dari</h5>

              <!-- Custom Styled Validation -->
              <form action="" class="row g-3 needs-validation" method="post" enctype="multipart/form-data" novalidate>
                <div class="col-md-12">
                  <table style="width: 100%;">
                    <tr>
                      <td>
                        <input name="description" id="description" autofocus class="form-control" placeholder="Ketik pesan">
                      </td>
                      <td>
                        <button class="btn bg-purple-1 text-white" type="submit" name="send_whatsapp" style="width: 100%;"><i class="bi bi-send-fill"></i> Kirim</button>
                      </td>
                    </tr>
                  </table>
                </div>
              </form><!-- End Custom Styled Validation -->

            </div>
          </div>

        </div>
      <?php endif; ?>
      <!-- === ADD //END === -->




      <!-- MODAL DELETE DELETE MESSAGE -->
      <?php foreach ($messages as $row) : ?>
        <div class="modal modal-dark-mode fade" id="modalDeleteMessage<?= $row["id"]; ?>" tabindex="-1" aria-labelledby="exampleModalLabelDeletedMessages<?= $row["id"]; ?>" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabelDeletedMessages<?= $row["id"]; ?>">Hapus?</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <p>Penghapusan bersifat permanen. Anda yakin ingin menghapus data ini?</p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batalkan</button>
                <form action="" method="post">
                  <input type="text" name="id" hidden value="<?= base64_encode(base64_encode(base64_encode(base64_encode(base64_encode(base64_encode(base64_encode(base64_encode(base64_encode($row["id"]))))))))); ?>">
                  <input type="text" name="deleted_success" value="deleted_success" hidden>
                  <button type="submit" name="del_message" class="btn btn-danger">Hapus</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
      <!-- end MODAL DELETE DELETE MESSAGE -->


    </div><!-- End Right side columns -->

    </div>
  </section>

</main><!-- End #main -->


<!-- ========= NOTIFICATIONS SWEET ALERT =========-->
<!-- Notification Deleted Success -->
<?php
// Tampilkan session jika ada dan belum kadaluarsa
if (isset($_SESSION["session_deleted_success"]) && isset($_SESSION["expiry_time_deleted_success"]) && $_SESSION["expiry_time_deleted_success"] > time()) : ?>
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      Swal.fire({
        title: "Pesan berhasil dihapus!",
        icon: "success",
        position: "center",
        timer: 4000 // 
      });
    });
    unset($_SESSION["session_deleted_success"]); // Clear the notification session
  </script>
<?php endif; ?>
<!-- ========= end NOTIFICATIONS SWEET ALERT =========-->



<?php if (isset($_POST["del_message"])) : ?>
  <?php if (delete_message(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode($_POST["id"])))))))))) > 0) : ?>
    <?php
    echo "<script>document.location.href = '';</script>";
    $deletedSuccess = $_POST["deleted_success"];

    // Buat session dengan nama "session_deleted_success" dengan waktu kadaluarsa
    $_SESSION["session_deleted_success"] = $deletedSuccess;
    $_SESSION["expiry_time_deleted_success"] = time() + 6; // Waktu kadaluarsa dalam 5 detik
    ?>
  <?php endif; ?>
<?php endif; ?>