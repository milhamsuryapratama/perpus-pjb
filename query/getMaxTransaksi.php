<?php  
require_once("../controller/dbcontroller.php");
$db_handle = new DBController();

// $id = $_POST['id'];

$result = $db_handle->runQueryById("SELECT MAX(id_transaksi) as id_transaksi FROM tb_transaksi");

if (count($result) > 0) {
	echo json_encode($result);
} else {
	echo "Tidak ada buku";
}
?>