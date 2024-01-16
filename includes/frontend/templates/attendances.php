<div class="container news-detail">

  <!-- Breadcrumb -->
  <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?= $url; ?>">Beranda</a></li>
      <li class="breadcrumb-item active" aria-current="page">Program Kerja</li>
    </ol>
  </nav>

  <!-- Content -->
  <div class="content-news">
    <div class="row">

      <div class="head-title-content mt-5 mb-3">
        <h4><span>ABSENSI</span> ANGGOTA</h4>
      </div>

      <?php if (!isset($_GET["tab"])) : ?>
        <h5 class="text-center mt-2 mb-3">Halo, <strong><?= $rowSession["full_name"]; ?>!</strong></h5>
        <table class="table table table-striped table-hover mt-4" id="data_table">
          <thead>
            <tr>
              <th scope="col">No</th>
              <th scope="col">Kegiatan</th>
              <th scope="col">Tujuan</th>
              <th scope="col">Waktu</th>
              <th scope="col">Penanggung Jawab</th>
              <th scope="col">Anggaran</th>
              <th scope="col">Keterangan</th>
              <th scope="col">Ditambahkan</th>
              <th scope="col">Aksi</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th scope="col">No</th>
              <th scope="col">Kegiatan</th>
              <th scope="col">Tujuan</th>
              <th scope="col">Waktu</th>
              <th scope="col">Penanggung Jawab</th>
              <th scope="col">Anggaran</th>
              <th scope="col">Keterangan</th>
              <th scope="col">Ditambahkan</th>
              <th scope="col">Aksi</th>
            </tr>
          </tfoot>
          <tbody>
            <?php $noTable = 1; ?>
            <?php foreach ($workProgram as $rowWorkProgram) : ?>
              <tr>
                <td><?= $noTable; ?></td>
                <td><?= $rowWorkProgram["kegiatan"]; ?></td>
                <td><?= $rowWorkProgram["tujuan"]; ?></td>
                <td><?= $rowWorkProgram["waktu"]; ?></td>
                <td>
                  <?php foreach ($team as $row) : ?>
                    <?php if ($row["id"] === $rowWorkProgram["penanggung_jawab"]) : ?>
                      <?= $row["name"]; ?> (<?= $row["position"]; ?>)
                    <?php endif; ?>
                  <?php endforeach; ?>
                </td>
                <td>
                  <?php if (empty($rowWorkProgram["anggaran"])) : ?>
                    <center>-</center>
                  <?php else : ?>
                    Rp<?= $rowWorkProgram["anggaran"]; ?>
                  <?php endif; ?>
                </td>
                <td>
                  <?php if (empty($rowWorkProgram["ket"])) : ?>
                    <center>-</center>
                  <?php else : ?>
                    <?= $rowWorkProgram["ket"]; ?>
                  <?php endif; ?>
                </td>
                <td>
                  <?= day_id($rowWorkProgram["date"]); ?>,
                  <?= date_id($rowWorkProgram["date"]); ?>
                </td>
                <td>
                  <a href="<?= $url; ?>attendances?tab=<?= $rowWorkProgram["id"];  ?>" class="btn btn-success">Absen</a>
                </td>
              </tr>
              <?php $noTable++; ?>
            <?php endforeach; ?>

          </tbody>
        </table>
      <?php endif; ?>



      <?php if (isset($_GET["tab"])) : ?>

        <?php foreach ($workProgram as $rowWorkProgram) : ?>
          <?php if ($rowWorkProgram["id"] === $_GET["tab"]) : ?>
            <h5 class="text-center mt-2 mb-3">Program Kerja : <strong><?= $rowWorkProgram["kegiatan"]; ?></strong></h5>
          <?php endif; ?>
        <?php endforeach; ?>

        <li style="list-style: none;">
          <a href="<?= $url; ?>attendances" class="btn btn-success mb-4"><i class="bi bi-chevron-left"></i> Kembali</a>
        </li>
        <!-- TAB ABSENSI -->
        <table class="table table table-striped table-hover mt-4" id="data_table">
          <thead>
            <tr>
              <th scope="col">No</th>
              <th scope="col">Tanggal</th>
              <th scope="col">Jam Masuk</th>
              <th scope="col">Jam Keluar</th>
              <th scope="col">Lokasi</th>
              <th scope="col">Keterangan</th>
              <th scope="col">Deskripsi</th>
              <th scope="col">Aksi</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th scope="col">No</th>
              <th scope="col">Tanggal</th>
              <th scope="col">Jam Masuk</th>
              <th scope="col">Jam Keluar</th>
              <th scope="col">Lokasi</th>
              <th scope="col">Keterangan</th>
              <th scope="col">Deskripsi</th>
              <th scope="col">Aksi</th>
            </tr>
          </tfoot>
          <tbody>
            <?php $noTableAbsenSession = 1; ?>
            <?php foreach ($absenSession as $rowAbsenSession) : ?>
              <?php if ($rowAbsenSession["id_work_program"] === $_GET["tab"]) : ?>
                <tr>
                  <td><?= $noTableAbsenSession; ?></td>
                  <td>
                    <?= day_id($rowAbsenSession["tgl"]); ?>,
                    <?= date_id($rowAbsenSession["tgl"]); ?>
                  </td>
                  <td>
                    <?php if (strlen($rowAbsenSession["clock_in"]) > 2) : ?>
                      <?= str_replace("-", ":", $rowAbsenSession["clock_in"]); ?>
                    <?php elseif ($rowAbsenSession["clock_in"] === "1" || $rowAbsenSession["clock_in"] === "2") : ?>
                      -
                    <?php endif; ?>
                  </td>
                  <td>
                    <?php if ($rowAbsenSession["clock_out"] === "0") : ?>
                      -
                    <?php elseif (strlen($rowAbsenSession["clock_out"]) > 2) : ?>
                      <?= str_replace("-", ":", $rowAbsenSession["clock_out"]); ?>
                    <?php elseif ($rowAbsenSession["clock_out"] === "1" || $rowAbsenSession["clock_out"] === "2") : ?>
                      -
                    <?php endif; ?>
                  </td>
                  <td>
                    <?php if ($rowAbsenSession["location"] === "0") : ?>
                      -
                    <?php elseif (strlen($rowAbsenSession["location"]) > 2) : ?>
                      <a href="https://www.google.com/maps?q=<?= $rowAbsenSession["location"]; ?>" target="_blank" class="badge rounded-pill text-bg-info"><i class="bi bi-geo-alt-fill"></i> Lokasi</a>
                    <?php endif; ?>
                  </td>
                  <td>
                    <?php if ($rowAbsenSession["clock_out"] === "0") : ?>
                      <span class="badge rounded-pill text-bg-warning">Belum absen pulang</span>
                    <?php elseif (strlen($rowAbsenSession["clock_out"]) > 2) : ?>
                      <span class="badge rounded-pill text-bg-success">Hadir</span>
                    <?php elseif ($rowAbsenSession["clock_in"] === "1") : ?>
                      <span class="badge rounded-pill text-bg-danger">Sakit</span>
                    <?php elseif ($rowAbsenSession["clock_in"] === "2") : ?>
                      <span class="badge rounded-pill text-bg-warning">Izin</span>
                    <?php endif; ?>
                  </td>
                  <td>
                    <?php if ($rowAbsenSession["description"] === "0") : ?>
                      -
                    <?php else : ?>
                      <?= $rowAbsenSession["description"]; ?>
                    <?php endif; ?>
                  </td>
                  <td>
                    <a href="#" data-bs-toggle="modal" data-bs-target="#modalDeletedAbsen<?= $rowAbsenSession["id"]; ?>" title="Hapus"><i class="bi bi-x-circle-fill text-danger"></i></a>
                  </td>
                </tr>
                <?php $noTableAbsenSession++; ?>
              <?php endif; ?>
            <?php endforeach; ?>

          </tbody>
        </table>

    </div>

    <?php if (empty($absenSessionDESC_LIMIT1)) : ?>
      <div class="row">
        <div class="col-12 button-absen">

          <!-- Absen Masuk -->
          <li>
            <form action="" method="post">
              <?php foreach ($locationSessionDESC_LIMIT1 as $rowLocation) : ?>
                <input type="text" name="location" hidden value="<?= $rowLocation["latitude"]; ?>,<?= $rowLocation["longitude"]; ?>">
              <?php endforeach; ?>
              <input type="text" hidden name="id_work_program" value="<?= base64_encode(base64_encode(base64_encode(base64_encode(base64_encode(base64_encode(base64_encode(base64_encode(base64_encode($_GET["tab"]))))))))); ?>">
              <input type="text" name="add_absen_pagi_success" hidden>
              <button class="btn btn-success" type="submit" name="add_absen_pagi">ABSEN MASUK</button>
            </form>
          </li>

          <!-- Absen Sakit -->
          <li>
            <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#sakitModal">SAKIT</button>
          </li>
          <!-- Modal Sakit-->
          <div class="modal fade" id="sakitModal" tabindex="-1" aria-labelledby="sakitModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h1 class="modal-title fs-5" id="sakitModalLabel">Deskripsi penjelasan sakit <sup>(Opsional)</sup></h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="" method="post">
                  <input type="text" hidden name="id_work_program" value="<?= base64_encode(base64_encode(base64_encode(base64_encode(base64_encode(base64_encode(base64_encode(base64_encode(base64_encode($_GET["tab"]))))))))); ?>">
                  <div class="modal-body">
                    <?php foreach ($locationSessionDESC_LIMIT1 as $rowLocation) : ?>
                      <input type="text" name="location" hidden value="<?= $rowLocation["latitude"]; ?>,<?= $rowLocation["longitude"]; ?>">
                    <?php endforeach; ?>
                    <textarea name="description" class="form-control" placeholder="cth: Saya sakit demam"></textarea>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <input type="text" name="add_absen_sakit_success" hidden>
                    <button class="btn btn-danger" type="submit" name="add_absen_sakit">Kirim</button>
                  </div>
                </form>
              </div>
            </div>
          </div>

          <!-- Absen Izin -->
          <li>
            <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#izinModal">IZIN</button>
          </li>
          <!-- Modal Izin-->
          <div class="modal fade" id="izinModal" tabindex="-1" aria-labelledby="izinModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h1 class="modal-title fs-5" id="izinModalLabel">Deskripsi penjelasan izin</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="" method="post">
                  <input type="text" hidden name="id_work_program" value="<?= base64_encode(base64_encode(base64_encode(base64_encode(base64_encode(base64_encode(base64_encode(base64_encode(base64_encode($_GET["tab"]))))))))); ?>">
                  <div class="modal-body">
                    <?php foreach ($locationSessionDESC_LIMIT1 as $rowLocation) : ?>
                      <input type="text" name="location" hidden value="<?= $rowLocation["latitude"]; ?>,<?= $rowLocation["longitude"]; ?>">
                    <?php endforeach; ?>
                    <textarea name="description" class="form-control" placeholder="cth: Menghadiri pernikahan keluarga"></textarea>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <input type="text" name="add_absen_izin_success" hidden>
                    <button class="btn btn-warning" type="submit" name="add_absen_izin">Kirim</button>
                  </div>
                </form>
              </div>
            </div>
          </div>

        </div>

      </div>
    <?php endif; ?>

    <?php foreach ($absenSessionDESC_LIMIT1 as $row) : ?>
      <!-- Check absen masuk -->
      <?php if ($row["tgl"] !== date("Y-m-d")) : ?>
        <div class="row">
          <div class="col-12 button-absen">

            <!-- Absen Masuk -->
            <li>
              <form action="" method="post">
                <input type="text" hidden name="id_work_program" value="<?= base64_encode(base64_encode(base64_encode(base64_encode(base64_encode(base64_encode(base64_encode(base64_encode(base64_encode($_GET["tab"]))))))))); ?>">
                <?php foreach ($locationSessionDESC_LIMIT1 as $rowLocation) : ?>
                  <input type="text" name="location" hidden value="<?= $rowLocation["latitude"]; ?>,<?= $rowLocation["longitude"]; ?>">
                <?php endforeach; ?>
                <input type="text" name="add_absen_pagi_success" hidden>
                <button class="btn btn-success" type="submit" name="add_absen_pagi">ABSEN MASUK</button>
              </form>
            </li>

            <!-- Absen Sakit -->
            <li>
              <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#sakitModal">SAKIT</button>
            </li>
            <!-- Modal Sakit-->
            <div class="modal fade" id="sakitModal" tabindex="-1" aria-labelledby="sakitModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h1 class="modal-title fs-5" id="sakitModalLabel">Deskripsi penjelasan sakit <sup>(Opsional)</sup></h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <form action="" method="post">
                    <input type="text" hidden name="id_work_program" value="<?= base64_encode(base64_encode(base64_encode(base64_encode(base64_encode(base64_encode(base64_encode(base64_encode(base64_encode($_GET["tab"]))))))))); ?>">
                    <div class="modal-body">
                      <?php foreach ($locationSessionDESC_LIMIT1 as $rowLocation) : ?>
                        <input type="text" name="location" hidden value="<?= $rowLocation["latitude"]; ?>,<?= $rowLocation["longitude"]; ?>">
                      <?php endforeach; ?>
                      <textarea name="description" class="form-control" placeholder="cth: Saya sakit demam"></textarea>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                      <input type="text" name="add_absen_sakit_success" hidden>
                      <button class="btn btn-danger" type="submit" name="add_absen_sakit">Kirim</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>

            <!-- Absen Izin -->
            <li>
              <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#izinModal">IZIN</button>
            </li>
            <!-- Modal Izin-->
            <div class="modal fade" id="izinModal" tabindex="-1" aria-labelledby="izinModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h1 class="modal-title fs-5" id="izinModalLabel">Deskripsi penjelasan izin</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <form action="" method="post">
                    <input type="text" hidden name="id_work_program" value="<?= base64_encode(base64_encode(base64_encode(base64_encode(base64_encode(base64_encode(base64_encode(base64_encode(base64_encode($_GET["tab"]))))))))); ?>">
                    <div class="modal-body">
                      <?php foreach ($locationSessionDESC_LIMIT1 as $rowLocation) : ?>
                        <input type="text" name="location" hidden value="<?= $rowLocation["latitude"]; ?>,<?= $rowLocation["longitude"]; ?>">
                      <?php endforeach; ?>
                      <textarea name="description" class="form-control" placeholder="cth: Menghadiri pernikahan keluarga"></textarea>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                      <input type="text" name="add_absen_izin_success" hidden>
                      <button class="btn btn-warning" type="submit" name="add_absen_izin">Kirim</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>

          </div>
        </div>
      <?php endif; ?>
    <?php endforeach; ?>

    <?php if ($rowAbsenSession["clock_out"] === "0") : ?>
      <!-- Check absen pulang -->
      <div class="row">
        <div class="col-12 button-absen">
          <form action="" method="post">
            <input type="text" hidden name="id" value="<?= base64_encode(base64_encode(base64_encode(base64_encode(base64_encode(base64_encode(base64_encode(base64_encode(base64_encode($rowAbsenSession["id"]))))))))); ?>">
            <input type="text" name="add_absen_pulang_success" hidden>
            <button class="btn btn-warning" type="submit" name="add_absen_pulang">ABSEN PULANG</button>
          </form>
        </div>
      </div>
    <?php endif; ?>

    <?php foreach ($absenSessionDESC_LIMIT1 as $row) : ?>
      <?php if ($row["tgl"] === date("Y-m-d")) : ?>
        <?php if ($rowAbsenSession["clock_out"] !== "0") : ?>
          <div class="row">
            <div class="col-12 button-absen">
              <form action="" method="post">
                <button type="button" class="btn btn-secondary" style="cursor: no-drop;">KAMU SUDAH ABSEN HARI INI</button>
              </form>
            </div>
          </div>
        <?php endif; ?>
      <?php endif; ?>
    <?php endforeach; ?>


    <!-- MODAL DELETE ABSEN -->
    <?php foreach ($absenSession as $rowAbsenSession) : ?>
      <?php if ($rowAbsenSession["id_work_program"] === $_GET["tab"]) : ?>
        <div class="modal modal-dark-mode fade" id="modalDeletedAbsen<?= $rowAbsenSession["id"]; ?>" tabindex="-1" aria-labelledby="exampleModalLabelDeletedAbsen<?= $rowAbsenSession["id"]; ?>" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabelDeletedAbsen<?= $rowAbsenSession["id"]; ?>">Hapus?</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <p>Absen dihari
                  <strong>
                    <?= day_id($rowAbsenSession["tgl"]); ?>,
                    <?= date_id($rowAbsenSession["tgl"]); ?>
                  </strong>
                  akan dihapus
                </p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batalkan</button>
                <form action="" method="post">
                  <input type="text" name="id" hidden value="<?= base64_encode(base64_encode(base64_encode(base64_encode(base64_encode(base64_encode(base64_encode(base64_encode(base64_encode($rowAbsenSession["id"]))))))))); ?>">
                  <input type="text" name="deleted_success" value="deleted_success" hidden>
                  <button type="submit" name="del_absen" class="btn btn-danger">Hapus</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      <?php endif; ?>
    <?php endforeach; ?>
    <!-- end MODAL DELETE DOCUMENTS -->


    <!-- end TAB ABSENSI -->
  <?php endif; ?>


  </div>
