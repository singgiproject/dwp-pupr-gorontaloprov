<section id="contact" class="contact">

  <div class="container" data-aos="fade-up">

    <header class="section-header">
      <h2>Kontak</h2>
      <p>Kontak Kami</p>
    </header>

    <div class="row gy-4">

      <div class="col-lg-6">

        <div class="row gy-4">
          <div class="col-md-6">
            <div class="info-box">
              <i class="bi bi-facebook"></i>
              <h3>Facebook</h3>
              <p><?= $rowContact["facebook"]; ?></p>
            </div>
          </div>
          <div class="col-md-6">
            <div class="info-box">
              <i class="bi bi-instagram"></i>
              <h3>Instagran</h3>
              <p>@<?= $rowContact["instagram"]; ?></p>
            </div>
          </div>
          <div class="col-md-6">
            <div class="info-box">
              <i class="bi bi-geo-alt"></i>
              <h3>Alamat</h3>
              <p><?= $rowContact["alamat"]; ?></p>
            </div>
          </div>
          <div class="col-md-6">
            <div class="info-box">
              <i class="bi bi-telephone"></i>
              <h3>Hubungi Kami</h3>
              <p><?= $rowContact["no_telp"]; ?></p>
            </div>
          </div>
          <div class="col-md-6">
            <div class="info-box">
              <i class="bi bi-envelope"></i>
              <h3>Email Kami</h3>
              <p><?= $rowContact["email"]; ?></p>
            </div>
          </div>
          <div class="col-md-6">
            <div class="info-box">
              <i class="bi bi-clock"></i>
              <h3>Jam Pelayanan</h3>
              <p><?= $rowContact["service_hours"]; ?></p>
            </div>
          </div>
        </div>

      </div>

      <div class="col-lg-6">
        <form action="" method="post">
          <div class="row gy-4">

            <div class="col-md-6">
              <input type="text" name="name" class="form-control" placeholder="Nama Lengkap Kamu" required>
            </div>

            <div class="col-md-6 ">
              <input type="email" class="form-control" name="email" placeholder="Email Kamu" required>
            </div>

            <div class="col-md-12">
              <input type="text" class="form-control" name="subject" placeholder="Subjek" required>
            </div>

            <div class="col-md-12">
              <textarea class="form-control" name="message" rows="6" placeholder="Pesan" required></textarea>
            </div>

            <input hidden type="text" name="ip_user" value="<?= $ipUser; ?>">
            <input hidden type="text" name="date" value="<?= $dateEncode; ?>">
            <input hidden type="text" name="read_one_message" value="1">
            <input hidden type="text" name="read_all_message" value="1">

            <div class="col-md-12 text-center">
              <?php if (isset($_POST["send_message"])) : ?>
                <?php if (sendMessage($_POST) > 0) : ?>
                  <script>
                    document.location.href = '<?= $url; ?>#contact';
                  </script>
                  <div class="alert alert-success" role="alert">
                    Pesan anda berhasil dikirimkan!
                  </div>
                <?php endif; ?>
              <?php endif; ?>
              <button type="submit" name="send_message" class="btn btn-success">Kirim Pesan</button>
            </div>

          </div>
        </form>

      </div>

    </div>

  </div>

</section>