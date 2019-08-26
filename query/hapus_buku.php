<?php
require_once("../controller/dbcontroller.php");
$db_handle = new DBController();

$id_buku = $_GET['id'];

$ambil_file = $db_handle->runQueryById("SELECT file FROM tb_buku WHERE id_buku = '$id_buku' ");

$result = $db_handle->executeUpdate("DELETE FROM tb_buku WHERE id_buku = '$id_buku' ");

if ($result) {
	unlink("../assets/file/".$ambil_file['file']);
	header("Location: ../administrator/home.php?page=buku");
}
?>