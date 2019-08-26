<?php
require_once("../controller/dbcontroller.php");
$db_handle = new DBController();

$nama_rak = $_POST['nama_rak'];

$result = $db_handle->executeUpdate("INSERT INTO tb_rak (nama_rak) VALUES('$nama_rak')");

if ($result) {
	header("Location: ../administrator/home.php?page=rak");
}
?>