<div class="container news-detail">

  <!-- Breadcrumb -->
  <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?= $url; ?>">Beranda</a></li>
      <li class="breadcrumb-item active" aria-current="page">Pencarian</li>
    </ol>
  </nav>

  <!-- Content -->
  <div class="content-news">
    <div class="row">

      <!-- Main Content -->
      <div class="col-md-9 main-content">
        <!-- Form Search -->
        <div class="search">
          <form class="fixed-form" action="<?= $url; ?>" method="get">
            <div class="input-group flex-nowrap">
              <input type="search" class="form-control search-input" placeholder="Cari berita..." aria-label="Username" name="query" aria-describedby="addon-wrapping" value="<?= str_replace("-", " ", $_GET["search"]); ?>" autocomplete="off">
              <button type="button" id="voiceBtn" class="input-group-text" onclick="startDictation()"><i class="bi bi-mic-fill"></i></button>
              <button type="submit" name="search" class="input-group-text" id="addon-wrapping"><i class="bi bi-search"></i></button>
            </div>
            <!-- Suggestions Container -->
            <div id="suggestions-container" class="suggestions-container"></div>
          </form>
          <div class="option-search">
            <li>
              <a href="" class="active"><i class="bi bi-search"></i> Semua</a>
            </li>
            <!-- <li>
              <a href=""><i class="bi bi-image"></i> Gambar</a>
            </li> -->
          </div>
        </div>

        <script>
          window.addEventListener('scroll', function() {
            var searchContainer = document.querySelector('.search');
            var scrollPos = window.scrollY;

            // Sesuaikan nilai threshold dengan tinggi scroll yang diinginkan
            var threshold = 70;

            if (scrollPos > threshold) {
              searchContainer.classList.add('fixed');
            } else {
              searchContainer.classList.remove('fixed');
            }
          });
        </script>


        <!-- List Data Search -->
        <div class="count-search">
          <?php
          $countSecondSearch  = substr(str_shuffle("1234567890"), 0, 2);
          ?>
          <small>Sekitar <?= count($news); ?> hasil (0,<?= $countSecondSearch; ?> detik)</small>
        </div>

        <?php foreach ($news as $row) : ?>
          <?php
          $titleNews = $row["title"];
          $titleNews = strtolower($titleNews);
          $titleNews = str_replace(" ", "-", $titleNews);
          $titleNews = preg_replace('/[^A-Za-z0-9\-]/', '', $titleNews);
          ?>
          <div class="list-data-search">
            <div class="icon-data">
              <a href="<?= $url; ?>news/<?= $titleNews; ?>-<?= $row["id"]; ?>">
                <img src="<?= $logo; ?>" alt="">
                <span><?= $title; ?></span>
                <br>
                <small><?= $url; ?> > news...</small>
              </a>
            </div>
            <div class="description-data">
              <a href="<?= $url; ?>news/<?= $titleNews; ?>-<?= $row["id"]; ?>"><?= $row["title"]; ?></a>
              <img src="<?= $url; ?>assets/img/news/<?= $row["thumbnail"]; ?>" alt="">
              <p><small><?= date_id_short($row["date"]); ?> — </small>
                <?php
                $description = $row["description"];
                $words = explode(" ", $description);
                $shortDescription = implode(" ", array_slice($words, 0, 15));
                ?>
                <?= str_replace("<p>", "", $shortDescription); ?>...
              </p>
            </div>
          </div>
        <?php endforeach; ?>

        <?php if (empty($news)) : ?>
          <!-- Empty Search Data -->
          <div class="empty-data-search">
            <div class="row">
              <div class="col-1">
                <i class="bi bi-search bi-search-empty"></i>
              </div>
              <div class="col-11">
                <h3>Penelusuran Anda tidak cocok dengan dokumen apa pun</h3>
                <p>Lihat tips lainnya untuk melakukan penelusuran di <?= $shorTitle; ?>. Anda juga dapat mencoba penelusuran berikut:</p>
                <?php foreach ($newsCategoryDESC_LIMIT2 as $row) : ?>
                  <li><i class="bi bi-search"></i><a href="<?= $url; ?>search/<?= strtolower(str_replace(" ", "-", $row["category"])); ?>"> <?= strtolower($row["category"]); ?></a></li>
                <?php endforeach; ?>
                <div class="border-bottom"></div>
              </div>
            </div>
          </div>
        <?php endif; ?>
      </div>

    </div>
  </div>
  <!-- Card Right -->

</div>