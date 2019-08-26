<?php  
require_once("../controller/dbcontroller.php");
$db_handle = new DBController();

$id = $_POST['id'];

$result = $db_handle->runQueryById("SELECT * FROM tb_buku JOIN tb_judulparent ON tb_buku.id_judulp = tb_judulparent.id JOIN tb_kategori ON tb_judulparent.id_kategori = tb_kategori.id_kategori JOIN tb_rak  WHERE id_buku = '$id' ");

if ($result) {
	echo json_encode($result);
}
?>