<section id="hero" class="hero d-flex align-items-center">

  <div class="container">

    <div class="row title-hero">
      <div class="col-lg-6 d-flex flex-column justify-content-center">
        <h3 data-aos="fade-up"><span class="after-color">Selamat Datang di</span> <br>Website Resmi <?= $title; ?></h3>
        <h4 data-aos="fade-up" data-aos-delay="100"><?= $rowContact["service_hours"]; ?></h4>
        <div data-aos="fade-up" data-aos-delay="100">
          <div class="text-center text-lg-start">
            <a href="<?= $url; ?>#" class="btn-get-started scrollto d-inline-flex align-items-center justify-content-center align-self-center" data-bs-toggle="modal" data-bs-target="#organizationStructurModal">
              <span>Struktur Organisasi</span>
              <i class="bi bi-diagram-3"></i>
            </a>
          </div>
        </div>
      </div>

      <div class="col-lg-6 hero-img animated" data-aos="zoom-out" data-aos-delay="100">
        <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
          <div class="carousel-inner">

            <?php
            $isActive = true; // Variabel untuk menandai apakah carousel item aktif (true: aktif, false: tidak aktif)

            foreach ($newsDESC_LIMIT5 as $row) :
            ?>
              <div class="carousel-item <?= ($isActive) ? 'active' : ''; ?>">
                <img src="<?= $url; ?>assets/img/news/<?= $row["thumbnail"]; ?>?img=<?= time(); ?>" class="d-block w-100 img-fluid" alt="Gambar <?= $title; ?>">
                <div class="carousel-caption d-none d-md-block">
                  <span><?= $row["category"]; ?></span>
                  <small>
                    <?= day_id(date($row["date"])); ?>,
                    <?= date_id($row["date"]); ?>
                  </small>
                  <br>
                  <?php
                  $titleNews = $row["title"];
                  $titleNews = strtolower($titleNews);
                  $titleNews = str_replace(" ", "-", $titleNews);
                  $titleNews = preg_replace('/[^A-Za-z0-9\-]/', '', $titleNews);
                  ?>
                  <a href="<?= $url; ?>news/<?= $titleNews; ?>-<?= $row["id"]; ?>"><?= $row["title"]; ?></a>
                </div>
              </div>
            <?php
              $isActive = false; // Setelah item pertama, nonaktifkan variabel $isActive
            endforeach;
            ?>


          </div>
          <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
            <span class="carousel-control-prev-icon bg-success me-5 rounded-circle" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
            <span class="carousel-control-next-icon bg-success ms-5 rounded-circle" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>
      </div>

    </div>

  </div>

</section>