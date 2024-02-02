<?php

require('controler/islogin.php');

require('db/database.php');
$db = new database();

$no = @$_GET['id'];

$db->query('SELECT * FROM loans l
INNER JOIN books b ON l.no_induk = b.no_induk
INNER JOIN customers c ON l.id_cus = c.id_cus
WHERE id = :id;');

$db->bind(":id", $no);

$buku = $db->single();

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | DataTables</title>

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
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

  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>PEMINJAMAN BUKU</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">
                <?php
                if ($no) {
                    echo 'Edit Peminjaman Buku';
                }
                else{
                    echo 'Tambah Peminjaman Buku';
                }
                ?>
              </li>
            </ol>
          </div>
        </div>
      </div>
    </section>

    <section class="content">

       <form enctype="multipart/form-data" action="<?php echo (@$no ? 'controler/update_kembali.php' : 'controler/save_pinjam.php'); ?>" method="POST">
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-12">
                <div class="card card-primary">
                  <div class="card-header">
                    <h3 class="card-title">
                        <?php
                        if($no) {
                            echo 'Edit Peminjaman Buku';
                            }
                        else {
                            echo 'Tambah Peminjaman Buku';
                        }
                        ?>
                    </h3>
                  </div>
              
                  <div class="card-body">
                    
                    <p>No Induk : <strong><?= @$buku['no_induk'] ?></strong></p>
                    <p>Judul : <strong><?= @$buku['judul'] ?></strong></p>
                    <p>ID Customer : <strong><?= @$buku['id_cus'] ?></strong></p>
                    <p>Nama Customer : <strong><?= @$buku['nama'] ?></strong></p>
                      
                    <?php
                    if ($no) {
                    ?>
                        <input name="id" type="hidden" value="<?= @$no ?>">
                    <?php } ?>

                    <div class="form-group">
                        <label for ="denda"> Denda </label>
                        <input type="number" class="form-control" name="denda" id="denda" placeholder="Masukkan Denda" require <?= @$customer['id_cus'] ? 'readonly' : '' ; ?> value="<?= @$customer['id_cus'] ?>">
                    </div>

                    <div class="form-group">
                        <label for ="ket"> Keterangan </label>
                        <textarea type="ket" class="form-control" rows="3" placeholder="Masukkan Keterangan" style="height: 73;"></textarea>
                    </div>

                    <div class="card-footer">
                      <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                  </div>

                
                </div>
              </div>
            </div>
          </div>
        </form>
    </section>
  </div>
  
  <?php

require('template/footer.php');

?>

  <aside class="control-sidebar control-sidebar-dark">
  </aside>
</div>

<script src="plugins/jquery/jquery.min.js"></script>
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="plugins/jszip/jszip.min.js"></script>
<script src="plugins/pdfmake/pdfmake.min.js"></script>
<script src="plugins/pdfmake/vfs_fonts.js"></script>
<script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

<script src="dist/js/adminlte.min.js"></script>

<script src="dist/js/demo.js"></script>

<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
</body>
</html>
