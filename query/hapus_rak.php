<?php
require_once("../controller/dbcontroller.php");
$db_handle = new DBController();

$id_rak = $_GET['id'];

$result = $db_handle->executeUpdate("DELETE FROM tb_rak WHERE id_rak = '$id_rak' ");

if ($result) {
	header("Location: ../administrator/home.php?page=rak");
}
?>