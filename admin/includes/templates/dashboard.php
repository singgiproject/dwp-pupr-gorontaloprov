<?php if ($_GET["pages"] === "welcome") : ?>
  <!-- Spinner Start -->
  <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50  align-items-center justify-content-center load-welcome">
    <img src="<?= $logo; ?>" alt="" class="loading-animation loading-logo">
    <p class="loading-text">Loading...</p>
    <p>Dashboard - <?= $title; ?></p>
  </div>
  <!-- Spinner End -->
<?php endif; ?>

<main id="main" class="main">

  <div class="pagetitle">
    <h1>Dashboard</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item">Selamat Datang </li>
        <li class="breadcrumb active">&nbsp;<?= $rowSession["full_name"]; ?> </li>
        <li class="breadcrumb-item">&nbsp;anda login sebagai</li>
        <li class="breadcrumb active">&nbsp;<?= ucwords($rowSession["level"]); ?></li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <?php
  if (
    $rowSession["level"] === $levelAdmin or
    $rowSession["level"] === $levelUser
  ) : ?>
    <?php if ($rowSession["status_account"] === "0") : ?>
      <div class="row mb-4">
        <div class="col-12 alert alert-warning alert-dismissible fade show" role="alert">
          <h6>
            <strong><i class="bi bi-info-circle-fill"></i> </strong> Status akun anda masih ditangguhkan. Silahkan hubungi <strong>IT <?= $title; ?></strong> Via <i class="bi bi-whatsapp"></i> WhatsApp <strong>(0823-4645-5079) - Singgi Mokodompit</strong>
          </h6>
        </div>
      </div>
    <?php endif; ?>
  <?php endif; ?>

  <section class="section dashboard">

    <div class="row">

      <!-- Left side columns -->
      <div class="col-lg-<?= ($rowSession["level"] === $levelAdmin or $rowSession["level"] === $levelUser) ? '12' : '8'; ?>">
        <div class="row">

          <!-- Accreditation Card -->
          <div class="col-xxl-4 col-md-<?= ($rowSession["level"] === $levelAdmin or $rowSession["level"] === $levelUser) ? '4' : '6'; ?>">
            <div class="card info-card sales-card">

              <a href="#">
                <div class="card-body">
                  <h5 class="card-title">Berita</h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-person-video3 text-primary"></i>
                    </div>
                    <div class="ps-3">
                      <h6><?= $resultNews["countNews"]; ?></h6>
                      <span class="text-muted small pt-2 ps-1">Jumlah Data</span>
                    </div>
                  </div>
                </div>
              </a>

            </div>
          </div><!-- End Accreditation Card -->

          <!-- Accreditation Card -->
          <div class="col-xxl-4 col-md-<?= ($rowSession["level"] === $levelAdmin or $rowSession["level"] === $levelUser) ? '4' : '6'; ?>">
            <div class="card info-card sales-card">

              <a href="#">
                <div class="card-body">
                  <h5 class="card-title">Pengurus DWP</h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-people"></i>
                    </div>
                    <div class="ps-3">
                      <h6><?= $resultTeam["countTeam"]; ?></h6>
                      <span class="text-muted small pt-2 ps-1">Jumlah Data</span>
                    </div>
                  </div>
                </div>
              </a>

            </div>
          </div><!-- End Accreditation Card -->

          <!-- Accreditation Card -->
          <div class="col-xxl-4 col-md-<?= ($rowSession["level"] === $levelAdmin or $rowSession["level"] === $levelUser) ? '4' : '6'; ?>">
            <div class="card info-card sales-card">

              <a href="#">
                <div class="card-body">
                  <h5 class="card-title">Program Kerja</h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-list-check text-danger"></i>
                    </div>
                    <div class="ps-3">
                      <h6><?= $resultWorkProgram["countWorkProgram"]; ?></h6>
                      <span class="text-muted small pt-2 ps-1">Jumlah Data</span>
                    </div>
                  </div>
                </div>
              </a>

            </div>
          </div><!-- End Accreditation Card -->

          <!-- Gallery Card -->
          <div class="col-xxl-4 col-md-<?= ($rowSession["level"] === $levelAdmin or $rowSession["level"] === $levelUser) ? '4' : '6'; ?>">
            <div class="card info-card gallery-card">

              <a href="gallery">
                <div class="card-body">
                  <h5 class="card-title">Galeri</h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-images"></i>
                    </div>
                    <div class="ps-3">
                      <h6><?= $resultGallery["countGallery"]; ?></h6>
                      <span class="text-muted small pt-2 ps-1">Jumlah Galeri</span>
                    </div>
                  </div>
                </div>
              </a>

            </div>
          </div><!-- End Gallery Card -->

          <?php if ($rowSession["level"] === $levelSuperAdmin or $rowSession["level"] === $levelAdmin) : ?>
            <!-- Account Card -->
            <div class="col-xxl-4 col-md-<?= ($rowSession["level"] === $levelAdmin or $rowSession["level"] === $levelUser) ? '4' : '6'; ?>">
              <div class="card info-card account-card">

                <a href="">
                  <div class="card-body">
                    <h5 class="card-title">Akun</h5>

                    <div class="d-flex align-items-center">
                      <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                        <i class="bi bi-person-fill"></i>
                      </div>
                      <div class="ps-3">
                        <h6><?php echo $resultAccount["countAccount"]; ?></h6>
                        <span class="text-muted small pt-2 ps-1">Jumlah Akun Sistem</span>
                      </div>
                    </div>
                  </div>
                </a>

              </div>
            </div><!-- End Account Card -->
          <?php endif; ?>

          <!-- Customers Card -->
          <div class="col-xxl-4 col-xl-<?= ($rowSession["level"] === $levelAdmin or $rowSession["level"] === $levelUser) ? '4' : '6'; ?>">

            <div class="card info-card customers-card">

              <div class="card-body">
                <h5 class="card-title">Pengunjung Website <i class="bi bi-eye"></i></h5>

                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-people"></i>
                  </div>
                  <div class="ps-3">
                    <h6><?php echo $resultVisitor["countVisitor"]; ?></h6>
                  </div>
                </div>

              </div>
            </div>

          </div><!-- End Customers Card -->


          <!-- Traficts -->
          <div class="col-md-<?= ($rowSession["level"] === $levelAdmin or $rowSession["level"] === $levelUser) ? '6' : '12'; ?>">
            <div class="card">
              <div class="card-body pb-0">
                <h5 class="card-title">Data Keseluruhan Absensi</h5>

                <div id="trafficChart" style="min-height: 400px;" class="echart"></div>

                <script>
                  document.addEventListener("DOMContentLoaded", () => {
                    echarts.init(document.querySelector("#trafficChart")).setOption({
                      tooltip: {
                        trigger: 'item'
                      },
                      legend: {
                        top: '5%',
                        left: 'center'
                      },
                      series: [{
                        name: 'Access From',
                        type: 'pie',
                        radius: ['40%', '70%'],
                        avoidLabelOverlap: false,
                        label: {
                          show: false,
                          position: 'center'
                        },
                        emphasis: {
                          label: {
                            show: true,
                            fontSize: '20',
                            fontWeight: 'bold'
                          }
                        },
                        labelLine: {
                          show: false
                        },
                        data: [{
                            value: 3,
                            name: 'Hadir',
                            itemStyle: {
                              color: 'rgba(46, 204, 113, 0.8)'
                            }
                          },
                          {
                            value: 4,
                            name: 'Sakit',
                            itemStyle: {
                              color: 'rgba(231, 76, 60, 0.8)'
                            }
                          },
                          {
                            value: 6,
                            name: 'Izin',
                            itemStyle: {
                              color: 'rgba(243, 156, 18, 0.8)'
                            }
                          },
                          {
                            value: 6,
                            name: 'Tanpa Keterangan',
                            itemStyle: {
                              color: 'rgba(52, 152, 219, 0.8)'
                            }
                          }
                        ]
                      }]
                    });
                  });
                </script>


              </div>
            </div>
          </div>
          <!-- End Traficts -->

          <!-- Top Selling -->
          <div class="col-<?= ($rowSession["level"] === $levelAdmin or $rowSession["level"] === $levelUser) ? '6' : '12'; ?>">
            <div class="card top-selling overflow-auto">

              <div class="card-body">
                <h5 class="card-title">IP Pengunjung Website
                  <i class="bi bi-eye"></i>
                  <?php echo $resultVisitor["countVisitor"]; ?>
                </h5>

                <table class="table table-borderless datatable">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Alamat IP</th>
                      <th scope="col">Waktu Akses</th>
                      <th scope="col">Opsi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $noTableVisitor = 1; ?>
                    <?php foreach ($visitor as $row) : ?>
                      <tr>
                        <td><?= $noTableVisitor; ?></td>
                        <td><?= $row["ip_visitor"]; ?></td>
                        <td><?= time_ago($row["date"]); ?></td>
                        <td>
                          <a href="https://whatismyipaddress.com/ip/<?= $row["ip_visitor"]; ?>" class="badge btn bg-purple-1" target="_BLANK"><i class="bi bi-geo-alt"></i> Lokasi</a>
                        </td>
                      </tr>
                      <?php $noTableVisitor++; ?>
                    <?php endforeach; ?>
                  </tbody>
                </table>

              </div>

            </div>
          </div><!-- End Top Selling -->

        </div>
      </div><!-- End Left side columns -->

      <?php if ($rowSession["level"] === $levelSuperAdmin) : ?>
        <!-- Right side columns -->
        <div class="col-lg-4">


          <!-- Activity User Login -->
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Informasi Login User</h5>

              <div class="activity">

                <?php foreach ($locations as $rowLocations) : ?>
                  <?php foreach ($users as $rowUsers) : ?>
                    <?php if ($rowUsers["id"] === $rowLocations["id_user"]) : ?>
                      <div class="activity-item d-flex">
                        <div class="activite-label"><?= time_ago($rowLocations["date"]); ?> </div>
                        <i class='bi bi-circle-fill activity-badge color-icon align-self-start'></i>
                        <div class="activity-content">
                          <!-- Link "Lihat Lokasi" -->
                          <a href="https://www.google.com/maps?q=<?= $rowLocations["latitude"]; ?>,<?= $rowLocations["longitude"]; ?>" class="view-location" id="location-link<?= $rowLocations["id"]; ?>" target="_BLANK"><?= $rowUsers["full_name"]; ?></a>
                        </div>
                      </div><!-- End activity item-->
                    <?php endif; ?>
                  <?php endforeach; ?>
                <?php endforeach; ?>

              </div>

            </div>
          </div>
          <!-- end Activity User Login -->
        <?php endif; ?>

        </div><!-- End Right side columns -->


    </div>
  </section>

</main><!-- End #main -->