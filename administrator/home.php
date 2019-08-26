<?php  
session_start();
if ($_SESSION['login_user'] !== true) { // logger user,
	header("Location: ../");
} else { ?>
	<?php include "../component/header.php" ?>

<?php include "../component/navs.php" ?>

<?php include "../component/sidebar.php" ?>

	<?php 
		error_reporting(0);
		if ($_GET['page'] == "buku") { 
			include "buku.php";
		} else if ($_GET['page'] == "tambah_buku") {
			include "tambah_buku.php";
		} else if ($_GET['page'] == "edit_buku") {
			include "edit_buku.php";
		} else if ($_GET['page'] == "hapus_buku") {
			include "../query/hapus_buku.php";
		} else if ($_GET['page'] == "rak") {
			include 'rak.php';
		} else if ($_GET['page'] == "tambah_rak") {
			include "tambah_rak.php";
		} else if ($_GET['page'] == "edit_rak") {
			include "edit_rak.php";
		} else if ($_GET['page'] == "hapus_rak") {
			include "../query/hapus_rak.php";
		} else if ($_GET['page'] == "kategori") {
			include "kategori.php";
		} else if ($_GET['page'] == "tambah_kategori") {
			include "tambah_kategori.php";
		} else if ($_GET['page'] == "edit_kategori") {
			include "edit_kategori.php";
		} else if ($_GET['page'] == "hapus_kategori") {
			include "../query/hapus_kategori.php";
		} else if ($_GET['page'] == "parent") {
			include "parent.php";
		} else if ($_GET['page'] == "tambah_parent") {
			include "tambah_parent.php";
		} else if ($_GET['page'] == "edit_parent") {
			include "edit_parent.php";
		} else if ($_GET['page'] == "hapus_parent") {
			include "../query/hapus_parent.php";
		} else if ($_GET['page'] == "account") {
			include "account.php";
		} else if ($_GET['page'] == "upload") {
			include "upload.php";
		} else if ($_GET['page'] == "users") {
			include "users.php";
		} else if ($_GET['page'] == "dashboard") {
			include "dashboard.php";
		} else if ($_GET['page'] == "tambah_user") {
			include "tambah_user.php";
		} else if ($_GET['page'] == "edit_user") {
			include "edit_user.php";
		} else if ($_GET['page'] == "keluar") {
			include "../query/keluar.php";
		} else if ($_GET['page'] == "cari") {
			include "../query/cari.php";
		} else if ($_GET['page'] == "history") {
			include "history.php";
		} else if ($_GET['page'] == "tambah_transaksi") {
			include "tambah_transaksi.php";
		} else if ($_GET['page'] == "transaksi") {
			include "transaksi.php";
		} else if ($_GET['page'] == "kembalikan_buku") {
			include "kembalikan_buku.php";
		} else if ($_GET['page'] == "master_kondisi") {
			include "master_kondisi.php";
		} else if ($_GET['page'] == "tambah_master_kondisi") {
			include "tambah_master_kondisi.php";
		} else if ($_GET['page'] == "edit_master_kondisi") {
			include "edit_master_kondisi.php";
		}

		else {
			include "dashboard.php";
		}
	?>

<?php include "../component/footer.php" ?>

<?php }
?>