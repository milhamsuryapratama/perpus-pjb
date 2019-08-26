<?php  
require_once("../controller/dbcontroller.php");
$db_handle = new DBController();

$id_kategori = $_POST['id'];

$result = $db_handle->runQuery("SELECT * FROM tb_judulparent WHERE id_kategori = '$id_kategori' ");

if ($result) {
	echo json_encode($result);
}
?>