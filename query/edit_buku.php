<?php
require_once("../controller/dbcontroller.php");
$db_handle = new DBController();

$id_buku = $_POST['id_buku'];
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

$nama_file = $_FILES['file']['name'];// Nama gambar
$tmp_file = $_FILES['file']['tmp_name'];//Lokasi gambar

$extensi = explode(".", $_FILES['file_buku']['name']);

if (empty($nama_file)) {
	$result = $db_handle->executeUpdate("UPDATE tb_buku SET id_judulp = '$id_parent', sub_judul = '$sub_judul', tgl_perolehan = '$tgl_perolehan', penerbit = '$penerbit', pengarang = '$pengarang', sinopsis = '$sinopsis', bahasa = '$bahasa', halaman = '$halaman', jumlah = '$jumlah', th_terbit = '$terbit', tgl_cetakan = '$cetak' WHERE id_buku = '$id_buku' ");
} else {
	$result = $db_handle->executeUpdate("UPDATE tb_buku SET id_judulp = '$id_parent', sub_judul = '$sub_judul', tgl_perolehan = '$tgl_perolehan', penerbit = '$penerbit', pengarang = '$pengarang', sinopsis = '$sinopsis', bahasa = '$bahasa', halaman = '$halaman', jumlah = '$jumlah', th_terbit = '$terbit', file = '$nama_file', tgl_cetakan = '$cetak' WHERE id_buku = '$id_buku' ");
	$path = '../assets/file/'.$nama_file;
	unlink($path);
	move_uploaded_file("$tmp_file", "../assets/file/$nama_file");
}

if ($result) {
	header("Location: ../administrator/home.php?page=buku");
}
?>