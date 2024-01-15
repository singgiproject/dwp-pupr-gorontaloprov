<?php
// COUNT VISITOR (IP ADDRESS)
$countVisitor = $conn->query("SELECT COUNT(*) countVisitor FROM tb_visitor");
$resultVisitor = mysqli_fetch_assoc($countVisitor);

// COUNT NEWS
$countNews = $conn->query("SELECT COUNT(*) countNews FROM tb_news");
$resultNews = mysqli_fetch_assoc($countNews);

// COUNT MESSAGE
$countMessage = $conn->query("SELECT COUNT(*) countMessage FROM tb_messages");
$resultMessage = mysqli_fetch_assoc($countMessage);

// COUNT GALLERY
$countGallery = $conn->query("SELECT COUNT(*) countGallery FROM tb_gallery");
$resultGallery = mysqli_fetch_assoc($countGallery);

// COUNT ACCOUNT
$countAccount = $conn->query("SELECT COUNT(*) countAccount FROM tb_users");
$resultAccount = mysqli_fetch_assoc($countAccount);

// COUNT TEAM
$countTeam = $conn->query("SELECT COUNT(*) countTeam FROM tb_team");
$resultTeam = mysqli_fetch_assoc($countTeam);

// COUNT WORK PROGRAM
$countWorkProgram = $conn->query("SELECT COUNT(*) countWorkProgram FROM tb_work_program");
$resultWorkProgram = mysqli_fetch_assoc($countWorkProgram);
