<?php
error_reporting(0);
ini_set('display_errors', 0);
// CONNTECTION DATABASE
$host = "localhost";
$username = "root";
$password = "";
$database = "dwp_pupr";

// $host = "localhost";
// $username = "aberkahc_dwp_pupr";
// $password = "bT1D6WOBFY@@";
// $database = "aberkahc_dwp_pupr";

$conn = new mysqli($host, $username, $password, $database);

// ========================================
// FUNCTION QUERY
// ========================================
function query($query)
{
  global $conn;

  $result = mysqli_query($conn, $query);
  $rows = [];
  while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
  }
  return $rows;
}

// ========================================
// FUNCTION QUERY USERS
// ========================================
function query_users($queryUsers)
{
  global $conn;

  $result = mysqli_query($conn, $queryUsers);
  $rowsUsers = [];
  while ($rowUsers = mysqli_fetch_assoc($result)) {
    $rowsUsers[] = $rowUsers;
  }
  return $rowsUsers;
}

// ========================================
// FUNCTION QUERY LOCATIONS
// ========================================
function query_locations($query)
{
  global $conn;

  $result = mysqli_query($conn, $query);
  $rows = [];
  while ($rowLocations = mysqli_fetch_assoc($result)) {
    $rows[] = $rowLocations;
  }
  return $rows;
}

// ========================================
// FUNCTION QUERY NEWS
// ========================================
function query_news($query)
{
  global $conn;

  $result = mysqli_query($conn, $query);
  $rows = [];
  while ($rowNews = mysqli_fetch_assoc($result)) {
    $rows[] = $rowNews;
  }
  return $rows;
}

// ========================================
// FUNCTION QUERY DEATAIL NEWS
// ========================================
function query_detail_news($query)
{
  global $conn;

  $result = mysqli_query($conn, $query);
  $rows = [];
  while ($rowDetailNews = mysqli_fetch_assoc($result)) {
    $rows[] = $rowDetailNews;
  }
  return $rows;
}

// ========================================
// FUNCTION REGISTER
// ========================================
function register($data)
{
  global $conn;

  // Create Random Password
  $characterPassword = "abcdefghijklmnopqrstuvwxyz1234567890";
  $shufflePassword  = substr(str_shuffle($characterPassword), 0, 8);
  $randomPassword = $shufflePassword;

  $img = "user-default.png";
  $fullName = mysqli_real_escape_string($conn, htmlspecialchars($data["full_name"]));
  $noHp = mysqli_real_escape_string($conn, htmlspecialchars($data["no_hp"]));
  $username = mysqli_real_escape_string($conn, htmlspecialchars($data["username"]));
  $password = "dwppupr_" . $randomPassword;
  $password2 = "dwppupr_" . $randomPassword;
  $sk = mysqli_real_escape_string($conn, $data["sk"]);
  $levelUser = mysqli_real_escape_string($conn, htmlspecialchars($data["level"]));

  $statusAccount = "0";

  // --- Check Double Data ---
  $resultNoHp = mysqli_query($conn, "SELECT no_hp FROM tb_users WHERE no_hp = '$noHp' ");
  if (mysqli_fetch_assoc($resultNoHp)) {
    echo "
    <script>
      alert('Nomor HP sudah terdaftar. Silahkan gunakan No HP yang lain');
      document.location.href = 'register';
    </script>
    ";
    return false;
  }

  $resultUsername = mysqli_query($conn, "SELECT username FROM tb_users WHERE username = '$username' ");
  if (mysqli_fetch_assoc($resultUsername)) {
    echo "
    <script>
      alert('Alamat email ini sudah terdaftar. Silahkan gunakan alamat email yang lain');
      document.location.href = 'register';
    </script>
    ";
    return false;
  }

  // --- Check Validation Input ---
  if ($img !== $img) {
    echo "
    <script>
      alert('Periksa kembali data yang dimasukkan!');
      document.location.href = 'register';
    </script>
    ";
    return false;
  }

  // --- Check Validation Input ---
  if (
    empty($fullName) or
    empty($noHp) or
    empty($username)
  ) {
    echo "
    <script>
      alert('Periksa kembali data yang dimasukkan!');
      document.location.href = 'register';
    </script>
    ";
    return false;
  }
  if (
    strlen($fullName) < 1 or
    strlen($fullName) > 100 or
    strlen($noHp) < 8 or
    strlen($noHp) > 15 or
    strlen($username) > 100 or
    strlen($username) < 5
  ) {
    echo "
    <script>
      alert('Periksa kembali data yang dimasukkan!');
      document.location.href = 'register';
    </script>
    ";
    return false;
  }

  // --- Check Validation Check ---
  if ($sk !== "1") {
    echo "
    <script>
      alert('Centang untuk menyetujui Syarat & Ketentuan.!');
      document.location.href = 'register';
    </script>
    ";
    return false;
  }

  // Encription Password
  $password = password_hash($password, PASSWORD_DEFAULT);

  // query
  $query = "INSERT INTO tb_users VALUES(null, '$img', '$fullName', '$noHp', '$username',  '$password', '$password2', '$sk', '$levelUser', '$statusAccount')";
  mysqli_query($conn, $query);
  return mysqli_affected_rows($conn);
}

