<?php
$dashboard_active = "fw-bold";
$bagian_active = "fw-bold";
$karyawan_active = "fw-bold";
$penggajian_active = "fw-bold";

if (isset($_GET['page'])) {
  $page = $_GET['page'];
} else {
  $page = '';
}

switch ($page) {
  case "":
  case "dashboard":
    $dashboard_active = "active";
    break;
  case "bagian":
  case "bagiantambah":
  case "bagianubah":
  case "bagianhapus":
    $bagian_active = "active";
    break;
  case "karyawan":
  case "karyawantambah":
  case "karyawanubah":
  case "karyawanhapus":
    $karyawan_active = "active";
    break;
  case "penggajian":
  case "penggajiantambah":
  case "penggajianhapus":
  case "pilihbulantahunpenggajian":
  case "pilihkaryawanpenggajian":
    $penggajian_active = "active";
    break;
  default:
    $dash_board_active = "active";
}
?>

<div class="bg-white" id="sidebar-wrapper">
  <div
    class="sidebar-heading text-center py-4 primary-text fs-4 fw-bold text-uppercase border-bottom"
  >
    <i class="fas fa-money-bill me-2"></i>Penggajian
  </div>
  <div class="list-group list-group-flush my-3">
    <a
      href="?page=dashboard"
      class="list-group-item list-group-item-action bg-transparent second-text <?= $dashboard_active ?>"
      ><i class="fas fa-tachometer-alt me-2"></i>Dashboard</a
    >
    <a
      href="?page=bagian"
      class="list-group-item list-group-item-action bg-transparent second-text <?= $bagian_active ?>"
      ><i class="fas fa-building me-2"></i>Bagian</a
    >
    <a
      href="?page=karyawan"
      class="list-group-item list-group-item-action bg-transparent second-text <?= $karyawan_active ?>"
      ><i class="fas fa-users me-2"></i>Karyawan</a
    >
    <a
      href="?page=pilihbulantahunpenggajian"
      class="list-group-item list-group-item-action bg-transparent second-text <?= $penggajian_active ?>"
      ><i class="fas fa-money-bill me-2"></i>Penggajian</a
    >
    <a
      href="#"
      class="list-group-item list-group-item-action bg-transparent text-danger fw-bold"
      ><i class="fas fa-power-off me-2"></i>Logout</a
    >
  </div>
</div>
