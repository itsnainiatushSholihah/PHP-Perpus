<?php

require('../db/database.php');
$db = new Database();

$no = $_POST['no_induk'];
$judul = $_POST['judul'];
$penulis = $_POST['penulis'];
$tahun = $_POST['tahun'];
$penerbit = $_POST['penerbit'];
$subject = $_POST['subjek'];

$photo = null;

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

//menggunakan bind
$db->query('INSERT INTO books (no_induk, judul, penulis, tahun, penerbit, subjek, photo) VALUES (:no_induk, :judul, :penulis, :tahun, :penerbit, :subjek, :photo)');

$db->bind(':no_induk', $no);
$db->bind(':judul', $judul);
$db->bind(':penulis', $penulis);
$db->bind(':tahun', $tahun);
$db->bind(':penerbit', $penerbit);
$db->bind(':subjek', $subject);
$db->bind(':photo', $photo);

$db->execute();

header("Location:../lihat_buku.php");