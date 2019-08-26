<?php
require_once("../controller/dbcontroller.php");
$db_handle = new DBController();

$id_parent = $_GET['id'];

$result = $db_handle->executeUpdate("DELETE FROM tb_judulparent WHERE id = '$id_parent' ");

if ($result) {
	header("Location: ../administrator/home.php?page=parent");
}
?>