<?php if ($rowSession["level"] !== $levelSuperAdmin) : ?>
  <script>
    document.location.href = '<?= $url ?>admin/dashboard/home';
  </script>
<?php endif ?>

<!-- Level User -->
<?php if ($rowSession["level"] === $levelSuperAdmin) : ?>
  <main id="main" class="main">

    <!-- PAGE TITLE -->
    <div class="pagetitle">
      <h1><?= $pageTitle; ?></h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?= $url; ?>dashboard">Home</a></li>
          <li class="breadcrumb-item">Pengaturan Aplikasi</li>
          <li class="breadcrumb-item active"><?= $pageTitle; ?></li>
        </ol>
      </nav>
    </div>
    <!-- end PAGE TITLE -->

    <section class="section dashboard">
      <div class="row">

        <!-- TABLE DATA INFORMATION -->
        <div class="col-lg-12">
          <div class="row">

            <div class="col-12" id="code_access">

              <div class="card recent-sales overflow-auto">

                <div class="card-body">
                  <h5 class="card-title">Data <span>| <?= $pageTitle; ?></span></h5>

                  <table class="table table-borderless datatable">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Opsi</th>
                        <th scope="col">Deskripsi</th>
                        <th scope="col">Tgl</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $noTable = 1; ?>
                      <?php foreach ($information as $row) : ?>
                        <tr>
                          <th scope="row"><a href="#"><?= $noTable; ?></a></th>
                          <td>
                            <a href="#" data-bs-toggle="modal" data-bs-target="#modalEditInformation<?= $row["id"]; ?>" class="badge p-2 btn bg-purple-1 text-white mb-1" title="Ubah"><i class="bi bi-pencil-square fs-6"></i></a>
                          </td>
                          <td><?= $row["description"]; ?></td>
                          <td><?= date_id($row["date"]); ?></td>
                        </tr>
                        <?php $noTable++; ?>
                      <?php endforeach; ?>
                    </tbody>
                  </table>

                </div>

              </div>
            </div>


          </div>
        </div>
        <!-- end TABLE DATA INFORMATION -->


        <!-- === MODAL EDIT INFORMATION=== -->
        <?php foreach ($information as $row) : ?>
          <div class="modal modal-dark-mode fade" id="modalEditInformation<?= $row["id"]; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                  <h1 class="modal-title fs-5" id="exampleModalLabel">Ubah Data <?= $pageTitle; ?></h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <form action="" class="row g-3 needs-validation" method="post" enctype="multipart/form-data" novalidate>
                    <input type="text" hidden name="id" value="<?= base64_encode(base64_encode(base64_encode(base64_encode(base64_encode(base64_encode(base64_encode(base64_encode(base64_encode($row["id"]))))))))); ?>">

                    <div class="col-md-12">
                      <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" role="switch" id="status" name="status" value="<?php echo $row["status"]; ?>" onchange="toggleValue()" style="cursor: pointer;" <?php if ($row["status"] === "1") : ?> checked <?php endif; ?>>
                        <label class="form-check-label" for="status" style="cursor: pointer;">
                          <?php if (empty($row["status"])) : ?>
                            Status Informasi Non Aktif
                          <?php endif; ?>
                          <?php if ($row["status"] === "1") : ?>
                            Status Informasi Aktif
                          <?php endif; ?>
                        </label>
                      </div>
                    </div>

                    <script>
                      function toggleValue() {
                        var switchInput = document.getElementById("status");
                        var label = document.querySelector('label[for="status"]');

                        // Mengubah nilai dan teks berdasarkan status tombol switch
                        if (switchInput.checked) {
                          switchInput.value = "1";
                          label.textContent = "Status Informasi Aktif";
                        } else {
                          switchInput.value = "0";
                          label.textContent = "Status Informasi Non Aktif";
                        }
                      }
                    </script>


                    <div class="col-md-12">
                      <label for="edit_description_information" class="form-label">Dekskripsi</label>
                      <textarea type="text" class="form-control" name="description" id="edit_description_information" required placeholder="Deskripsi Informasi"><?= $row["description"]; ?></textarea>
                      <div class="invalid-feedback">
                        Harap Berikan Deskripsi
                      </div>
                    </div>

                    <div class="col-12">
                      <button class="btn bg-purple-1 text-white" type="submit" name="edit_information"><i class="bi bi-save"></i> Simpan</button>
                      <button class="btn btn-secondary" type="reset"><i class="bi bi-x-square"></i> Reset</button>
                    </div>
                  </form>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                </div>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
        <!-- === end MODAL EDIT INFORMATIONS=== -->

        <!-- === CONDITION DATA === -->
        <?php if (isset($_POST["edit_information"])) : ?>
          <?php if (editInformation($_POST) > 0) : ?>
            <script>
              alert('Data Berhasil Diubah');
              document.location.href = '';
            </script>
          <?php endif; ?>
        <?php endif; ?>
      </div>

      </div>
    </section>

  </main>

