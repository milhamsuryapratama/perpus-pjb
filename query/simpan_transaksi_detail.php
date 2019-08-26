<?php  
require_once("../controller/dbcontroller.php");
$db_handle = new DBController();

$buku = $_POST['buku'];
$id_transaksi = $_POST['id_transaksi'];

$now = date('Y-m-d');
$tgl_kembali = date('Y-m-d', strtotime($now.'+ 14 days'));

foreach ($buku as $b) {
	$result = $db_handle->executeUpdate("INSERT INTO tb_transaksi_detail (id_transaksi, id_buku, tgl_kembali) VALUES('$id_transaksi','$b','$tgl_kembali')");
}

echo "sukses";
?>