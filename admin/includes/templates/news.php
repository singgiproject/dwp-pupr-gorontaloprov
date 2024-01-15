<?php if ($rowSession["level"] === $levelUser) : ?>
  <script>
    document.location.href = '<?= $url ?>admin/dashboard/home';
  </script>
<?php endif ?>

<!-- Level User -->

<?php if ($_GET["pages"] === "news") : ?>
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
   TEMPLATE NEWS
   ===================================-->

    <section class="section dashboard">

      <div class="row">

        <div class="col-lg-12">
          <div class="row">

            <div class="col-12 card-data-table" id="code_access">

              <div class="card recent-sales overflow-auto">

                <div class="filter mx-4">
                  <a href="#" class="btn btn-success text-white" title="Upload Dokumen" data-bs-toggle="modal" data-bs-target="#modalAddNewsCategory">
                    <i class="bi bi-plus-circle fs-6"></i> Tambah Kategori
                  </a>
                </div>

                <div class="card-body">
                  <h5 class="card-title">
                    <strong>Tabel Data Kategori</strong>
                  </h5>

                  <table class="table table-borderless datatable mt-4">
                    <thead>
                      <tr>
                        <th scope="col">No</th>
                        <th scope="col">Aksi</th>
                        <th scope="col">Kategori</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $noTableNewsCategory = 1; ?>
                      <?php foreach ($newsCategory as $row) : ?>
                        <tr>
                          <td style="width: 0px;"><?= $noTableNewsCategory; ?></td>
                          <td style="width: 0px;">
                            <a href="#" class="action btn btn-danger text-white" data-bs-toggle="modal" data-bs-target="#modalDeletedNewsCategory<?= $row["id"]; ?>" title="Hapus"><i class="bi bi-trash fs-6"></i> Hapus</a>
                          </td>
                          <td><?= $row["category"]; ?></td>
                        </tr>
                        <?php $noTableNewsCategory++; ?>
                      <?php endforeach; ?>

                    </tbody>
                  </table>

                </div>
              </div>

            </div>
            <!-- TABLE DATA CATEGORY NEWS -->


            <!-- === MODAL ADD CATEGORY NEWS === -->
            <div class="modal modal-dark-mode fade" id="modalAddNewsCategory" tabindex="-1" aria-labelledby="exampleModalLabelAddNewsCategory" aria-hidden="true">
              <div class="modal-dialog modal-lg">
                <div class="modal-content">
                  <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabelAddNewsCategory">Tambah Kategori Berita</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <div class="d-grid gap-2 col-12 mx-auto">
                      <form action="" class="row g-3 needs-validation" method="post" enctype="multipart/form-data" novalidate>
                        <div class="col-md-12 mb-2">
                          <label for="category">Kategori Berita</label>
                          <input type="text" name="category" id="category" class="form-control" required placeholder="Masukan kategori berita">
                          <div class="invalid-feedback">
                            Harap masukan kategori berita
                          </div>
                        </div>

                        <div class="col-12">
                          <input type="text" name="add_success_news_category" value="add_success" hidden>
                          <button class="btn btn-success text-white" type="submit" name="add_news_category"><i class="bi bi-floppy2"></i> Simpan</button>
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
            <!-- === end MODAL ADD CATEGORY NEWS === -->

            <!-- MODAL DELETE NEWS -->
            <?php foreach ($newsCategory as $row) : ?>
              <div class="modal modal-dark-mode fade" id="modalDeletedNewsCategory<?= $row["id"]; ?>" tabindex="-1" aria-labelledby="exampleModalLabelDeletedNewsCategory<?= $row["id"]; ?>" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h1 class="modal-title fs-5" id="exampleModalLabelDeletedNewsCategory<?= $row["id"]; ?>">Hapus?</h1>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <p>Anda yakin ingin menghapus data ini?</p>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batalkan</button>
                      <form action="" method="post">
                        <input type="text" name="id" hidden value="<?= base64_encode(base64_encode(base64_encode(base64_encode(base64_encode(base64_encode(base64_encode(base64_encode(base64_encode($row["id"]))))))))); ?>">
                        <button type="submit" name="del_news_category" class="btn btn-danger">Hapus</button>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            <?php endforeach; ?>
            <!-- end MODAL DELETE NEWS -->

          </div>
        </div>
      </div>



      <div class="row">
        <!-- TABLE DATA NEWS -->
        <?php
        // Hitung berapa data yang ingin ditampilkan per halaman
        $dataPerPageNews = 5;

        // Simulasikan data dari basis data Anda (ganti dengan data sesuai kebutuhan)
        $dataNews = [];

        foreach ($news as $row) {
          // RESULT
          $idNews = $row["id"];
          $titleNews = $row["title"];
          $thumbnailNews = $row["thumbnail"];
          $thumbnailCaptionNews = $row["thumbnail_caption"];
          $descriptionNews = $row["description"];
          $categoryNews = $row["category"];
          $tagsNews = $row["tags"];
          $postedNews = $row["posted"];
          $sharedNews = $row["shared"];
          $dateNews = $row["date"];
          $timeNews = $row["time"];

          $dataNews[] = [
            "$idNews",
            "$titleNews",
            "$thumbnailNews",
            "$thumbnailCaptionNews",
            "$descriptionNews",
            "$categoryNews",
            "$tagsNews",
            "$postedNews",
            "$sharedNews",
            "$dateNews",
            "$timeNews",
          ];
        }

        // Ambil nilai halaman saat ini dari URL
        $currentPageNews = isset($_GET['page']) ? intval($_GET['page']) : 1;

        // Hitung offset untuk data yang akan ditampilkan pada halaman saat ini
        $offsetNews = ($_GET["page"] - 1) * $dataPerPageNews;

        // Ambil data yang sesuai dengan halaman saat ini
        $dataToShowNews = array_slice($dataNews, $offsetNews, $dataPerPageNews);

        // Hitung jumlah halaman
        $totalDataNews = count($dataNews);
        $totalPagesNews = ceil($totalDataNews / $dataPerPageNews);

        $noTableNews = ($currentPageNews - 1) * $dataPerPageNews + 1;

        ?>

        <div class="col-lg-12">
          <div class="row">

            <div class="col-12 card-data-table" id="code_access">

              <div class="card recent-sales overflow-auto">

                <div class="filter mx-4">
                  <a href="#" class="btn btn-success text-white" title="Upload Dokumen" data-bs-toggle="modal" data-bs-target="#modalAddNews">
                    <i class="bi bi-plus-circle fs-6"></i> Tambah Berita
                  </a>
                </div>

                <div class="card-body">
                  <h5 class="card-title">
                    <strong>Tabel Data Berita</strong>
                  </h5>

                  <div class="search-table">
                    <form action="" method="post">
                      <table>
                        <tr>
                          <td>
                            <button type="submit" name="submit_search_news">
                              <i class="bi bi-search"></i>
                            </button>
                          </td>
                          <td>
                            <input type="search" name="keyword_news" placeholder="Cari berita..." autocomplete="off" autofocus>
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
                        <th scope="col">Thumbnail</th>
                        <th scope="col">Judul</th>
                        <th scope="col">Deskripsi</th>
                        <th scope="col">Kategori</th>
                        <th scope="col">Dipublikasi</th>
                      </tr>
                    </thead>
                    <tfoot>
                      <tr>
                        <th scope="col">No</th>
                        <th scope="col">Aksi</th>
                        <th scope="col">Thumbnail</th>
                        <th scope="col">Judul</th>
                        <th scope="col">Deskripsi</th>
                        <th scope="col">Kategori</th>
                        <th scope="col">Dipublikasi</th>
                      </tr>
                    </tfoot>
                    <tbody>
                      <?php foreach ($dataToShowNews as $itemNews) : ?>
                        <?php
                        $titleNews = $itemNews[1];
                        $titleNews = strtolower($titleNews);
                        $titleNews = str_replace(" ", "-", $titleNews);
                        $titleNews = preg_replace('/[^A-Za-z0-9\-]/', '', $titleNews);
                        ?>
                        <tr>
                          <td><?= $noTableNews; ?></td>
                          <td>
                            <a href="#" class="action btn btn-success text-white mb-1" title="Upload Dokumen" data-bs-toggle="modal" data-bs-target="#modalEditNews<?= $itemNews[0]; ?>">
                              <i class="bi bi-pencil-square fs-6"></i> Ubah
                            </a>
                            <a href="#" class="action btn btn-danger text-white" data-bs-toggle="modal" data-bs-target="#modalDeletedNews<?= $itemNews[0]; ?>" title="Hapus"><i class="bi bi-trash fs-6"></i> Hapus</a>
                          </td>
                          <td>
                            <a href="<?= $url; ?>news/<?= $titleNews; ?>-<?= $itemNews[0]; ?>" target="_blank">
                              <img src="<?= $url; ?>assets/img/news/<?= $itemNews[2]; ?>" alt="" width="80">
                            </a>
                          </td>
                          <td>
                            <a href="<?= $url; ?>news/<?= $titleNews; ?>-<?= $itemNews[0]; ?>" target="_blank">
                              <?= $itemNews[1]; ?>
                            </a>
                          </td>
                          <td>
                            <?php
                            $descriptionNews = $itemNews[4];
                            $wordsNews = explode(" ", $descriptionNews);
                            $shortDescriptionNews = implode(" ", array_slice($wordsNews, 0, 10));
                            ?>
                            <?= $shortDescriptionNews; ?>...
                          </td>
                          <td><?= $itemNews[5]; ?></td>
                          <td>
                            <?= day_id($itemNews[9]); ?>,
                            <?= date_id($itemNews[9]); ?></td>
                        </tr>
                        <?php $noTableNews++; ?>
                      <?php endforeach; ?>

                    </tbody>
                  </table>

                  <nav aria-label="Page navigation example">
                    <ul class="pagination mt-3">
                      <?php if ($_GET["page"] > 1) : ?>
                        <li class="page-item">
                          <a class="page-link" href="<?= $url; ?>admin/dashboard/news/page/<?= $_GET["page"] - 1; ?>" aria-label="Previous">
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

                      <?php for ($i = 1; $i <= $totalPagesNews; $i++) : ?>
                        <?php if ($i == 1 || $i == $_GET["page"] || $i == $totalPagesNews || ($i >= $_GET["page"] - 3 && $i <= $_GET["page"] + 3)) : ?>
                          <li class="page-item <?= ($_GET["page"] == $i) ? 'active' : ''; ?>">
                            <a class="page-link" href="<?= $url; ?>admin/dashboard/news/page/<?= $i ?>"><?= $i ?></a>
                          </li>
                        <?php elseif (($i == $_GET["page"] - 4 && $_GET["page"] > 7) || ($i == $_GET["page"] + 4 && $_GET["page"] < $totalPagesNews - 7)) : ?>
                          <li class="page-item disabled">
                            <span class="page-link">...</span>
                          </li>
                        <?php endif; ?>
                      <?php endfor; ?>

                      <?php if ($_GET["page"] < $totalPagesNews) : ?>
                        <li class="page-item">
                          <a class="page-link" href="<?= $url; ?>admin/dashboard/news/page/<?= $_GET["page"] + 1; ?>" aria-label="Next">
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
            <!-- TABLE DATA NEWS -->


            <!-- === MODAL ADD NEWS === -->
            <div class="modal modal-dark-mode fade" id="modalAddNews" tabindex="-1" aria-labelledby="exampleModalLabelmodalAddNews" aria-hidden="true">
              <div class="modal-dialog modal-xl">
                <div class="modal-content">
                  <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabelmodalAddNews">Post Berita</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <div class="d-grid gap-2 col-12 mx-auto">
                      <form action="" class="row g-3 needs-validation" method="post" enctype="multipart/form-data" novalidate>
                        <div class="col-md-12 mb-2">
                          <label for="title">Judul Berita</label>
                          <input type="text" name="title" id="title" class="form-control" required placeholder="Masukan judul berita">
                          <div class="invalid-feedback">
                            Harap masukan judul berita
                          </div>
                        </div>

                        <div class="col-md-12 mb-2">
                          <label for="category">Kategori</label>
                          <select class="form-control" required name="category" id="category">
                            <option value="">--- Pilih Kategori ---</option>
                            <?php foreach ($newsCategory as $row) : ?>
                              <option value="<?= $row["category"]; ?>"><?= $row["category"]; ?></option>
                            <?php endforeach; ?>
                          </select>
                          <div class="invalid-feedback">
                            Harap Pilih Kategori
                          </div>
                        </div>

                        <div class="col-md-12 mb-2">
                          <label for="thumbnail" class="form-label"><i class="bi bi-filetype-docx"></i> Thumbnail Berita</label>
                          <input type="file" class="form-control" name="thumbnail" id="thumbnail" required>
                          <small>Format File : <strong>.jpg, .jpeg, .png, .svg</strong> ukuran file maks <strong>2 MB</strong></small>
                          <div class="invalid-feedback">
                            Harap Upload Thumbnail Berita
                          </div>
                        </div>

                        <div class="col-md-12 mb-2">
                          <label for="thumbnail_caption">Keterangan Thumbnail <sup>(Opsional)</sup></label>
                          <input type="text" name="thumbnail_caption" id="thumbnail_caption" class="form-control" placeholder="Masukan Keterangan Thumbnail">
                        </div>

                        <div class="col-md-12 mb-2">
                          <label for="description" class="form-label">Deskripsi</label>
                          <textarea type="text" class="form-control" name="description" id="news_description" placeholder="Tambahkan Deskripsi" maxlength="512" oninput="updateCharCount(this)"></textarea>
                        </div>

                        <div class="col-md-12 mb-2">
                          <label for="tags">Tag</label>
                          <br>
                          <div class="tag-container" id="tagContainer"></div>
                          <input type="text" name="tags" id="tagsInput" class="form-control" placeholder="Masukkan tag atau kata kunci" autocomplete="off">
                          <small>Pisahkan tag dengan tanda koma (,)</small>
                          <div class="invalid-feedback">
                            Harap masukkan tag atau kata kunci
                          </div>
                        </div>
                        <script>
                          document.addEventListener('DOMContentLoaded', function() {
                            var tagsInput = document.getElementById('tagsInput');
                            var tagContainer = document.getElementById('tagContainer');

                            tagsInput.addEventListener('input', function() {
                              var tagsValue = tagsInput.value;
                              var tagsArray = tagsValue.split(',').map(tag => tag.trim());

                              // Bersihkan konten tagContainer
                              tagContainer.innerHTML = '';

                              // Tampilkan tag dalam tagContainer
                              tagsArray.forEach(function(tag) {
                                if (tag !== '') {
                                  var tagElement = document.createElement('div');
                                  tagElement.className = 'tag';
                                  tagElement.textContent = tag;
                                  tagContainer.appendChild(tagElement);
                                }
                              });
                            });
                          });
                        </script>

                        <div class="col-12">
                          <input type="text" name="add_success" value="add_success" hidden>
                          <button class="btn btn-success text-white" type="submit" name="add_news"><i class="bi bi-upload"></i> Publikasi Sekarang</button>
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
            <!-- === end MODAL ADD NEWS === -->

            <!-- === MODAL EDIT NEWS === -->
            <?php foreach ($dataToShowNews as $itemNews) : ?>
              <div class="modal modal-dark-mode fade" id="modalEditNews<?= $itemNews[0]; ?>" tabindex="-1" aria-labelledby="exampleModalLabelEditDocumentNews<?= $itemNews[0]; ?>" aria-hidden="true">
                <div class="modal-dialog modal-xl">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h1 class="modal-title fs-5" id="exampleModalLabelEditDocumentNews<?= $itemNews[0]; ?>">Ubah Berita</h1>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <div class="d-grid gap-2 col-12 mx-auto">
                        <form action="" class="row g-3 needs-validation" method="post" enctype="multipart/form-data" novalidate>
                          <input type="text" hidden name="id" value="<?= base64_encode(base64_encode(base64_encode(base64_encode(base64_encode(base64_encode(base64_encode(base64_encode(base64_encode($itemNews[0]))))))))); ?>">
                          <input type="text" hidden name="old_thumbnail" value="<?= $itemNews[2]; ?>">
                          <div class="col-md-12 mb-2">
                            <label for="title">Judul Berita</label>
                            <input type="text" name="title" id="title" class="form-control" required placeholder="Masukan judul berita" value="<?= $itemNews[1]; ?>">
                            <div class="invalid-feedback">
                              Harap masukan judul berita
                            </div>
                          </div>

                          <div class="col-md-12 mb-2">
                            <label for="category">Kategori</label>
                            <select class="form-control" required name="category" id="category">
                              <option value="">--- Pilih Kategori ---</option>
                              <?php foreach ($newsCategory as $row) : ?>
                                <option value="<?= $row["category"]; ?>" <?php if ($itemNews[5] === $row["category"]) : ?>selected<?php endif; ?>><?= $row["category"]; ?></option>
                              <?php endforeach; ?>
                            </select>
                            <div class="invalid-feedback">
                              Harap Pilih Kategori
                            </div>
                          </div>

                          <div class="col-md-12 mb-2">
                            <label for="thumbnail" class="form-label"><i class="bi bi-filetype-docx"></i> Thumbnail Berita</label>
                            <br>
                            <img src="<?= $url; ?>assets/img/news/<?= $itemNews[2]; ?>" alt="" width="80" class="mb-2">
                            <input type="file" class="form-control" name="thumbnail" id="thumbnail">
                            <small>Format File : <strong>.jpg, .jpeg, .png, .svg</strong> ukuran file maks <strong>2 MB</strong></small>
                          </div>

                          <div class="col-md-12 mb-2">
                            <label for="thumbnail_caption">Keterangan Thumbnail <sup>(Opsional)</sup></label>
                            <input type="text" name="thumbnail_caption" id="thumbnail_caption" class="form-control" placeholder="Masukan Keterangan Thumbnail" value="<?= $itemNews[3]; ?>">
                          </div>

                          <div class="col-md-12 mb-2">
                            <label for="description" class="form-label">Deskripsi</label>
                            <textarea type="text" class="form-control" name="description" id="news_description<?= $itemNews[0]; ?>" placeholder="Tambahkan Deskripsi" maxlength="512" oninput="updateCharCount(this)"><?= $itemNews[4]; ?></textarea>
                          </div>

                          <div class="col-md-12 mb-2">
                            <label for="tags">Tag</label>
                            <br>
                            <div class="tag-container" id="tagContainer<?= $itemNews[0]; ?>"></div>
                            <input type="text" name="tags" id="tagsInput<?= $itemNews[0]; ?>" class="form-control" placeholder="Masukkan tag atau kata kunci" autocomplete="off" value="<?= $itemNews[6]; ?>">
                            <small>Pisahkan tag dengan tanda koma (,)</small>
                            <div class="invalid-feedback">
                              Harap masukkan tag atau kata kunci
                            </div>
                          </div>
                          <script>
                            document.addEventListener('DOMContentLoaded', function() {
                              var tagsInput = document.getElementById('tagsInput<?= $itemNews[0]; ?>');
                              var tagContainer = document.getElementById('tagContainer<?= $itemNews[0]; ?>');

                              tagsInput.addEventListener('input', function() {
                                var tagsValue = tagsInput.value;
                                var tagsArray = tagsValue.split(',').map(tag => tag.trim());

                                // Bersihkan konten tagContainer
                                tagContainer.innerHTML = '';

                                // Tampilkan tag dalam tagContainer
                                tagsArray.forEach(function(tag) {
                                  if (tag !== '') {
                                    var tagElement = document.createElement('div');
                                    tagElement.className = 'tag';
                                    tagElement.textContent = tag;
                                    tagContainer.appendChild(tagElement);
                                  }
                                });
                              });
                            });
                          </script>

                          <div class="col-12">
                            <input type="text" name="edit_success" value="edit_success" hidden>
                            <button class="btn bg-purple-1 text-white" type="submit" name="edit_news"><i class="bi bi-save"></i> Publikasi Sekarang</button>
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
            <!-- === end MODAL EDIT NEWS === -->


            <!-- MODAL DELETE NEWS -->
            <?php foreach ($dataToShowNews as $itemNews) : ?>
              <div class="modal modal-dark-mode fade" id="modalDeletedNews<?= $itemNews[0]; ?>" tabindex="-1" aria-labelledby="exampleModalLabelDeletedDocumentNews<?= $itemNews[0]; ?>" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h1 class="modal-title fs-5" id="exampleModalLabelDeletedDocumentNews<?= $itemNews[0]; ?>">Hapus?</h1>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <p>Penghapusan bersifat permanen. Anda yakin ingin menghapus data ini?</p>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batalkan</button>
                      <form action="" method="post">
                        <input type="text" name="id" hidden value="<?= base64_encode(base64_encode(base64_encode(base64_encode(base64_encode(base64_encode(base64_encode(base64_encode(base64_encode($itemNews[0]))))))))); ?>">
                        <input type="text" name="deleted_success" value="deleted_success" hidden>
                        <button type="submit" name="del_news" class="btn btn-danger">Hapus</button>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            <?php endforeach; ?>
            <!-- end MODAL DELETE NEWS -->


          </div>

        </div>
    </section>
    <!-- ====================================
   end TEMPLATE NEWS
   ===================================-->

  </main>

  <!-- ========= NOTIFICATIONS SWEET ALERT =========-->
  <?php
  // Tampilkan session jika ada dan belum kadaluarsa
  if (isset($_SESSION["session_add_success_news_category"]) && isset($_SESSION["expiry_time_add_success_news_category"]) && $_SESSION["expiry_time_add_success_news_category"] > time()) : ?>
    <script>
      document.addEventListener('DOMContentLoaded', function() {
        Swal.fire({
          title: "Kategori berhasil ditambahkan!",
          icon: "success",
          position: "center",
          timer: 3000
        });
      });
    </script>
  <?php endif; ?>

  <?php
  // Tampilkan session jika ada dan belum kadaluarsa
  if (isset($_SESSION["session_add_success"]) && isset($_SESSION["expiry_time_add_success"]) && $_SESSION["expiry_time_add_success"] > time()) : ?>
    <script>
      document.addEventListener('DOMContentLoaded', function() {
        Swal.fire({
          title: "Berita berhasil dipublikasi!",
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
          title: "Berita berhasil dimodifikasi!",
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
          title: "Berita berhasil dihapus!",
          icon: "success",
          position: "center",
          timer: 4000 // 
        });
      });
      unset($_SESSION["session_deleted_success"]); // Clear the notification session
    </script>
  <?php endif; ?>
  <!-- ========= end NOTIFICATIONS SWEET ALERT =========-->


  <!-- ========= CONDITION DATA NEWS ========= -->
  <?php if (isset($_POST["add_news_category"])) : ?>
    <?php if (add_news_category($_POST) > 0) : ?>
      <?php
      echo "<script>document.location.href = '';</script>";
      $addSuccessCategoryNews = $_POST["add_success_news_category"];

      // Buat session dengan nama "session_add_success_news_category" dengan waktu kadaluarsa
      $_SESSION["session_add_success_news_category"] = $addSuccessCategoryNews;
      $_SESSION["expiry_time_add_success_news_category"] = time() + 6; // Waktu kadaluarsa dalam 5 detik
      ?>
    <?php endif; ?>
  <?php endif; ?>

  <?php if (isset($_POST["add_news"])) : ?>
    <?php if (add_news($_POST) > 0) : ?>
      <?php
      echo "<script>document.location.href = '';</script>";
      $addSuccess = $_POST["add_success"];

      // Buat session dengan nama "session_add_success" dengan waktu kadaluarsa
      $_SESSION["session_add_success"] = $addSuccess;
      $_SESSION["expiry_time_add_success"] = time() + 6; // Waktu kadaluarsa dalam 5 detik
      ?>
    <?php endif; ?>
  <?php endif; ?>


  <?php if (isset($_POST["edit_news"])) : ?>
    <?php if (edit_news($_POST) > 0) : ?>
      <?php
      echo "<script>document.location.href = '';</script>";
      $editSuccess = $_POST["edit_success"];

      // Buat session dengan nama "session_edit_success" dengan waktu kadaluarsa
      $_SESSION["session_edit_success"] = $editSuccess;
      $_SESSION["expiry_time_edit_success"] = time() + 6; // Waktu kadaluarsa dalam 5 detik
      ?>

    <?php endif; ?>
  <?php endif; ?>

  <?php if (isset($_POST["del_news_category"])) : ?>
    <?php if (delete_news_category(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode($_POST["id"])))))))))) > 0) : ?>
      <?php
      echo "<script>document.location.href = '';</script>";
      ?>
    <?php endif; ?>
  <?php endif; ?>

  <?php if (isset($_POST["del_news"])) : ?>
    <?php if (delete_news(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode($_POST["id"])))))))))) > 0) : ?>
      <?php
      echo "<script>document.location.href = '';</script>";
      $deletedSuccess = $_POST["deleted_success"];

      // Buat session dengan nama "session_deleted_success" dengan waktu kadaluarsa
      $_SESSION["session_deleted_success"] = $deletedSuccess;
      $_SESSION["expiry_time_deleted_success"] = time() + 6; // Waktu kadaluarsa dalam 5 detik
      ?>
    <?php endif; ?>
  <?php endif; ?>
  <!-- ========= end CONDITION DATA NEWS ========= -->


