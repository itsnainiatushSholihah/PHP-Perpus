<?php

//menambahkan class database
require('../db/database.php');
$db = new database();

//mengambil data no menggunakan GET
$username = $_GET['username'];

//buat query untuk melakukan penghapusan data di tabel
$db->query('DELETE FROM admins WHERE username=:username');

//binding data query dengan variable
$db->bind(':username', $username);

//execute query ke database
$db->execute();

//kembalikan ke halaman data_buku.php
header("Location:../lihat_admin.php");