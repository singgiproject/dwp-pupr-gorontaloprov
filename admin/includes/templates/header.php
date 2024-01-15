<header id="header" class="header fixed-top d-flex align-items-center">

  <div class="d-flex align-items-center justify-content-between">
    <a href="<?= $url; ?>admin" class="logo d-flex align-items-center">
      <img src="<?= $logo; ?>" alt="Logo <?= $shorTitle; ?>">
      <h6><?= $shorTitle; ?></h6>
    </a>
    <i class=" bi bi-list toggle-sidebar-btn"></i>
    <a href="<?= $url; ?>" class="ms-5 fs-5 text-dark">
      <i class=" bi bi-house"></i> Beranda
    </a>
  </div><!-- End Logo -->

  <!-- <div class="search-bar">
    <form class="search-form d-flex align-items-center" method="POST" action="#">
      <input type="text" name="query" placeholder="Cari" title="Enter search keyword">
      <button type="submit" title="Cari"><i class="bi bi-search"></i></button>
    </form>
  </div> -->
  <!-- End Search Bar -->

  <nav class="header-nav ms-auto">
    <ul class="d-flex align-items-center">

      <li class="nav-item d-block d-lg-none">
        <a class="nav-link nav-icon search-bar-toggle " href="#">
          <i class="bi bi-search"></i>
        </a>
      </li><!-- End Search Icon-->

      <li class="nav-item me-4">
        <div class="form-check form-switch">
          <input class="form-check-input" type="checkbox" id="darkModeToggle" style="cursor: pointer;">
          <label class="form-check-label fs-6" for="darkModeToggle" style="cursor: pointer;">Dark Mode</label>
        </div>
      </li>

      <?php if ($rowSession["level"] === $levelSuperAdmin or $rowSession["level"] === $levelAdmin) : ?>
        <li class="nav-item dropdown">

          <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
            <i class="bi bi-chat-left-text"></i>
            <?php if (!empty($messages)) : ?>
              <span class="badge bg-danger badge-number"><?php echo $resultMessage["countMessage"]; ?></span>
            <?php endif; ?>
          </a><!-- End Messages Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow messages">
            <li class="dropdown-header">
              Anda menerima <?php echo $resultMessage["countMessage"]; ?> pesan
              <a href="messages"><span class="badge rounded-pill bg-purple-1 p-2 ms-2">Lihat Semua</span></a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <?php foreach ($messages as $row) : ?>
              <li class="message-item">
                <a href="<?= $url; ?>admin/dashboard/messages">
                  <i class="rounded-circle bi bi-person-circle fs-1"></i>
                  <div>
                    <h4><?= $row["name"]; ?></h4>
                    <p><?= $row["description_message"]; ?></p>
                    <p><?= time_ago($row["date"]); ?></p>
                  </div>
                </a>
              </li>
            <?php endforeach; ?>

            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="dropdown-footer">
              <a href="<?= $url; ?>admin/dashboard/messages">Lihat Semua Pesan</a>
            </li>

          </ul><!-- End Messages Dropdown Items -->

        </li><!-- End Messages Nav -->
      <?php endif; ?>

      <?php if ($rowSession["level"] !== $levelSuperAdmin) : ?>
        <!-- Notification -->
        <li class="nav-item dropdown">

          <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
            <i class="bi bi-bell"></i>


            <?php if (!empty($resultNotification["countNotification"])) : ?>
              <span id="notification-badge" class="badge bg-danger badge-number">
                <?php if ($resultNotification["countNotification"] >= 10) : ?>
                  9+
                <?php endif; ?>
                <?php if ($resultNotification["countNotification"] <= 9) : ?>
                  <?= $resultNotification["countNotification"]; ?>
                <?php endif; ?>
              </span>
            <?php endif; ?>

          </a><!-- End Notification Icon -->


          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">
            <li class="dropdown-header">
              Anda menerima <?= $resultNotification["countNotification"]; ?> notifikasi
              <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">Lihat Semua</span></a>
            </li>

            <?php foreach ($notifications as $row) : ?>
              <?php if (isset($_POST["submit_read_notification"])) : ?>
                <?php if (updateNotificationStatus($_POST) > 0) : ?>
                  <script>
                    document.location.href = '<?= $url; ?>admin/dashboard/puskesmas';
                  </script>
                <?php endif; ?>
              <?php endif; ?>
              <form action="<?= $url; ?>admin/dashboard/puskesmas" method="post">
                <input type="text" hidden name="read_notification" value="<?= base64_encode(base64_encode(base64_encode(base64_encode(base64_encode(base64_encode(base64_encode(base64_encode(base64_encode($row["id"]))))))))); ?>">
                <button type="submit" name="submit_read_notification">
                  <li>
                    <hr class="dropdown-divider">
                  </li>
                  <li class="notification-item <?php if ($row["status"] === "0") : ?>bg-read-notification<?php endif; ?>">
                    <?php if ($row["code_notification"] === "diperiksa") : ?>
                      <i class="icon-notification bi bi-info-circle-fill text-info"></i>
                    <?php endif; ?>
                    <?php if ($row["code_notification"] === "failure") : ?>
                      <i class="icon-notification bi bi-x-circle-fill text-danger"></i>
                    <?php endif; ?>
                    <?php if ($row["code_notification"] === "success") : ?>
                      <i class="icon-notification bi bi-check-circle-fill text-success"></i>
                    <?php endif; ?>
                    <div>
                      <h4><?= $row["title"]; ?></h4>
                      <p><?= $row["description"]; ?></p>
                      <p class="time-ago"><i class="bi bi-clock"></i>
                        <?= $tgl = time_ago($row["date"]); ?></p>
                    </div>
                  </li>
                </button>
              </form>
            <?php endforeach; ?>

            <li>
              <hr class="dropdown-divider">
            </li>
            <li class="dropdown-footer">
              <a href="#">Show all notifications</a>
            </li>

          </ul><!-- End Notification Dropdown Items -->

        </li><!-- End Notification Nav -->
      <?php endif; ?>


      <li class="nav-item dropdown pe-3">

        <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
          <img src="<?= $url; ?>assets/img/users/<?= $rowSession["gambar"]; ?>" alt="Profile">
          <span class="d-none d-md-block dropdown-toggle ps-2"><?= $rowSession["full_name"]; ?></span>
        </a><!-- End Profile Iamge Icon -->

        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
          <li class="dropdown-header">
            <h6><?= $rowSession["full_name"]; ?></h6>
            <?php if ($levelSuperAdmin === $rowSession["level"]) : ?>
              Super Admin
            <?php endif; ?>
            <?php if ($rowSession["level"] === $levelAdmin) : ?>
              Admin
            <?php endif; ?>
            <?php if ($rowSession["level"] === $levelUser) : ?>
              User
            <?php endif; ?>
          </li>
          <li>
            <hr class="dropdown-divider">
          </li>

          <li>
            <a class="dropdown-item d-flex align-items-center" href="<?= $url; ?>admin/dashboard/profile">
              <i class="bi bi-person"></i>
              <span>Profil Saya</span>
            </a>
          </li>
          <li>
            <hr class="dropdown-divider">
          </li>

          <li>
            <a class="dropdown-item d-flex align-items-center" href="<?= $url; ?>admin/dashboard/profile">
              <i class="bi bi-gear"></i>
              <span>Pengaturan Akun</span>
            </a>
          </li>
          <li>
            <hr class="dropdown-divider">
          </li>

          <li>
            <a class="dropdown-item d-flex align-items-center" href="#" data-bs-toggle="modal" data-bs-target="#modalLogout">
              <i class="bi bi-box-arrow-right"></i>
              <span>Keluar</span>
            </a>
          </li>

        </ul><!-- End Profile Dropdown Items -->
      </li><!-- End Profile Nav -->

    </ul>
  </nav><!-- End Icons Navigation -->

</header>