// ========================================
// FUNCTION REGISTER LEVEL ADMIN
// ========================================
function register_level_admin($data)
{
  global $conn;

  // Create Random Password
  $characterPassword = "abcdefghijklmnopqrstuvwxyz1234567890";
  $shufflePassword  = substr(str_shuffle($characterPassword), 0, 8);
  $randomPassword = $shufflePassword;

  $img = "user-default.png";
  $fullName = mysqli_real_escape_string($conn, htmlspecialchars($data["full_name"]));
  $noHp = mysqli_real_escape_string($conn, htmlspecialchars($data["no_hp"]));
  $username = mysqli_real_escape_string($conn, htmlspecialchars($data["username"]));
  $password = "dwppupr_" . $randomPassword;
  $password2 = "dwppupr_" . $randomPassword;
  $sk = mysqli_real_escape_string($conn, $data["sk"]);
  $levelUser = "user";

  $statusAccount = "0";

  // --- Check Double Data ---
  $resultNoHp = mysqli_query($conn, "SELECT no_hp FROM tb_users WHERE no_hp = '$noHp' ");
  if (mysqli_fetch_assoc($resultNoHp)) {
    echo "
    <script>
      alert('Nomor HP sudah terdaftar. Silahkan gunakan No HP yang lain');
      document.location.href = 'register';
    </script>
    ";
    return false;
  }

  $resultUsername = mysqli_query($conn, "SELECT username FROM tb_users WHERE username = '$username' ");
  if (mysqli_fetch_assoc($resultUsername)) {
    echo "
    <script>
      alert('Alamat email ini sudah terdaftar. Silahkan gunakan alamat email yang lain');
      document.location.href = 'register';
    </script>
    ";
    return false;
  }

  // --- Check Validation Input ---
  if ($img !== $img) {
    echo "
    <script>
      alert('Periksa kembali data yang dimasukkan!');
      document.location.href = 'register';
    </script>
    ";
    return false;
  }

  // --- Check Validation Input ---
  if (
    empty($fullName) or
    empty($noHp) or
    empty($username)
  ) {
    echo "
    <script>
      alert('Periksa kembali data yang dimasukkan!');
      document.location.href = 'register';
    </script>
    ";
    return false;
  }
  if (
    strlen($fullName) < 1 or
    strlen($fullName) > 100 or
    strlen($noHp) < 8 or
    strlen($noHp) > 15 or
    strlen($username) > 100 or
    strlen($username) < 5
  ) {
    echo "
    <script>
      alert('Periksa kembali data yang dimasukkan!');
      document.location.href = 'register';
    </script>
    ";
    return false;
  }

  // --- Check Validation Check ---
  if ($sk !== "1") {
    echo "
    <script>
      alert('Centang untuk menyetujui Syarat & Ketentuan.!');
      document.location.href = 'register';
    </script>
    ";
    return false;
  }

  // Encription Password
  $password = password_hash($password, PASSWORD_DEFAULT);

  // query
  $query = "INSERT INTO tb_users VALUES(null, '$img', '$fullName', '$noHp', '$username',  '$password', '$password2', '$sk', '$levelUser', '$statusAccount')";
  mysqli_query($conn, $query);
  return mysqli_affected_rows($conn);
}


// ========================================
// FUNCTION UPDATE USERS
// ========================================
function unverifiedAccountUser($data)
{
  global $conn;

  $id = htmlspecialchars(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode($data["id"]))))))))));
  $statusAccount = htmlspecialchars($data["status_account"]);

  // QUERY
  $query = "UPDATE tb_users SET
    status_account = '$statusAccount'
    WHERE id = '$id'";
  mysqli_query($conn, $query);
  return mysqli_affected_rows($conn);
}

// === FUNCTION DELETE ACCOUNT USER  ===
function deleteAccountUser($idAccountUser)
{
  global $conn;

  mysqli_query($conn, "DELETE FROM tb_users WHERE id = '$idAccountUser' ");
  return mysqli_affected_rows($conn);
}



