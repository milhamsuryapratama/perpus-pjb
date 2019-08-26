<?php  
require_once("../controller/dbcontroller.php");
$db_handle = new DBController();
$sql = "SELECT * from tb_kategori";
$faq = $db_handle->runQuery($sql);

$id = $_GET['id'];

$sql1 = "SELECT * from tb_judulparent WHERE id = '$id' ";
$i = $db_handle->runQueryById($sql1);
?>

<section class="content">

        <div class="container-fluid">
                <div class="row clearfix">
                        <form method="post">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="card">
                                                <div class="header">
                                                        <h2>
                                                                Form Data Parent
                                                        </h2>                    
                                                </div>
                                                <div class="body">
                                                        <div class="row clearfix">
                                                            <input type="hidden" name="id_parent" value="<?=$i['id']?>">
                                                                <div class="col-sm-12">
                                                                        <div class="form-group">
                                                                                <div class="form-line">
                                                                                        <label>Key Judul</label>
                                                                                        <input type="text" name="key_judul" class="form-control" placeholder="Key Judul" value="<?=$i['id_judulp']?>">
                                                                                </div>
                                                                        </div>       
                                                                </div>
                                                                <div class="col-sm-12">
                                                                        <div class="form-group">
                                                                                <div class="form-line">
                                                                                        <label>Judul</label>
                                                                                        <input type="text" name="judul_parent" class="form-control" placeholder="Judul" value="<?=$i['judulp']?>">
                                                                                </div>
                                                                        </div>       
                                                                </div>
                                                                <div class="col-sm-12">
                                                                        <div class="form-group">
                                                                                <div class="form-line">
                                                                                        <label>Kategori</label>
                                                                                        <select class="form-control" name="id_kategori">
                                                        <?php foreach ($faq as $a) {
                                                            if ($a['id_kategori'] == $i['id_kategori']) { ?>
                                                                <option value="<?=$a['id_kategori']?>" selected><?=$a['nm_kategori']?></option>
                                                            <?php } else { ?>
                                                                <option value="<?=$a['id_kategori']?>"><?=$a['nm_kategori']?></option>
                                                            <?php }
                                                        } ?>
                                                                                        </select>
                                                                                </div>
                                                                        </div>       
                                                                </div>
                                                                <div class="col-sm-12">
                                                                        <div class="form-group">
                                                                                <button class="btn btn-primary waves-effect" id="edit" name="edit">Edit</button>         
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

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<?php  
if (isset($_POST['edit'])) {
    require_once("../controller/dbcontroller.php");
    $db_handle = new DBController();

    $id = $_POST['id_parent'];
    $id_judulp = $_POST['key_judul'];
    $judul = $_POST['judul_parent'];
    $id_kategori = $_POST['id_kategori'];

    $result = $db_handle->executeUpdate("UPDATE tb_judulparent SET id_judulp = '$id_judulp', judulp = '$judul', id_kategori = $id_kategori WHERE id = '$id' ");

    if ($result) {
        echo '<script>swal("Sukses", "Menambahkan Memperbarui Data Parent", "success")</script>';
        echo '<script>setTimeout(function(){ window.location="?page=parent" }, 2000)</script>';
    }
}
?>