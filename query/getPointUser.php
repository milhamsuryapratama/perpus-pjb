<?php  
require_once("../controller/dbcontroller.php");
$db_handle = new DBController();

$id_peminjam = $_POST['id_peminjam'];

$score = "SELECT point FROM tb_user WHERE id = '$id_peminjam' ";
$resScore = $db_handle->runQueryById($score);

if (count($resScore) > 0) {
	echo json_encode($resScore);
} else {
	echo "Tidak ada buku";
}
?>