<div id="top" class="row mb-3">
  <div class="col">
    <h3>Tambah Data Bagian</h3>
  </div>
  <div class="col">
    <a href="?page=bagian" class="btn btn-primary float-end">
      <i class="fa fa-arrow-circle-left"></i>
      Kembali
    </a>
  </div>
</div>
<div id="pesan" class="row mb-3">
  <div class="col">
    <?php
    include "database/connection.php";

    if (isset($_POST["simpan_button"])) {
      $nama = $_POST["nama"];

      $checkAdaSQL = "SELECT * FROM bagian WHERE nama = '$nama'";
      $resultCheckAda = mysqli_query($connection, $checkAdaSQL);
      $sudahAda = mysqli_num_rows($resultCheckAda) > 0;

      if ($sudahAda) { ?>
        <div class="alert alert-danger" role="alert">
          <i class="fa fa-exclamation-circle"></i>
          Nama bagian sudah ada
        </div> <?php
      } else {
        $insertSQL = "INSERT INTO bagian SET nama = '$nama'";
        $resultInsert = mysqli_query($connection, $insertSQL);
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
    ?>
  </div>
</div>
<div id="inputan" class="row mb-3">
  <div class="col">
    <div class="card px-3">
      <form action="" method="POST">
        <div class="mb-3">
          <label for="nama" class="form-label">Nama Bagian</label>
          <input type="text" class="form-control" id="nama" name="nama" placeholder="misal: HRD" required>
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