</div>




<!-- Notification Absensi Success -->
<?php
// Tampilkan session jika ada dan belum kadaluarsa
if (isset($_SESSION["session_add_absen_pagi_success"]) && isset($_SESSION["expiry_time_add_absen_pagi_success_pagi"]) && $_SESSION["expiry_time_add_absen_pagi_success_pagi"] > time()) : ?>
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      Swal.fire({
        title: "Absen masuk berhasil dilakukan!",
        icon: "success",
        position: "center",
        timer: 4000
      });
    });
  </script>
<?php endif; ?>

<!-- Notification Absensi Sakit Success -->
<?php
// Tampilkan session jika ada dan belum kadaluarsa
if (isset($_SESSION["session_add_absen_sakit_success"]) && isset($_SESSION["expiry_time_add_absen_sakit_success_sakit"]) && $_SESSION["expiry_time_add_absen_sakit_success_sakit"] > time()) : ?>
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      Swal.fire({
        title: "Semoga cepat sembuh ya :)",
        icon: "success",
        position: "center",
        timer: 4000
      });
    });
  </script>
<?php endif; ?>

<!-- Notification Absensi Izin Success -->
<?php
// Tampilkan session jika ada dan belum kadaluarsa
if (isset($_SESSION["session_add_absen_izin_success"]) && isset($_SESSION["expiry_time_add_absen_izin_success_izin"]) && $_SESSION["expiry_time_add_absen_izin_success_izin"] > time()) : ?>
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      Swal.fire({
        title: "Semoga aktifitasnya hari ini dilancarkan :)",
        icon: "success",
        position: "center",
        timer: 4000
      });
    });
  </script>
