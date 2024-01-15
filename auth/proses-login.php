<?php

if (isset($_POST["login"])) {
  $username = mysqli_real_escape_string($conn, $_POST["username"]);
  $password = mysqli_real_escape_string($conn, $_POST["password"]);

  $result = mysqli_query($conn, "SELECT * FROM tb_users WHERE username = '$username' ");

  // CEK USERNAME 
  if (mysqli_num_rows($result) === 1) {

    $row = mysqli_fetch_assoc($result);

    // CEK PASSWORD
    if (password_verify($password, $row["password"])) {

      // SET SESSION
      $_SESSION["login"] = true;
      $_SESSION["username"] = $username;

      header("Location:../admin/");
      exit;
    }
  }
  $error = true;
}
