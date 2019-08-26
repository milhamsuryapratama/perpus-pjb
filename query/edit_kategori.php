<?php
require_once("../controller/dbcontroller.php");
$db_handle = new DBController();

$id_kategori = $_POST['id_kategori'];
$key_kategori = $_POST['key_kategori'];
$nama_kategori = $_POST['nama_kategori'];
$quantity = $_POST['quantity'];
$id_rak = $_POST['rak'];

$result = $db_handle->executeUpdate("UPDATE tb_kategori SET key_kategori = '$key_kategori', nm_kategori = '$nama_kategori', quantitybox = '$quantity', id_rak = '$id_rak' WHERE id_kategori = '$id_kategori' ");

if ($result) {
	header("Location: ../administrator/home.php?page=kategori");
}
?>