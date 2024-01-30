<?php if ($rowSession["level"] === $levelUser) : ?>
  <script>
    document.location.href = '<?= $url ?>admin/dashboard/home';
  </script>
<?php endif ?>

<!-- Level User -->

<?php if ($_GET["pages"] === "attendances") : ?>
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
   TEMPLATE ATTENDANCES
   ===================================-->

    <section class="section dashboard">

      <div class="row">
        <!-- TABLE DATA ATTENDANCES -->
        <?php
        // Hitung berapa data yang ingin ditampilkan per halaman
        $dataPerPageWorkProgram = 100;

        // Simulasikan data dari basis data Anda (ganti dengan data sesuai kebutuhan)
        $dataWorkProgram = [];

        foreach ($workProgram as $row) {
          // RESULT
          $idWorkProgram = $row["id"];
          $kegiatanWorkProgram = $row["kegiatan"];
          $tujuanWorkProgram = $row["tujuan"];
          $waktuWorkProgram = $row["waktu"];
          $penanggungJawabWorkProgram = $row["penanggung_jawab"];
          $anggaranJawabWorkProgram = $row["anggaran"];
          $ketWorkProgram = $row["ket"];
          $dateWorkProgram = $row["date"];
          $timeWorkProgram = $row["time"];

          $dataWorkProgram[] = [
            "$idWorkProgram",
            "$kegiatanWorkProgram",
            "$tujuanWorkProgram",
            "$waktuWorkProgram",
            "$penanggungJawabWorkProgram",
            "$anggaranJawabWorkProgram",
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

                <div class="card-body">
                  <h5 class="card-title">
                    <strong>Tabel Data <?= $pageTitle; ?></strong>
                  </h5>

                  <!-- <div class="search-table">
                    <form action="" method="post">
                      <table>
                        <tr>
                          <td>
                            <button type="submit" name="submit_search_work_program">
                              <i class="bi bi-search"></i>
                            </button>
                          </td>
                          <td>
                            <input type="search" name="keyword_documents" placeholder="Cari dokumen..." autocomplete="off" autofocus>
                          </td>
                        </tr>
                      </table>
                    </form>
                  </div> -->

                  <table class="table table-hover mt-4">
                    <thead>
                      <tr>
                        <th scope="col">No</th>
                        <th scope="col">Aksi</th>
                        <th scope="col">Program Kerja</th>
                      </tr>
                    </thead>
                    <tfoot>
                      <tr>
                        <th scope="col">No</th>
                        <th scope="col">Aksi</th>
                        <th scope="col">Program Kerja</th>
                      </tr>
                    </tfoot>
                    <tbody>
                      <?php if (isset($_POST["submit_search_work_program"])) : ?>
                        <?php if (empty($dataToShowWorkProgram)) : ?>
                          <tr>
                            <td colspan="4">
                              <center>Tidak ada data dalam tabel</center>
                            </td>
                          </tr>
                        <?php endif; ?>
                      <?php endif; ?>
                      <?php foreach ($dataToShowWorkProgram as $itemWorkProgram) : ?>
                        <tr>
                          <td style="width: 0px;"><?= $noTableWorkProgram; ?></td>
                          <td style="width: 100px;">
                            <a href="#" class="action btn btn-success text-white mb-1" title="Upload Dokumen" data-bs-toggle="modal" data-bs-target="#modalViewAbsensiWorkProgram<?= $itemWorkProgram[0]; ?>">
                              <i class="bi bi-eye fs-6"></i> Lihat
                            </a>
                          </td>
                          <td><?= $itemWorkProgram[1]; ?></td>
                        </tr>
                        <?php $noTableWorkProgram++; ?>
                      <?php endforeach; ?>

                    </tbody>
                  </table>

                  <nav aria-label="Page navigation example">
                    <ul class="pagination mt-3">
                      <?php if ($_GET["page"] > 1) : ?>
                        <li class="page-item">
                          <a class="page-link" href="<?= $url; ?>admin/dashboard/attendances/page/<?= $_GET["page"] - 1; ?>" aria-label="Previous">
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
                            <a class="page-link" href="<?= $url; ?>admin/dashboard/attendances/page/<?= $i ?>"><?= $i ?></a>
                          </li>
                        <?php elseif (($i == $_GET["page"] - 4 && $_GET["page"] > 7) || ($i == $_GET["page"] + 4 && $_GET["page"] < $totalPagesWorkProgram - 7)) : ?>
                          <li class="page-item disabled">
                            <span class="page-link">...</span>
                          </li>
                        <?php endif; ?>
                      <?php endfor; ?>

                      <?php if ($_GET["page"] < $totalPagesWorkProgram) : ?>
                        <li class="page-item">
                          <a class="page-link" href="<?= $url; ?>admin/dashboard/attendances/page/<?= $_GET["page"] + 1; ?>" aria-label="Next">
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
            <!-- TABLE DATA ATTENDANCES -->

            <!-- === MODAL VIEW ATTENDANCES === -->
            <?php foreach ($dataToShowWorkProgram as $itemWorkProgram) : ?>
              <div class="modal modal-dark-mode fade" id="modalViewAbsensiWorkProgram<?= $itemWorkProgram[0]; ?>" tabindex="-1" aria-labelledby="exampleModalLabelEditWorkProgram<?= $itemWorkProgram[0]; ?>" aria-hidden="true">
                <div class="modal-dialog modal-xl">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h1 class="modal-title fs-5" id="exampleModalLabelEditWorkProgram<?= $itemWorkProgram[0]; ?>"><?= $pageTitle; ?> - <?= $itemWorkProgram[1]; ?></h1>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <div class="d-grid gap-2 col-12 mx-auto">
                        <table class="table table-hover mt-4">
                          <thead>
                            <tr>
                              <th scope="col">No</th>
                              <th scope="col">Nama</th>
                              <th scope="col">Tgl</th>
                              <th scope="col">Jm Masuk</th>
                              <th scope="col">Jm Keluar</th>
                              <th scope="col">Lokasi</th>
                              <th scope="col">Ket</th>
                              <th scope="col">Deskripsi</th>
                            </tr>
                          </thead>
                          <tfoot>
                            <tr>
                              <th scope="col">No</th>
                              <th scope="col">Nama</th>
                              <th scope="col">Tgl</th>
                              <th scope="col">Jm Masuk</th>
                              <th scope="col">Jm Keluar</th>
                              <th scope="col">Lokasi</th>
                              <th scope="col">Ket</th>
                              <th scope="col">Deskripsi</th>
                            </tr>
                          </tfoot>
                          <tbody>
                            <?php $noTableAttendances = 1; ?>
                            <?php foreach ($attendances as $rowAttendances) : ?>
                              <?php foreach ($users as $rowUsers) : ?>
                                <?php foreach ($workProgram as $rowWorkProgram) : ?>
                                  <?php if ($rowAttendances["id_user"] === $rowUsers["id"]) : ?>
                                    <?php if ($rowWorkProgram["id"] === $rowAttendances["id_work_program"]) : ?>
                                      <tr>
                                        <td style="width: 0px;"><?= $noTableAttendances; ?></td>
                                        <td><?= $rowUsers["full_name"]; ?></td>
                                        <td>
                                          <?= day_id($rowAttendances["tgl"]); ?>,
                                          <?= date_id($rowAttendances["tgl"]); ?>
                                        </td>
                                        <td>
                                          <?php if (strlen($rowAttendances["clock_in"]) > 2) : ?>
                                            <?= str_replace("-", ":", $rowAttendances["clock_in"]); ?>
                                          <?php elseif ($rowAttendances["clock_in"] === "1" || $rowAttendances["clock_in"] === "2") : ?>
                                            -
                                          <?php endif; ?>
                                        </td>
                                        <td>
                                          <?php if ($rowAttendances["clock_out"] === "0") : ?>
                                            -
                                          <?php elseif (strlen($rowAttendances["clock_out"]) > 2) : ?>
                                            <?= str_replace("-", ":", $rowAttendances["clock_out"]); ?>
                                          <?php elseif ($rowAttendances["clock_out"] === "1" || $rowAttendances["clock_out"] === "2") : ?>
                                            -
                                          <?php endif; ?>
                                        </td>
                                        <td>
                                          <?php if ($rowAttendances["location"] === "0") : ?>
                                            -
                                          <?php elseif (strlen($rowAttendances["location"]) > 2) : ?>
                                            <a href="https://www.google.com/maps?q=<?= $rowAttendances["location"]; ?>" target="_blank" class="badge rounded-pill text-bg-info"><i class="bi bi-geo-alt-fill"></i> Lokasi</a>
                                          <?php endif; ?>
                                        </td>
                                        <td>
                                          <?php if ($rowAttendances["clock_out"] === "0") : ?>
                                            <span class="badge rounded-pill text-bg-warning">Belum absen pulang</span>
                                          <?php elseif (strlen($rowAttendances["clock_out"]) > 2) : ?>
                                            <span class="badge rounded-pill text-bg-success">Hadir</span>
                                          <?php elseif ($rowAttendances["clock_in"] === "1") : ?>
                                            <span class="badge rounded-pill text-bg-danger">Sakit</span>
                                          <?php elseif ($rowAttendances["clock_in"] === "2") : ?>
                                            <span class="badge rounded-pill text-bg-warning">Izin</span>
                                          <?php endif; ?>
                                        </td>
                                        <td>
                                          <?php if ($rowAttendances["description"] === "0") : ?>
                                            -
                                          <?php else : ?>
                                            <?= $rowAttendances["description"]; ?>
                                          <?php endif; ?>
                                        </td>
                                      </tr>
                                      <?php $noTableAttendances++; ?>
                                    <?php endif; ?>
                                  <?php endif; ?>
                                <?php endforeach; ?>
                              <?php endforeach; ?>
                            <?php endforeach; ?>

                          </tbody>
                        </table>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    </div>
                  </div>
                </div>
              </div>
            <?php endforeach; ?>
            <!-- === end MODAL VIEW ATTENDANCES === -->


          </div>

        </div>
    </section>
    <!-- ====================================
   end TEMPLATE ATTENDANCES
   ===================================-->

  </main>


<?php endif; ?>
<!-- end Leve User -->