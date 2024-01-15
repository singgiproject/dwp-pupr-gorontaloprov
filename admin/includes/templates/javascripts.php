<!-- Vendor JS Files -->
<script src="<?= $url; ?>admin/assets/vendor/apexcharts/apexcharts.min.js"></script>
<script src="<?= $url; ?>admin/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?= $url; ?>admin/assets/vendor/chart.js/chart.min.js"></script>
<script src="<?= $url; ?>admin/assets/vendor/echarts/echarts.min.js"></script>
<script src="<?= $url; ?>admin/assets/vendor/quill/quill.min.js"></script>
<script src="<?= $url; ?>admin/assets/vendor/simple-datatables/simple-datatables.js"></script>
<script src="<?= $url; ?>admin/assets/vendor/tinymce/tinymce.min.js"></script>
<script src="<?= $url; ?>admin/assets/vendor/php-email-form/validate.js"></script>

<!-- Template Main JS File -->
<script src="<?= $url; ?>admin/assets/js/main.js"></script>

<!-- JQUERY -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


<!-- API ADDRESS -->
<script src="<?= $url; ?>includes/apis/address.js"></script>

<!-- PASSWORD CONFIRMATION -->
<script>
  const passwordInput = document.getElementById('password');
  const password2Input = document.getElementById('password2');
  const passwordMismatchMessage = document.getElementById('passwordMismatchMessage');

  function validatePasswordMatch() {
    if (passwordInput.value !== password2Input.value) {
      password2Input.setCustomValidity('Password tidak sesuai.');
      passwordMismatchMessage.style.display = 'block';
    } else {
      password2Input.setCustomValidity('');
      passwordMismatchMessage.style.display = 'none';
    }
  }

  passwordInput.addEventListener('input', validatePasswordMatch);
  password2Input.addEventListener('input', validatePasswordMatch);
</script>



<!-- Sweet Alert -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


<!-- Select Preview Image -->
<script>
  const fileInputImg = document.getElementById('fileInputImg');
  const previewImage = document.getElementById('previewImage');
  const previewDiv = document.querySelector('.preview');

  fileInputImg.addEventListener('change', function() {
    const file = fileInputImg.files[0];

    if (file) {
      const reader = new FileReader();

      reader.addEventListener('load', function() {
        previewImage.src = reader.result;
        previewDiv.style.opacity = '1';
        previewDiv.style.transform = 'translateY(0)';
      });

      reader.readAsDataURL(file);
    }
  });
</script>

<!-- Color Random Element -->
<script>
  $(document).ready(function() {
    var colors = ["text-primary", "text-success", "text-danger", "text-warning", "text-info"];

    var icons = $(".color-icon");

    icons.each(function(index) {
      $(this).addClass(colors[index % colors.length]);
    });
  });
</script>

<!-- Color Random Element Background -->
<script>
  $(document).ready(function() {
    var bgRandomClass = ["bg-primary", "bg-success", "bg-danger", "bg-warning", "bg-info"];

    var bgRandom = $(".bg-random");

    bgRandom.each(function(index) {
      $(this).addClass(bgRandomClass[index % bgRandomClass.length]);
    });
  });
</script>


<!-- Pemicu Modal secara Otomatis menggunakan JavaScript -->
<script>
  var modalTampilOtomatis = new bootstrap.Modal(document.getElementById('autoShowModalInformation'), {
    backdrop: 'static',
    keyboard: false
  });

  modalTampilOtomatis.show();

  modalTampilOtomatis._element.addEventListener('hidden.bs.modal', function() {
    modalTampilOtomatis._element.remove();
  });
</script>

<!-- Tool Tip -->
<script>
  var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
  var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
    return new bootstrap.Tooltip(tooltipTriggerEl)
  })
</script>







<!-- DARK MODE -->
<script>
  const darkModeToggle = document.getElementById('darkModeToggle');
  let isDarkModeEnabled = localStorage.getItem('darkModeEnabled') === 'true';

  // Setel status tombol switch berdasarkan status Dark Mode yang disimpan
  darkModeToggle.checked = isDarkModeEnabled;

  // Fungsi untuk mengubah status Dark Mode
  function setDarkMode(enabled) {
    isDarkModeEnabled = enabled;
    localStorage.setItem('darkModeEnabled', enabled);
    document.body.classList.toggle('dark-mode', enabled);

    // Ubah teks label berdasarkan status
    const label = document.querySelector('.form-check-label[for="darkModeToggle"]');
    label.textContent = enabled ? 'Tema Gelap' : 'Tema Terang';
  }

  // Tambahkan event listener untuk tombol switch
  darkModeToggle.addEventListener('change', () => {
    setDarkMode(darkModeToggle.checked);
  });

  // Panggil fungsi untuk mengatur Dark Mode saat halaman dimuat
  setDarkMode(isDarkModeEnabled);
</script>

<!-- Change Placeholder input from datatable -->
<script>
  document.addEventListener("DOMContentLoaded", function() {
    document.querySelector(".dataTable-input").placeholder = "Cari...";
  });
</script>