<?php endif; ?>
<!-- end Leve User -->










<script src="https://cdn.ckeditor.com/ckeditor5/40.2.0/super-build/ckeditor.js"></script>
<script>
  document.addEventListener('DOMContentLoaded', () => {
    ClassicEditor.create(document.getElementById("news_description"), {
      toolbar: ['exportPDF', 'exportWord', '|', 'imageUpload', '|', 'undo', 'redo', '|', 'bold', 'italic'],
      image: {
        toolbar: ['imageTextAlternative', '|', 'imageStyle:alignLeft', 'imageStyle:full', 'imageStyle:alignRight'],
        styles: ['full', 'alignLeft', 'alignRight']
      },
      language: 'en',
      extraPlugins: [SimpleUploadAdapter],
      imageUpload: {
        uploadUrl: 'fileupload.php',
        headers: {
          'Content-Type': 'multipart/form-data' // Tambahkan ini
        }
      }
    });
  });
</script>

<script>
  CKEDITOR.ClassicEditor.create(document.getElementById("news_description"), {
    // https://ckeditor.com/docs/ckeditor5/latest/features/toolbar/toolbar.html#extended-toolbar-configuration-format
    toolbar: {
      items: [
        'exportPDF', 'exportWord', '|',
        'findAndReplace', 'selectAll', '|',
        'heading', '|',
        'bold', 'italic', 'strikethrough', 'underline', 'code', 'subscript', 'superscript', 'removeFormat', '|',
        'bulletedList', 'numberedList', 'todoList', '|',
        'outdent', 'indent', '|',
        'undo', 'redo',
        '-',
        'fontSize', 'fontFamily', 'fontColor', 'fontBackgroundColor', 'highlight', '|',
        'alignment', '|',
        'link', 'uploadImage', 'blockQuote', 'insertTable', 'mediaEmbed', 'codeBlock', 'htmlEmbed', '|',
        'specialCharacters', 'horizontalLine', 'pageBreak', '|',
        'textPartLanguage', '|',
        'sourceEditing'
      ],
      shouldNotGroupWhenFull: true
    },
    // Changing the language of the interface requires loading the language file using the <script> tag.
    // language: 'es',
    list: {
      properties: {
        styles: true,
        startIndex: true,
        reversed: true
      }
    },
    // https://ckeditor.com/docs/ckeditor5/latest/features/headings.html#configuration
    heading: {
      options: [{
          model: 'paragraph',
          title: 'Paragraph',
          class: 'ck-heading_paragraph'
        },
        {
          model: 'heading1',
          view: 'h1',
          title: 'Heading 1',
          class: 'ck-heading_heading1'
        },
        {
          model: 'heading2',
          view: 'h2',
          title: 'Heading 2',
          class: 'ck-heading_heading2'
        },
        {
          model: 'heading3',
          view: 'h3',
          title: 'Heading 3',
          class: 'ck-heading_heading3'
        },
        {
          model: 'heading4',
          view: 'h4',
          title: 'Heading 4',
          class: 'ck-heading_heading4'
        },
        {
          model: 'heading5',
          view: 'h5',
          title: 'Heading 5',
          class: 'ck-heading_heading5'
        },
        {
          model: 'heading6',
          view: 'h6',
          title: 'Heading 6',
          class: 'ck-heading_heading6'
        }
      ]
    },
    // https://ckeditor.com/docs/ckeditor5/latest/features/editor-placeholder.html#using-the-editor-configuration
    placeholder: 'Masukan deskripsi!',
    // https://ckeditor.com/docs/ckeditor5/latest/features/font.html#configuring-the-font-family-feature
    fontFamily: {
      options: [
        'default',
        'Arial, Helvetica, sans-serif',
        'Courier New, Courier, monospace',
        'Georgia, serif',
        'Lucida Sans Unicode, Lucida Grande, sans-serif',
        'Tahoma, Geneva, sans-serif',
        'Times New Roman, Times, serif',
        'Trebuchet MS, Helvetica, sans-serif',
        'Verdana, Geneva, sans-serif'
      ],
      supportAllValues: true
    },
    // https://ckeditor.com/docs/ckeditor5/latest/features/font.html#configuring-the-font-size-feature
    fontSize: {
      options: [10, 12, 14, 'default', 18, 20, 22],
      supportAllValues: true
    },
    // Be careful with the setting below. It instructs CKEditor to accept ALL HTML markup.
    // https://ckeditor.com/docs/ckeditor5/latest/features/general-html-support.html#enabling-all-html-features
    htmlSupport: {
      allow: [{
        name: /.*/,
        attributes: true,
        classes: true,
        styles: true
      }]
    },
    // Be careful with enabling previews
    // https://ckeditor.com/docs/ckeditor5/latest/features/html-embed.html#content-previews
    htmlEmbed: {
      showPreviews: true
    },
    // https://ckeditor.com/docs/ckeditor5/latest/features/link.html#custom-link-attributes-decorators
    link: {
      decorators: {
        addTargetToExternalLinks: true,
        defaultProtocol: 'https://',
        toggleDownloadable: {
          mode: 'manual',
          label: 'Downloadable',
          attributes: {
            download: 'file'
          }
        }
      }
    },
    // https://ckeditor.com/docs/ckeditor5/latest/features/mentions.html#configuration
    mention: {
      feeds: [{
        marker: '@',
        feed: [
          '@apple', '@bears', '@brownie', '@cake', '@cake', '@candy', '@canes', '@chocolate', '@cookie', '@cotton', '@cream',
          '@cupcake', '@danish', '@donut', '@dragée', '@fruitcake', '@gingerbread', '@gummi', '@ice', '@jelly-o',
          '@liquorice', '@macaroon', '@marzipan', '@oat', '@pie', '@plum', '@pudding', '@sesame', '@snaps', '@soufflé',
          '@sugar', '@sweet', '@topping', '@wafer'
        ],
        minimumCharacters: 1
      }]
    },
    // The "super-build" contains more premium features that require additional configuration, disable them below.
    // Do not turn them on unless you read the documentation and know how to configure them and setup the editor.
    removePlugins: [
      // These two are commercial, but you can try them out without registering to a trial.
      // 'ExportPdf',
      // 'ExportWord',
      'AIAssistant',
      'CKBox',
      'CKFinder',
      'EasyImage',
      // This sample uses the Base64UploadAdapter to handle image uploads as it requires no configuration.
      // https://ckeditor.com/docs/ckeditor5/latest/features/images/image-upload/base64-upload-adapter.html
      // Storing images as Base64 is usually a very bad idea.
      // Replace it on production website with other solutions:
      // https://ckeditor.com/docs/ckeditor5/latest/features/images/image-upload/image-upload.html
      // 'Base64UploadAdapter',
      'RealTimeCollaborativeComments',
      'RealTimeCollaborativeTrackChanges',
      'RealTimeCollaborativeRevisionHistory',
      'PresenceList',
      'Comments',
      'TrackChanges',
      'TrackChangesData',
      'RevisionHistory',
      'Pagination',
      'WProofreader',
      // Careful, with the Mathtype plugin CKEditor will not load when loading this sample
      // from a local file system (file://) - load this site via HTTP server if you enable MathType.
      'MathType',
      // The following features are part of the Productivity Pack and require additional license.
      'SlashCommand',
      'Template',
      'DocumentOutline',
      'FormatPainter',
      'TableOfContents',
      'PasteFromOfficeEnhanced'
    ]
  });