// ========================================
// FUNCTION MESSAGE
// ========================================
function sendMessage($data)
{
  global $conn;

  $name = htmlspecialchars($data["name"]);
  $email = htmlspecialchars($data["email"]);
  $subject = htmlspecialchars($data["subject"]);
  $message = htmlspecialchars($data["message"]);
  $ipUser = htmlspecialchars(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode($data["ip_user"]))))))))));
  $date = htmlspecialchars(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode($data["date"]))))))))));
  $readOneMessage = htmlspecialchars($data["read_one_message"]);
  $readAllMessage = htmlspecialchars($data["read_all_message"]);

  // CHECK DOUBLE MESSAGE (FROM IP ADDRESS)
  $result = mysqli_query($conn, "SELECT email and ip_user FROM tb_messages WHERE ip_user = '$ipUser' ");
  if (mysqli_fetch_assoc($result)) {
    echo "
    <script>
      alert('Anda sudah mengirim pesan sebelumnya!');
      document.location.href = '';
    </script>
    ";
    return false;
  }

  // INPUT VALIDATION BASE ENCODE
  if (base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode($ipUser)))))))))) {
    echo "
    <script>
      alert('Inputan Ditolak!');
      document.location.href = '';
    </script>
    ";
    return false;
  }

  if (base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode($date)))))))))) {
    echo "
    <script>
      alert('Inputan Ditolak!');
      document.location.href = '';
    </script>
    ";
    return false;
  }

  // INPUT VALIDATION
  if (
    empty($name) and
    empty($email) and
    empty($subject) and
    empty($message) and
    empty($ipUser) and
    empty($date) and
    empty($readOneMessage) and
    empty($readAllMessage)
  ) {
    echo "
    <script>
      alert('Inputan Ditolak!');
      document.location.href = '';
    </script>
    ";
    return false;
  }

  if (
    strlen($name) > 50 and
    strlen($email) > 15 and
    strlen($subject) > 100 and
    strlen($message) > 255 and
    strlen($ipUser) > 100 and
    strlen($date) > 50 and
    strlen($readOneMessage) > 1 and
    strlen($readAllMessage) > 1
  ) {
    echo "
    <script>
      alert('Inputan Ditolak!');
      document.location.href = '';
    </script>
    ";
    return false;
  }

  // QUERY
  $query = "INSERT INTO tb_messages VALUES(null, '$name', '$email', '$subject', '$message', '$ipUser', '$date', '$readOneMessage', '$readAllMessage') ";
  mysqli_query($conn, $query);
  return mysqli_affected_rows($conn);
}

// === FUNCTION DELETE MESSAGE ===
function deleteMessage($idMessage)
{
  global $conn;

  mysqli_query($conn, "DELETE FROM tb_messages WHERE id = '$idMessage' ");
  return mysqli_affected_rows($conn);
}

// === FUNCTION UPDATE NOTIFICATIONS [status] ===
function updateNotificationStatus($data)
{
  global $conn;

  $id = mysqli_real_escape_string($conn, htmlspecialchars(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode($data["read_notification"])))))))))));
  $status = "1";

  $query = "UPDATE tb_notifications SET
  status = '$status'
  WHERE id = '$id' ";
  mysqli_query($conn, $query);
  return mysqli_affected_rows($conn);
}



// ========================================
// FUNCTION NEWS
// ========================================
// === FUNCTION ADD NEWS CATEGORY===
function add_news_category($data)
{
  global $conn;

  $category = mysqli_real_escape_string($conn, htmlspecialchars($data["category"]));

  $query = "INSERT INTO tb_news_category VALUES(null, '$category')";
  mysqli_query($conn, $query);

  return mysqli_affected_rows($conn);
}

// === FUNCTION ADD NEWS ===
function add_news($data)
{
  global $conn, $rowSession;
  date_default_timezone_set('Asia/Makassar');

  $title = htmlspecialchars($data["title"]);
  $thumbnail = uploadThumbnailNews();
  if (!$thumbnail) {
    return false;
  }
  $thumbnailCaption = mysqli_real_escape_string($conn, htmlspecialchars($data["thumbnail_caption"]));
  $description = mysqli_real_escape_string($conn, $data["description"]);
  $category = mysqli_real_escape_string($conn, htmlspecialchars($data["category"]));
  $tags = mysqli_real_escape_string($conn, htmlspecialchars($data["tags"]));
  $posted = $rowSession["id"];
  $shared = "0";
  $date = date("Y-m-d");
  $time = date("H-i-s");

  $query = "INSERT INTO tb_news VALUES(null, '$title', '$thumbnail', '$thumbnailCaption', '$description', '$category', '$tags', '$posted','$shared', '$date','$time')";
  mysqli_query($conn, $query);

  return mysqli_affected_rows($conn);
}

// === FUNCTION UPDATE/EDIT NEWS ===
function edit_news($data)
{
  global $conn, $rowSession;
  date_default_timezone_set('Asia/Makassar');

  $id = htmlspecialchars(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode($data["id"]))))))))));
  $oldThumbnail = htmlspecialchars($data["old_thumbnail"]);
  $title = htmlspecialchars($data["title"]);

  if ($_FILES['thumbnail']['error'] === 4) {
    $thumbnail = $oldThumbnail;
  } else {
    $thumbnail = uploadThumbnailNews();
  }

  $thumbnailCaption = mysqli_real_escape_string($conn, htmlspecialchars($data["thumbnail_caption"]));
  $description = mysqli_real_escape_string($conn, $data["description"]);
  $category = mysqli_real_escape_string($conn, htmlspecialchars($data["category"]));
  $tags = mysqli_real_escape_string($conn, htmlspecialchars($data["tags"]));
  $posted = $rowSession["id"];

  $query = "UPDATE tb_news SET 
  title = '$title', 
  thumbnail = '$thumbnail', 
  thumbnail_caption = '$thumbnailCaption', 
  description = '$description', 
  category = '$category', 
  tags = '$tags', 
  posted = '$posted' 
  WHERE id = '$id'";
  mysqli_query($conn, $query);
  return mysqli_affected_rows($conn);
}

