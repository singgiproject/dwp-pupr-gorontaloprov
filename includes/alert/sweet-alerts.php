<!-- =============================================================== -->
<!-- BUTTON OTOMATIS CLICK -->
<button class="btn-onlick" id="clickBtn" hidden></button>

<!-- === SUCCESS CLICK BUTTON === -->
<script type="text/javascript">
  $(document).ready(function() {
    $('.btn-onlick').trigger('click');
  })
</script>
<!-- =============================================================== -->

<!-- === COPY TEXT === -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<?php foreach ($codeAccess as $row) : ?>
  <script>
    const copyBtn<?= $row["id"]; ?> = document.getElementById('copyBtn<?= $row["id"]; ?>')
    const copyText<?= $row["id"]; ?> = document.getElementById('copyText<?= $row["id"]; ?>')

    copyBtn<?= $row["id"]; ?>.onclick = () => {
      copyText<?= $row["id"]; ?>.select(); // Selects the text inside the input
      document.execCommand('copy'); // Simply copies the selected text to clipboard 
      Swal.fire({ //displays a pop up with sweetalert
        icon: 'success',
        title: 'Teks disalin',
        showConfirmButton: false,
        timer: 1000
      });
    }
  </script>
<?php endforeach; ?>