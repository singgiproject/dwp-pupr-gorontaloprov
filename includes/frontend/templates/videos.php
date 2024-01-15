<section id="videos" class="videos">
  <div class="container" data-aos="fade-up">

    <header class="section-header">
      <h2>Video</h2>
      <p>Tonton video terbaru kami</p>
    </header>

    <div class="row gy-4" data-aos="fade-up" data-aos-delay="200">

      <!-- Card Video -->
      <div class="row mt-3">
        <div class="col-md-12">
          <div class="scrollable-container" id="videoContainer">

            <?php foreach ($videos as $row) : ?>
              <div class="card-video">
                <iframe width="320" height="190" src="https://www.youtube.com/embed/<?= substr($row["source"], 32, 11); ?>?autoplay=<?= $row["play"]; ?>" frameborder="0" allowfullscreen allow="autoplay"></iframe>
              </div>
            <?php endforeach; ?>

            <?php if (count($videos) >= 6) : ?>
              <a href="https://www.youtube.com/@LPA-PKPRegionalGorontalo" target="_BLANK" class="card-video card-video-view-all"><i class="bi bi-youtube"></i> Lihat Semua</a>
            <?php endif; ?>

          </div>
          <div class="scroll-button left" id="scrollLeftButton"><i class="bi bi-chevron-left"></i></div>
          <div class="scroll-button right" id="scrollRightButton"><i class="bi bi-chevron-right"></i></div>
        </div>
      </div>
      <script>
        const videoContainer = document.getElementById("videoContainer");
        const scrollLeftButton = document.getElementById("scrollLeftButton");
        const scrollRightButton = document.getElementById("scrollRightButton");

        let isDragging = false;
        let startPosition = 0;
        let deltaX = 0;

        scrollLeftButton.addEventListener("click", () => {
          videoContainer.scrollBy({
            left: -330,
            behavior: 'smooth'
          }); // Sesuaikan pergeseran sesuai kebutuhan
        });

        scrollRightButton.addEventListener("click", () => {
          videoContainer.scrollBy({
            left: 330,
            behavior: 'smooth'
          }); // Sesuaikan pergeseran sesuai kebutuhan
        });

        videoContainer.addEventListener("mousedown", (e) => {
          isDragging = true;
          startPosition = e.clientX;
          deltaX = 0;
          videoContainer.style.cursor = 'grabbing';
        });

        document.addEventListener("mousemove", (e) => {
          if (!isDragging) return;

          deltaX = e.clientX - startPosition;
          videoContainer.scrollLeft -= deltaX;
          startPosition = e.clientX;
        });

        document.addEventListener("mouseup", () => {
          isDragging = false;
          videoContainer.style.cursor = 'grab';
        });
      </script>
      <!-- end Card Video -->

    </div>

  </div>

</section>