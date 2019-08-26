<?php  
require_once("../controller/dbcontroller.php");
$db_handle = new DBController();

$id = $_POST['id_kondisi'];

$get = "SELECT * FROM tb_kondisi_buku WHERE id_kondisi = '$id' ";
$res = $db_handle->runQueryById($get);

if (count($res) > 0) {
	echo json_encode($res);
} else {
	echo "Tidak ada buku";
}
?>