// === FUNCTION DELETE NEWS CATEGORY ===
function delete_news_category($idNewsCategory)
{
  global $conn;

  mysqli_query($conn, "DELETE FROM tb_news_category WHERE id = '$idNewsCategory' ");
  return mysqli_affected_rows($conn);
}

// === FUNCTION DELETE NEWS ===
function delete_news($idNews)
{
  global $conn;

  mysqli_query($conn, "DELETE FROM tb_news WHERE id = '$idNews' ");
  return mysqli_affected_rows($conn);
}

// ====== FUNCTION SEARCH NEWS ======
function search_news($keyword)
{
  $query = "SELECT * FROM tb_news WHERE
  title LIKE '%$keyword%' OR
  thumbnail_caption LIKE '%$keyword%' OR
  description LIKE '%$keyword%' OR
  category LIKE '%$keyword%' OR
  tags LIKE '%$keyword%' OR
  date LIKE '%$keyword%' OR
  time LIKE '%$keyword%'
  ";
  return query($query);
}

// ====== FUNCTION SEARCH ======
function search($keyword)
{
  $query = "SELECT * FROM tb_news WHERE
  title LIKE '%$keyword%' OR
  thumbnail_caption LIKE '%$keyword%' OR
  description LIKE '%$keyword%' OR
  category LIKE '%$keyword%' OR
  tags LIKE '%$keyword%'";
  return query($query);
}

// === FUNCTION UPLOAD FILE GALLERY ===
function uploadThumbnailNews()
{
  $fileName = $_FILES['thumbnail']['name'];
  $fileSize = $_FILES['thumbnail']['size'];
  $error = $_FILES['thumbnail']['error'];
  $tmpName = $_FILES['thumbnail']['tmp_name'];

  // cek apakah ada gambar yang diupload atau tidak
  if ($error === 4) {
    echo "
		<script>
			alert('Pilih gambar terlebih dahulu');
      document.location.href = '';
		</script>";
    return false;
  }

  // cek apakah yang diupload adalah gambar
  $fileValidExtension = ['jpg', 'jpeg', 'png', 'svg'];
  $fileExtension = explode('.', $fileName);
  $fileExtension = strtolower(end($fileExtension));
  if (!in_array($fileExtension, $fileValidExtension)) {
    echo "
		<script>
			alert('Yang anda upload bukan gambar');
      document.location.href = '';
		</script>";
    return false;
  }

  // cek ukuran file gambar yang diupload
  if ($fileSize > 2000000) {
    echo "
		<script>
			alert('Ukuran gambar terlalu besar');
      document.location.href = '';
		</script>";
    return false;
  }

  // lolos pengecekan, gambar siap di upload
  // generate nama gambar baru
  $newFileName = uniqid($fileName . '_');
  $newFileName .= '.';
  $newFileName .= $fileExtension;

  move_uploaded_file($tmpName, '../../../assets/img/news/' . $newFileName);
  return $newFileName;
}


// ========================================
// FUNCTION WORK PROGRAM
// ========================================
// === FUNCTION ADD WORK PROGRAM ===
function add_work_program($data)
{
  global $conn;

  $kegiatan = mysqli_real_escape_string($conn, htmlspecialchars($data["kegiatan"]));
  $tujuan = mysqli_real_escape_string($conn, htmlspecialchars($data["tujuan"]));
  $waktu = mysqli_real_escape_string($conn, htmlspecialchars($data["waktu"]));
  $penanggungJawab = mysqli_real_escape_string($conn, htmlspecialchars($data["penanggung_jawab"]));
  $anggaran = mysqli_real_escape_string($conn, htmlspecialchars($data["anggaran"]));
  $keterangan = mysqli_real_escape_string($conn, htmlspecialchars($data["ket"]));
  $date = date("Y-m-d");
  $time = date("H-i-s");

  $query = "INSERT INTO tb_work_program VALUES(null, '$kegiatan', '$tujuan','$waktu','$penanggungJawab','$anggaran','$keterangan','$date', '$time')";
  mysqli_query($conn, $query);

  return mysqli_affected_rows($conn);
}