<?php endif; ?>
<!-- end Level User -->




<script src="https://cdn.ckeditor.com/ckeditor5/40.2.0/super-build/ckeditor.js"></script>
<script>
  document.addEventListener('DOMContentLoaded', () => {
    ClassicEditor.create(document.getElementById("edit_description_information"), {
      toolbar: ['exportPDF', 'exportWord', '|', 'imageUpload', '|', 'undo', 'redo', '|', 'bold', 'italic'],
      image: {
        toolbar: ['imageTextAlternative', '|', 'imageStyle:alignLeft', 'imageStyle:full', 'imageStyle:alignRight'],
        styles: ['full', 'alignLeft', 'alignRight']
      },
      language: 'en',
      extraPlugins: [SimpleUploadAdapter],
      imageUpload: {
        uploadUrl: 'fileupload.php',
        headers: {
          'Content-Type': 'multipart/form-data' // Tambahkan ini
        }
      }
    });
  });
</script>

<script>
  CKEDITOR.ClassicEditor.create(document.getElementById("edit_description_information"), {
    // https://ckeditor.com/docs/ckeditor5/latest/features/toolbar/toolbar.html#extended-toolbar-configuration-format
    toolbar: {
      items: [
        'exportPDF', 'exportWord', '|',
        'findAndReplace', 'selectAll', '|',
        'heading', '|',
        'bold', 'italic', 'strikethrough', 'underline', 'code', 'subscript', 'superscript', 'removeFormat', '|',
        'bulletedList', 'numberedList', 'todoList', '|',
        'outdent', 'indent', '|',
        'undo', 'redo',
        '-',
        'fontSize', 'fontFamily', 'fontColor', 'fontBackgroundColor', 'highlight', '|',
        'alignment', '|',
        'link', 'uploadImage', 'blockQuote', 'insertTable', 'mediaEmbed', 'codeBlock', 'htmlEmbed', '|',
        'specialCharacters', 'horizontalLine', 'pageBreak', '|',
        'textPartLanguage', '|',
        'sourceEditing'
      ],
      shouldNotGroupWhenFull: true
    },
    // Changing the language of the interface requires loading the language file using the <script> tag.
    // language: 'es',
    list: {
      properties: {
        styles: true,
        startIndex: true,
        reversed: true
      }
    },
    // https://ckeditor.com/docs/ckeditor5/latest/features/headings.html#configuration
    heading: {
      options: [{
          model: 'paragraph',
          title: 'Paragraph',
          class: 'ck-heading_paragraph'
        },
        {
          model: 'heading1',
          view: 'h1',
          title: 'Heading 1',
          class: 'ck-heading_heading1'
        },
        {
          model: 'heading2',
          view: 'h2',
          title: 'Heading 2',
          class: 'ck-heading_heading2'
        },
        {
          model: 'heading3',
          view: 'h3',
          title: 'Heading 3',
          class: 'ck-heading_heading3'
        },
        {
          model: 'heading4',
          view: 'h4',
          title: 'Heading 4',
          class: 'ck-heading_heading4'
        },
        {
          model: 'heading5',
          view: 'h5',
          title: 'Heading 5',
          class: 'ck-heading_heading5'
        },
        {
          model: 'heading6',
          view: 'h6',
          title: 'Heading 6',
          class: 'ck-heading_heading6'
        }
      ]
    },
    // https://ckeditor.com/docs/ckeditor5/latest/features/editor-placeholder.html#using-the-editor-configuration
    placeholder: 'Masukan deskripsi!',
    // https://ckeditor.com/docs/ckeditor5/latest/features/font.html#configuring-the-font-family-feature
    fontFamily: {
      options: [
        'default',
        'Arial, Helvetica, sans-serif',
        'Courier New, Courier, monospace',
        'Georgia, serif',
        'Lucida Sans Unicode, Lucida Grande, sans-serif',
        'Tahoma, Geneva, sans-serif',
        'Times New Roman, Times, serif',
        'Trebuchet MS, Helvetica, sans-serif',
        'Verdana, Geneva, sans-serif'
      ],
      supportAllValues: true
    },
    // https://ckeditor.com/docs/ckeditor5/latest/features/font.html#configuring-the-font-size-feature
    fontSize: {
      options: [10, 12, 14, 'default', 18, 20, 22],
      supportAllValues: true
    },
    // Be careful with the setting below. It instructs CKEditor to accept ALL HTML markup.
    // https://ckeditor.com/docs/ckeditor5/latest/features/general-html-support.html#enabling-all-html-features
    htmlSupport: {
      allow: [{
        name: /.*/,
        attributes: true,
        classes: true,
        styles: true
      }]
    },
    // Be careful with enabling previews
    // https://ckeditor.com/docs/ckeditor5/latest/features/html-embed.html#content-previews
    htmlEmbed: {
      showPreviews: true
    },
    // https://ckeditor.com/docs/ckeditor5/latest/features/link.html#custom-link-attributes-decorators
    link: {
      decorators: {
        addTargetToExternalLinks: true,
        defaultProtocol: 'https://',
        toggleDownloadable: {
          mode: 'manual',
          label: 'Downloadable',
          attributes: {
            download: 'file'
          }
        }
      }
    },
    // https://ckeditor.com/docs/ckeditor5/latest/features/mentions.html#configuration
    mention: {
      feeds: [{
        marker: '@',
        feed: [
          '@apple', '@bears', '@brownie', '@cake', '@cake', '@candy', '@canes', '@chocolate', '@cookie', '@cotton', '@cream',
          '@cupcake', '@danish', '@donut', '@dragée', '@fruitcake', '@gingerbread', '@gummi', '@ice', '@jelly-o',
          '@liquorice', '@macaroon', '@marzipan', '@oat', '@pie', '@plum', '@pudding', '@sesame', '@snaps', '@soufflé',
          '@sugar', '@sweet', '@topping', '@wafer'
        ],
        minimumCharacters: 1
      }]
    },
    // The "super-build" contains more premium features that require additional configuration, disable them below.
    // Do not turn them on unless you read the documentation and know how to configure them and setup the editor.
    removePlugins: [
      // These two are commercial, but you can try them out without registering to a trial.
      // 'ExportPdf',
      // 'ExportWord',
      'AIAssistant',
      'CKBox',
      'CKFinder',
      'EasyImage',
      // This sample uses the Base64UploadAdapter to handle image uploads as it requires no configuration.
      // https://ckeditor.com/docs/ckeditor5/latest/features/images/image-upload/base64-upload-adapter.html
      // Storing images as Base64 is usually a very bad idea.
      // Replace it on production website with other solutions:
      // https://ckeditor.com/docs/ckeditor5/latest/features/images/image-upload/image-upload.html
      // 'Base64UploadAdapter',
      'RealTimeCollaborativeComments',
      'RealTimeCollaborativeTrackChanges',
      'RealTimeCollaborativeRevisionHistory',
      'PresenceList',
      'Comments',
      'TrackChanges',
      'TrackChangesData',
      'RevisionHistory',
      'Pagination',
      'WProofreader',
      // Careful, with the Mathtype plugin CKEditor will not load when loading this sample
      // from a local file system (file://) - load this site via HTTP server if you enable MathType.
      'MathType',
      // The following features are part of the Productivity Pack and require additional license.
      'SlashCommand',
      'Template',
      'DocumentOutline',
      'FormatPainter',
      'TableOfContents',
      'PasteFromOfficeEnhanced'
    ]
  });
</script>