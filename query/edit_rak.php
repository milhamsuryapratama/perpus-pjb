<?php
require_once("../controller/dbcontroller.php");
$db_handle = new DBController();

$id_rak = $_POST['id_rak'];
$nama_rak = $_POST['nama_rak'];

$result = $db_handle->executeUpdate("UPDATE tb_rak SET nama_rak = '$nama_rak' WHERE id_rak = '$id_rak' ");

if ($result) {
	header("Location: ../administrator/home.php?page=rak");
}
?>