<?php endif; ?>

<?php
// Tampilkan session jika ada dan belum kadaluarsa
if (isset($_SESSION["session_add_absen_pulang_success"]) && isset($_SESSION["expiry_time_add_absen_pulang_success_pulang"]) && $_SESSION["expiry_time_add_absen_pulang_success_pulang"] > time()) : ?>
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      Swal.fire({
        title: "Terima kasih sudah bekerja hari ini!",
        icon: "success",
        position: "center",
        timer: 4000
      });
    });
  </script>
<?php endif; ?>

<!-- Notification Deleted Success -->
<?php
// Tampilkan session jika ada dan belum kadaluarsa
if (isset($_SESSION["session_deleted_success"]) && isset($_SESSION["expiry_time_deleted_success"]) && $_SESSION["expiry_time_deleted_success"] > time()) : ?>
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      Swal.fire({
        title: "Absen berhasil dihapus!",
        icon: "success",
        position: "center",
        timer: 4000 // 
      });
    });
    unset($_SESSION["session_deleted_success"]); // Clear the notification session
  </script>
<?php endif; ?>


<?php foreach ($absenSessionDESC_LIMIT1 as $row) : ?>
  <?php if ($row["tgl"] !== date("Y-m-d")) : ?>
    <!-- ========= CONDITION DATA ABSENSI ========= -->
    <?php if (isset($_POST["add_absen_pagi"])) : ?>
      <?php if (add_absen_pagi($_POST) > 0) : ?>
        <?php
        echo "<script>document.location.href = '';</script>";
        $addSuccess = $_POST["add_absen_pagi_success"];

        // Buat session dengan nama "session_add_absen_pagi_success" dengan waktu kadaluarsa
        $_SESSION["session_add_absen_pagi_success"] = $addSuccess;
        $_SESSION["expiry_time_add_absen_pagi_success_pagi"] = time() + 6; // Waktu kadaluarsa dalam 5 detik
        ?>
      <?php endif; ?>
    <?php endif; ?>

    <?php if (isset($_POST["add_absen_sakit"])) : ?>
      <?php if (add_absen_sakit($_POST) > 0) : ?>
        <?php
        echo "<script>document.location.href = '';</script>";
        $addSuccess = $_POST["add_absen_sakit_success"];

        // Buat session dengan nama "session_add_absen_sakit_success" dengan waktu kadaluarsa
        $_SESSION["session_add_absen_sakit_success"] = $addSuccess;
        $_SESSION["expiry_time_add_absen_sakit_success_sakit"] = time() + 6; // Waktu kadaluarsa dalam 5 detik
        ?>
      <?php endif; ?>
    <?php endif; ?>

    <?php if (isset($_POST["add_absen_izin"])) : ?>
      <?php if (add_absen_izin($_POST) > 0) : ?>
        <?php
        echo "<script>document.location.href = '';</script>";
        $addSuccess = $_POST["add_absen_izin_success"];

        // Buat session dengan nama "session_add_absen_izin_success" dengan waktu kadaluarsa
        $_SESSION["session_add_absen_izin_success"] = $addSuccess;
        $_SESSION["expiry_time_add_absen_izin_success_izin"] = time() + 6; // Waktu kadaluarsa dalam 5 detik
        ?>
      <?php endif; ?>
    <?php endif; ?>
  <?php endif; ?>
