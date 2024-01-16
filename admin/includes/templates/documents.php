<?php if ($rowSession["level"] === $levelUser) : ?>
  <script>
    document.location.href = '<?= $url ?>admin/dashboard/home';
  </script>
<?php endif ?>

<!-- Level User -->

<?php if ($_GET["pages"] === "documents") : ?>
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
   TEMPLATE DOCUMENTS
   ===================================-->

    <section class="section dashboard">

      <div class="row">
        <!-- TABLE DATA DOCUMENTS -->
        <?php
        // Hitung berapa data yang ingin ditampilkan per halaman
        $dataPerPageDocuments = 10;

        // Simulasikan data dari basis data Anda (ganti dengan data sesuai kebutuhan)
        $dataDocuments = [];

        foreach ($documents as $row) {
          // RESULT
          $idDocuments = $row["id"];
          $titleDocuments = $row["title"];
          $fileDocuments = $row["file"];
          $dateDocuments = $row["date"];

          $dataDocuments[] = [
            "$idDocuments",
            "$titleDocuments",
            "$fileDocuments",
            "$dateDocuments",
          ];
        }

        // Ambil nilai halaman saat ini dari URL
        $currentPageDocuments = isset($_GET['page']) ? intval($_GET['page']) : 1;

        // Hitung offset untuk data yang akan ditampilkan pada halaman saat ini
        $offsetDocuments = ($_GET["page"] - 1) * $dataPerPageDocuments;

        // Ambil data yang sesuai dengan halaman saat ini
        $dataToShowDocuments = array_slice($dataDocuments, $offsetDocuments, $dataPerPageDocuments);

        // Hitung jumlah halaman
        $totalDataDocuments = count($dataDocuments);
        $totalPagesDocuments = ceil($totalDataDocuments / $dataPerPageDocuments);

        $noTableDocuments = ($currentPageDocuments - 1) * $dataPerPageDocuments + 1;

        ?>

        <div class="col-lg-12">
          <div class="row">

            <div class="col-12 card-data-table" id="code_access">

              <div class="card recent-sales overflow-auto">

                <div class="filter mx-4">
                  <a href="#" class="btn btn-success text-white" title="Upload Dokumen" data-bs-toggle="modal" data-bs-target="#modalAddDocuments">
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
                            <button type="submit" name="submit_search_documents">
                              <i class="bi bi-search"></i>
                            </button>
                          </td>
                          <td>
                            <input type="search" name="keyword_documents" placeholder="Cari dokumen..." autocomplete="off" autofocus>
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
                        <th scope="col">Dokumen</th>
                        <th scope="col">Ditambahkan</th>
                      </tr>
                    </thead>
                    <tfoot>
                      <tr>
                        <th scope="col">No</th>
                        <th scope="col">Aksi</th>
                        <th scope="col">Dokumen</th>
                        <th scope="col">Ditambahkan</th>
                      </tr>
                    </tfoot>
                    <tbody>
                      <?php if (isset($_POST["submit_search_documents"])) : ?>
                        <?php if (empty($dataToShowDocuments)) : ?>
                          <tr>
                            <td colspan="4">
                              <center>Tidak ada data dalam tabel</center>
                            </td>
                          </tr>
                        <?php endif; ?>
                      <?php endif; ?>
                      <?php foreach ($dataToShowDocuments as $itemDocuments) : ?>
                        <tr>
                          <td><?= $noTableDocuments; ?></td>
                          <td>
                            <a href="#" class="action btn btn-success text-white mb-1" title="Upload Dokumen" data-bs-toggle="modal" data-bs-target="#modalEditDocuments<?= $itemDocuments[0]; ?>">
                              <i class="bi bi-pencil-square fs-6"></i> Ubah
                            </a>
                            <a href="#" class="action btn btn-danger text-white" data-bs-toggle="modal" data-bs-target="#modalDeletedDocuments<?= $itemDocuments[0]; ?>" title="Hapus"><i class="bi bi-trash fs-6"></i> Hapus</a>

                            <a href="<?= $url; ?>downloads/documents/<?= $itemDocuments[2]; ?>" class="action btn btn-warning text-white" title="Download"><i class="bi bi-download fs-6"></i> Download</a>
                          </td>
                          <td><?= $itemDocuments[1]; ?></td>
                          <td>
                            <?= day_id($itemDocuments[3]); ?>,
                            <?= date_id($itemDocuments[3]); ?></td>
                        </tr>
                        <?php $noTableDocuments++; ?>
                      <?php endforeach; ?>

                    </tbody>
                  </table>

                  <nav aria-label="Page navigation example">
                    <ul class="pagination mt-3">
                      <?php if ($_GET["page"] > 1) : ?>
                        <li class="page-item">
                          <a class="page-link" href="<?= $url; ?>admin/dashboard/documents/page/<?= $_GET["page"] - 1; ?>" aria-label="Previous">
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

                      <?php for ($i = 1; $i <= $totalPagesDocuments; $i++) : ?>
                        <?php if ($i == 1 || $i == $_GET["page"] || $i == $totalPagesDocuments || ($i >= $_GET["page"] - 3 && $i <= $_GET["page"] + 3)) : ?>
                          <li class="page-item <?= ($_GET["page"] == $i) ? 'active' : ''; ?>">
                            <a class="page-link" href="<?= $url; ?>admin/dashboard/documents/page/<?= $i ?>"><?= $i ?></a>
                          </li>
                        <?php elseif (($i == $_GET["page"] - 4 && $_GET["page"] > 7) || ($i == $_GET["page"] + 4 && $_GET["page"] < $totalPagesDocuments - 7)) : ?>
                          <li class="page-item disabled">
                            <span class="page-link">...</span>
                          </li>
                        <?php endif; ?>
                      <?php endfor; ?>

                      <?php if ($_GET["page"] < $totalPagesDocuments) : ?>
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
            <!-- TABLE DATA DOCUMENTS -->


            <!-- === MODAL ADD DOCUMENTS === -->
            <div class="modal modal-dark-mode fade" id="modalAddDocuments" tabindex="-1" aria-labelledby="exampleModalLabelmodalAddDocuments" aria-hidden="true">
              <div class="modal-dialog modal-lg">
                <div class="modal-content">
                  <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabelmodalAddDocuments">Tambah <?= $pageTitle; ?></h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <div class="d-grid gap-2 col-12 mx-auto">
                      <form action="" class="row g-3 needs-validation" method="post" enctype="multipart/form-data" novalidate>
                        <div class="col-md-12 mb-2">
                          <label for="title">Judul Dokumen</label>
                          <input type="text" name="title" id="title" class="form-control" required placeholder="Masukan judul dokumen">
                          <div class="invalid-feedback">
                            Harap masukan judul dokumen
                          </div>
                        </div>

                        <div class="col-md-12 mb-2">
                          <label for="file">File</label>
                          <input type="file" name="file" id="file" class="form-control" accept=".docx, .doc, .pdf, .xlsx" required>
                          <div class="invalid-feedback">
                            Harap pilih file dengan ekstensi .docx, .doc, .pdf, atau .xlsx
                          </div>
                        </div>

                        <div class="col-12">
                          <input type="text" name="add_success" value="add_success" hidden>
                          <button class="btn btn-success text-white" type="submit" name="add_documents"><i class="bi bi-floppy2"></i> Simpan</button>
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
            <!-- === end MODAL ADD DOCUMENTS === -->

            <!-- === MODAL EDIT DOCUMENTS === -->
            <?php foreach ($dataToShowDocuments as $itemDocuments) : ?>
              <div class="modal modal-dark-mode fade" id="modalEditDocuments<?= $itemDocuments[0]; ?>" tabindex="-1" aria-labelledby="exampleModalLabelEditDocuments<?= $itemDocuments[0]; ?>" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h1 class="modal-title fs-5" id="exampleModalLabelEditDocuments<?= $itemDocuments[0]; ?>">Ubah <?= $pageTitle; ?></h1>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <div class="d-grid gap-2 col-12 mx-auto">
                        <form action="" class="row g-3 needs-validation" method="post" enctype="multipart/form-data" novalidate>
                          <input type="text" hidden name="id" value="<?= base64_encode(base64_encode(base64_encode(base64_encode(base64_encode(base64_encode(base64_encode(base64_encode(base64_encode($itemDocuments[0]))))))))); ?>">
                          <input type="text" hidden name="old_file_documents" value="<?= $itemDocuments[2]; ?>">
                          <div class="col-md-12 mb-2">
                            <label for="title">Judul Dokumen</label>
                            <input type="text" name="title" id="title" class="form-control" required placeholder="Masukan judul dokumen" value="<?= $itemDocuments[1]; ?>">
                            <div class="invalid-feedback">
                              Harap masukan judul dokumen
                            </div>
                          </div>

                          <div class="col-md-12 mb-2">
                            <label for="file">File</label>
                            <input type="file" name="file" id="file" class="form-control" accept=".docx, .doc, .pdf, .xlsx">
                            <div class="invalid-feedback">
                              Harap pilih file dengan ekstensi .docx, .doc, .pdf, atau .xlsx
                            </div>
                          </div>

                          <div class="col-12">
                            <input type="text" name="edit_success" value="edit_success" hidden>
                            <button class="btn bg-purple-1 text-white" type="submit" name="edit_documents"><i class="bi bi-floppy2"></i> Simpan</button>
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
            <!-- === end MODAL EDIT DOCUMENTS === -->


            <!-- MODAL DELETE DOCUMENTS -->
            <?php foreach ($dataToShowDocuments as $itemDocuments) : ?>
              <div class="modal modal-dark-mode fade" id="modalDeletedDocuments<?= $itemDocuments[0]; ?>" tabindex="-1" aria-labelledby="exampleModalLabelDeletedDocuments<?= $itemDocuments[0]; ?>" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h1 class="modal-title fs-5" id="exampleModalLabelDeletedDocuments<?= $itemDocuments[0]; ?>">Hapus?</h1>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <p>Penghapusan bersifat permanen. Anda yakin ingin menghapus data ini?</p>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batalkan</button>
                      <form action="" method="post">
                        <input type="text" name="id" hidden value="<?= base64_encode(base64_encode(base64_encode(base64_encode(base64_encode(base64_encode(base64_encode(base64_encode(base64_encode($itemDocuments[0]))))))))); ?>">
                        <input type="text" name="deleted_success" value="deleted_success" hidden>
                        <button type="submit" name="del_documents" class="btn btn-danger">Hapus</button>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            <?php endforeach; ?>
            <!-- end MODAL DELETE DOCUMENTS -->


          </div>

        </div>
    </section>
    <!-- ====================================
   end TEMPLATE DOCUMENTS
   ===================================-->

  </main>

  <!-- ========= NOTIFICATIONS SWEET ALERT =========-->
  <?php
  // Tampilkan session jika ada dan belum kadaluarsa
  if (isset($_SESSION["session_add_success"]) && isset($_SESSION["expiry_time_add_success"]) && $_SESSION["expiry_time_add_success"] > time()) : ?>
    <script>
      document.addEventListener('DOMContentLoaded', function() {
        Swal.fire({
          title: "Dokumen berhasil ditambahkan!",
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
          title: "Dokumen berhasil diubah!",
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
          title: "Dokumen berhasil dihapus!",
          icon: "success",
          position: "center",
          timer: 4000 // 
        });
      });
      unset($_SESSION["session_deleted_success"]); // Clear the notification session
    </script>
  <?php endif; ?>
  <!-- ========= end NOTIFICATIONS SWEET ALERT =========-->


  <!-- ========= CONDITION DATA DOCUMENTS ========= -->
  <?php if (isset($_POST["add_documents"])) : ?>
    <?php if (add_documents($_POST) > 0) : ?>
      <?php
      echo "<script>document.location.href = '';</script>";
      $addSuccess = $_POST["add_success"];

      // Buat session dengan nama "session_add_success" dengan waktu kadaluarsa
      $_SESSION["session_add_success"] = $addSuccess;
      $_SESSION["expiry_time_add_success"] = time() + 6; // Waktu kadaluarsa dalam 5 detik
      ?>
    <?php endif; ?>
  <?php endif; ?>


  <?php if (isset($_POST["edit_documents"])) : ?>
    <?php if (edit_documents($_POST) > 0) : ?>
      <?php
      echo "<script>document.location.href = '';</script>";
      $editSuccess = $_POST["edit_success"];

      // Buat session dengan nama "session_edit_success" dengan waktu kadaluarsa
      $_SESSION["session_edit_success"] = $editSuccess;
      $_SESSION["expiry_time_edit_success"] = time() + 6; // Waktu kadaluarsa dalam 5 detik
      ?>

    <?php endif; ?>
  <?php endif; ?>

  <?php if (isset($_POST["del_documents"])) : ?>
    <?php if (delete_documents(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode($_POST["id"])))))))))) > 0) : ?>
      <?php
      echo "<script>document.location.href = '';</script>";
      $deletedSuccess = $_POST["deleted_success"];

      // Buat session dengan nama "session_deleted_success" dengan waktu kadaluarsa
      $_SESSION["session_deleted_success"] = $deletedSuccess;
      $_SESSION["expiry_time_deleted_success"] = time() + 6; // Waktu kadaluarsa dalam 5 detik
      ?>
    <?php endif; ?>
  <?php endif; ?>
  <!-- ========= end CONDITION DATA DOCUMENTS ========= -->


<?php endif; ?>
<!-- end Leve User -->