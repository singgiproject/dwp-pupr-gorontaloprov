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
          <li class="breadcrumb-item">Halaman Aplikasi</li>
          <li class="breadcrumb-item active"><?= $pageTitle; ?></li>
        </ol>
      </nav>
    </div>
    <!-- End PAGE TITLE -->

    <section class="section dashboard">
      <div class="row">

        <!-- TABLE DATA TEAM -->
        <div class="col-lg-12">
          <div class="row">

            <div class="col-12" id="code_access">

              <?php if ($rowTeamEnd["type"] === "insert") : ?>
                <?php if ($rowTeamEnd["date_insert"] === $date) : ?>
                  <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="bi bi-check-circle me-1"></i>
                    1 Data berhasil ditambahkan!
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
                <?php endif; ?>
              <?php endif; ?>

              <?php if ($rowTeamEnd["type"] === "update") : ?>
                <?php if ($rowTeamEnd["date_update"] === $date) : ?>
                  <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="bi bi-check-circle me-1"></i>
                    1 Data berhasil diubah!
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
                <?php endif; ?>
              <?php endif; ?>

              <div class="card recent-sales overflow-auto">

                <div class="filter mx-4">
                  <a href="#" class="btn bg-purple-1 text-white" data-bs-toggle="modal" data-bs-target="#modalAddTeam"><i class="bi bi-plus-circle"></i> Tambah Data</a>
                </div>

                <div class="card-body">
                  <h5 class="card-title">Data <span>| <?= $pageTitle; ?></span></h5>

                  <table class="table table-borderless datatable">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Opsi</th>
                        <th scope="col">Foto Profil</th>
                        <th scope="col">Nama Lengkap</th>
                        <th scope="col">Posisi</th>
                        <th scope="col">Deskripsi</th>
                        <th scope="col">Facebook</th>
                        <th scope="col">Instagram</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $noTable = 1; ?>
                      <?php foreach ($team as $row) : ?>
                        <tr>
                          <th scope="row"><a href="#"><?= $noTable; ?></a></th>
                          <td>
                            <a href="#" class="badge p-2 btn bg-purple-1 text-white mb-1" title="Ubah" data-bs-toggle="modal" data-bs-target="#modalEditTeam<?= $row["id"]; ?>"><i class="bi bi-pencil-square fs-6"></i></a>
                            <a href="#" class="badge p-2 btn btn-danger text-white" data-bs-toggle="modal" data-bs-target="#modalDeleteTeam<?= $row["id"]; ?>" title="Hapus"><i class="bi bi-trash fs-6"></i></a>
                          </td>
                          <td>
                            <a href="<?= $url; ?>assets/img/team/<?= $row["image"]; ?>" target="_BLANK">
                              <img src="<?= $url; ?>assets/img/team/<?= $row["image"]; ?>" alt="Foto Profil <?= $row["name"]; ?>" width="70">
                            </a>
                          </td>
                          <td><?= $row["name"]; ?></td>
                          <td><?= $row["position"]; ?></td>
                          <td><?= $row["description"]; ?></td>
                          <td class="text-center">
                            <?php if (empty($row["facebook"])) : ?>
                              <span class="fs-4 text-danger" title="Facebook belum diatur">-</span>
                            <?php endif; ?>
                            <?php if (!empty($row["facebook"])) : ?>
                              <a href="https://www.facebook.com/<?= $row["facebook"]; ?>" title="Facebook | <?= $row["facebook"]; ?>">
                                <i class="bi bi-facebook fs-5"></i>
                              </a>
                            <?php endif; ?>
                          </td>
                          <td class="text-center">
                            <?php if (empty($row["instagram"])) : ?>
                              <span class="fs-4 text-danger" title="Instagram belum diatur">-</span>
                            <?php endif; ?>
                            <?php if (!empty($row["instagram"])) : ?>
                              <a href="https://www.instagram.com/<?= $row["instagram"]; ?>" title="Instagram | <?= $row["instagram"]; ?>">
                                <i class="bi bi-instagram fs-5"></i>
                              </a>
                            <?php endif; ?>
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
        <!-- End TABLE DATA TEAM -->


        <!-- === MODAL ADD TEAM=== -->
        <div class="modal modal-dark-mode fade" id="modalAddTeam" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Data <?= $pageTitle; ?></h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <form action="" class="row g-3 needs-validation" method="post" enctype="multipart/form-data" novalidate>
                  <div class="col-md-12">
                    <label for="name" class="form-label">Nama Lengkap</label>
                    <input type="text" class="form-control" name="name" id="name" required placeholder="Nama Lengkap">
                    <div class="invalid-feedback">
                      Harap Berikan Nama Lengkap
                    </div>
                  </div>
                  <div class="col-md-12">
                    <label for="position" class="form-label">Posisi</label>
                    <input type="text" class="form-control" name="position" id="position" required placeholder="Posisi">
                    <div class="invalid-feedback">
                      Harap Berikan Posisi Tim
                    </div>
                  </div>
                  <div class="col-md-12">
                    <label for="description" class="form-label">Deskripsi</label>
                    <textarea type="text" class="form-control" name="description" id="description" placeholder="Deskripsi"></textarea>
                  </div>
                  <div class="col-md-12">
                    <label for="facebook" class="form-label" style="font-size: 14px;">
                      <span>https://www.facebook.com/<strong>usernamefacebook</strong></span>
                    </label>
                    <input type="text" class="form-control" id="facebook" name="facebook" placeholder="facebook">
                  </div>
                  <div class="col-md-12">
                    <label for="instagram" class="form-label" style="font-size: 14px;">
                      <span>https://www.instagram.com/<strong>usernameinstagram</strong></span>
                    </label>
                    <input type="text" class="form-control" id="instagram" name="instagram" placeholder="@instagram">
                  </div>
                  <div class="col-md-12">
                    <label for="image" class="form-label">Foto Profil</label>
                    <input type="file" class="form-control" id="image" name="image" required>
                    <div class="invalid-feedback">
                      Harap Berikan Foto Profil
                    </div>
                    <small>
                      Format File : <strong>jpg, jpeg, png</strong> dengan ukuran Maks : <strong>1 MB</strong>
                    </small>
                  </div>
                  <input type="text" hidden name="date_insert" value="<?= $date; ?>">
                  <input type="text" hidden name="date_update" value="">
                  <input type="text" hidden name="type" value="insert">
                  <div class="col-12">
                    <button class="btn bg-purple-1 text-white" type="submit" name="add_team"><i class="bi bi-save"></i> Simpan</button>
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
        <!-- === end MODAL ADD TEAM === -->


        <!-- === MODAL EDIT TEAM === -->
        <?php foreach ($team as $row) : ?>
          <div class="modal modal-dark-mode fade" id="modalEditTeam<?= $row["id"]; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                      <label for="name" class="form-label">Nama Lengkap</label>
                      <input type="text" class="form-control" name="name" id="name" required placeholder="Nama Lengkap" value="<?= $row["name"]; ?>">
                      <div class="invalid-feedback">
                        Harap Berikan Nama Lengkap
                      </div>
                    </div>
                    <div class="col-md-12">
                      <label for="position" class="form-label">Posisi</label>
                      <input type="text" class="form-control" name="position" id="position" required placeholder="Posisi" value="<?= $row["position"]; ?>">
                      <div class="invalid-feedback">
                        Harap Berikan Posisi Tim
                      </div>
                    </div>
                    <div class="col-md-12">
                      <label for="description" class="form-label">Deskripsi</label>
                      <textarea type="text" class="form-control" name="description" id="description" placeholder="Deskripsi"><?= $row["description"]; ?></textarea>
                    </div>
                    <div class="col-md-12">
                      <label for="facebook" class="form-label" style="font-size: 14px;">
                        <span>https://www.facebook.com/<strong>usernamefacebook</strong></span>
                      </label>
                      <input type="text" class="form-control" id="facebook" name="facebook" placeholder="facebook" value="<?= $row["facebook"]; ?>">
                    </div>
                    <div class="col-md-12">
                      <label for="instagram" class="form-label" style="font-size: 14px;">
                        <span>https://www.instagram.com/<strong>usernameinstagram</strong></span>
                      </label>
                      <input type="text" class="form-control" id="instagram" name="instagram" placeholder="@instagram" value="<?= $row["instagram"]; ?>">
                    </div>
                    <div class="col-md-12">
                      <label for="image" class="form-label">Foto Profil</label>
                      <br>
                      <img src="<?= $url; ?>assets/img/team/<?= $row["image"]; ?>" alt="Foto profil <?= $row["name"]; ?>" width="60" class="mb-2">
                      <input type="file" class="form-control" id="image" name="image">
                      <small>
                        Format File : <strong>jpg, jpeg, png</strong> dengan ukuran Maks : <strong>1 MB</strong>
                      </small>
                    </div>
                    <input type="text" hidden name="date_insert" value="<?= $row["date_insert"]; ?>">
                    <input type="text" hidden name="date_update" value="<?= $date; ?>">
                    <input type="text" hidden name="type" value="update">
                    <div class="col-12">
                      <button class="btn bg-purple-1 text-white" type="submit" name="edit_team"><i class="bi bi-save"></i> Simpan</button>
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
        <!-- === end MODAL EDIT TEAM === -->


        <!-- MODAL DELETE TEAM -->
        <?php foreach ($team as $row) : ?>
          <div class="modal modal-dark-mode fade" id="modalDeleteTeam<?= $row["id"]; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                    <button type="submit" name="del_team" class="btn btn-danger">Hapus</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
        <!-- end MODAL DELETE TEAM -->

        <!-- === CONDITION DATA === -->
        <?php if (isset($_POST["add_team"])) : ?>
          <?php if (addTeam($_POST) > 0) : ?>
            <script>
              alert('Data Berhasil Ditambahkan');
              document.location.href = '';
            </script>
          <?php endif; ?>
        <?php endif; ?>

        <?php if (isset($_POST["edit_team"])) : ?>
          <?php if (editTeam($_POST) > 0) : ?>
            <script>
              alert('Data Berhasil Diubah');
              document.location.href = '';
            </script>
          <?php endif; ?>
        <?php endif; ?>

        <?php if (isset($_POST["del_team"])) : ?>
          <?php if (deleteTeam($_POST["id"])) : ?>
            <script>
              alert('Data Berhasil Dihapus');
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