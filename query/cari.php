<?php  
require_once("../controller/dbcontroller.php");
$db_handle = new DBController();

$s = $_POST['s'];

$sql = $db_handle->runQuery("SELECT * from tb_buku JOIN tb_judulparent ON tb_buku.id_judulp = tb_judulparent.id JOIN tb_kategori ON tb_judulparent.id_kategori = tb_kategori.id_kategori JOIN tb_rak ON tb_kategori.id_rak = tb_rak.id_rak WHERE tb_buku.sub_judul LIKE '%$s%' AND tb_buku.status = 'Y' ORDER BY tb_buku.id_buku DESC");

if ($sql) {
	echo json_encode($sql);
}

?>