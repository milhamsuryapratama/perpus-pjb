<?php require_once("../controller/dbcontroller.php"); ?>

<?php
$db_handle = new DBController();

$id = $_SESSION['id'];

$sql = "SELECT * from tb_user WHERE id = '$id' ";
$i = $db_handle->runQueryById($sql);


?>

<?php
if (isset($_POST['simpan'])) {
    $db_handle = new DBController();

    $id = $_POST['id'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $status = $_POST['status'];

    if (empty($password)) {
        $result = $db_handle->executeUpdate("UPDATE tb_user SET nama = '$username' WHERE id = '$id' ");
    } else {
        $result = $db_handle->executeUpdate("UPDATE tb_user SET nama = '$username', password = '" . md5($password) . "' WHERE id = '$id' ");
    }

    if ($result) {
        $alert = 'Anda baru saja mengubah password anda. Untuk login selanjutnya, silahkan menggunakan password terbaru.';
    }
}

if (isset($_POST['edit_foto'])) {
    $db_handle = new DBController();

    $id = $_POST['id'];
    //$foto = $_POST['foto_user'];

    $nama_file = $_FILES['foto_user']['name']; // Nama gambar
    $tmp_file = $_FILES['foto_user']['tmp_name']; //Lokasi gambar

    $get_foto = $db_handle->runQueryById("SELECT foto_user FROM tb_user WHERE id = '$id' ");

    if ($get_foto) {
        $result = $db_handle->executeUpdate("UPDATE tb_user SET foto_user = '$nama_file' WHERE id = '$id' ");
        move_uploaded_file("$tmp_file", "../assets/user/" . $nama_file);
        unlink("../assets/user/" . $get_foto['foto_user']);     
        $alert_foto = 'Anda baru saja mengubah foto anda. ';   
        //echo '<script>setTimeout(function(){ window.location="?page=account" }, 300)</script>';      
        echo '<script>window.location="?page=account"</script>';   
    }
}
?>

<section class="content">

    <div class="container-fluid">
        <div class="row clearfix">
            <?php if ($alert) { ?>
                <div class="alert bg-green alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <?= $alert ?>
                </div>
            <?php } else if ($alert_foto) { ?>
                <div class="alert bg-green alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <?= $alert_foto ?>
                </div>
            <?php } ?>
            <form method="post" enctype="multipart/form-data">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Your Account
                            </h2>
                        </div>
                        <div class="body">
                            <div class="row clearfix">
                                <div class="col-sm-12">
                                    <input type="hidden" name="id" value="<?= $_SESSION['id'] ?>">
                                    <input type="hidden" name="status" value="<?= $_SESSION['status'] ?>">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <label>Username</label>
                                            <input type="text" name="username" class="form-control" placeholder="Username" value="<?= $i['nama'] ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <label>Ganti Password (* Jika Perlu)</label>
                                            <input type="password" name="password" class="form-control" placeholder="Password">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary waves-effect" id="simpan" name="simpan">Update</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

            <form method="post" enctype="multipart/form-data">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Your Account
                            </h2>
                        </div>
                        <div class="body">
                            <div class="row clearfix">
                                <div class="col-sm-12">
                                    <input type="hidden" name="id" value="<?= $_SESSION['id'] ?>">
                                    <input type="hidden" name="status" value="<?= $_SESSION['status'] ?>">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <?php
                                            if ($i['foto_user'] == '') { ?>
                                                <img src="https://www.synergy-learning.com/hubfs/SynergyLearning_September2018/Images/default-1.jpg" width="400" height="200" />
                                            <?php } else { ?>
                                                <img src="../assets/user/<?= $i['foto_user'] ?>" width="400" height="200" />
                                            <?php }
                                            ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <label>Ubah Foto (Jika Perlu)</label>
                                            <input type="file" name="foto_user" class="form-control" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary waves-effect" id="simpan" name="edit_foto">Ubah Foto</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>