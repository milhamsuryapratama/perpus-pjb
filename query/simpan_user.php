<?php
require_once("../controller/dbcontroller.php");
$db_handle = new DBController();

$username = $_POST['username'];
$password = md5($_POST['password']);
$role = $_POST['role'];

$result = $db_handle->executeUpdate("INSERT INTO tb_user (nama,password,role) VALUES('$username','$password','$role')");

if ($result) {
	header("Location: ../administrator/home.php?page=users");
}
?>