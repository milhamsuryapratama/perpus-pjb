<?php  
require_once("../controller/dbcontroller.php");
$db_handle = new DBController();

$id_peminjam = $_POST['id_peminjam'];

$get = "SELECT * FROM tb_user WHERE id = '$id_peminjam' ";
$res = $db_handle->runQueryById($get);
$count = $db_handle->numRows($get);

if ($count > 0) {
	echo json_encode($res);
} else {
	echo "error";
}
?>