<?php

//menambahkan class database
require('../db/database.php');
$db = new database();

//mengambil data no menggunakan GET
$id_cus = $_GET['id'];

//buat query untuk melakukan penghapusan data di tabel
$db->query('DELETE FROM loans WHERE id=:id');

//binding data query dengan variable
$db->bind(':id', $id);

//execute query ke database
$db->execute();

//kembalikan ke halaman data_buku.php
header("Location:../data_pinjam.php");