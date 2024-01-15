<section id="about" class="about">

  <div class="container" id="hero" data-aos="fade-up">
    <div class="row gx-0">

      <div class="col-lg-6 d-flex align-items-center about-img" data-aos="zoom-out" data-aos-delay="200">
        <img src="<?= $url; ?>assets/img/about/<?= $rowAbout["image"]; ?>?img=<?= time(); ?>" class="img-fluid animated" alt="">
      </div>

      <div class="col-lg-6 d-flex flex-column justify-content-center" data-aos="fade-up" data-aos-delay="200">
        <div class="content">
          <h3>Tentang Kami</h3>
          <h2><?= $title; ?></h2>
          <p>
            <?php
            $aboutDescription = $rowAbout["description"];
            $words = explode(" ", $aboutDescription);
            $shortAboutDescription = implode(" ", array_slice($words, 0, 20));
            ?>
            <?= $shortAboutDescription; ?>...
          </p>
          <div class="text-center text-lg-start">
            <a href="#" class="btn-read-more d-inline-flex align-items-center justify-content-center align-self-center" data-bs-toggle="modal" data-bs-target="#modalDetailAbout">
              <span>Tampilkan Detail</span>
              <i class="bi bi-eye"></i>
            </a>
          </div>
        </div>
      </div>

    </div>
  </div>

</section>