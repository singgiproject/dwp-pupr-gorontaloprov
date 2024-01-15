<?php
error_reporting(0);

// URL WEBSITE
$url = "https://dwp.pupr.gorontaloprov.a3berkah.com/";

// Mendeteksi protokol yang digunakan (http atau https)
$protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https://' : 'http://';

// Menggabungkan protokol, nama host, dan request URI
$currentUrl = $protocol . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];

$title = "Darma Wanita Persatuan - PUPR Provinsi Gorontalo";
$shorTitle = "DWP - PUPR Provinsi Gorontalo";

// LOGO / ICONS
$icon = $url . "assets/img/logo/logo_dharma_wanita_persatuan.png";
$logo = $url . "assets/img/logo/logo_dharma_wanita_persatuan.png";

// Title Detail
if (isset($_GET["detail_news"])) {
  $titleDetailNews = ucwords(str_replace("-", " ", $detailNews["title"]) . " " . "-" . " ");
}


if (isset($_GET["detail_news"])) {
  $title = $detailNews["title"] . " - " . $title;

  $words = explode(" ", $detailNews["description"]);
  $shortDescription = implode(" ", array_slice($words, 0, 50));
  $description = htmlspecialchars($shortDescription);

  $ogImage = $url . "assets/img/news/" . $detailNews["thumbnail"];
  $ogUrl = $url . "news/" . basename($_SERVER['REQUEST_URI']);
} else {
  $description = "Selamat Datang di Website Resmi Darma Wanita Persatuan - PUPR Provinsi Gorontalo";
  $ogImage = $logo;
  $ogUrl = "https://dwp.pupr.gorontaloprov.a3berkah.com";
}


// META
$description = $description;
$keywords = $titleDetailNews . "Darma Wanita Persatuan - PUPR Provinsi Gorontalo, DWP Gorontalo, PUPR Provinsi Gorontalo";
$author = "Singgi Mokodompit";
$robots = "index,follow";
$revisitAfter = "revisit-after";
$MSSmartTagsPreventParsing = "TRUE";
$Distribution = "Global";
$Rating = "General";
$themeColor = "#ffffff";

// OPEN GRAPH DATA
$ogTitle = $title;
$ogType = "website";
$ogDescription = $description;
$ogImage = $ogImage;
$ogLocale = "id_ID";
$ogUrl = $ogUrl;
$ogSiteName = $title;
$ogAdmins = "Singgi Mokodompit";

// DUBLIN CORE
$DCTitle = $title;
$DCIdentifier = $ogUrl;
$DCDescription = $description;
$DCSubject = $titleDetailNews . " " . $title;
