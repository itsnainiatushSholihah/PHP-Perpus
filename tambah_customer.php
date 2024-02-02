<?php
//menambahkan class database
require('controler/islogin.php');
require('db/database.php');
$db = new database();

$id_cus = @$_GET['id_cus'];

//buat query untuk mengambil data di tabel
$db->query('SELECT * FROM customers WHERE id_cus=:id_cus');

//binding data query dengan variable
$db->bind(':id_cus', $id_cus);

//execute query ke database
$customer = $db->single();

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
                  if($id_cus) {
                      echo 'Edit Customer';
                    }
                  else {
                    echo 'Tambah Customer';
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

    <form enctype="multipart/form-data" action="<?php echo (@$id_cus ? 'controler/update_customer.php' : 'controler/save_customer.php'); ?>" method="POST">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">
                <?php
                  if($id_cus) {
                      echo 'Edit Customer';
                      // var_dump($buku);
                    }
                  else {
                    echo 'Tambah Customer';
                  }
                ?>
                </h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
             
                <div class="card-body">
                  <div class="form-group">
                    <label for="id_cus">ID Customer</label>
                    <input type="text" class="form-control" id="id_cus" name="id_cus"  placeholder="id_cus" required <?= @$customer['id_cus'] ? 'readonly' : ''; ?> value="<?= @$customer['id_cus'] ?>">
                  </div>

                  <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" class="form-control" id="nama" name="nama"  placeholder="nama" required value="<?= @$customer['nama'] ?>">
                  </div>

                  <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <input type="text" class="form-control" id="alamat" name="alamat"  placeholder="alamat" required value="<?= @$customer['alamat'] ?>">
                  </div>

                  <div class="form-group">
                    <label for="telp">Telepon</label>
                    <input type="text" class="form-control" id="telp" name="telp"  placeholder="telp" required value="<?= @$customer['telp'] ?>">
                  </div>

                  <div class="form-group">
                    <label for="jk">Jenis Kelamin</label>
                    <input type="number" class="form-control" id="jk" name="jk"  placeholder="jk" required value="<?= @$customer['jk'] ?>">
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