<?php endforeach; ?>

<?php if (empty($absenSessionDESC_LIMIT1)) : ?>
  <!-- check empty -->
  <?php if ($row["tgl"] !== date("Y-m-d")) : ?>
    <!-- ========= CONDITION DATA ABSENSI ========= -->
    <?php if (isset($_POST["add_absen_pagi"])) : ?>
      <?php if (add_absen_pagi($_POST) > 0) : ?>
        <?php
        echo "<script>document.location.href = '';</script>";
        $addSuccess = $_POST["add_absen_pagi_success"];

        // Buat session dengan nama "session_add_absen_pagi_success" dengan waktu kadaluarsa
        $_SESSION["session_add_absen_pagi_success"] = $addSuccess;
        $_SESSION["expiry_time_add_absen_pagi_success_pagi"] = time() + 6; // Waktu kadaluarsa dalam 5 detik
        ?>
      <?php endif; ?>
    <?php endif; ?>

    <?php if (isset($_POST["add_absen_sakit"])) : ?>
      <?php if (add_absen_sakit($_POST) > 0) : ?>
        <?php
        echo "<script>document.location.href = '';</script>";
        $addSuccess = $_POST["add_absen_sakit_success"];

        // Buat session dengan nama "session_add_absen_sakit_success" dengan waktu kadaluarsa
        $_SESSION["session_add_absen_sakit_success"] = $addSuccess;
        $_SESSION["expiry_time_add_absen_sakit_success_sakit"] = time() + 6; // Waktu kadaluarsa dalam 5 detik
        ?>
      <?php endif; ?>
    <?php endif; ?>

    <?php if (isset($_POST["add_absen_izin"])) : ?>
      <?php if (add_absen_izin($_POST) > 0) : ?>
        <?php
        echo "<script>document.location.href = '';</script>";
        $addSuccess = $_POST["add_absen_izin_success"];

        // Buat session dengan nama "session_add_absen_izin_success" dengan waktu kadaluarsa
        $_SESSION["session_add_absen_izin_success"] = $addSuccess;
        $_SESSION["expiry_time_add_absen_izin_success_izin"] = time() + 6; // Waktu kadaluarsa dalam 5 detik
        ?>
      <?php endif; ?>
    <?php endif; ?>

  <?php endif; ?>
