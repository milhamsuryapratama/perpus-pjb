<?php
require_once("../controller/dbcontroller.php");
$db_handle = new DBController();

$id = $_POST['id_parent'];
$key_judul = $_POST['key_judul'];
$judul = $_POST['judul_parent'];
$id_kategori = $_POST['id_kategori'];

$result = $db_handle->executeUpdate("UPDATE tb_judulparent SET key_judulp = '$key_judul', judulp = '$judul', id_kategori = $id_kategori WHERE id = '$id' ");

if ($result) {
	header("Location: ../administrator/home.php?page=parent");
}
?>