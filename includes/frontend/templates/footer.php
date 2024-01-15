<footer id="footer" class="footer">

  <div class="footer-top">
    <div class="container">
      <div class="row gy-4">
        <div class="col-lg-5 col-md-12 footer-info">
          <a href="" class="logo d-flex align-items-center">
            <img src="<?= $logo; ?>" alt="">
            <span><?= $shorTitle; ?></span>
          </a>
          <p>
            <?php
            $aboutDescription = $rowAbout["description"];
            $words = explode(" ", $aboutDescription);
            $shortAboutDescription = implode(" ", array_slice($words, 0, 20));
            ?>
            <?= $shortAboutDescription; ?>...
            <a href="#" class="btn-read-more d-inline-flex align-items-center justify-content-center align-self-center" data-bs-toggle="modal" data-bs-target="#modalDetailAbout">
              <span>Selengkapnya</span>
              <i class="bi bi-arrow-right"></i>
            </a>
          </p>
          <div class="social-links mt-3">
            <a href="https://www.facebook.com/<?= $rowContact["facebook"]; ?>" class="facebook" title="Facebook - <?= $rowContact["facebook"]; ?>"><i class="bi bi-facebook"></i></a>
            <a href="https://www.instagram.com/<?= $rowContact["instagram"]; ?>" class="instagram" title="Instagram - @<?= $rowContact["instagram"]; ?>"><i class="bi bi-instagram"></i></a>
          </div>
        </div>

        <div class="col-lg-2 col-6 footer-links">
          <h4>Berita Terbaru</h4>
          <ul>
            <?php foreach ($newsDESC_LIMIT5 as $row) : ?>
              <?php
              $titleNews = $row["title"];
              $titleNews = strtolower($titleNews);
              $titleNews = str_replace(" ", "-", $titleNews);
              $titleNews = preg_replace('/[^A-Za-z0-9\-]/', '', $titleNews);
              ?>
              <li><i class="bi bi-chevron-right"></i> <a href="<?= $url; ?>news/<?= $titleNews; ?>-<?= $row["id"]; ?>"><?= $row["title"]; ?></a></li>
            <?php endforeach; ?>
          </ul>
        </div>


        <div class="col-lg-2 col-md-6 footer-contact text-center text-md-start">
          <h4>Alamat</h4>
          <p>
            <?= $rowContact["alamat"]; ?>
          </p>
        </div>

        <div class="col-lg-3 col-6 footer-links">
          <h4>Maps</h4>
          <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15958.513279751416!2d123.0866241!3d0.5591651!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x327ed4b1da0233bb%3A0x8235386a06a333f1!2sKantor%20Dinas%20PUPR%20Provinsi%20Gorontalo!5e0!3m2!1sid!2sid!4v1703583269590!5m2!1sid!2sid" width="100%" height="250" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
      </div>
    </div>
  </div>

  <div class="container">
    <div class="copyright">
      &copy; Copyright
      <strong>
        <span>
          <?= $shorTitle; ?>
          </a>
        </span>
      </strong>. All Rights Reserved
    </div>
    <div class="credits">
      Designed by <a href="<?= $url; ?>"><?= $shorTitle; ?></a>
    </div>
  </div>
</footer>