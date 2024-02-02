<?php

//menambahkan class database
require('../db/database.php');
$db = new database();

//mengambil data no menggunakan POSt
$id = $_POST['id'];
$no = $_POST['no_induk'];
$id_cus = $_POST['id_cus'];

//buat query untuk melakukan update data di tabel
$db->query('UPDATE loans SET id_cus = :id_cus, no_induk = :no_induk WHERE id = :id');

//binding data query dengan variable
$db->bind(':id', $id);
$db->bind(':id_cus', $id_cus);
$db->bind(':no_induk', $no_induk);

//execute query ke database
$db->execute();

//kembali ke halaman data_buku.php
header("Location:../data_pinjam.php");