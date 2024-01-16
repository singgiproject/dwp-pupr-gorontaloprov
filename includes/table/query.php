<?php
// ------------------------------------------------
// USER
// ------------------------------------------------
// === QUERY TABLE USERS ===
$users = query_users("SELECT * FROM tb_users");

// ------------------------------------------------
// ACCURATE LOCATION
// ------------------------------------------------
// === QUERY TABLE LOCATIONS ===
$locations = query_locations("SELECT * FROM tb_locations ORDER BY id DESC");

if (isset($_SESSION["login"])) {
  $locationSessionDESC_LIMIT1 = query("SELECT * FROM tb_locations WHERE id_user = '$idSession' ORDER BY id DESC LIMIT 1");
}



// ------------------------------------------------
// NEWS
// ------------------------------------------------
// === QUERY TABLE NEWS ===
$news = query("SELECT * FROM tb_news");
$newsDESC_LIMIT5 = query("SELECT * FROM tb_news ORDER BY id DESC LIMIT 5");
$newsDESC_LIMIT8 = query("SELECT * FROM tb_news ORDER BY id DESC LIMIT 8");
$newsDESC_LIMIT12 = query("SELECT * FROM tb_news ORDER BY id DESC LIMIT 12");
$newsUserPosted = query_news("SELECT * FROM tb_news");

$newsTags = query("SELECT * FROM tb_news");



// === QUERY TABLE NEWS END DATA===
$resultNewsEnd = $conn->query("SELECT * FROM tb_news ORDER BY id DESC LIMIT 1");
$rowNewsEnd = mysqli_fetch_assoc($resultNewsEnd);

if (isset($_GET["detail_news"])) {
  $getDetailNews = $_GET["detail_news"];
  $getDetailNews = substr($getDetailNews, strrpos($getDetailNews, '-') + 1);

  $detailNews = query_detail_news("SELECT * FROM tb_news WHERE id = '$getDetailNews' ")[0];
}


// ------------------------------------------------
// NEWS CATEGORY
// ------------------------------------------------
// === QUERY TABLE NEWS CATEGORY ===
$newsCategory = query("SELECT * FROM tb_news_category");
$newsCategoryDESC_LIMIT2 = query("SELECT * FROM tb_news_category ORDER BY id DESC LIMIT 2");

// ------------------------------------------------
// WORK PROGRAM
// ------------------------------------------------
// === QUERY TABLE WORK PROGRAM ===
$workProgram = query("SELECT * FROM tb_work_program");

// ------------------------------------------------
// WORK ORGANIZATION
// ------------------------------------------------
// === QUERY TABLE ORGANIZATION ===
$organization = query("SELECT * FROM tb_organization");


// ------------------------------------------------
// CATEGORY
// ------------------------------------------------
// === QUERY TABLE CATEGORY ===
$category = query("SELECT * FROM tb_category");

// === QUERY TABLE CATEGORY END DATA===
$resultCategoryEnd = $conn->query("SELECT * FROM tb_category ORDER BY id DESC LIMIT 1");
$rowCategoryEnd = mysqli_fetch_assoc($resultCategoryEnd);


// ------------------------------------------------
// GALLERY
// ------------------------------------------------
// === QUERY TABLE GALLERY ===
$gallery = query("SELECT * FROM tb_gallery ORDER BY id DESC LIMIT 8");
$galleryAll = query("SELECT * FROM tb_gallery ORDER BY id DESC");

// === QUERY TABLE GALERY GET ID===
if (!empty($_GET["ladkes"])) {
  $idGalery = $_GET["ladkes"];
  $queryGalery = query("SELECT * FROM tb_gallery WHERE id = '$idGalery' ")[0];
}

// ------------------------------------------------
// ABOUT
// ------------------------------------------------
$about = query("SELECT * FROM tb_about");

// === QUERY TABLE ABOUT ===
$resultAbout = $conn->query("SELECT * FROM tb_about");
$rowAbout = mysqli_fetch_assoc($resultAbout);


// ------------------------------------------------
// CONTACT
// ------------------------------------------------
// === QUERY TABLE CONTACT ===
$contact = query("SELECT * FROM tb_contact");

$resultContact = $conn->query("SELECT * FROM tb_contact");
$rowContact = mysqli_fetch_assoc($resultContact);

// ------------------------------------------------
// MESSAGES/CONTACT SEND
// ------------------------------------------------
// === QUERY TABLE MESSAGES ===
$messages = query("SELECT * FROM tb_messages");

// ------------------------------------------------
// VISITOR
// ------------------------------------------------
// === QUERY TABLE VISITOR ===
$visitor = query("SELECT * FROM tb_visitor ORDER BY id DESC");

// ------------------------------------------------
// TEAM
// ------------------------------------------------
// === QUERY TABLE TEAM ===
$team = query("SELECT * FROM tb_team");

// === QUERY TABLE TEAM END DATA===
$resultTeamEnd = $conn->query("SELECT * FROM tb_team ORDER BY id DESC LIMIT 1");
$rowTeamEnd = mysqli_fetch_assoc($resultTeamEnd);


// ------------------------------------------------
// INFORMATIONS
// ------------------------------------------------
$information = query("SELECT * FROM tb_information");
// === QUERY TABLE INFORMATIONS ===
$resultInformation = $conn->query("SELECT * FROM tb_information");
$rowInformation = mysqli_fetch_assoc($resultInformation);

// ------------------------------------------------
// ABSENSI
// ------------------------------------------------
if (isset($_SESSION["login"])) {
  $absenSession = query("SELECT * FROM tb_attendances WHERE id_user = '$idSession' ");

  $absenSessionDESC_LIMIT1 = query("SELECT * FROM tb_attendances WHERE id_user = '$idSession' ORDER BY id DESC LIMIT 1");
}

// ------------------------------------------------
// DOCUMENTS
// ------------------------------------------------
// === QUERY TABLE DOCUMENTS ===
$documents = query("SELECT * FROM tb_documents");

// ------------------------------------------------
// SEARCH DATA 
// ------------------------------------------------
if (isset($_GET["search"])) {
  // Search News
  $querySearchNews = str_replace("-", " ", mysqli_real_escape_string($conn, htmlspecialchars($_GET["search"])));
  $news = query("SELECT * FROM tb_news WHERE title LIKE '%$querySearchNews%' OR thumbnail_caption LIKE '%$querySearchNews%' OR description LIKE '%$querySearchNews%' OR category LIKE '%$querySearchNews%' OR tags LIKE '%$querySearchNews%'");
}

if (isset($_GET["query"])) {
  $keyword = str_replace(" ", "-", strtolower(mysqli_real_escape_string($conn, htmlspecialchars($_GET["query"]))));
  header("Location:search/$keyword");
  exit;
}




// ------------------------------------------------
// SEARCH DATA TABLE
// ------------------------------------------------
// Search News
if (isset($_POST["keyword_news"])) {
  $news = search_news($_POST["keyword_news"]);
}

// Search Work Program
if (isset($_POST["keyword_work_program"])) {
  $workProgram = search_work_program($_POST["keyword_work_program"]);
}

// Search Documents
if (isset($_POST["keyword_documents"])) {
  $documents = search_documents($_POST["keyword_documents"]);
}
