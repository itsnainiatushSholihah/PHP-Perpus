<?php

//menambahkan class database
require('../db/database.php');
$db = new database();

//mengambil data no menggunakan POSt
$no = $_POST['no_induk'];
$judul = $_POST['judul'];
$penulis = $_POST['penulis'];
$tahun = $_POST['tahun'];
$penerbit = $_POST['penerbit'];
$subjek = $_POST['subjek'];


$photo = null;

// var_dump($_POST);
// exit;

//mengambilo data gambar
//cek apakah gambar ada atau tidak 
if(isset($_FILES["image"])){
    //mengambil data dari input image ke dalam variabla $FILE
    $file = $_FILES['image']['tmp_name'];

    if($file){
        //mengubah file gambar menjadi format base64 kemudian di simpan ke dalam variabla $photo
        $photo = @base64_encode(file_get_contents($file));
    }
}

if($photo){
    //buat query untuk melakukan update data di tabel
$db->query('UPDATE books SET judul = :judul, penulis = :penulis, tahun = :tahun, penerbit= :penerbit, subjek = :subjek, photo = :photo WHERE no_induk = :no_induk');

//binding data query dengan variable
$db->bind(':no_induk', $no);
$db->bind(':judul', $judul);
$db->bind(':penulis', $penulis);
$db->bind(':tahun', $tahun);
$db->bind(':penerbit', $penerbit);
$db->bind(':subjek', $subjek);
$db->bind(':photo', $photo);

}
else {

//buat query untuk melakukan update data di tabel
$db->query('UPDATE books SET judul = :judul, penulis = :penulis, tahun = :tahun, penerbit= :penerbit, subjek = :subjek WHERE no_induk = :no_induk');

//binding data query dengan variable
$db->bind(':no_induk', $no);
$db->bind(':judul', $judul);
$db->bind(':penulis', $penulis);
$db->bind(':tahun', $tahun);
$db->bind(':penerbit', $penerbit);
$db->bind(':subjek', $subjek);

}


//execute query ke database
$db->execute();

//kembali ke halaman data_buku.php
header("Location:../lihat_buku.php");