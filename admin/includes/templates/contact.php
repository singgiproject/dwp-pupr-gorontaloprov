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

        <!-- TABLE DATA CONTACT -->
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
                        <th scope="col">No. Telp</th>
                        <th scope="col">Email</th>
                        <th scope="col">Sosial Media</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">Jam Pelayanan</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $noTable = 1; ?>
                      <?php foreach ($contact as $row) : ?>
                        <tr>
                          <th scope="row"><a href="#"><?= $noTable; ?></a></th>
                          <td>
                            <a href="#" data-bs-toggle="modal" data-bs-target="#modalEditContact<?= $row["id"]; ?>" class="badge p-2 btn bg-purple-1 text-white mb-1" title="Ubah"><i class="bi bi-pencil-square fs-6"></i></a>
                          </td>
                          <td><?= $row["no_telp"]; ?></td>
                          <td><?= $row["email"]; ?></td>
                          <td>
                            <?php if (!empty($row["facebook"])) : ?>
                              <a href="https://www.facebook.com/<?= $row["facebook"]; ?>" title="Facebook <?= "-" . " " . $row["facebook"]; ?>" class="fs-5">
                                <i class="bi bi-facebook"></i>
                              </a>
                            <?php endif; ?>

                            <?php if (!empty($row["instagram"])) : ?>
                              <a href="https://www.instagram.com/<?= $row["instagram"]; ?>" title="Instagram <?= "-" . " " . $row["instagram"]; ?>" class="fs-5">
                                <i class="bi bi-instagram"></i>
                              </a>
                            <?php endif; ?>
                          </td>
                          <td><?= $row["alamat"]; ?></td>
                          <td><?= $row["service_hours"]; ?></td>

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
        <!-- end TABLE DATA CONTACT -->


        <!-- === MODAL EDIT CONTACT=== -->
        <?php foreach ($contact as $row) : ?>
          <div class="modal modal-dark-mode fade" id="modalEditContact<?= $row["id"]; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                  <h1 class="modal-title fs-5" id="exampleModalLabel">Ubah Data <?= $pageTitle; ?></h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <form action="" class="row g-3 needs-validation" method="post" enctype="multipart/form-data" novalidate>
                    <input type="text" hidden name="id" value="<?= base64_encode(base64_encode(base64_encode(base64_encode(base64_encode(base64_encode(base64_encode(base64_encode(base64_encode($row["id"]))))))))); ?>">
                    <div class="col-md-12">
                      <label for="title" class="form-label">Nomor Telepon</label>
                      <input type="text" class="form-control" name="no_telp" id="no_telp" required placeholder="Nomor Telepon" value="<?= $row["no_telp"]; ?>">
                      <div class="invalid-feedback">
                        Harap Berikan Nomor Telepon
                      </div>
                    </div>

                    <div class="col-md-12">
                      <label for="title" class="form-label">Alamat Email</label>
                      <input type="text" class="form-control" name="email" id="email" required placeholder="Alamat Email" value="<?= $row["email"]; ?>">
                      <div class="invalid-feedback">
                        Harap Berikan Alamat Email
                      </div>
                    </div>

                    <div class="col-md-12">
                      <label for="title" class="form-label">https://www.facebook.com/<strong>usernamefacebook</strong></label>
                      <input type="text" class="form-control" name="facebook" id="facebook" placeholder="usernamefacebook" value="<?= $row["facebook"]; ?>">
                    </div>

                    <div class="col-md-12">
                      <label for="title" class="form-label">https://www.instagram.com/<strong>usernameinstagram</strong></label>
                      <input type="text" class="form-control" name="instagram" id="instagram" placeholder="usernameinstagram" value="<?= $row["instagram"]; ?>">
                    </div>

                    <div class="col-md-12">
                      <label for="edit_description_address" class="form-label">Alamat Lengkap</label>
                      <textarea type="text" class="form-control" name="alamat" id="edit_description_address" required placeholder="Alamat Lengkap"><?= $row["alamat"]; ?></textarea>
                      <div class="invalid-feedback">
                        Harap Berikan Alamat Lengkap
                      </div>
                    </div>

                    <div class="col-md-12">
                      <label for="edit_service_hours" class="form-label">Jam Pelayanan</label>
                      <textarea type="text" class="form-control" name="service_hours" id="edit_service_hours" required placeholder="Jam Pelayanan"><?= $row["service_hours"]; ?></textarea>
                      <div class="invalid-feedback">
                        Harap Berikan Jam Pelayanan
                      </div>
                    </div>

                    <div class="col-12">
                      <button class="btn bg-purple-1 text-white" type="submit" name="edit_contact"><i class="bi bi-save"></i> Simpan</button>
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
        <!-- === end MODAL EDIT CONTACT=== -->


        <?php if (isset($_POST["edit_contact"])) : ?>
          <?php if (editContact($_POST) > 0) : ?>
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