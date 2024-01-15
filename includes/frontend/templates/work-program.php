<div class="container news-detail">

  <!-- Breadcrumb -->
  <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?= $url; ?>">Beranda</a></li>
      <li class="breadcrumb-item active" aria-current="page">Program Kerja</li>
    </ol>
  </nav>

  <!-- Content -->
  <div class="content-news">
    <div class="row">


      <!-- DATA WORK PROGRAM -->
      <?php
      // Hitung berapa data yang ingin ditampilkan per halaman
      $dataPerPageWorkProgram = 10;

      // Simulasikan data dari basis data Anda (ganti dengan data sesuai kebutuhan)
      $dataWorkProgram = [];

      foreach ($workProgram as $row) {
        // RESULT
        $idWorkProgram = $row["id"];
        $kegiatanWorkProgram = $row["kegiatan"];
        $tujuanWorkProgram = $row["tujuan"];
        $waktuWorkProgram = $row["waktu"];
        $penanggungJawabWorkProgram = $row["penanggung_jawab"];
        $anggaranWorkProgram = $row["anggaran"];
        $ketWorkProgram = $row["ket"];
        $dateWorkProgram = $row["date"];
        $timeWorkProgram = $row["time"];

        $dataWorkProgram[] = [
          "$idWorkProgram",
          "$kegiatanWorkProgram",
          "$tujuanWorkProgram",
          "$waktuWorkProgram",
          "$penanggungJawabWorkProgram",
          "$anggaranWorkProgram",
          "$ketWorkProgram",
          "$dateWorkProgram",
          "$timeWorkProgram",
        ];
      }

      // Ambil nilai halaman saat ini dari URL
      $currentPageWorkProgram = isset($_GET['page']) ? intval($_GET['page']) : 1;

      // Hitung offset untuk data yang akan ditampilkan pada halaman saat ini
      $offsetWorkProgram = ($_GET["page"] - 1) * $dataPerPageWorkProgram;

      // Ambil data yang sesuai dengan halaman saat ini
      $dataToShowWorkProgram = array_slice($dataWorkProgram, $offsetWorkProgram, $dataPerPageWorkProgram);

      // Hitung jumlah halaman
      $totalDataWorkProgram = count($dataWorkProgram);
      $totalPagesWorkProgram = ceil($totalDataWorkProgram / $dataPerPageWorkProgram);

      $noTableWorkProgram = ($currentPageWorkProgram - 1) * $dataPerPageWorkProgram + 1;

      ?>


      <div class="head-title-content mt-5 mb-3">
        <h4><span>PROGRAM</span> KERJA</h4>
      </div>
      <table class="table table table-striped table-hover mt-4" id="data_table">
        <thead>
          <tr>
            <th scope="col">No</th>
            <th scope="col">Kegiatan</th>
            <th scope="col">Tujuan</th>
            <th scope="col">Waktu</th>
            <th scope="col">Penanggung Jawab</th>
            <th scope="col">Anggaran</th>
            <th scope="col">Keterangan</th>
            <th scope="col">Ditambahkan</th>
          </tr>
        </thead>
        <tfoot>
          <tr>
            <th scope="col">No</th>
            <th scope="col">Kegiatan</th>
            <th scope="col">Tujuan</th>
            <th scope="col">Waktu</th>
            <th scope="col">Penanggung Jawab</th>
            <th scope="col">Anggaran</th>
            <th scope="col">Keterangan</th>
            <th scope="col">Ditambahkan</th>
          </tr>
        </tfoot>
        <tbody>
          <?php foreach ($dataToShowWorkProgram as $itemWorkProgram) : ?>
            <tr>
              <td><?= $noTableWorkProgram; ?></td>
              <td><?= $itemWorkProgram[1]; ?></td>
              <td><?= $itemWorkProgram[2]; ?></td>
              <td><?= $itemWorkProgram[3]; ?></td>
              <td>
                <?php foreach ($team as $row) : ?>
                  <?php if ($row["id"] === $itemWorkProgram[4]) : ?>
                    <?= $row["name"]; ?> (<?= $row["position"]; ?>)
                  <?php endif; ?>
                <?php endforeach; ?>
              </td>
              <td>
                <?php if (empty($itemWorkProgram[5])) : ?>
                  <center>-</center>
                <?php else : ?>
                  Rp<?= $itemWorkProgram[5]; ?>
                <?php endif; ?>
              </td>
              <td>
                <?php if (empty($itemWorkProgram[6])) : ?>
                  <center>-</center>
                <?php else : ?>
                  <?= $itemWorkProgram[6]; ?>
                <?php endif; ?>
              </td>
              <td>
                <?= day_id($itemWorkProgram[7]); ?>,
                <?= date_id($itemWorkProgram[7]); ?></td>
            </tr>
            <?php $noTableWorkProgram++; ?>
          <?php endforeach; ?>

        </tbody>
      </table>

    </div>
  </div>
</div>