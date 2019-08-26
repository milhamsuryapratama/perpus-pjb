<?php
require_once("../controller/dbcontroller.php");
$db_handle = new DBController();

$id = $_POST['id'];

$result = $db_handle->executeUpdate("DELETE FROM tb_master_kondisi WHERE id_master_kondisi = '$id' ");

if ($result) {
	echo "sukses";
}
?>