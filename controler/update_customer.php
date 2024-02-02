<?php

//menambahkan class database
require('../db/database.php');
$db = new database();

//mengambil data no menggunakan POSt
$id_cus = $_POST['id_cus'];
$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$telp = $_POST['telp'];
$jk = $_POST['jk'];


//buat query untuk melakukan update data di tabel
$db->query('UPDATE customers SET nama = :nama, alamat = :alamat, telp = :telp, jk= :jk WHERE id_cus = :id_cus');

//binding data query dengan variable
$db->bind(':id_cus', $id_cus);
$db->bind(':nama', $nama);
$db->bind(':alamat', $alamat);
$db->bind(':telp', $telp);
$db->bind(':jk', $jk);




//execute query ke database
$db->execute();

//kembali ke halaman data_buku.php
header("Location:../lihat_customer.php");