<?php
require_once("../controller/dbcontroller.php");
$db_handle = new DBController();

$id = $_POST['id'];

$ambil_file = $db_handle->runQueryById("SELECT * FROM tb_user WHERE id = '$id' ");

$result = $db_handle->executeUpdate("DELETE FROM tb_user WHERE id = '$id' ");

if ($result) {	
	unlink("../assets/user/".$ambil_file['foto_user']);
	echo "sukses";
	// echo json_encode($ambil_file);
}
?>