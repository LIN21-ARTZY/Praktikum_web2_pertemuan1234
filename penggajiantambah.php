<div id="top" class="row mb-3">
  <div class="col">
    <h3>Tambah Data Penggajian</h3>
  </div>
  <div class="col">
    <a href="?page=pilihkaryawanpenggajian" class="btn btn-primary float-end">
      <i class="fa fa-arrow-circle-left"></i>
      Kembali
    </a>
  </div>
</div>
<div id="pesan" class="row mb-3">
  <div class="col">
    <?php
    include "database/connection.php";

    if (isset($_POST['simpan_button'])) {
      $karyawan_nik = $_POST['karyawan_nik'];
      $bulan_select = $_POST['bulan_select'];
      $tahun = $_POST['tahun'];
      $gaji_pokok = $_POST['gaji_pokok'];

      $checkSQL = "SELECT * FROM penggajian
        WHERE karyawan_nik = '$karyawan_nik'
        AND bulan = '$bulan_select'
        AND tahun = $tahun";
      $resultCheck = mysqli_query($connection, $checkSQL);

      if (mysqli_num_rows($resultCheck) > 0) { ?>
        <div class="alert alert-danger" role="alert">
          <i class="fa fa-exclamation-circle"></i>
          Data gaji <?= $bulan_select ?> tahun <?= $tahun ?> sudah ada
        </div> <?php
      } else {
        $sqlInsert = "INSERT INTO penggajian SET
          karyawan_nik = '$karyawan_nik',
          bulan = '$bulan_select',
          tahun = $tahun,
          gaji_bayar = $gaji_pokok";
        $resultInsert = mysqli_query($connection, $sqlInsert);
        if (!$resultInsert) { ?>
          <div class="alert alert-danger" role="alert">
            <i class="fa fa-exclamation-circle"></i>
            <?php echo mysqli_error($connection) ?>
          </div> <?php
        } else { ?>
          <div class="alert alert-success" role="alert">
            <i class="fa fa-check-circle"></i>
            Data berhasil disimpan
          </div> <?php
        }
      }
    }
    
    $nik = $_GET['nik'];
    $selectSQL = "SELECT * FROM karyawan WHERE nik = $nik";
    $resultSelect = mysqli_query($connection, $selectSQL);
    if (!$resultSelect || mysqli_num_rows($resultSelect) == 0) {
      echo '<meta http-equiv="refresh" content="0;url=?page=pilihkaryawanpenggajian">';
    }

    $row = mysqli_fetch_assoc($resultSelect);
    ?>
  </div>
</div>
<div id="inputan" class="row mb-3">
  <div class="col">
    <div class="card px-3">
      <div class="row">
        <div class="col-md-6 mb-3 mt-3">
          <label class="form-label">NIK</label>
          <input type="text" class="form-control" value="<?= $row['nik'] ?>" readonly>
        </div>
        <div class="col-md-6 mb-3 mt-3">
          <label class="form-label">Nama</label>
          <input type="text" class="form-control" value="<?= $row['nama'] ?>" readonly>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6 mb-3 mt-3">
          <label class="form-label">Tanggal Mulai Bekerja</label>
          <input type="text" class="form-control" value="<?= $row['tanggal_mulai'] ?>" readonly>
        </div>
        <div class="col-md-6 mb-3 mt-3">
          <label class="form-label">Gaji Pokok</label>
          <input type="text" class="form-control" value="<?= $row['gaji_pokok'] ?>" readonly>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6 mb-3 mt-3">
          <label class="form-label">Status Karyawan</label>
          <input type="text" class="form-control" value="<?= $row['status_karyawan'] ?>" readonly>
        </div>
        <div class="col-md-6 mb-3 mt-3">
          <label class="form-label">Bagian</label>
          <?php
          $selectSQL = "SELECT * FROM bagian WHERE id = " . $row['bagian_id'];
          $resultBagian = mysqli_query($connection, $selectSQL);
          if (!$resultBagian) { ?>
            <div class="alert alert-danger" role="alert">
              <?php echo mysqli_error($resultBagian) ?>
            </div> <?php
            return;
          }

          if (mysqli_num_rows($resultBagian) == 0) { ?>
            <div class="alert alert-danger" role="alert">
              Data kosong
            </div> <?php
            return;
          }

          $row_bagian = mysqli_fetch_assoc($resultBagian);
          ?>
          <input type="text" class="form-control" value="<?= $row_bagian['nama'] ?>" readonly>
        </div>
      </div>
    </div>
    <div class="card px-3 mt-3">
      <form action="" method="POST">
        <input type="hidden" name="karyawan_nik" value="<?= $row['nik'] ?>">
        <input type="hidden" name="gaji_pokok" value="<?= $row['gaji_pokok'] ?>">
        <div class="mb-3 mt-3">
          <label for="bulan_select" class="form-label">Bulan</label>
          <select class="form-select" name="bulan_select">
            <option value="" selected>-- Pilih Bulan</option>
            <option value="01">Januari</option>
            <option value="02">Februari</option>
            <option value="03">Maret</option>
            <option value="04">April</option>
            <option value="05">Mei</option>
            <option value="06">Juni</option>
            <option value="07">Juli</option>
            <option value="08">Agustus</option>
            <option value="09">September</option>
            <option value="10">Oktober</option>
            <option value="11">November</option>
            <option value="12">Desember</option>
          </select>
        </div>
        <div class="mb-3">
          <label for="tahun" class="form-label">Tahun</tahun>
          <input type="number" class="form-control" id="tahun" name="tahun" required maxlength="4">
        </div>
        <div class="col mb-3">
          <button class="btn btn-success" type="submit" name="simpan_button">
            <i class="fas fa-save"></i>
            Simpan
          </button>
        </div>
      </form>
    </div>
  </div>
</div>

<script>
  if (window.history.replaceState) {
    window.history.replaceState(null, null, window.location.href);
  }
</script>
