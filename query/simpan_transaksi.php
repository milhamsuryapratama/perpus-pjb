<?php
require_once("../controller/dbcontroller.php");
$db_handle = new DBController();

$id_peminjam = $_POST['id_peminjam'];
//$nama_peminjam = $_POST['nama_peminjam'];
// $bidang = $_POST['bidang'];
// $buku = $_POST['buku'];
//$tgl_pinjam = date("Y-m-d");
//$max_kembali = date('Y-m-d', strtotime('+14 days', strtotime($tgl_pinjam)));

// $sampul = $_POST['sampul'];
// $coretan = $_POST['coretan'];
// $lipatan = $_POST['lipatan'];

$result = $db_handle->executeUpdate("INSERT INTO tb_transaksi (id_peminjam, status_transaksi) VALUES('$id_peminjam','dipinjam')");

if ($result) {
	$db_handle->executeUpdate("UPDATE tb_user SET point = point + 5 WHERE id = '$id_peminjam' ");
	$max = $db_handle->runQueryById("SELECT MAX(id_transaksi) as id_transaksi FROM tb_transaksi");
	echo json_encode($max);
}
?>