<?php  
require_once("../controller/dbcontroller.php");
$db_handle = new DBController();

$id = $_POST['id'];

$result = $db_handle->runQuery("SELECT * FROM tb_buku WHERE id_judulp = '$id' AND status = 'Y' ");

if (count($result) > 0) {
	echo json_encode($result);
} else {
	echo "Tidak ada buku";
}
?>