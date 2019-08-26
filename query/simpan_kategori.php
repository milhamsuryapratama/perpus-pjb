<?php
require_once("../controller/dbcontroller.php");
$db_handle = new DBController();

$key_kategori = $_POST['key_kategori'];
$nama_kategori = $_POST['nama_kategori'];
$quantity = $_POST['quantity'];
$id_rak = $_POST['rak'];
$jp = $_POST['jenis'];

if ($jp == 'khusus') {
	$result = $db_handle->executeUpdate("INSERT INTO tb_kategori (key_kategori,jenis_pustaka,nm_kategori,quantitybox,id_rak) VALUES('$key_kategori','$jp','$nama_kategori','$quantity','$id_rak')");

} else {
	$result = $db_handle->executeUpdate("INSERT INTO tb_kategori (key_kategori,jenis_pustaka,nm_kategori,quantitybox,id_rak) VALUES('0','$jp','$nama_kategori','0','$id_rak')");

}

if ($result) {
	header("Location: ../administrator/home.php?page=kategori");
}
?>