<?php if ($rowSession["level"] !== $levelSuperAdmin) : ?>
  <script>
    document.location.href = '<?= $url ?>admin/dashboard/home';
  </script>
<?php endif ?>

<!-- Level User -->
<?php if ($rowSession["level"] === $levelSuperAdmin) : ?>
  <main id="main" class="main">

    <div class="pagetitle">
      <h1><?= $pageTitle; ?></h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?= $url; ?>dashboard">Home</a></li>
          <li class="breadcrumb-item active">Halaman Aplikasi</li>
          <li class="breadcrumb-item active"><?= $pageTitle; ?></li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">

      <!-- TABLE DATA CATEGORY GALLERY -->
      <div class="row">
        <div class="col-lg-12">
          <div class="row">

            <div class="col-12" id="code_access">

              <?php if ($rowCategoryEnd["type"] === "insert") : ?>
                <?php if ($rowCategoryEnd["date_insert"] === $date) : ?>
                  <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="bi bi-check-circle me-1"></i>
                    1 Data Kategori Baru Berhasil Ditambahkan!
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
                <?php endif; ?>
              <?php endif; ?>

              <div class="card recent-sales overflow-auto">

                <div class="filter mx-4">
                  <a href="#" class="btn bg-purple-1 text-white" data-bs-toggle="modal" data-bs-target="#modalAddCategoryGallery"><i class="bi bi-plus-circle"></i> Tambah Kategori</a>
                </div>

                <div class="card-body">
                  <h5 class="card-title">Data <span>| Kategori <?= $pageTitle; ?></span></h5>

                  <table class="table table-borderless datatable">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Opsi</th>
                        <th scope="col">Kategori</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $noTable = 1; ?>
                      <?php foreach ($category as $row) : ?>
                        <tr>
                          <th scope="row"><a href="#"><?= $noTable; ?></a></th>
                          <td>
                            <a href="#" class="badge p-2 btn btn-danger text-white" data-bs-toggle="modal" data-bs-target="#modalDeleteCategoryGallery<?= $row["id"]; ?>" title="Hapus"><i class="bi bi-trash fs-6"></i></a>
                          </td>
                          <td><?= $row["category"]; ?></td>
                        </tr>
                        <?php $noTable++; ?>
                      <?php endforeach; ?>
                    </tbody>
                  </table>

                </div>

              </div>
            </div>

          </div>
        </div>
      </div>
      <!-- End TABLE DATA CATEGORY GALLERY -->

      <!-- TABLE DATA GALLERY -->
      <div class="row">
        <div class="col-lg-12">
          <div class="row">

            <div class="col-12" id="code_access">

              <?php if ($rowGalleryEnd["type"] === "insert") : ?>
                <?php if ($rowGalleryEnd["date_insert"] === $date) : ?>
                  <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="bi bi-check-circle me-1"></i>
                    1 Data berhasil ditambahkan!
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
                <?php endif; ?>
              <?php endif; ?>

              <?php if ($rowGalleryEnd["type"] === "update") : ?>
                <?php if ($rowGalleryEnd["date_update"] === $date) : ?>
                  <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="bi bi-check-circle me-1"></i>
                    1 Data berhasil diubah!
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
                <?php endif; ?>
              <?php endif; ?>

              <div class="card recent-sales overflow-auto">

                <div class="filter mx-4">
                  <a href="#" class="btn bg-purple-1 text-white" data-bs-toggle="modal" data-bs-target="#modalAddGallery"><i class="bi bi-plus-circle"></i> Tambah Data</a>
                </div>

                <div class="card-body">
                  <h5 class="card-title">Data <span>| <?= $pageTitle; ?></span></h5>

                  <table class="table table-borderless datatable">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Opsi</th>
                        <th scope="col">Gambar</th>
                        <th scope="col">Nama Kegiatan</th>
                        <th scope="col">Deskripsi</th>
                        <th scope="col">Kategori</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $noTable = 1; ?>
                      <?php foreach ($galleryAll as $row) : ?>
                        <tr>
                          <th scope="row"><a href="#"><?= $noTable; ?></a></th>
                          <td>
                            <a href="#" class="badge p-2 btn bg-purple-1 text-white mb-1" title="Ubah" data-bs-toggle="modal" data-bs-target="#modalEditGallery<?= $row["id"]; ?>"><i class="bi bi-pencil-square fs-6"></i></a>
                            <a href="#" class="badge p-2 btn btn-danger text-white" data-bs-toggle="modal" data-bs-target="#modalDeleteGallery<?= $row["id"]; ?>" title="Hapus"><i class="bi bi-trash fs-6"></i></a>
                          </td>
                          <td>
                            <a href="<?= $url; ?>assets/img/gallery/<?= $row["image"]; ?>" target="_BLANK">
                              <img src="<?= $url; ?>assets/img/gallery/<?= $row["image"]; ?>" alt="Foto <?= $row["title"]; ?>" width="70">
                            </a>
                          </td>
                          <td><?= $row["title"]; ?></td>
                          <td><?= $row["description"]; ?></td>
                          <td><?= $row["category"]; ?></td>
                        </tr>
                        <?php $noTable++; ?>
                      <?php endforeach; ?>
                    </tbody>
                  </table>

                </div>

              </div>
            </div>

          </div>
        </div>
      </div>
      <!-- End TABLE DATA GALLERY -->


      <!-- === MODAL ADD CATEGORY GALLERY=== -->
      <div class="modal modal-dark-mode fade" id="modalAddCategoryGallery" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Data Kategori<?= $pageTitle; ?></h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form action="" class="row g-3 needs-validation" method="post" enctype="multipart/form-data" novalidate>
                <div class="col-md-12">
                  <label for="category" class="form-label">Kategori</label>
                  <input type="text" class="form-control" name="category" id="category" required placeholder="Kategori">
                  <div class="invalid-feedback">
                    Harap Berikan Nama Kategori
                  </div>
                </div>
                <input type="text" hidden name="date_insert" value="<?= $date; ?>">
                <input type="text" hidden name="date_update" value="">
                <input type="text" hidden name="type" value="insert">
                <div class="col-12">
                  <button class="btn bg-purple-1 text-white" type="submit" name="add_category_gallery"><i class="bi bi-save"></i> Simpan</button>
                </div>
              </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            </div>
          </div>
        </div>
      </div>
      <!-- === end MODAL ADD CATEGORY GALLERY=== -->

      <!-- MODAL DELETE CATEGORY GALLERY -->
      <?php foreach ($category as $row) : ?>
        <div class="modal modal-dark-mode fade" id="modalDeleteCategoryGallery<?= $row["id"]; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus?</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <p>Anda yakin ingin menghapus data ini?</p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batalkan</button>
                <form action="" method="post">
                  <input type="text" name="id" hidden value="<?= $row["id"]; ?>">
                  <button type="submit" name="del_category_gallery" class="btn btn-danger">Hapus</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
      <!-- end MODAL DELETE CATEGORY GALLERY -->


      <!-- === MODAL ADD GALLERY=== -->
      <div class="modal modal-dark-mode fade" id="modalAddGallery" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Data <?= $pageTitle; ?></h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form action="" class="row g-3 needs-validation" method="post" enctype="multipart/form-data" novalidate>
                <div class="col-md-12">
                  <label for="title" class="form-label">Nama Kegiatan</label>
                  <input type="text" class="form-control" name="title" id="title" required placeholder="Nama Kegiatan">
                  <div class="invalid-feedback">
                    Harap Berikan Nama Kegiatan
                  </div>
                </div>
                <div class="col-md-12">
                  <label for="description" class="form-label">Deskripsi</label>
                  <textarea name="description" id="description" class="form-control" required placeholder="Deskripsi Galeri" rows="10"></textarea>
                  <div class="invalid-feedback">
                    Harap Berikan Deskripsi
                  </div>
                </div>
                <div class="col-md-12">
                  <label for="category" class="form-label">Kategori</label>
                  <select class="form-control" id="category" name="category" required>
                    <?php foreach ($category as $row) : ?>
                      <option value="<?= $row["category"]; ?>"><?= $row["category"]; ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
                <div class="col-md-12">
                  <label for="image" class="form-label">Foto</label>
                  <input type="file" class="form-control" id="image" name="image" required>
                  <div class="invalid-feedback">
                    Harap Berikan foto kegiatan atau sejenisnya
                  </div>
                  <small>
                    Format File : <strong>jpg, jpeg, png</strong> dengan ukuran Maks : <strong>2 MB</strong>
                  </small>
                </div>
                <input type="text" hidden name="date_insert" value="<?= $date; ?>">
                <input type="text" hidden name="date_update" value="">
                <input type="text" hidden name="type" value="insert">
                <div class="col-12">
                  <button class="btn bg-purple-1 text-white" type="submit" name="add_gallery"><i class="bi bi-save"></i> Simpan</button>
                  <button class="btn btn-secondary" type="reset"><i class="bi bi-x-square"></i> Reset</button>
                </div>
              </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            </div>
          </div>
        </div>
      </div>
      <!-- === end MODAL ADD GALLERY=== -->


      <!-- === MODAL EDIT GALLERY=== -->
      <?php foreach ($galleryAll as $row) : ?>
        <div class="modal modal-dark-mode fade" id="modalEditGallery<?= $row["id"]; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Ubah Data <?= $pageTitle; ?></h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <form action="" class="row g-3 needs-validation" method="post" enctype="multipart/form-data" novalidate>
                  <input type="text" hidden name="id" value="<?= base64_encode(base64_encode(base64_encode(base64_encode(base64_encode(base64_encode(base64_encode(base64_encode(base64_encode($row["id"]))))))))); ?>">
                  <input type="text" hidden name="old_file" value="<?= $row["image"]; ?>">
                  <div class="col-md-12">
                    <label for="title" class="form-label">Nama Kegiatan</label>
                    <input type="text" class="form-control" name="title" id="title" required placeholder="Nama Kegiatan" value="<?= $row["title"]; ?>">
                    <div class="invalid-feedback">
                      Harap Berikan Nama Kegiatan
                    </div>
                  </div>
                  <div class="col-md-12">
                    <label for="description" class="form-label">Deskripsi</label>
                    <textarea name="description" id="description" class="form-control" required placeholder="Deskripsi Galeri" rows="10"><?= $row["description"]; ?></textarea>
                    <div class="invalid-feedback">
                      Harap Berikan Deskripsi
                    </div>
                  </div>
                  <div class="col-md-12">
                    <label for="category" class="form-label">Kategori</label>
                    <select class="form-control" id="category" name="category" required>
                      <option value="<?= $row["category"]; ?>">
                        <?= $row["category"]; ?>
                      </option>
                      <?php foreach ($category as $row) : ?>
                        <option value="<?= $row["category"]; ?>"><?= $row["category"]; ?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                  <div class="col-md-12">
                    <label for="image" class="form-label">Foto</label>
                    <br>
                    <img src="<?= $url; ?>assets/img/gallery/<?= $row["image"]; ?>" alt="Foto <?= $row["title"]; ?>" width="70" class="mb-2">
                    <input type="file" class="form-control" id="image" name="image">
                    <small>
                      Format File : <strong>jpg, jpeg, png</strong> dengan ukuran Maks : <strong>2 MB</strong>
                    </small>
                  </div>
                  <input type="text" hidden name="date_insert" value="<?= $row["date_insert"]; ?>">
                  <input type="text" hidden name="date_update" value="<?= $date; ?>">
                  <input type="text" hidden name="type" value="update">
                  <div class="col-12">
                    <button class="btn bg-purple-1 text-white" type="submit" name="edit_gallery"><i class="bi bi-save"></i> Simpan</button>
                    <button class="btn btn-secondary" type="reset"><i class="bi bi-x-square"></i> Reset</button>
                  </div>
                </form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
              </div>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
      <!-- === end MODAL EDIT GALLERY=== -->

      <!-- MODAL DELETE GALLERY -->
      <?php foreach ($galleryAll as $row) : ?>
        <div class="modal modal-dark-mode fade" id="modalDeleteGallery<?= $row["id"]; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus?</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <p>Anda yakin ingin menghapus data ini?</p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batalkan</button>
                <form action="" method="post">
                  <input type="text" name="id" hidden value="<?= $row["id"]; ?>">
                  <button type="submit" name="del_gallery" class="btn btn-danger">Hapus</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
      <!-- end MODAL DELETE GALLERY -->


      <!-- === CONDITION DATA === -->
      <!-- Condition Category Gallery-->
      <?php if (isset($_POST["add_category_gallery"])) : ?>
        <?php if (addCategoryGallery($_POST) > 0) : ?>
          <script>
            alert('Data Kategori Berhasil Ditambahkan');
            document.location.href = '';
          </script>
        <?php endif; ?>
      <?php endif; ?>

      <?php if (isset($_POST["del_category_gallery"])) : ?>
        <?php if (deleteCategoryGallery($_POST["id"])) : ?>
          <script>
            alert('Data Kategori Galeri Berhasil Dihapus');
            document.location.href = '';
          </script>
        <?php endif; ?>
      <?php endif; ?>
      <!-- end Condition Category Gallery-->

      <!-- Condition Gallery-->
      <?php if (isset($_POST["add_gallery"])) : ?>
        <?php if (addGallery($_POST) > 0) : ?>
          <script>
            alert('Data Galeri Berhasil Ditambahkan');
            document.location.href = '';
          </script>
        <?php endif; ?>
      <?php endif; ?>

      <?php if (isset($_POST["edit_gallery"])) : ?>
        <?php if (editGallery($_POST) > 0) : ?>
          <script>
            alert('Data Galeri Berhasil Diubah');
            document.location.href = '';
          </script>
        <?php endif; ?>
      <?php endif; ?>

      <?php if (isset($_POST["del_gallery"])) : ?>
        <?php if (deleteGallery($_POST["id"])) : ?>
          <script>
            alert('Data Galeri Berhasil Dihapus');
            document.location.href = '';
          </script>
        <?php endif; ?>
      <?php endif; ?>
      <!-- end Condition Gallery-->

      </div>

      </div>
    </section>

  </main>

<?php endif; ?>
<!-- end Level User -->