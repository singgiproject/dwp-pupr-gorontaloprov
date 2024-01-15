<section id="team" class="team">

  <!-- Team -->
  <div class="container" data-aos="fade-up">

    <header class="section-header">
      <h2>Pengurus</h2>
      <p>Pengurus DWP</p>
    </header>

    <div class="row gy-2 justify-content-center">

      <?php foreach ($team as $row) : ?>
        <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
          <div class="member">
            <div class="member-img">
              <img src="assets/img/team/<?= $row["image"]; ?>" class="img-fluid" alt="">
              <div class="social">
                <?php if (!empty($row["facebook"])) : ?>
                  <a href="https://www.facebook.com/<?= $row["facebook"]; ?>"><i class="bi bi-facebook"></i></a>
                <?php endif; ?>

                <?php if (!empty($row["instagram"])) : ?>
                  <a href="https://www.instagram.com/<?= $row["instagram"]; ?>"><i class="bi bi-instagram"></i></a>
                <?php endif; ?>

              </div>
            </div>
            <div class="member-info">
              <h4><?= $row["name"]; ?></h4>
              <span>
                <?= $row["position"]; ?>
              </span>
              <p>
                <?= $row["description"]; ?>
              </p>
            </div>
          </div>
        </div>
      <?php endforeach; ?>

    </div>

  </div>
  <!-- Team //End-->


</section>