// === FUNCTION UPDATE/EDIT WORK PROGRAM ===
function edit_work_program($data)
{
  global $conn;

  $id = htmlspecialchars(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode($data["id"]))))))))));
  $kegiatan = mysqli_real_escape_string($conn, htmlspecialchars($data["kegiatan"]));
  $tujuan = mysqli_real_escape_string($conn, htmlspecialchars($data["tujuan"]));
  $waktu = mysqli_real_escape_string($conn, htmlspecialchars($data["waktu"]));
  $penanggungJawab = mysqli_real_escape_string($conn, htmlspecialchars($data["penanggung_jawab"]));
  $anggaran = mysqli_real_escape_string($conn, htmlspecialchars($data["anggaran"]));
  $keterangan = mysqli_real_escape_string($conn, htmlspecialchars($data["ket"]));

  $query = "UPDATE tb_work_program SET 
  kegiatan = '$kegiatan', 
  tujuan = '$tujuan', 
  waktu = '$waktu', 
  penanggung_jawab = '$penanggungJawab', 
  anggaran = '$anggaran', 
  ket = '$keterangan'
  WHERE id = '$id'";

  mysqli_query($conn, $query);
  return mysqli_affected_rows($conn);
}

// === FUNCTION DELETE WORK PROGRAM ===
function delete_work_program($idWorkProgram)
{
  global $conn;

  mysqli_query($conn, "DELETE FROM tb_work_program WHERE id = '$idWorkProgram' ");
  return mysqli_affected_rows($conn);
}
// ====== FUNCTION SEARCH WORK PROGRAM ======
function search_work_program($keyword)
{
  $query = "SELECT * FROM tb_work_program WHERE
  kegiatan LIKE '%$keyword%' OR
  tujuan LIKE '%$keyword%' OR
  waktu LIKE '%$keyword%' OR
  penanggung_jawab LIKE '%$keyword%' OR
  anggaran LIKE '%$keyword%' OR
  ket LIKE '%$keyword%' OR
  date LIKE '%$keyword%' OR
  time LIKE '%$keyword%'
  ";
  return query($query);
}


// ========================================
// FUNCTION CATEGORY GALLERY
// ========================================
// === FUNCTION ADD CATEGORY GALLERY ===
function addCategoryGallery($data)
{
  global $conn;

  $category = htmlspecialchars($data["category"]);
  $dateInsert = htmlspecialchars($data["date_insert"]);
  $dateUpdate = htmlspecialchars($data["date_update"]);
  $type = htmlspecialchars($data["type"]);

  $query = "INSERT INTO tb_category VALUES(null, '$category', '$dateInsert', '$dateUpdate', '$type')";
  mysqli_query($conn, $query);

  return mysqli_affected_rows($conn);
}

// === FUNCTION DELETE CATEGORY GALLERY  ===
function deleteCategoryGallery($idCategory)
{
  global $conn;

  mysqli_query($conn, "DELETE FROM tb_category WHERE id = '$idCategory' ");
  return mysqli_affected_rows($conn);
}

// ========================================
// FUNCTION GALLERY
// ========================================
// === FUNCTION ADD GALLERY ===
function addGallery($data)
{
  global $conn;

  $title = htmlspecialchars($data["title"]);

  $image = uploadImgGallery();
  if (!$image) {
    return false;
  }

  $description = htmlspecialchars($data["description"]);
  $category = htmlspecialchars($data["category"]);
  $dateInsert = htmlspecialchars($data["date_insert"]);
  $dateUpdate = htmlspecialchars($data["date_update"]);
  $type = htmlspecialchars($data["type"]);

  $query = "INSERT INTO tb_gallery VALUES(null, '$title', '$image', '$description', '$category', '$dateInsert', '$dateUpdate', '$type')";
  mysqli_query($conn, $query);

  return mysqli_affected_rows($conn);
}

// === FUNCTION UPDATE/EDIT GALLERY ===
function editGallery($data)
{
  global $conn;

  $id = htmlspecialchars(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode($data["id"]))))))))));
  $oldFile = htmlspecialchars($data["old_file"]);
  $title = htmlspecialchars($data["title"]);

  if ($_FILES['image']['error'] === 4) {
    $image = $oldFile;
  } else {
    $image = uploadImgGallery();
  }

  $description = htmlspecialchars($data["description"]);
  $category = htmlspecialchars($data["category"]);

  $dateInsert = htmlspecialchars($data["date_insert"]);
  $dateUpdate = htmlspecialchars($data["date_update"]);
  $type = htmlspecialchars($data["type"]);

  $query = "UPDATE tb_gallery SET
  title = '$title', 
  image = '$image', 
  description = '$description', 
  category = '$category', 
  date_insert = '$dateInsert', 
  date_update = '$dateUpdate', 
  type = '$type'
  WHERE id = '$id'
  ";
  mysqli_query($conn, $query);

  return mysqli_affected_rows($conn);
}

