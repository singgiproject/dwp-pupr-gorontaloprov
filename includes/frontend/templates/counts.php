<section id="counts" class="counts">
  <div class="container" data-aos="fade-up">

    <div class="row gy-4 justify-content-center">

      <div class="col-lg-3 col-md-6">
        <div class="count-box">
          <i class="fa-solid fa-users"></i>
          <div>
            <span data-purecounter-start="0" data-purecounter-end="<?php echo $resultTeam["countTeam"]; ?>" data-purecounter-duration="1" class="purecounter"></span>
            <p>Tim</p>
          </div>
        </div>
      </div>

      <div class="col-lg-3 col-md-6">
        <div class="count-box">
          <i class="bi bi-journal-richtext" style="color: #ee6c20;"></i>
          <div>
            <span data-purecounter-start="0" data-purecounter-end="<?php echo $resultNews["countNews"]; ?>" data-purecounter-duration="1" class="purecounter"></span>
            <p>Berita</p>
          </div>
        </div>
      </div>


      <div class="col-lg-3 col-md-6">
        <div class="count-box">
          <i class="bi bi-people" style="color: #bb0852;"><sup class="fa fa-eye" style="font-size: 14px;"></sup></i>
          <div>
            <span data-purecounter-start="0" data-purecounter-end="<?php echo $resultVisitor["countVisitor"]; ?>" data-purecounter-duration="1" class="purecounter"></span>
            <p>Pengunjung</p>
          </div>
        </div>
      </div>

    </div>

  </div>
</section>