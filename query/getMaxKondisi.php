<?php  
require_once("../controller/dbcontroller.php");
$db_handle = new DBController();

// $id = $_POST['id'];

$result = $db_handle->runQueryById("SELECT MAX(id_kondisi) as id_kondisi FROM tb_kondisi_buku");

if (count($result) > 0) {
	echo json_encode($result);
} else {
	echo "Tidak ada buku";
}
?>