<?php if ($rowSession["level"] !== $levelSuperAdmin) : ?>
  <script>
    document.location.href = '<?= $url ?>admin/dashboard/home';
  </script>
<?php endif ?>

<!-- Level User -->
<?php if ($rowSession["level"] === $levelSuperAdmin) : ?>
  <main id="main" class="main">

    <!-- PAGE TITLE -->
    <div class="pagetitle">
      <h1><?= $pageTitle; ?></h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?= $url; ?>dashboard">Home</a></li>
          <li class="breadcrumb-item">Pengaturan Aplikasi</li>
          <li class="breadcrumb-item active"><?= $pageTitle; ?></li>
        </ol>
      </nav>
    </div>
    <!-- end PAGE TITLE -->

    <section class="section dashboard">
      <div class="row">

        <!-- TABLE DATA STRUCTURE ORGANIZATION -->
        <div class="col-lg-12">
          <div class="row">

            <div class="col-12" id="code_access">

              <div class="card recent-sales overflow-auto">

                <div class="card-body">
                  <h5 class="card-title">Data <span>| <?= $pageTitle; ?></span></h5>

                  <table class="table table-borderless datatable">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Opsi</th>
                        <th scope="col">Gambar</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $noTable = 1; ?>
                      <?php foreach ($organization as $row) : ?>
                        <tr>
                          <th scope="row" style="width: 20px;"><a href="#"><?= $noTable; ?></a></th>
                          <td style="width: 50px;">
                            <a href="#" data-bs-toggle="modal" data-bs-target="#modalEditStructureOrganization<?= $row["id"]; ?>" class="badge p-2 btn bg-purple-1 text-white mb-1" title="Ubah"><i class="bi bi-pencil-square fs-6"></i></a>
                          </td>
                          <td>
                            <a href="<?= $url; ?>assets/img/gallery/<?= $row["gambar"]; ?>" target="_BLANK">
                              <img src="<?= $url; ?>assets/img/gallery/<?= $row["gambar"]; ?>" alt="Gambar <?= $row["gambar"]; ?>">
                            </a>
                          </td>
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
        <!-- end TABLE DATA STRUCTURE ORGANIZATION -->


        <!-- === MODAL EDIT STRUCTURE ORGANIZATION=== -->
        <?php foreach ($organization as $row) : ?>
          <div class="modal modal-dark-mode fade" id="modalEditStructureOrganization<?= $row["id"]; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                  <h1 class="modal-title fs-5" id="exampleModalLabel">Ubah Data <?= $pageTitle; ?></h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <form action="" class="row g-3 needs-validation" method="post" enctype="multipart/form-data" novalidate>
                    <input type="text" hidden name="id" value="<?= base64_encode(base64_encode(base64_encode(base64_encode(base64_encode(base64_encode(base64_encode(base64_encode(base64_encode($row["id"]))))))))); ?>">
                    <input type="text" hidden name="old_file" value="<?= $row["gambar"]; ?>">

                    <div class="col-md-12">
                      <label for="image" class="form-label">Gambar Slide</label>
                      <br>
                      <img src="<?= $url; ?>assets/img/gallery/<?= $row["gambar"]; ?>" alt="Foto Instansi Terkait - <?= $row["gambar"]; ?>" width="60" class="mb-2">
                      <input type="file" class="form-control" id="gambar" name="gambar">
                      <small>Format File :
                        <strong>jpg, jpeg, png</strong> dengan ukuran Maks :
                        <strong>1 MB</strong>
                      </small>
                    </div>

                    <div class="col-12">
                      <button class="btn bg-purple-1 text-white" type="submit" name="edit_structure_organization"><i class="bi bi-save"></i> Simpan</button>
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
        <!-- === end MODAL EDIT STRUCTURE ORGANIZATION=== -->

        <!-- === CONDITION DATA === -->
        <?php if (isset($_POST["edit_structure_organization"])) : ?>
          <?php if (structure_organization($_POST) > 0) : ?>
            <script>
              alert('Data Berhasil Diubah');
              document.location.href = '';
            </script>
          <?php endif; ?>
        <?php endif; ?>
      </div>

      </div>
    </section>

  </main>
<?php endif; ?>
<!-- end Level User -->