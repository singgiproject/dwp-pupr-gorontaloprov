  fetch(`https://kanglerian.github.io/api-wilayah-indonesia/api/provinces.json`)
    .then(response => response.json())
    .then(provinces => {
      var data = provinces;
      var tampung = '<option value="" required>Pilih Provinsi</option>';
      data.forEach(element => {
        tampung += `<option data-reg="${element.id}" value="${element.name}">${element.name}</option>`;
      });
      document.getElementById('provinsi').innerHTML = tampung;
    });

  const selectProvinsi = document.getElementById('provinsi');

  // Provinsi -> Kabupaten
  selectProvinsi.addEventListener('change', (e) => {
    var provinsi = e.target.options[e.target.selectedIndex].dataset.reg;
    fetch(`https://kanglerian.github.io/api-wilayah-indonesia/api/regencies/${provinsi}.json`)
      .then(response => response.json())
      .then(regencies => {
        var data = regencies;
        var tampung = '<option value="" required>Pilih Kabupaten/Kota</option>';
        data.forEach(element => {
          tampung += `<option data-dist="${element.id}" value="${element.name}">${element.name}</option>`;
        });
        document.getElementById('kota').innerHTML = tampung;
      });
  });

  const selectKota = document.getElementById('kota');
  // Kabupaten -> Kecamatan
  selectKota.addEventListener('change', (e) => {
    var kota = e.target.options[e.target.selectedIndex].dataset.dist;
    fetch(`https://kanglerian.github.io/api-wilayah-indonesia/api/districts/${kota}.json`)
      .then(response => response.json())
      .then(districts => {
        var data = districts;
        var tampung = '<option value="" required>Pilih Kecamatan</option>';
        data.forEach(element => {
          tampung += `<option data-vill="${element.id}" value="${element.name}">${element.name}</option>`;
        });
        document.getElementById('kecamatan').innerHTML = tampung;
      });
  });

  const selectKecamatan = document.getElementById('kecamatan');
  // Kecamatan -> Kelurahan/Desa
  selectKecamatan.addEventListener('change', (e) => {
    var kecamatan = e.target.options[e.target.selectedIndex].dataset.vill;
    fetch(`https://kanglerian.github.io/api-wilayah-indonesia/api/villages/${kecamatan}.json`)
      .then(response => response.json())
      .then(villages => {
        var data = villages;
        var tampung = '<option value="" required>Pilih Desa/Kelurahan</option>';
        data.forEach(element => {
          tampung += `<option  value="${element.name}">${element.name}</option>`;
        });
        document.getElementById('kelurahan').innerHTML = tampung;
      });
  });