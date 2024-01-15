<!-- Vendor JS Files -->
<script src="<?= $url; ?>assets/js/jquery.min.js"></script>
<script src="<?= $url; ?>assets/vendor/purecounter/purecounter_vanilla.js"></script>
<script src="<?= $url; ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?= $url; ?>assets/vendor/glightbox/js/glightbox.min.js"></script>
<script src="<?= $url; ?>assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
<script src="<?= $url; ?>assets/vendor/swiper/swiper-bundle.min.js"></script>
<script src="<?= $url; ?>assets/vendor/php-email-form/validate.js"></script>

<!-- Datatables -->
<script src="http://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script>
  let table = new DataTable('#data_table');
</script>

<!-- AOS (Animations On Scrolling) -->
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

<!-- Template Main JS File -->
<script src="<?= $url; ?>assets/js/jquery.min.js"></script>
<script src="<?= $url; ?>assets/js/main.js"></script>
<script src="<?= $url; ?>assets/js/welcome-loading.js"></script>
<script src="<?= $url; ?>assets/js/swiper-bundle.min.js"></script>

<!-- Sweet Alert -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- Color Random Element -->
<script>
  $(document).ready(function() {
    var colors = ["text-primary", "text-success", "text-danger", "text-warning", "text-info"];

    var icons = $(".color-random");

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

<script>
  document.addEventListener("DOMContentLoaded", function() {
    var header = document.getElementById("header");

    window.addEventListener("scroll", function() {
      var scrollPosition = window.scrollY;

      if (scrollPosition > 50) {
        header.classList.add("header-scrolled"); /* Menambahkan kelas "header-scrolled" */
      } else {
        header.classList.remove("header-scrolled"); /* Menghapus kelas "header-scrolled" */
      }
    });
  });
</script>



<!-- Swiper -->
<script>
  var swiper = new Swiper(".slide-content", {
    slidesPerView: 3,
    spaceBetween: 0,
    loop: true,
    centerSlide: 'true',
    fade: 'true',
    grabCursor: 'true',
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
      dynamicBullets: true,
    },
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
    autoplay: {
      delay: 4000, // Waktu delay dalam milidetik (3 detik dalam hal ini)
      disableOnInteraction: false, // Biarkan autoplay berlanjut setelah interaksi pengguna
    },
    breakpoints: {
      0: {
        slidesPerView: 1,
      },
      520: {
        slidesPerView: 2,
      },
      950: {
        slidesPerView: 4,
      },
    },
  });
</script>


<script>
  window.addEventListener("DOMContentLoaded", () => {
    let intro = document.querySelector(".splash-screen-landing");
    let logoSpan = document.querySelectorAll(".logo");

    // Cek apakah session storage memiliki data "hasSeenSplashLanding"
    let hasSeenSplashLanding = sessionStorage.getItem("hasSeenSplashLanding");

    if (!hasSeenSplashLanding) {
      logoSpan.forEach((span, idx) => {
        span.classList.add("active");
      });

      setTimeout(() => {
        intro.style.display = "none"; // Sembunyikan splash screen secara langsung
        // Tandai bahwa pengguna telah melihat splash screen di sessionStorage
        sessionStorage.setItem("hasSeenSplashLanding", "true");
      }, 3000);
    } else {
      // Jika pengguna telah melihat splash screen sebelumnya, sembunyikan splash screen
      intro.style.display = "none";
    }
  });
</script>

<script>
  window.addEventListener("DOMContentLoaded", () => {
    let intro = document.querySelector(".splash-screen-login");
    let logoSpan = document.querySelectorAll(".logo");

    // Cek apakah session storage memiliki data "hasSeenSplashLogin"
    let hasSeenSplashLogin = sessionStorage.getItem("hasSeenSplashLogin");

    if (!hasSeenSplashLogin) {
      logoSpan.forEach((span, idx) => {
        span.classList.add("active");
      });

      setTimeout(() => {
        intro.style.display = "none"; // Sembunyikan splash screen secara langsung
        // Tandai bahwa pengguna telah melihat splash screen di sessionStorage
        sessionStorage.setItem("hasSeenSplashLogin", "true");
      }, 3000);
    } else {
      // Jika pengguna telah melihat splash screen sebelumnya, sembunyikan splash screen
      intro.style.display = "none";
    }
  });
</script>


<script>
  window.addEventListener("DOMContentLoaded", () => {
    let intro = document.querySelector(".splash-screen-attendances");
    let logoSpan = document.querySelectorAll(".logo");

    // Cek apakah session storage memiliki data "hasSeenSplashAttendances"
    let hasSeenSplashAttendances = sessionStorage.getItem("hasSeenSplashAttendances");

    if (!hasSeenSplashAttendances) {
      logoSpan.forEach((span, idx) => {
        span.classList.add("active");
      });

      setTimeout(() => {
        intro.style.display = "none"; // Sembunyikan splash screen secara langsung
        // Tandai bahwa pengguna telah melihat splash screen di sessionStorage
        sessionStorage.setItem("hasSeenSplashAttendances", "true");
      }, 8000);
    } else {
      // Jika pengguna telah melihat splash screen sebelumnya, sembunyikan splash screen
      intro.style.display = "none";
    }
  });
</script>



<!-- Voice to text -->
<div id="popup-voice" class="popup-voice">
  <h3><span id="animatedText">Ucapkan sekarang</span> <i class="bi bi-mic-fill"></i></h3>
</div>

<script>
  function startDictation() {
    var popup = document.getElementById('popup-voice');
    var animatedText = document.getElementById('animatedText');
    popup.style.display = 'block';

    if ('webkitSpeechRecognition' in window) {
      var recognition = new webkitSpeechRecognition();
      recognition.continuous = false;
      recognition.interimResults = false;
      recognition.lang = 'id-ID';
      recognition.start();

      recognition.onresult = function(event) {
        var result = event.results[0][0].transcript;
        document.querySelector('.search-input').value = result;
        recognition.stop();
        popup.style.display = 'none';
        document.querySelector('[name="search"]').click();
      };

      recognition.onstart = function() {
        // Animasi mengetik teks
        animateText('Ucapkan sekarang', animatedText);
      };

      recognition.onerror = function(event) {
        recognition.stop();
        popup.style.display = 'none';
      };
    }
  }

  // Fungsi untuk animasi mengetik teks
  function animateText(text, targetElement) {
    var index = 0;
    var intervalId = setInterval(function() {
      targetElement.innerText = text.substring(0, index);
      index++;
      if (index > text.length) {
        clearInterval(intervalId);
      }
    }, 100);
  }
</script>









<!-- LIST SUGGESTIONS SEARCH -->
<script>
  const inputField = document.querySelector('.search-input');
  const suggestionsContainer = document.getElementById('suggestions-container');
  let selectedSuggestionIndex = -1;

  function showSuggestions(query) {
    // Hanya tampilkan saran jika ada query
    if (query.trim() === '') {
      suggestionsContainer.style.display = 'none';
      return;
    }

    // Contoh saran pencarian
    const suggestions = [
      <?php foreach ($newsCategory as $row) : ?> "<?= $row["category"]; ?>",
      <?php endforeach; ?>

      <?php foreach ($newsTags as $row) : ?>
        <?php $tagsArray = explode(", ", $row["tags"]); ?>
        <?php foreach ($tagsArray as $tag) : ?>
          <?php $urlTag = str_replace("-", " ", strtolower($tag)); ?> "<?= $urlTag; ?>",
        <?php endforeach; ?>
      <?php endforeach; ?>
    ];

    // Ubah semua teks menjadi huruf kecil
    const lowerCaseQuery = query.toLowerCase();
    const lowerCaseSuggestions = suggestions.map(suggestion => suggestion.toLowerCase());

    // Filter saran pencarian berdasarkan query dan ambil data unik
    const uniqueFilteredSuggestions = [...new Set(lowerCaseSuggestions.filter(suggestion =>
      suggestion.includes(lowerCaseQuery)
    ))];

    // Tampilkan saran pencarian dalam #suggestions-container
    suggestionsContainer.innerHTML = '';

    uniqueFilteredSuggestions.forEach((suggestion, index) => {
      const suggestionItem = document.createElement('div');
      suggestionItem.classList.add('suggestion-item');
      if (index === selectedSuggestionIndex) {
        suggestionItem.classList.add('suggestion-item-bold');
      }

      // Tambahkan ikon pencarian di samping teks saran
      const searchIcon = document.createElement('i');
      searchIcon.classList.add('bi', 'bi-search');
      suggestionItem.appendChild(searchIcon);

      const suggestionText = document.createElement('span');
      suggestionText.innerHTML = suggestion.replace(new RegExp(lowerCaseQuery, 'ig'), match => `<b>${match}</b>`);
      suggestionItem.appendChild(suggestionText);

      // Event listener untuk mengisi kotak pencarian saat saran dipilih
      suggestionItem.addEventListener('click', () => {
        inputField.value = suggestion;
        suggestionsContainer.style.display = 'none';
        window.location.href = `<?= $url; ?>search/${suggestion.replace(/\s+/g, '-').toLowerCase()}`;
      });

      // Event listener untuk navigasi keyboard
      suggestionItem.addEventListener('mouseover', () => {
        selectedSuggestionIndex = index;
        highlightSuggestion();
      });

      suggestionsContainer.appendChild(suggestionItem);
    });

    if (uniqueFilteredSuggestions.length > 0) {
      suggestionsContainer.style.display = 'block';
    } else {
      suggestionsContainer.style.display = 'none';
    }
  }

  // Fungsi untuk menyorot saran yang dipilih
  function highlightSuggestion() {
    const suggestionItems = document.querySelectorAll('.suggestion-item');

    suggestionItems.forEach((item, index) => {
      if (index === selectedSuggestionIndex) {
        item.classList.add('suggestion-item-bold');
      } else {
        item.classList.remove('suggestion-item-bold');
      }
    });
  }

  // Event listener untuk memanggil showSuggestions saat pengguna mengetik
  inputField.addEventListener('input', function() {
    const query = this.value;
    showSuggestions(query);
  });

  // Event listener untuk navigasi keyboard (tombol panah atas dan bawah)
  inputField.addEventListener('keydown', function(e) {
    const suggestionItems = document.querySelectorAll('.suggestion-item');

    if (e.key === 'ArrowUp') {
      e.preventDefault(); // Untuk mencegah pergeseran fokus pada input
      if (selectedSuggestionIndex > 0) {
        selectedSuggestionIndex--;
        highlightSuggestion();
      }
    } else if (e.key === 'ArrowDown') {
      e.preventDefault(); // Untuk mencegah pergeseran fokus pada input
      if (selectedSuggestionIndex < suggestionItems.length - 1) {
        selectedSuggestionIndex++;
        highlightSuggestion();
      }
    } else if (e.key === 'Enter' && selectedSuggestionIndex !== -1) {
      e.preventDefault(); // Untuk mencegah form submit saat menekan Enter pada saran
      inputField.value = suggestionItems[selectedSuggestionIndex].textContent;
      suggestionsContainer.style.display = 'none';
      window.location.href = `<?= $url; ?>search/${inputField.value.replace(/\s+/g, '-').toLowerCase()}`;
    }
  });

  // Event listener untuk menutup saran saat klik di luar kotak pencarian
  document.addEventListener('click', function(e) {
    if (!e.target.matches('.search-input') && !e.target.matches('.suggestion-item')) {
      suggestionsContainer.style.display = 'none';
    }
  });
</script>