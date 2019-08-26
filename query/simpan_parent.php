<?php
require_once("../controller/dbcontroller.php");
$db_handle = new DBController();

$key_judul = $_POST['key_judul'];
$judul = $_POST['judul_parent'];
$id_kategori = $_POST['id_kategori'];

$result = $db_handle->executeUpdate("INSERT INTO tb_judulparent (key_judulp,judulp,id_kategori) VALUES('$key_judul','$judul','$id_kategori')");

if ($result) {
	header("Location: ../administrator/home.php?page=parent");
}
?>