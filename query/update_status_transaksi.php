<?php
require_once("../controller/dbcontroller.php");
$db_handle = new DBController();

$id_transaksi = $_POST['id_trx'];
$date = $_POST['date'];
$id_peminjam = $_POST['id_peminjam'];
$date = date("Y-m-d");

$get = "SELECT * FROM tb_transaksi WHERE id_transaksi = '$id_transaksi' ";
$res = $db_handle->runQueryById($get);

if ($res['tgl_kembali'] === $date) {
    $result = $db_handle->executeUpdate("UPDATE tb_transaksi SET status_transaksi = 'dikembalikan', tgl_kembali = '$date' WHERE id_transaksi = '$id_transaksi' ");
    $db_handle->executeUpdate("UPDATE tb_user SET point = point + 5 WHERE id = '$id_peminjam' ");
} else {
    $result = $db_handle->executeUpdate("UPDATE tb_transaksi SET status_transaksi = 'dikembalikan', tgl_kembali = '$date' WHERE id_transaksi = '$id_transaksi' ");
}

if ($result) {
	echo "Sukses";
}

?>