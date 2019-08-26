<?php
require_once("../controller/dbcontroller.php");
$db_handle = new DBController();

$id = $_POST['id_user'];
$username = $_POST['username'];
$password = md5($_POST['password']);

if (empty($password)) {
	$result = $db_handle->executeUpdate("UPDATE tb_user SET nama = '$username' WHERE key_karyawan = '$id' ");
} else {
	$result = $db_handle->executeUpdate("UPDATE tb_user SET nama = '$username', password = '$password' WHERE key_karyawan = '$id' ");
}

if ($result) {
	header("Location: ../administrator/home.php?page=users");
}
?>