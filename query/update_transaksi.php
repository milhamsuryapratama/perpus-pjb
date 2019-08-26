<?php
require_once("../controller/dbcontroller.php");
$db_handle = new DBController();

$id_kondisi = $_POST['id_kondisi'];
$id_transaksi = $_POST['id_transaksi'];

$result = $db_handle->executeUpdate("UPDATE tb_transaksi SET id_kondisi_buku = '$id_kondisi' WHERE id_transaksi = '$id_transaksi' ");

if ($result) {
	echo "Sukses";
}
?>