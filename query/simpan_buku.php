<?php
session_start();
require_once("../controller/dbcontroller.php");
$db_handle = new DBController();

$sub_judul = $_POST['sub_judul'];
$id_parent = $_POST['id_parent'];
$tgl_perolehan = $_POST['tgl_perolehan'];
$penerbit = $_POST['penerbit'];
$pengarang = $_POST['pengarang'];
$sinopsis = $_POST['sinopsis'];
$bahasa = $_POST['bahasa'];
$halaman = $_POST['halaman'];
$jumlah = $_POST['jumlah'];
$terbit = $_POST['terbit'];
$jumlah = $_POST['jumlah'];
$cetak = $_POST['tgl_cetakan'];
$id_user = $_SESSION['id'];

$nama_file = $_FILES['file_buku']['name'];// Nama gambar
$tmp_file = $_FILES['file_buku']['tmp_name'];//Lokasi gambar

$extensi = explode(".", $_FILES['file_buku']['name']);
// $filename = $nama_file.".".end($extensi);

$result = $db_handle->executeUpdate("INSERT INTO tb_buku (id_judulp,sub_judul,tgl_perolehan,penerbit,pengarang,sinopsis,bahasa,halaman,jumlah,th_terbit, file, tgl_cetakan, id_user) VALUES('$id_parent','$sub_judul','$tgl_perolehan','$penerbit','$pengarang','$sinopsis','$bahasa','$halaman','$jumlah','$terbit', '$nama_file', '$cetak','$id_user')");

if ($result) {
	move_uploaded_file("$tmp_file", "../assets/file/$nama_file");
	header("Location: ../administrator/home.php?page=buku");
}
?>