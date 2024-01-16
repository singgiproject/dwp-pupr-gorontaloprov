<div class="container news-detail">

  <!-- Breadcrumb -->
  <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?= $url; ?>">Beranda</a></li>
      <li class="breadcrumb-item active" aria-current="page">Dokumen</li>
    </ol>
  </nav>

  <!-- Content -->
  <div class="content-news">
    <div class="row">


      <div class="head-title-content mt-5 mb-3">
        <h4><span>DOKUMEN</span></h4>
      </div>
      <table class="table table table-striped table-hover mt-4" id="data_table">
        <thead>
          <tr>
            <th scope="col">No</th>
            <th scope="col">Dokumen</th>
            <th scope="col">Ditambahkan</th>
            <th scope="col">Aksi</th>
          </tr>
        </thead>
        <tfoot>
          <tr>
            <th scope="col">No</th>
            <th scope="col">Dokumen</th>
            <th scope="col">Ditambahkan</th>
            <th scope="col">Aksi</th>
          </tr>
        </tfoot>
        <tbody>
          <?php $noTable = 1; ?>
          <?php foreach ($documents as $row) : ?>
            <tr>
              <td><?= $noTable; ?></td>
              <td><?= $row["title"]; ?></td>
              <td>
                <?= day_id($row["date"]); ?>,
                <?= date_id($row["date"]); ?>
              </td>
              <td>
                <a href="<?= $url; ?>downloads/documents/<?= $row["file"]; ?>" class="badge rounded-pill text-bg-success"><i class="bi bi-download"></i> Download</a>
              </td>
            </tr>
            <?php $noTable++; ?>
          <?php endforeach; ?>

        </tbody>
      </table>

    </div>
  </div>
</div>