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
          <?php $noTable = 1; ?>
          <?php foreach ($workProgram as $rowWorkProgram) : ?>
            <tr>
              <td><?= $noTable; ?></td>
              <td><?= $rowWorkProgram["kegiatan"]; ?></td>
              <td><?= $rowWorkProgram["tujuan"]; ?></td>
              <td><?= $rowWorkProgram["waktu"]; ?></td>
              <td>
                <?php foreach ($team as $row) : ?>
                  <?php if ($row["id"] === $rowWorkProgram["penanggung_jawab"]) : ?>
                    <?= $row["name"]; ?> (<?= $row["position"]; ?>)
                  <?php endif; ?>
                <?php endforeach; ?>
              </td>
              <td>
                <?php if (empty($rowWorkProgram["anggaran"])) : ?>
                  <center>-</center>
                <?php else : ?>
                  Rp<?= $rowWorkProgram["anggaran"]; ?>
                <?php endif; ?>
              </td>
              <td>
                <?php if (empty($rowWorkProgram["ket"])) : ?>
                  <center>-</center>
                <?php else : ?>
                  <?= $rowWorkProgram["ket"]; ?>
                <?php endif; ?>
              </td>
              <td>
                <?= day_id($rowWorkProgram["date"]); ?>,
                <?= date_id($rowWorkProgram["date"]); ?></td>
            </tr>
            <?php $noTable++; ?>
          <?php endforeach; ?>

        </tbody>
      </table>

    </div>
  </div>
</div>