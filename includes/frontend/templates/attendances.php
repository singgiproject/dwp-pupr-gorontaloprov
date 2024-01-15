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
      <!-- DATA WORK PROGRAM -->
      <?php
      // Hitung berapa data yang ingin ditampilkan per halaman
      $dataPerPageAbsenSession = 10;

      // Simulasikan data dari basis data Anda (ganti dengan data sesuai kebutuhan)
      $dataAbsenSession = [];

      foreach ($absenSession as $row) {
        // RESULT
        $idAbsenSession = $row["id"];
        $tglAbsenSession = $row["tgl"];
        $clockInAbsenSession = $row["clock_in"];
        $clockOutAbsenSession = $row["clock_out"];
        $locationAbsenSession = $row["location"];
        $descriptionAbsenSession = $row["description"];

        $dataAbsenSession[] = [
          "$idAbsenSession",
          "$tglAbsenSession",
          "$clockInAbsenSession",
          "$clockOutAbsenSession",
          "$locationAbsenSession",
          "$descriptionAbsenSession",
        ];
      }

      // Ambil nilai halaman saat ini dari URL
      $currentPageAbsenSession = isset($_GET['page']) ? intval($_GET['page']) : 1;

      // Hitung offset untuk data yang akan ditampilkan pada halaman saat ini
      $offsetAbsenSession = ($_GET["page"] - 1) * $dataPerPageAbsenSession;

      // Ambil data yang sesuai dengan halaman saat ini
      $dataToShowAbsenSession = array_slice($dataAbsenSession, $offsetAbsenSession, $dataPerPageAbsenSession);

      // Hitung jumlah halaman
      $totalDataAbsenSession = count($dataAbsenSession);
      $totalPagesAbsenSession = ceil($totalDataAbsenSession / $dataPerPageAbsenSession);

      $noTableAbsenSession = ($currentPageAbsenSession - 1) * $dataPerPageAbsenSession + 1;

      ?>


      <div class="head-title-content mt-5 mb-3">
        <h4><span>ABSENSI</span> ANGGOTA</h4>
      </div>
      <h5 class="text-center mt-2 mb-3">Halo, <strong><?= $rowSession["full_name"]; ?>!</strong></h5>
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
          </tr>
        </tfoot>
        <tbody>
          <?php foreach ($dataToShowAbsenSession as $itemAbsenSession) : ?>
            <tr>
              <td><?= $noTableAbsenSession; ?></td>
              <td>
                <?= day_id($itemAbsenSession[1]); ?>,
                <?= date_id($itemAbsenSession[1]); ?>
              </td>
              <td>
                <?php if (strlen($itemAbsenSession[2]) > 2) : ?>
                  <?= str_replace("-", ":", $itemAbsenSession[2]); ?>
                <?php elseif ($itemAbsenSession[2] === "1" || $itemAbsenSession[2] === "2") : ?>
                  -
                <?php endif; ?>
              </td>
              <td>
                <?php if ($itemAbsenSession[3] === "0") : ?>
                  -
                <?php elseif (strlen($itemAbsenSession[3]) > 2) : ?>
                  <?= str_replace("-", ":", $itemAbsenSession[3]); ?>
                <?php elseif ($itemAbsenSession[3] === "1" || $itemAbsenSession[3] === "2") : ?>
                  -
                <?php endif; ?>
              </td>
              <td>
                <?php if ($itemAbsenSession[4] === "0") : ?>
                  -
                <?php elseif (strlen($itemAbsenSession[4]) > 2) : ?>
                  <a href="https://www.google.com/maps?q=<?= $itemAbsenSession[4]; ?>" target="_blank" class="badge rounded-pill text-bg-info"><i class="bi bi-geo-alt-fill"></i> Lokasi</a>
                <?php endif; ?>
              </td>
              <td>
                <?php if ($itemAbsenSession[3] === "0") : ?>
                  <span class="badge rounded-pill text-bg-warning">Belum absen pulang</span>
                <?php elseif (strlen($itemAbsenSession[3]) > 2) : ?>
                  <span class="badge rounded-pill text-bg-success">Hadir</span>
                <?php elseif ($itemAbsenSession[2] === "1") : ?>
                  <span class="badge rounded-pill text-bg-danger">Sakit</span>
                <?php elseif ($itemAbsenSession[2] === "2") : ?>
                  <span class="badge rounded-pill text-bg-warning">Izin</span>
                <?php endif; ?>
              </td>
              <td>
                <?php if ($itemAbsenSession[5] === "0") : ?>
                  -
                <?php else : ?>
                  <?= $itemAbsenSession[5]; ?>
                <?php endif; ?>
              </td>
            </tr>
            <?php $noTableAbsenSession++; ?>
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

    <?php if ($itemAbsenSession[3] === "0") : ?>
      <!-- Check absen pulang -->
      <div class="row">
        <div class="col-12 button-absen">
          <form action="" method="post">
            <input type="text" hidden name="id" value="<?= base64_encode(base64_encode(base64_encode(base64_encode(base64_encode(base64_encode(base64_encode(base64_encode(base64_encode($itemAbsenSession[0]))))))))); ?>">
            <input type="text" name="add_absen_pulang_success" hidden>
            <button class="btn btn-warning" type="submit" name="add_absen_pulang">ABSEN PULANG</button>
          </form>
        </div>
      </div>
    <?php endif; ?>

    <?php foreach ($absenSessionDESC_LIMIT1 as $row) : ?>
      <?php if ($row["tgl"] === date("Y-m-d")) : ?>
        <?php if ($itemAbsenSession[3] !== "0") : ?>
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