// === FUNCTION UPLOAD FILE GALLERY ===
function uploadImgGallery()
{
  $fileName = $_FILES['image']['name'];
  $fileSize = $_FILES['image']['size'];
  $error = $_FILES['image']['error'];
  $tmpName = $_FILES['image']['tmp_name'];

  // cek apakah ada gambar yang diupload atau tidak
  if ($error === 4) {
    echo "
		<script>
			alert('Pilih gambar terlebih dahulu');
      document.location.href = '';
		</script>";
    return false;
  }

  // cek apakah yang diupload adalah gambar
  $fileValidExtension = ['jpg', 'jpeg', 'png'];
  $fileExtension = explode('.', $fileName);
  $fileExtension = strtolower(end($fileExtension));
  if (!in_array($fileExtension, $fileValidExtension)) {
    echo "
		<script>
			alert('Yang anda upload bukan gambar');
      document.location.href = '';
		</script>";
    return false;
  }

  // cek ukuran file gambar yang diupload
  if ($fileSize > 2000000) {
    echo "
		<script>
			alert('Ukuran gambar terlalu besar');
      document.location.href = '';
		</script>";
    return false;
  }

  // lolos pengecekan, gambar siap di upload
  // generate nama gambar baru
  $newFileName = uniqid($fileName . '_');
  $newFileName .= '.';
  $newFileName .= $fileExtension;

  move_uploaded_file($tmpName, '../../../assets/img/gallery/' . $newFileName);
  return $newFileName;
}

// === FUNCTION DELETE GALLERY ===
function deleteGallery($idGallery)
{
  global $conn;

  mysqli_query($conn, "DELETE FROM tb_gallery WHERE id = '$idGallery' ");
  return mysqli_affected_rows($conn);
}


// ========================================
// FUNCTION PROFILE ACCOUNT
// ========================================
// === FUNCTION UPDATE/EDIT PROFILE ACCOUNT ===
function editProfile($data)
{
  global $conn;

  $id = htmlspecialchars(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode($data["id"]))))))))));
  $oldFile = htmlspecialchars($data["old_file"]);

  if ($_FILES['gambar']['error'] === 4) {
    $gambar = $oldFile;
  } else {
    $gambar = uploadImgUser();
  }

  $fullName = htmlspecialchars($data["full_name"]);
  $username = stripslashes(strtolower($data["username"]));

  $query = "UPDATE tb_users SET
  gambar = '$gambar', 
  full_name = '$fullName', 
  username = '$username'
  WHERE id = '$id'
  ";
  mysqli_query($conn, $query);

  return mysqli_affected_rows($conn);
}

// === FUNCTION UPLOAD FILE USER ===
function uploadImgUser()
{
  $fileName = $_FILES['gambar']['name'];
  $fileSize = $_FILES['gambar']['size'];
  $error = $_FILES['gambar']['error'];
  $tmpName = $_FILES['gambar']['tmp_name'];

  // cek apakah ada gambar yang diupload atau tidak
  if ($error === 4) {
    echo "
		<script>
			alert('Pilih gambar terlebih dahulu');
      document.location.href = '';
		</script>";
    return false;
  }

  // cek apakah yang diupload adalah gambar
  $fileValidExtension = ['jpg', 'jpeg', 'png'];
  $fileExtension = explode('.', $fileName);
  $fileExtension = strtolower(end($fileExtension));
  if (!in_array($fileExtension, $fileValidExtension)) {
    echo "
		<script>
			alert('Yang anda upload bukan gambar');
      document.location.href = '';
		</script>";
    return false;
  }

  // cek ukuran file gambar yang diupload
  if ($fileSize > 1000000) {
    echo "
		<script>
			alert('Ukuran gambar terlalu besar');
      document.location.href = '';
		</script>";
    return false;
  }

  // lolos pengecekan, gambar siap di upload
  // generate nama gambar baru
  $newFileName = uniqid($fileName . '_');
  $newFileName .= '.';
  $newFileName .= $fileExtension;

  move_uploaded_file($tmpName, '../../../assets/img/users/' . $newFileName);
  return $newFileName;
}


// ========================================
// FUNCTION PASSWORD
// ========================================
// === FUNCTION UPDATE/EDIT PASSWORD ===
function editPassword($data)
{
  global $conn;

  $id = htmlspecialchars(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode($data["id"]))))))))));
  $password = mysqli_real_escape_string($conn, $data["password"]);
  $password2 = mysqli_real_escape_string($conn, $data["password2"]);

  // check confirmation password
  if ($password !== $password2) {
    echo "
		<script>
			alert('Konfirmasi kata sandi tidak sesuai!');
      document.location.href = '';
		</script>";
    return false;
  }

  // encryption password
  $password = password_hash($password, PASSWORD_DEFAULT);

  $query = "UPDATE tb_users SET
  password = '$password', 
  password2 = '$password2'
  WHERE id = '$id'
  ";
  mysqli_query($conn, $query);

  return mysqli_affected_rows($conn);
}


// ========================================
// FUNCTION TEAM
// ========================================
// === FUNCTION ADD TEAM ===
function addTeam($data)
{
  global $conn;


  $image = uploadImgTeam();
  if (!$image) {
    return false;
  }

  $name = htmlspecialchars($data["name"]);
  $position = htmlspecialchars($data["position"]);
  $description = htmlspecialchars($data["description"]);
  $facebook = htmlspecialchars($data["facebook"]);
  $instagram = htmlspecialchars($data["instagram"]);

  $dateInsert = htmlspecialchars($data["date_insert"]);
  $dateUpdate = htmlspecialchars($data["date_update"]);
  $type = htmlspecialchars($data["type"]);

  $query = "INSERT INTO tb_team VALUES(null, '$image', '$name', '$position', '$description', '$facebook', '$instagram', '$dateInsert', '$dateUpdate', '$type')";
  mysqli_query($conn, $query);

  return mysqli_affected_rows($conn);
}

