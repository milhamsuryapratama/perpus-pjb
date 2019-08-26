<?php  
require_once("../controller/dbcontroller.php");
$db_handle = new DBController();

$id = $_POST['id'];

$result = $db_handle->runQuery("SELECT * FROM tb_judulparent WHERE id_kategori = '$id' ");

if ($result) {
	echo json_encode($result);
}
?>