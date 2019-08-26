<?php
require_once("../controller/dbcontroller.php");
$db_handle = new DBController();

$id_peminjam = $_POST['id_peminjam'];
$nama_peminjam = $_POST['nama_peminjam'];
$bidang = $_POST['bidang'];
$buku = $_POST['buku'];

$sampul = $_POST['sampul'];
$coretan = $_POST['coretan'];
$lipatan = $_POST['lipatan'];

$result = $db_handle->executeUpdate("INSERT INTO tb_kondisi_buku (sampul, coretan, lipatan) VALUES('$sampul','$coretan','$lipatan')");

if ($result) {
	echo "Sukses";
}
?>