// === FUNCTION UPDATE/EDIT TEAM ===
function editTeam($data)
{
  global $conn;

  $id = htmlspecialchars(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode($data["id"]))))))))));
  $oldFile = htmlspecialchars($data["old_file"]);

  if ($_FILES['image']['error'] === 4) {
    $image = $oldFile;
  } else {
    $image = uploadImgTeam();
  }

  $name = htmlspecialchars($data["name"]);
  $position = htmlspecialchars($data["position"]);
  $description = htmlspecialchars($data["description"]);
  $facebook = htmlspecialchars($data["facebook"]);
  $instagram = htmlspecialchars($data["instagram"]);

  $dateInsert = htmlspecialchars($data["date_insert"]);
  $dateUpdate = htmlspecialchars($data["date_update"]);
  $type = htmlspecialchars($data["type"]);

  $query = "UPDATE tb_team SET
  image = '$image', 
  name = '$name', 
  position = '$position', 
  description = '$description', 
  facebook = '$facebook', 
  instagram = '$instagram', 
  date_insert = '$dateInsert', 
  date_update = '$dateUpdate', 
  type = '$type'
  WHERE id = '$id'
  ";
  mysqli_query($conn, $query);

  return mysqli_affected_rows($conn);
}

// === FUNCTION UPLOAD FILE TEAM ===
function uploadImgTeam()
{
  $fileName = $_FILES['image']['name'];
  $fileSize = $_FILES['image']['size'];
  $error = $_FILES['image']['error'];
  $tmpName = $_FILES['image']['tmp_name'];

  // cek apakah ada gambar yang diupload atau tidak
  if ($error === 4) {
    echo "
		<script>
			alert('Pilih gambar terlebih dahulu');
      document.location.href = '';
		</script>";
    return false;
  }

  // cek apakah yang diupload adalah gambar
  $fileValidExtension = ['jpg', 'jpeg', 'png'];
  $fileExtension = explode('.', $fileName);
  $fileExtension = strtolower(end($fileExtension));
  if (!in_array($fileExtension, $fileValidExtension)) {
    echo "
		<script>
			alert('Yang anda upload bukan gambar');
      document.location.href = '';
		</script>";
    return false;
  }

  // cek ukuran file gambar yang diupload
  if ($fileSize > 2000000) {
    echo "
		<script>
			alert('Ukuran gambar terlalu besar');
      document.location.href = '';
		</script>";
    return false;
  }

  // lolos pengecekan, gambar siap di upload
  // generate nama gambar baru
  $newFileName = uniqid($fileName . '_');
  $newFileName .= '.';
  $newFileName .= $fileExtension;

  move_uploaded_file($tmpName, '../../../assets/img/team/' . $newFileName);
  return $newFileName;
}

// === FUNCTION DELETE TEAM ===
function deleteTeam($idTeam)
{
  global $conn;

  mysqli_query($conn, "DELETE FROM tb_team WHERE id = '$idTeam' ");
  return mysqli_affected_rows($conn);
}

// ========================================
// FUNCTION CONTACT
// ========================================
// === FUNCTION UPDATE/EDIT CONTACT ===
function editContact($data)
{
  global $conn;

  $id = htmlspecialchars(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode($data["id"]))))))))));

  $noTelp = htmlspecialchars($data["no_telp"]);
  $email = htmlspecialchars($data["email"]);
  $facebook = htmlspecialchars($data["facebook"]);
  $instagram = htmlspecialchars($data["instagram"]);
  $alamat = $data["alamat"];
  $serviceHours = $data["service_hours"];

  $query = "UPDATE tb_contact SET
  no_telp = '$noTelp', 
  email = '$email', 
  facebook = '$facebook', 
  instagram = '$instagram', 
  alamat = '$alamat', 
  service_hours = '$serviceHours'
  WHERE id = '$id'
  ";
  mysqli_query($conn, $query);

  return mysqli_affected_rows($conn);
}

// ========================================
// FUNCTION ABOUT
// ========================================
// === FUNCTION UPDATE/EDIT ABOUT ===
function editAbout($data)
{
  global $conn;

  $id = htmlspecialchars(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode($data["id"]))))))))));
  $oldFile = htmlspecialchars($data["old_file"]);

  if ($_FILES['image']['error'] === 4) {
    $image = $oldFile;
  } else {
    $image = uploadImageAbout();
  }

  $description = $data["description"];
  $dateInsert = htmlspecialchars($data["date_insert"]);
  $dateUpdate = htmlspecialchars($data["date_update"]);
  $type = htmlspecialchars($data["type"]);

  $query = "UPDATE tb_about SET
  image = '$image', 
  description = '$description', 
  date_insert = '$dateInsert', 
  date_update = '$dateUpdate', 
  type = '$type'
  WHERE id = '$id'
  ";
  mysqli_query($conn, $query);

  return mysqli_affected_rows($conn);
}

