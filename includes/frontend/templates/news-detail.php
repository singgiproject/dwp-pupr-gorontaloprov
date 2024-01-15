<div class="container news-detail">

  <!-- Breadcrumb -->
  <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?= $url; ?>">Beranda</a></li>
      <li class="breadcrumb-item active" aria-current="page">Berita</li>
    </ol>
  </nav>

  <!-- Content -->
  <div class="content-news">
    <div class="row">

      <!-- Main Content -->
      <div class="col-md-9 main-content" data-aos="fade-up">
        <h3><?= $detailNews["title"]; ?></h3>
        <div class="row">
          <div class="col-6 from-post">
            <?php foreach ($users as $row) : ?>
              <?php foreach ($newsUserPosted as $rowNews) : ?>
                <?php if ($row["id"] === $rowNews["posted"]) : ?>
                  <?php if ($detailNews["id"] === $rowNews["id"]) : ?>
                    <img src="<?= $url; ?>assets/img/users/<?= $row["gambar"]; ?>" alt="">
                    <span>
                      <?= $row["full_name"]; ?>
                    </span>
                  <?php endif; ?>
                <?php endif; ?>
              <?php endforeach; ?>
            <?php endforeach; ?>
            <small>
              <br>
              <strong>Diterbitkan</strong> <i class="bi bi-calendar"></i>
              <?= day_id(date($detailNews["date"])); ?>,
              <?= date_id($detailNews["date"]); ?>, <?= $detailNews["time"]; ?> WITA
            </small>
          </div>

          <div class="col-6 share">
            <li>BAGIKAN :</li>
            <li>
              <a href=""><i class="bi bi-facebook"></i></a>
              <a href=""><i class="bi bi-twitter"></i></a>
              <a href=""><i class="bi bi-whatsapp"></i></a>
            </li>
          </div>
        </div>
        <div class="row">
          <div class="col-12 news-thumbnail">
            <img src="<?= $url; ?>assets/img/news/<?= $detailNews["thumbnail"]; ?>" alt="">
            <div class="thumbnail-caption">
              <small><?= $detailNews["thumbnail_caption"]; ?>
              </small>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12 news-description">
            <p><?= $detailNews["description"]; ?></p>
          </div>
        </div>

        <div class="row">
          <div class="col-12 news-tags">
            <h5>TAG</h5>
            <?php

            // Contoh data dari database
            $detailNewsArray = array(
              "tags" => $detailNewsArray["tags"]
            );

            $tagsArray = explode(', ', $detailNews["tags"]);
            ?>
            <?php foreach ($tagsArray as $tag) : ?>
              <li>
                <a href="<?= $url; ?>search/<?= str_replace(" ", "-", strtolower($tag)); ?>"><?= $tag; ?></a>
              </li>
            <?php endforeach; ?>
          </div>
        </div>
        <div class="row">
          <div class="col-12 share mb-5">
            <li>BAGIKAN :</li>
            <li>
              <a href=""><i class="bi bi-facebook"></i></a>
              <a href=""><i class="bi bi-twitter"></i></a>
              <a href=""><i class="bi bi-whatsapp"></i></a>
            </li>
          </div>
        </div>

        <div class="row">
          <div class="col-12 news-related">
            <div class="head-title-content">
              <h4><span>BERITA</span> TERKAIT</h4>
            </div>

            <div class="news-related-content">
              <div id="news" class="news">

                <div class="container" data-aos="fade-up">
                  <div class="row">

                    <?php
                    $relatedNewsExist = false; // Variabel untuk mengecek apakah ada berita terkait atau tidak

                    foreach ($news as $row) :
                      if (
                        str_replace(" ", "", strtolower($row["category"])) === str_replace(" ", "", strtolower($detailNews["category"])) &&
                        $row["id"] !== $detailNews["id"]
                      ) :
                        $relatedNewsExist = true; // Setel ke true jika ada berita terkait

                    ?>
                        <div class="col-lg-4 mb-4" data-aos="fade-up" data-aos-delay="200">
                          <div class="box-news">
                            <?php
                            $titleNews = $row["title"];
                            $titleNews = strtolower($titleNews);
                            $titleNews = str_replace(" ", "-", $titleNews);
                            $titleNews = preg_replace('/[^A-Za-z0-9\-]/', '', $titleNews);
                            ?>
                            <a href="<?= $url; ?>news/<?= $titleNews; ?>-<?= $row["id"]; ?>"><img src="<?= $url; ?>assets/img/news/<?= $row["thumbnail"]; ?>" class="" alt=""></a>
                            <div class="box news-box">
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
                      <?php endif; ?>
                    <?php endforeach; ?>

                    <?php if (!$relatedNewsExist) : ?>
                      <div class="col-lg-12">
                        <p>Belum ada berita terkait.</p>
                      </div>
                    <?php endif; ?>


                  </div>

                </div>

              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Sidebar -->
      <aside class="col-md-3 sidebar" data-aos="fade-left">
        <div class="head-title-content">
          <h4><span>BERITA</span> TERBARU</h4>
        </div>
        <div class="row">
          <?php foreach ($newsDESC_LIMIT12 as $row) : ?>
            <div class="col-md-6 news-latest">
              <?php
              $titleNews = $row["title"];
              $titleNews = strtolower($titleNews);
              $titleNews = str_replace(" ", "-", $titleNews);
              $titleNews = preg_replace('/[^A-Za-z0-9\-]/', '', $titleNews);
              ?>
              <a href="<?= $url; ?>news/<?= $titleNews; ?>-<?= $row["id"]; ?>"><img src="<?= $url; ?>assets/img/news/<?= $row["thumbnail"]; ?>" class="" alt=""></a>
              <a href="<?= $url; ?>news/<?= $titleNews; ?>-<?= $row["id"]; ?>">
                <?= $row["title"]; ?>
              </a>
            </div>
          <?php endforeach; ?>
        </div>
      </aside>
    </div>
  </div>
  <!-- Card Right -->

</div>