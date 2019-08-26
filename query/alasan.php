<?php  
session_start();
require_once("../controller/dbcontroller.php");
$db_handle = new DBController();

$alasan = $_POST['alasan'];
$id_buku = $_POST['id_buku'];
$id = $_SESSION['id'];

$simpan_alasan = $db_handle->executeUpdate("INSERT INTO tb_alasan (user, alasan, id_buku) VALUES('$id','$alasan', '$id_buku')");
if ($simpan_alasan) {
	$result = $db_handle->executeUpdate("UPDATE tb_buku SET status = 'N' WHERE id_buku = '$id_buku' ");

	if ($result) {
		header("Location: ../administrator/home.php?page=buku");
	}
}

?>