<?php
require_once("../controller/dbcontroller.php");
$db_handle = new DBController();

$id_kategori = $_POST['id'];

$result = $db_handle->executeUpdate("DELETE FROM tb_kategori WHERE id_kategori = '$id_kategori' ");

if ($result) {
	echo "sukses";
}
?>