// ========================================
// FUNCTION UPLOAD IMAGE ABOUT
// ========================================
function uploadImageAbout()
{

  $fileName = $_FILES['image']['name'];
  $fileSize = $_FILES['image']['size'];
  $error = $_FILES['image']['error'];
  $tmpName = $_FILES['image']['tmp_name'];

  // cek apakah ada file yang diupload atau tidak
  if ($error === 4) {
    echo "
		<script>
			alert('Foto Perusahaan Atau Instansi Wajib Diupload');
      document.location.href = 'register';
		</script>";
    return false;
  }

  // cek apakah yang diupload adalah file
  $extensionFileValid = ['jpg', 'jpeg', 'png'];
  $extensionFile = explode('.', $fileName);
  $extensionFile = strtolower(end($extensionFile));
  if (!in_array($extensionFile, $extensionFileValid)) {
    echo "
		<script>
			alert('Yang anda upload bukan format file yang diminta');
      document.location.href = '';
		</script>";
    return false;
  }

  // cek ukuran file file yang diupload
  if ($fileSize > 1000000) {
    echo "
		<script>
			alert('Ukuran file terlalu besar');
      document.location.href = '';
		</script>";
    return false;
  }

  // lolos pengecekan, file siap di upload
  // generate nama file baru
  $newFileName = uniqid($fileName . '_');
  $newFileName .= '.';
  $newFileName .= $extensionFile;

  move_uploaded_file($tmpName, '../../../assets/img/about/' . $newFileName);
  return $newFileName;
}


// ========================================
// FUNCTION INFORMATION
// ========================================
// === FUNCTION UPDATE/EDIT INFORMATION ===
function editInformation($data)
{
  global $conn;

  $id = htmlspecialchars(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode($data["id"]))))))))));

  $description = $data["description"];
  $status = $data["status"];
  $date = date('Y-m-d');

  $query = "UPDATE tb_information SET
  description = '$description', 
  status = '$status', 
  date = '$date'
  WHERE id = '$id'
  ";
  mysqli_query($conn, $query);

  return mysqli_affected_rows($conn);
}






// ========================================
// FUNCTION ABSENSI
// ========================================
// === FUNCTION ADD ABSENSI PAGI ===
function add_absen_pagi($data)
{
  global $conn, $idSession;

  $date = date("Y-m-d");
  $clockIn = date("H-i-s");
  $clockOut = "0";
  $location = mysqli_real_escape_string($conn, htmlspecialchars($data["location"]));
  $description = "0";

  $query = "INSERT INTO tb_attendances VALUES(null, '$idSession', '$date','$clockIn','$clockOut', '$location', '$description')";
  mysqli_query($conn, $query);

  return mysqli_affected_rows($conn);
}

// === FUNCTION ADD ABSENSI PULANG ===
function add_absen_pulang($data)
{
  global $conn;

  $id = htmlspecialchars(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode($data["id"]))))))))));
  $clockOut = date("H-i-s");

  $query = "UPDATE tb_attendances SET
  clock_out = '$clockOut' 
  WHERE id = '$id' ";
  mysqli_query($conn, $query);

  return mysqli_affected_rows($conn);
}

// === FUNCTION ADD ABSENSI SAKIT ===
function add_absen_sakit($data)
{
  global $conn, $idSession;

  $date = date("Y-m-d");
  $clockIn = "1";
  $clockOut = "1";
  $location = mysqli_real_escape_string($conn, htmlspecialchars($data["location"]));
  $description = mysqli_real_escape_string($conn, htmlspecialchars($data["description"]));

  $query = "INSERT INTO tb_attendances VALUES(null, '$idSession', '$date','$clockIn','$clockOut', '$location', '$description')";
  mysqli_query($conn, $query);

  return mysqli_affected_rows($conn);
}

// === FUNCTION ADD ABSENSI IZIN ===
function add_absen_izin($data)
{
  global $conn, $idSession;

  $date = date("Y-m-d");
  $clockIn = "2";
  $clockOut = "2";
  $location = "0";
  $description = mysqli_real_escape_string($conn, htmlspecialchars($data["description"]));

  $query = "INSERT INTO tb_attendances VALUES(null, '$idSession', '$date','$clockIn','$clockOut', '$location', '$description')";
  mysqli_query($conn, $query);

  return mysqli_affected_rows($conn);
}


// === FUNCTION DELETE MESSAGE ===
function delete_message($idMessage)
{
  global $conn;

  mysqli_query($conn, "DELETE FROM tb_messages WHERE id = '$idMessage' ");
  return mysqli_affected_rows($conn);
}