</script>



<?php foreach ($dataToShowNews as $itemNews) : ?>
  <script>
    document.addEventListener('DOMContentLoaded', () => {
      ClassicEditor.create(document.getElementById("news_description<?= $itemNews[0]; ?>"), {
        toolbar: ['exportPDF', 'exportWord', '|', 'imageUpload', '|', 'undo', 'redo', '|', 'bold', 'italic'],
        image: {
          toolbar: ['imageTextAlternative', '|', 'imageStyle:alignLeft', 'imageStyle:full', 'imageStyle:alignRight'],
          styles: ['full', 'alignLeft', 'alignRight']
        },
        language: 'en',
        extraPlugins: [SimpleUploadAdapter],
        imageUpload: {
          uploadUrl: 'fileupload.php',
          headers: {
            'Content-Type': 'multipart/form-data' // Tambahkan ini
          }
        }
      });
    });
  </script>

  <script>
    CKEDITOR.ClassicEditor.create(document.getElementById("news_description<?= $itemNews[0]; ?>"), {
      // https://ckeditor.com/docs/ckeditor5/latest/features/toolbar/toolbar.html#extended-toolbar-configuration-format
      toolbar: {
        items: [
          'exportPDF', 'exportWord', '|',
          'findAndReplace', 'selectAll', '|',
          'heading', '|',
          'bold', 'italic', 'strikethrough', 'underline', 'code', 'subscript', 'superscript', 'removeFormat', '|',
          'bulletedList', 'numberedList', 'todoList', '|',
          'outdent', 'indent', '|',
          'undo', 'redo',
          '-',
          'fontSize', 'fontFamily', 'fontColor', 'fontBackgroundColor', 'highlight', '|',
          'alignment', '|',
          'link', 'uploadImage', 'blockQuote', 'insertTable', 'mediaEmbed', 'codeBlock', 'htmlEmbed', '|',
          'specialCharacters', 'horizontalLine', 'pageBreak', '|',
          'textPartLanguage', '|',
          'sourceEditing'
        ],
        shouldNotGroupWhenFull: true
      },
      // Changing the language of the interface requires loading the language file using the <script> tag.
      // language: 'es',
      list: {
        properties: {
          styles: true,
          startIndex: true,
          reversed: true
        }
      },
      // https://ckeditor.com/docs/ckeditor5/latest/features/headings.html#configuration
      heading: {
        options: [{
            model: 'paragraph',
            title: 'Paragraph',
            class: 'ck-heading_paragraph'
          },
          {
            model: 'heading1',
            view: 'h1',
            title: 'Heading 1',
            class: 'ck-heading_heading1'
          },
          {
            model: 'heading2',
            view: 'h2',
            title: 'Heading 2',
            class: 'ck-heading_heading2'
          },
          {
            model: 'heading3',
            view: 'h3',
            title: 'Heading 3',
            class: 'ck-heading_heading3'
          },
          {
            model: 'heading4',
            view: 'h4',
            title: 'Heading 4',
            class: 'ck-heading_heading4'
          },
          {
            model: 'heading5',
            view: 'h5',
            title: 'Heading 5',
            class: 'ck-heading_heading5'
          },
          {
            model: 'heading6',
            view: 'h6',
            title: 'Heading 6',
            class: 'ck-heading_heading6'
          }
        ]
      },
      // https://ckeditor.com/docs/ckeditor5/latest/features/editor-placeholder.html#using-the-editor-configuration
      placeholder: 'Masukan deskripsi!',
      // https://ckeditor.com/docs/ckeditor5/latest/features/font.html#configuring-the-font-family-feature
      fontFamily: {
        options: [
          'default',
          'Arial, Helvetica, sans-serif',
          'Courier New, Courier, monospace',
          'Georgia, serif',
          'Lucida Sans Unicode, Lucida Grande, sans-serif',
          'Tahoma, Geneva, sans-serif',
          'Times New Roman, Times, serif',
          'Trebuchet MS, Helvetica, sans-serif',
          'Verdana, Geneva, sans-serif'
        ],
        supportAllValues: true
      },
      // https://ckeditor.com/docs/ckeditor5/latest/features/font.html#configuring-the-font-size-feature
      fontSize: {
        options: [10, 12, 14, 'default', 18, 20, 22],
        supportAllValues: true
      },
      // Be careful with the setting below. It instructs CKEditor to accept ALL HTML markup.
      // https://ckeditor.com/docs/ckeditor5/latest/features/general-html-support.html#enabling-all-html-features
      htmlSupport: {
        allow: [{
          name: /.*/,
          attributes: true,
          classes: true,
          styles: true
        }]
      },
      // Be careful with enabling previews
      // https://ckeditor.com/docs/ckeditor5/latest/features/html-embed.html#content-previews
      htmlEmbed: {
        showPreviews: true
      },
      // https://ckeditor.com/docs/ckeditor5/latest/features/link.html#custom-link-attributes-decorators
      link: {
        decorators: {
          addTargetToExternalLinks: true,
          defaultProtocol: 'https://',
          toggleDownloadable: {
            mode: 'manual',
            label: 'Downloadable',
            attributes: {
              download: 'file'
            }
          }
        }
      },
      // https://ckeditor.com/docs/ckeditor5/latest/features/mentions.html#configuration
      mention: {
        feeds: [{
          marker: '@',
          feed: [
            '@apple', '@bears', '@brownie', '@cake', '@cake', '@candy', '@canes', '@chocolate', '@cookie', '@cotton', '@cream',
            '@cupcake', '@danish', '@donut', '@dragée', '@fruitcake', '@gingerbread', '@gummi', '@ice', '@jelly-o',
            '@liquorice', '@macaroon', '@marzipan', '@oat', '@pie', '@plum', '@pudding', '@sesame', '@snaps', '@soufflé',
            '@sugar', '@sweet', '@topping', '@wafer'
          ],
          minimumCharacters: 1
        }]
      },
      // The "super-build" contains more premium features that require additional configuration, disable them below.
      // Do not turn them on unless you read the documentation and know how to configure them and setup the editor.
      removePlugins: [
        // These two are commercial, but you can try them out without registering to a trial.
        // 'ExportPdf',
        // 'ExportWord',
        'AIAssistant',
        'CKBox',
        'CKFinder',
        'EasyImage',
        // This sample uses the Base64UploadAdapter to handle image uploads as it requires no configuration.
        // https://ckeditor.com/docs/ckeditor5/latest/features/images/image-upload/base64-upload-adapter.html
        // Storing images as Base64 is usually a very bad idea.
        // Replace it on production website with other solutions:
        // https://ckeditor.com/docs/ckeditor5/latest/features/images/image-upload/image-upload.html
        // 'Base64UploadAdapter',
        'RealTimeCollaborativeComments',
        'RealTimeCollaborativeTrackChanges',
        'RealTimeCollaborativeRevisionHistory',
        'PresenceList',
        'Comments',
        'TrackChanges',
        'TrackChangesData',
        'RevisionHistory',
        'Pagination',
        'WProofreader',
        // Careful, with the Mathtype plugin CKEditor will not load when loading this sample
        // from a local file system (file://) - load this site via HTTP server if you enable MathType.
        'MathType',
        // The following features are part of the Productivity Pack and require additional license.
        'SlashCommand',
        'Template',
        'DocumentOutline',
        'FormatPainter',
        'TableOfContents',
        'PasteFromOfficeEnhanced'
      ]
    });
  </script>
<?php endforeach; ?>