<?php endif; ?>

<!-- ========= CONDITION DATA ABSENSI ========= -->
<?php if (isset($_POST["add_absen_pulang"])) : ?>
  <?php if (add_absen_pulang($_POST) > 0) : ?>
    <?php
    echo "<script>document.location.href = '';</script>";
    $addSuccess = $_POST["add_absen_pulang_success"];

    // Buat session dengan nama "session_add_absen_pulang_success" dengan waktu kadaluarsa
    $_SESSION["session_add_absen_pulang_success"] = $addSuccess;
    $_SESSION["expiry_time_add_absen_pulang_success_pulang"] = time() + 6; // Waktu kadaluarsa dalam 5 detik
    ?>
  <?php endif; ?>
<?php endif; ?>

<?php if (isset($_POST["del_absen"])) : ?>
  <?php if (delete_absen(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode($_POST["id"])))))))))) > 0) : ?>
    <?php
    echo "<script>document.location.href = '';</script>";
    $deletedSuccess = $_POST["deleted_success"];

    // Buat session dengan nama "session_deleted_success" dengan waktu kadaluarsa
    $_SESSION["session_deleted_success"] = $deletedSuccess;
    $_SESSION["expiry_time_deleted_success"] = time() + 6; // Waktu kadaluarsa dalam 5 detik
    ?>
  <?php endif; ?>
<?php endif; ?>