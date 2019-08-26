<?php
require_once("../controller/dbcontroller.php");
$db_handle = new DBController();

$id = $_GET['id'];

$sql = "SELECT * from tb_user WHERE id = '$id' ";
$i = $db_handle->runQueryById($sql);
?>
<section class="content">
        <div class="container-fluid">
                <div class="row clearfix">
                        <form method="post">
                                <input type="hidden" name="id_user" value="<?= $i['id'] ?>">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                        <div class="card">
                                                <div class="header">
                                                        <h2>
                                                                Form Data User
                                                        </h2>
                                                </div>
                                                <div class="body">
                                                        <div class="row clearfix">
                                                                <div class="col-sm-12">
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
                                                                                        <label>Bidang</label>
                                                                                        <input type="text" name="bidang" class="form-control" placeholder="Bidang" value="<?= $i['bidang'] ?>">
                                                                                </div>
                                                                        </div>
                                                                </div>
                                                                <div class="col-sm-12">
                                                                        <div class="form-group">
                                                                                <div class="form-line">
                                                                                        <label>Ubah Password (Jika Perlu)</label>
                                                                                        <input type="text" name="password" class="form-control" placeholder="Password">
                                                                                </div>
                                                                        </div>
                                                                </div>
                                                                <!-- <div class="col-sm-12">
               <div class="form-group">
                       <div class="form-line">
                               <label>Foto</label>
                               <br>
                               <img src="../assets/user/<?= $i['foto_user'] ?>" alt="<?= $i['nama'] ?>" width="300">
                       </div>
               </div>
               </div> -->
                                                                <div class="col-sm-12">
                                                                        <div class="form-group">
                                                                                <button class="btn btn-primary waves-effect" id="edit" name="edit">Edit</button>
                                                                        </div>
                                                                </div>
                                                        </div>
                                                </div>
                        </form>
                </div>
        </div>
        <div class="container-fluid">
                <div class="row clearfix">
                        <form method="post" enctype="multipart/form-data">
                                <input type="hidden" name="id_user" value="<?= $i['id'] ?>">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                        <div class="card">
                                                <div class="header">
                                                        <h2>
                                                                Edit Foto User
                                                        </h2>
                                                </div>
                                                <div class="body">
                                                        <div class="row clearfix">                                         <div class="col-sm-12">
                                                                        <div class="form-group" align="center">
                                                                                <?php 
                                                                                if ($i['foto_user'] == '') { ?>
                                                                                        <img src="https://www.synergy-learning.com/hubfs/SynergyLearning_September2018/Images/default-1.jpg"  width="400" height="200"/>
                                                                                <?php } else { ?>
                                                                                        <img src="../assets/user/<?=$i['foto_user']?>"  width="400" height="200"/>
                                                                                <?php }
                                                                                ?>
                                                                        </div>
                                                                </div>

                                                                <div class="col-sm-12">
                                                                        <div class="form-group">
                                                                                <div class="form-line">
                                                                                        <label>Ubah Foto (Jika Perlu)</label>
                                                                                        <input type="file" name="foto_user" class="form-control" required>
                                                                                </div>
                                                                        </div>
                                                                </div>
                                                                <div class="col-sm-12">
                                                                        <div class="form-group">
                                                                                <button class="btn btn-primary waves-effect" id="edit_foto" name="edit_foto">Edit Foto</button>
                                                                        </div>
                                                                </div>
                                                        </div>
                                                </div>
                        </form>
                </div>
        </div>
</section>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<?php
if (isset($_POST['edit'])) {
        $db_handle = new DBController();

        $id = $_POST['id_user'];
        $username = $_POST['username'];
        $password = md5($_POST['password']);
        $bidang = $_POST['bidang'];

        // $nama_file = $_FILES['foto_user']['name'];// Nama gambar
        // $tmp_file = $_FILES['foto_user']['tmp_name'];//Lokasi gambar

        // $extensi = explode(".", $_FILES['foto_user']['name']);

        if (empty($password)) {
                $result = $db_handle->executeUpdate("UPDATE tb_user SET nama = '$username', bidang = '$bidang' WHERE id = '$id' ");
        } else {
                $result = $db_handle->executeUpdate("UPDATE tb_user SET nama = '$username', bidang = '$bidang', password = '$password' WHERE id = '$id' ");
        }

        if ($result) {
                echo '<script>swal("Sukses", "Memperbarui Data Users", "success")</script>';
                echo '<script>setTimeout(function(){ window.location="?page=users" }, 2000)</script>';
        }
}

if (isset($_POST['edit_foto'])) {
        $db_handle = new DBController();

        $id = $_POST['id_user'];
        //$foto = $_POST['foto_user'];

        $nama_file = $_FILES['foto_user']['name'];// Nama gambar
        $tmp_file = $_FILES['foto_user']['tmp_name'];//Lokasi gambar

        $get_foto = $db_handle->runQueryById("SELECT foto_user FROM tb_user WHERE id = '$id' ");
        
        if ($get_foto) {
                $result = $db_handle->executeUpdate("UPDATE tb_user SET foto_user = '$nama_file' WHERE id = '$id' ");
                move_uploaded_file("$tmp_file", "../assets/user/".$nama_file);
                unlink("../assets/user/".$get_foto['foto_user']);
                echo '<script>swal("Sukses", "Memperbarui Foto Users", "success")</script>';
                echo '<script>setTimeout(function(){ window.location="?page=users" }, 2000)</script>';
        }
}
?>