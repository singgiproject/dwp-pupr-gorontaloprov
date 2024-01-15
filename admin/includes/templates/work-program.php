<?php if ($rowSession["level"] === $levelUser) : ?>
  <script>
    document.location.href = '<?= $url ?>admin/dashboard/home';
  </script>
<?php endif ?>

<!-- Level User -->

<?php if ($_GET["pages"] === "work-program") : ?>
  <main id="main" class="main main-data">

    <!-- PAGE TITLE -->
    <div class="pagetitle">
      <h1><?= $pageTitle; ?></h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?= $url; ?>dashboard">Home</a></li>
          <li class="breadcrumb-item">Publikasi</li>
          <li class="breadcrumb-item active"><?= $pageTitle; ?></li>
        </ol>
      </nav>
    </div>
    <!-- PAGE TITLE -->

    <!-- ====================================
   TEMPLATE WORK PROGRAM
   ===================================-->

    <section class="section dashboard">

      <div class="row">
        <!-- TABLE DATA WORK PROGRAM -->
        <?php
        // Hitung berapa data yang ingin ditampilkan per halaman
        $dataPerPageWorkProgram = 10;

        // Simulasikan data dari basis data Anda (ganti dengan data sesuai kebutuhan)
        $dataWorkProgram = [];

        foreach ($workProgram as $row) {
          // RESULT
          $idWorkProgram = $row["id"];
          $kegiatanWorkProgram = $row["kegiatan"];
          $tujuanWorkProgram = $row["tujuan"];
          $waktuWorkProgram = $row["waktu"];
          $penanggungJawabWorkProgram = $row["penanggung_jawab"];
          $anggaranWorkProgram = $row["anggaran"];
          $ketWorkProgram = $row["ket"];
          $dateWorkProgram = $row["date"];
          $timeWorkProgram = $row["time"];

          $dataWorkProgram[] = [
            "$idWorkProgram",
            "$kegiatanWorkProgram",
            "$tujuanWorkProgram",
            "$waktuWorkProgram",
            "$penanggungJawabWorkProgram",
            "$anggaranWorkProgram",
            "$ketWorkProgram",
            "$dateWorkProgram",
            "$timeWorkProgram",
          ];
        }

        // Ambil nilai halaman saat ini dari URL
        $currentPageWorkProgram = isset($_GET['page']) ? intval($_GET['page']) : 1;

        // Hitung offset untuk data yang akan ditampilkan pada halaman saat ini
        $offsetWorkProgram = ($_GET["page"] - 1) * $dataPerPageWorkProgram;

        // Ambil data yang sesuai dengan halaman saat ini
        $dataToShowWorkProgram = array_slice($dataWorkProgram, $offsetWorkProgram, $dataPerPageWorkProgram);

        // Hitung jumlah halaman
        $totalDataWorkProgram = count($dataWorkProgram);
        $totalPagesWorkProgram = ceil($totalDataWorkProgram / $dataPerPageWorkProgram);

        $noTableWorkProgram = ($currentPageWorkProgram - 1) * $dataPerPageWorkProgram + 1;

        ?>

        <div class="col-lg-12">
          <div class="row">

            <div class="col-12 card-data-table" id="code_access">

              <div class="card recent-sales overflow-auto">

                <div class="filter mx-4">
                  <a href="#" class="btn btn-success text-white" title="Upload Dokumen" data-bs-toggle="modal" data-bs-target="#modalAddWorkProgram">
                    <i class="bi bi-plus-circle fs-6"></i> Tambah <?= $pageTitle; ?>
                  </a>
                </div>

                <div class="card-body">
                  <h5 class="card-title">
                    <strong>Tabel Data <?= $pageTitle; ?></strong>
                  </h5>

                  <div class="search-table">
                    <form action="" method="post">
                      <table>
                        <tr>
                          <td>
                            <button type="submit" name="submit_search_work_program">
                              <i class="bi bi-search"></i>
                            </button>
                          </td>
                          <td>
                            <input type="search" name="keyword_work_program" placeholder="Cari program kerja..." autocomplete="off" autofocus>
                          </td>
                        </tr>
                      </table>
                    </form>
                  </div>

                  <table class="table table-hover mt-4">
                    <thead>
                      <tr>
                        <th scope="col">No</th>
                        <th scope="col">Aksi</th>
                        <th scope="col">Kegiatan</th>
                        <th scope="col">Tujuan</th>
                        <th scope="col">Waktu</th>
                        <th scope="col">Penanggung Jawab</th>
                        <th scope="col">Anggaran</th>
                        <th scope="col">Keterangan</th>
                        <th scope="col">Ditambahkan</th>
                      </tr>
                    </thead>
                    <tfoot>
                      <tr>
                        <th scope="col">No</th>
                        <th scope="col">Aksi</th>
                        <th scope="col">Kegiatan</th>
                        <th scope="col">Tujuan</th>
                        <th scope="col">Waktu</th>
                        <th scope="col">Penanggung Jawab</th>
                        <th scope="col">Anggaran</th>
                        <th scope="col">Keterangan</th>
                        <th scope="col">Ditambahkan</th>
                      </tr>
                    </tfoot>
                    <tbody>
                      <?php foreach ($dataToShowWorkProgram as $itemWorkProgram) : ?>
                        <tr>
                          <td><?= $noTableWorkProgram; ?></td>
                          <td>
                            <a href="#" class="action btn btn-success text-white mb-1" title="Upload Dokumen" data-bs-toggle="modal" data-bs-target="#modalEditWorkProgram<?= $itemWorkProgram[0]; ?>">
                              <i class="bi bi-pencil-square fs-6"></i> Ubah
                            </a>
                            <a href="#" class="action btn btn-danger text-white" data-bs-toggle="modal" data-bs-target="#modalDeletedWorkProgram<?= $itemWorkProgram[0]; ?>" title="Hapus"><i class="bi bi-trash fs-6"></i> Hapus</a>
                          </td>
                          <td><?= $itemWorkProgram[1]; ?></td>
                          <td><?= $itemWorkProgram[2]; ?></td>
                          <td><?= $itemWorkProgram[3]; ?></td>
                          <td>
                            <?php foreach ($team as $row) : ?>
                              <?php if ($row["id"] === $itemWorkProgram[4]) : ?>
                                <?= $row["name"]; ?> (<?= $row["position"]; ?>)
                              <?php endif; ?>
                            <?php endforeach; ?>
                          </td>
                          <td>
                            <?php if (empty($itemWorkProgram[5])) : ?>
                              <center>-</center>
                            <?php else : ?>
                              Rp<?= $itemWorkProgram[5]; ?>
                            <?php endif; ?>
                          </td>
                          <td>
                            <?php if (empty($itemWorkProgram[6])) : ?>
                              <center>-</center>
                            <?php else : ?>
                              <?= $itemWorkProgram[6]; ?>
                            <?php endif; ?>
                          </td>
                          <td>
                            <?= day_id($itemWorkProgram[7]); ?>,
                            <?= date_id($itemWorkProgram[7]); ?></td>
                        </tr>
                        <?php $noTableWorkProgram++; ?>
                      <?php endforeach; ?>

                    </tbody>
                  </table>

                  <nav aria-label="Page navigation example">
                    <ul class="pagination mt-3">
                      <?php if ($_GET["page"] > 1) : ?>
                        <li class="page-item">
                          <a class="page-link" href="<?= $url; ?>admin/dashboard/work-program/page/<?= $_GET["page"] - 1; ?>" aria-label="Previous">
                            <span aria-hidden="true"><i class="bi bi-chevron-double-left"></i></span>
                          </a>
                        </li>
                      <?php else : ?>
                        <li class="page-item disabled">
                          <span class="page-link" aria-label="Previous">
                            <span aria-hidden="true"><i class="bi bi-chevron-double-left"></i></span>
                          </span>
                        </li>
                      <?php endif; ?>

                      <?php for ($i = 1; $i <= $totalPagesWorkProgram; $i++) : ?>
                        <?php if ($i == 1 || $i == $_GET["page"] || $i == $totalPagesWorkProgram || ($i >= $_GET["page"] - 3 && $i <= $_GET["page"] + 3)) : ?>
                          <li class="page-item <?= ($_GET["page"] == $i) ? 'active' : ''; ?>">
                            <a class="page-link" href="<?= $url; ?>admin/dashboard/work-program/page/<?= $i ?>"><?= $i ?></a>
                          </li>
                        <?php elseif (($i == $_GET["page"] - 4 && $_GET["page"] > 7) || ($i == $_GET["page"] + 4 && $_GET["page"] < $totalPagesWorkProgram - 7)) : ?>
                          <li class="page-item disabled">
                            <span class="page-link">...</span>
                          </li>
                        <?php endif; ?>
                      <?php endfor; ?>

                      <?php if ($_GET["page"] < $totalPagesWorkProgram) : ?>
                        <li class="page-item">
                          <a class="page-link" href="<?= $url; ?>admin/dashboard/work-program/page/<?= $_GET["page"] + 1; ?>" aria-label="Next">
                            <span aria-hidden="true"><i class="bi bi-chevron-double-right"></i></span>
                          </a>
                        </li>
                      <?php else : ?>
                        <li class="page-item disabled">
                          <span class="page-link" aria-label="Next">
                            <span aria-hidden="true"><i class="bi bi-chevron-double-right"></i></span>
                          </span>
                        </li>
                      <?php endif; ?>
                    </ul>
                  </nav>

                </div>
              </div>

            </div>
            <!-- TABLE DATA WORK PROGRAM -->


            <!-- === MODAL ADD WORK PROGRAM === -->
            <div class="modal modal-dark-mode fade" id="modalAddWorkProgram" tabindex="-1" aria-labelledby="exampleModalLabelmodalAddWorkProgram" aria-hidden="true">
              <div class="modal-dialog modal-lg">
                <div class="modal-content">
                  <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabelmodalAddWorkProgram">Tambah <?= $pageTitle; ?></h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <div class="d-grid gap-2 col-12 mx-auto">
                      <form action="" class="row g-3 needs-validation" method="post" enctype="multipart/form-data" novalidate>
                        <div class="col-md-12 mb-2">
                          <label for="kegiatan">Kegiatan</label>
                          <input type="text" name="kegiatan" id="kegiatan" class="form-control" required placeholder="Masukan kegiatan">
                          <div class="invalid-feedback">
                            Harap masukan kegiatan
                          </div>
                        </div>

                        <div class="col-md-12 mb-2">
                          <label for="tujuan">Tujuan</label>
                          <textarea type="text" name="tujuan" id="tujuan" class="form-control" required placeholder="Masukan tujuan" style="height: 80px;"></textarea>
                          <div class="invalid-feedback">
                            Harap masukan tujuan
                          </div>
                        </div>

                        <div class="col-md-12 mb-2">
                          <label for="waktu">Waktu</label>
                          <textarea type="text" name="waktu" id="waktu" class="form-control" required placeholder="Masukan waktu" style="height: 80px;"></textarea>
                          <div class="invalid-feedback">
                            Harap masukan waktu
                          </div>
                        </div>

                        <div class="col-md-12 mb-2">
                          <label for="penanggung_jawab">Penanggung Jawab</label>
                          <select class="form-control" required name="penanggung_jawab" id="penanggung_jawab">
                            <option value="">--- Pilih Penanggung Jawab ---</option>
                            <?php foreach ($team as $row) : ?>
                              <option value="<?= $row["id"]; ?>"><?= $row["name"]; ?> (<?= $row["position"]; ?>)</option>
                            <?php endforeach; ?>
                          </select>
                          <div class="invalid-feedback">
                            Harap pilih penanggung jawab
                          </div>
                        </div>

                        <div class="col-md-12 input-group">
                          <label for="anggaran">Anggaran</label>
                        </div>
                        <div class="col-md-12 input-group mb-2">
                          <span class="input-group-text" id="basic-addon1">Rp</span>
                          <input type="text" name="anggaran" id="anggaran" class="form-control" placeholder="Masukkan anggaran" oninput="formatRupiah(this.value)">
                        </div>
                        <script>
                          function formatRupiah(angka) {
                            var numericValue = angka.replace(/\D/g, '');
                            var formattedAngka = numericValue.replace(/\B(?=(\d{3})+(?!\d))/g, ".");
                            document.getElementById('anggaran').value = formattedAngka;
                          }
                        </script>


                        <div class="col-md-12 mb-2">
                          <label for="ket">Keterangan</label>
                          <textarea type="text" name="ket" id="ket" class="form-control" placeholder="Masukan keterangan" style="height: 80px;"></textarea>
                        </div>

                        <div class="col-12">
                          <input type="text" name="add_success" value="add_success" hidden>
                          <button class="btn btn-success text-white" type="submit" name="add_work_program"><i class="bi bi-floppy2"></i> Simpan</button>
                        </div>
                      </form>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                  </div>
                </div>
              </div>
            </div>
            <!-- === end MODAL ADD WORK PROGRAM === -->

            <!-- === MODAL EDIT WORK PROGRAM === -->
            <?php foreach ($dataToShowWorkProgram as $itemWorkProgram) : ?>
              <div class="modal modal-dark-mode fade" id="modalEditWorkProgram<?= $itemWorkProgram[0]; ?>" tabindex="-1" aria-labelledby="exampleModalLabelEditWorkProgram<?= $itemWorkProgram[0]; ?>" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h1 class="modal-title fs-5" id="exampleModalLabelEditWorkProgram<?= $itemWorkProgram[0]; ?>">Ubah <?= $pageTitle; ?></h1>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <div class="d-grid gap-2 col-12 mx-auto">
                        <form action="" class="row g-3 needs-validation" method="post" enctype="multipart/form-data" novalidate>
                          <input type="text" hidden name="id" value="<?= base64_encode(base64_encode(base64_encode(base64_encode(base64_encode(base64_encode(base64_encode(base64_encode(base64_encode($itemWorkProgram[0]))))))))); ?>">
                          <div class="col-md-12 mb-2">
                            <label for="kegiatan">Kegiatan</label>
                            <input type="text" name="kegiatan" id="kegiatan" class="form-control" required placeholder="Masukan kegiatan" value="<?= $itemWorkProgram[1]; ?>">
                            <div class="invalid-feedback">
                              Harap masukan kegiatan
                            </div>
                          </div>

                          <div class="col-md-12 mb-2">
                            <label for="tujuan">Tujuan</label>
                            <textarea type="text" name="tujuan" id="tujuan" class="form-control" required placeholder="Masukan tujuan" style="height: 80px;"><?= $itemWorkProgram[2]; ?></textarea>
                            <div class="invalid-feedback">
                              Harap masukan tujuan
                            </div>
                          </div>

                          <div class="col-md-12 mb-2">
                            <label for="waktu">Waktu</label>
                            <textarea type="text" name="waktu" id="waktu" class="form-control" required placeholder="Masukan waktu" style="height: 80px;"><?= $itemWorkProgram[3]; ?></textarea>
                            <div class="invalid-feedback">
                              Harap masukan waktu
                            </div>
                          </div>

                          <div class="col-md-12 mb-2">
                            <label for="penanggung_jawab">Penanggung Jawab</label>
                            <select class="form-control" required name="penanggung_jawab" id="penanggung_jawab">
                              <option value="">--- Pilih Penanggung Jawab ---</option>
                              <?php foreach ($team as $row) : ?>
                                <option value="<?= $row["id"]; ?>" <?php if ($itemWorkProgram[4] === $row["id"]) : ?>selected<?php endif; ?>><?= $row["name"]; ?> (<?= $row["position"]; ?>)</option>
                              <?php endforeach; ?>
                            </select>
                            <div class="invalid-feedback">
                              Harap pilih penanggung jawab
                            </div>
                          </div>

                          <div class="col-md-12 input-group">
                            <label for="anggaran">Anggaran</label>
                          </div>
                          <div class="col-md-12 input-group mb-2">
                            <span class="input-group-text" id="basic-addon1">Rp</span>
                            <input type="text" name="anggaran" id="anggaran<?= $itemWorkProgram[0]; ?>" class="form-control" placeholder="Masukkan anggaran" oninput="formatRupiah<?= $itemWorkProgram[0]; ?>(this.value)" value="<?= $itemWorkProgram[5]; ?>">
                          </div>
                          <script>
                            function formatRupiah<?= $itemWorkProgram[0]; ?>(angka) {
                              var numericValue = angka.replace(/\D/g, '');
                              var formattedAngka = numericValue.replace(/\B(?=(\d{3})+(?!\d))/g, ".");
                              document.getElementById('anggaran<?= $itemWorkProgram[0]; ?>').value = formattedAngka;
                            }
                          </script>

                          <div class="col-md-12 mb-2">
                            <label for="ket">Keterangan</label>
                            <textarea type="text" name="ket" id="ket" class="form-control" placeholder="Masukan keterangan" style="height: 80px;"><?= $itemWorkProgram[6]; ?></textarea>
                          </div>

                          <div class="col-12">
                            <input type="text" name="edit_success" value="edit_success" hidden>
                            <button class="btn bg-purple-1 text-white" type="submit" name="edit_work_program"><i class="bi bi-floppy2"></i> Simpan</button>
                          </div>
                        </form>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    </div>
                  </div>
                </div>
              </div>
            <?php endforeach; ?>
            <!-- === end MODAL EDIT WORK PROGRAM === -->


            <!-- MODAL DELETE WORK PROGRAM -->
            <?php foreach ($dataToShowWorkProgram as $itemWorkProgram) : ?>
              <div class="modal modal-dark-mode fade" id="modalDeletedWorkProgram<?= $itemWorkProgram[0]; ?>" tabindex="-1" aria-labelledby="exampleModalLabelDeletedWorkProgram<?= $itemWorkProgram[0]; ?>" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h1 class="modal-title fs-5" id="exampleModalLabelDeletedWorkProgram<?= $itemWorkProgram[0]; ?>">Hapus?</h1>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <p>Penghapusan bersifat permanen. Anda yakin ingin menghapus data ini?</p>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batalkan</button>
                      <form action="" method="post">
                        <input type="text" name="id" hidden value="<?= base64_encode(base64_encode(base64_encode(base64_encode(base64_encode(base64_encode(base64_encode(base64_encode(base64_encode($itemWorkProgram[0]))))))))); ?>">
                        <input type="text" name="deleted_success" value="deleted_success" hidden>
                        <button type="submit" name="del_work_program" class="btn btn-danger">Hapus</button>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            <?php endforeach; ?>
            <!-- end MODAL DELETE WORK PROGRAM -->


          </div>

        </div>
    </section>
    <!-- ====================================
   end TEMPLATE WORK PROGRAM
   ===================================-->

  </main>

  <!-- ========= NOTIFICATIONS SWEET ALERT =========-->
  <?php
  // Tampilkan session jika ada dan belum kadaluarsa
  if (isset($_SESSION["session_add_success"]) && isset($_SESSION["expiry_time_add_success"]) && $_SESSION["expiry_time_add_success"] > time()) : ?>
    <script>
      document.addEventListener('DOMContentLoaded', function() {
        Swal.fire({
          title: "Program kerja berhasil ditambahkan!",
          icon: "success",
          position: "center",
          timer: 4000
        });
      });
    </script>
  <?php endif; ?>

  <!-- Notification Edit Success -->
  <?php
  // Tampilkan session jika ada dan belum kadaluarsa
  if (isset($_SESSION["session_edit_success"]) && isset($_SESSION["expiry_time_edit_success"]) && $_SESSION["expiry_time_edit_success"] > time()) : ?>
    <script>
      document.addEventListener('DOMContentLoaded', function() {
        Swal.fire({
          title: "Program kerja berhasil diubah!",
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
          title: "Program kerja berhasil dihapus!",
          icon: "success",
          position: "center",
          timer: 4000 // 
        });
      });
      unset($_SESSION["session_deleted_success"]); // Clear the notification session
    </script>
  <?php endif; ?>
  <!-- ========= end NOTIFICATIONS SWEET ALERT =========-->


  <!-- ========= CONDITION DATA WORK PROGRAM ========= -->
  <?php if (isset($_POST["add_work_program"])) : ?>
    <?php if (add_work_program($_POST) > 0) : ?>
      <?php
      echo "<script>document.location.href = '';</script>";
      $addSuccess = $_POST["add_success"];

      // Buat session dengan nama "session_add_success" dengan waktu kadaluarsa
      $_SESSION["session_add_success"] = $addSuccess;
      $_SESSION["expiry_time_add_success"] = time() + 6; // Waktu kadaluarsa dalam 5 detik
      ?>
    <?php endif; ?>
  <?php endif; ?>


  <?php if (isset($_POST["edit_work_program"])) : ?>
    <?php if (edit_work_program($_POST) > 0) : ?>
      <?php
      echo "<script>document.location.href = '';</script>";
      $editSuccess = $_POST["edit_success"];

      // Buat session dengan nama "session_edit_success" dengan waktu kadaluarsa
      $_SESSION["session_edit_success"] = $editSuccess;
      $_SESSION["expiry_time_edit_success"] = time() + 6; // Waktu kadaluarsa dalam 5 detik
      ?>

    <?php endif; ?>
  <?php endif; ?>

  <?php if (isset($_POST["del_work_program"])) : ?>
    <?php if (delete_work_program(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode($_POST["id"])))))))))) > 0) : ?>
      <?php
      echo "<script>document.location.href = '';</script>";
      $deletedSuccess = $_POST["deleted_success"];

      // Buat session dengan nama "session_deleted_success" dengan waktu kadaluarsa
      $_SESSION["session_deleted_success"] = $deletedSuccess;
      $_SESSION["expiry_time_deleted_success"] = time() + 6; // Waktu kadaluarsa dalam 5 detik
      ?>
    <?php endif; ?>
  <?php endif; ?>
  <!-- ========= end CONDITION DATA WORK PROGRAM ========= -->


<?php endif; ?>
<!-- end Leve User -->