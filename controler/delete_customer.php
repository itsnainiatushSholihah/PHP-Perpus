<?php

//menambahkan class database
require('../db/database.php');
$db = new database();

//mengambil data no menggunakan GET
$id_cus = $_GET['id_cus'];

//buat query untuk melakukan penghapusan data di tabel
$db->query('DELETE FROM customers WHERE id_cus=:id_cus');

//binding data query dengan variable
$db->bind(':id_cus', $id_cus);

//execute query ke database
$db->execute();

//kembalikan ke halaman data_buku.php
header("Location:../lihat_customer.php");