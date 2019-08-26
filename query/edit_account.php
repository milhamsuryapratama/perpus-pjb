<?php  
require_once("../controller/dbcontroller.php");
$db_handle = new DBController();

$id = $_POST['id'];
$username = $_POST['username'];
$password = $_POST['password'];
$status = $_POST['status'];

if ($status == 'admin') {
	if (empty($password)) {	
		$result = $db_handle->executeUpdate("UPDATE tb_admin SET nama = '$username' WHERE id = '$id' ");
	} else {
		$result = $db_handle->executeUpdate("UPDATE tb_admin SET nama = '$username', password = '$password' WHERE id = '$id' ");
	}
} else {
	if (empty($password)) {	
		$result = $db_handle->executeUpdate("UPDATE tb_user SET nama = '$username' WHERE key_karyawan = '$id' ");
	} else {
		$result = $db_handle->executeUpdate("UPDATE tb_user SET nama = '$username', password = '$password' WHERE key_karyawan = '$id' ");
	}
}

if ($result) {
	$alert='<div class="alert alert-danger">Sorry there was an error sending your message. Please try again later</div>';
	header("Location: ../administrator/home.php?page=account");
}
?>