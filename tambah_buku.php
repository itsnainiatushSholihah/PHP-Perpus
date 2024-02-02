<?php
//menambahkan class database
require('controler/islogin.php');
require('db/database.php');
$db = new database();

$no = @$_GET['no'];

//buat query untuk mengambil data di tabel
$db->query('SELECT * FROM books WHERE no_induk=:no_induk');

//binding data query dengan variable
$db->bind(':no_induk', $no);

//execute query ke database
$buku = $db->single();

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | General Form Elements</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>
<body class="hold-transition dark-mode sidebar-mini">
<div class="wrapper">

<?php

require('template/header.php');

?>

<?php

require('template/sidebar.php');

?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>KUTUBUN</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">

                <?php
                  if($no) {
                      echo 'Edit buku';
                    }
                  else {
                    echo 'Tambah Buku';
                  }
                ?>

              </li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>


    <!-- Main content -->
    <section class="content">

    <form enctype="multipart/form-data" action="<?php echo (@$no ? 'controler/update.php' : 'controler/save_buku.php'); ?>" method="POST">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Gambar</h3>
              </div>
              <div class="form-group mb-0">
                <div class="input-group">
                  <div class="custom-file m-3">
                    <input type="file" name="image" class="custom-file-input" id="exampleInputFile" accept="image/*">
                    <label class="custom-file-label" for="exampleInputFile">Pilih</label>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-9">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">
                <?php
                  if($no) {
                      echo 'Edit buku';
                      // var_dump($buku);
                    }
                  else {
                    echo 'Tambah Buku';
                  }
                ?>
                </h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
             
                <div class="card-body">
                  <div class="form-group">
                    <label for="no-induk">Nomor induk</label>
                    <input type="text" class="form-control" id="no_induk" name="no_induk"  placeholder="Nomor" required <?= @$buku['no_induk'] ? 'readonly' : ''; ?> value="<?= @$buku['no_induk'] ?>">
                  </div>

                  <div class="form-group">
                    <label for="judul">Judul</label>
                    <input type="text" class="form-control" id="judul" name="judul"  placeholder="Judul" required value="<?= @$buku['judul'] ?>">
                  </div>

                  <div class="form-group">
                    <label for="penulis">Penulis</label>
                    <input type="text" class="form-control" id="penulis" name="penulis"  placeholder="Penulis" required value="<?= @$buku['penulis'] ?>">
                  </div>

                  <div class="form-group">
                    <label for="tahun">Tahun</label>
                    <input type="text" class="form-control" id="tahun" name="tahun"  placeholder="Tahun" required value="<?= @$buku['tahun'] ?>">
                  </div>

                  <div class="form-group">
                    <label for="penerbit">Penerbit</label>
                    <input type="text" class="form-control" id="penerbit" name="penerbit"  placeholder="Penerbit" required value="<?= @$buku['penerbit'] ?>">
                  </div>

                  <div class="form-group">
                    <label for="subjek">Subjek</label>
                    <input type="text" class="form-control" id="subjek" name="subjek"  placeholder="Subjek"  value="<?= @$buku['subjek'] ?>">
                  </div>

                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="Kirim" class="btn btn-primary">Kirim</button>
                </div>
              
            </div>
           
          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </form>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php

require('template/footer.php');

?>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- bs-custom-file-input -->
<script src="plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- Page specific script -->
<script>
$(function () {
  bsCustomFileInput.init();
});
</script>
</body>
</html>
