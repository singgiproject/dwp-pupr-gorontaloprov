<section id="news" class="news values">

  <div class="container" data-aos="fade-up">

    <header class="section-header">
      <h2>Berita</h2>
      <p>Berita Terbaru</p>
    </header>

    <div class="row justify-content-center">

      <div class="slide-container swiper">
        <div class="slide-content">
          <div class="card-wrapper swiper-wrapper">

            <?php foreach ($newsDESC_LIMIT8 as $row) : ?>
              <div class="card col-md-3 mb-4 swiper-slide" data-aos="fade-up" data-aos-delay="200">
                <div class="card-body box-news">
                  <?php
                  $titleNews = $row["title"];
                  $titleNews = strtolower($titleNews);
                  $titleNews = str_replace(" ", "-", $titleNews);
                  $titleNews = preg_replace('/[^A-Za-z0-9\-]/', '', $titleNews);
                  ?>
                  <a href="<?= $url; ?>news/<?= $titleNews; ?>-<?= $row["id"]; ?>"><img src="<?= $url; ?>assets/img/news/<?= $row["thumbnail"]; ?>" class="" alt=""></a>
                  <div class="news-box">
                    <span><?= $row["category"]; ?></span>
                    <small>
                      <?= day_id(date($row["date"])); ?>,
                      <?= date_id($row["date"]); ?>
                    </small>
                    <br>
                    <a href="<?= $url; ?>news/<?= $titleNews; ?>-<?= $row["id"]; ?>">
                      <?= $row["title"]; ?>
                    </a>
                    <?php
                    $description = $row["description"];
                    $words = explode(" ", $description);
                    $shortDescription = implode(" ", array_slice($words, 0, 10));
                    ?>
                    <p><?= $shortDescription; ?>...</p>
                  </div>
                </div>
              </div>
            <?php endforeach; ?>

          </div>
        </div>

        <div class="swiper-button-next swiper-navBtn"></div>
        <div class="swiper-button-prev swiper-navBtn"></div>
        <!-- <div class="swiper-pagination"></div> -->
      </div>

    </div>



  </div>

</section>