<?php
session_start();
if (!isset($_SESSION["login"])) {
  header("Location:../auth/login");
  exit;
}

require('../funct/functions.php');
include("../includes/table/query.php");

// URL WEBSITE
$url = $rowHead['url'];


// ========================================
// DELETE MESSAGE
// ========================================
if (isset($_GET["message"])) {
  $idMessage = $_GET["message"];
  if (deleteMessage($idMessage) > 0) {
    echo "
    <script>
      alert('Data berhasil dihapus!');
      document.location.href = 'messages';
    </script>
    ";
  }
}
