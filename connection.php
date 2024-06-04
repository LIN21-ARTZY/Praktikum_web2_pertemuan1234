<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "penggajian";

$connection = mysqli_connect($servername, $username, $password, $dbname);
if (!$connection) {
  die("Gagal Koneksi: " . mysqli_connect_error());
}

mysqli_report(MYSQLI_REPORT_OFF);
