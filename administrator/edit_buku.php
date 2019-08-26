<?php  
require_once("../controller/dbcontroller.php");
$db_handle = new DBController();
$id = $_GET['id'];

$sql1 = "SELECT * from tb_buku WHERE id_buku = '$id' ";
$i = $db_handle->runQueryById($sql1);

$sql = "SELECT * from tb_judulparent JOIN tb_kategori ON tb_judulparent.id_kategori = tb_kategori.id_kategori";
$faq = $db_handle->runQuery($sql);
?>

<section class="content">

    <div class="container-fluid">
        <div class="row clearfix">
            <form method="post" action="../query/edit_buku.php" enctype="multipart/form-data">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                EDIT BUKU
                            </h2>                    
                        </div>
                        <div class="body">
                            <div class="row clearfix">
                                <input type="hidden" name="id_buku" value="<?=$i['id_buku']?>">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <label>Sub Judul</label>
                                            <input type="text" name="sub_judul" class="form-control" placeholder="Nama Sub Judul" value="<?=$i['sub_judul']?>">
                                        </div>
                                    </div>       
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label>Id Parent</label>
                                            <select class="form-control" name="id_parent">
                                              <?php foreach ($faq as $a) { 
                                                if ($a['judulp'] == 'umum') { 
                                                    if ($a['id'] == $i['id_judulp']) { ?>
                                                        <option value="<?=$a['id']?>" selected><?=$a['judulp']?> - <?=$a['nm_kategori']?></option>
                                                    <?php }
                                                    ?>
                                                    
                                                <?php } else { ?>
                                                    <option value="<?=$a['id']?>"><?=$a['judulp']?></option>
                                                <?php }
                                                ?>
                                                
                                              <?php } ?>
                                        </select>
                                    </div>
                                </div>  
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Tanggal Perolehan</label>
                                        <input type="date" name="tgl_perolehan" class="form-control" value="<?=$i['tgl_perolehan']?>">
                                    </div>
                                </div>         
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <div class="form-line"> 
                                            <label>Penerbit</label>
                                            <input type="text" name="penerbit" class="form-control" placeholder="Nama Penerbit" value="<?=$i['penerbit']?>">
                                        </div>                                                          
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <div class="form-line"> 
                                            <label>Pengarang</label>
                                            <input type="text" name="pengarang" class="form-control" placeholder="Nama Pengarang" value="<?=$i['pengarang']?>">
                                        </div>                                                          
                                    </div>
                                </div>       
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <div class="form-line"> 
                                            <label>Sinopsis</label>
                                            <textarea name="sinopsis" class="form-control"><?=$i['sinopsis']?></textarea>
                                        </div>                                                          
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <div class="form-line"> 
                                            <label>Bahasa</label>
                                            <input type="text" name="bahasa" class="form-control" placeholder="Bahasa" value="<?=$i['bahasa']?>">
                                        </div>                                                          
                                    </div>
                                </div> 
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <div class="form-line"> 
                                            <label>Halaman</label>
                                            <input type="text" name="halaman" class="form-control" placeholder="Halaman" value="<?=$i['halaman']?>">
                                        </div>                                                          
                                    </div>
                                </div> 
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <div class="form-line"> 
                                            <label>Jumlah</label>
                                            <input type="number" name="jumlah" class="form-control" placeholder="Jumlah" value="<?=$i['jumlah']?>">
                                        </div>                                                          
                                    </div>
                                </div> 
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <div class="form-line"> 
                                            <label>Tahun Terbit</label>
                                            <input type="text" name="terbit" class="form-control" placeholder="Terbit" value="<?=$i['th_terbit']?>">
                                        </div>                                                          
                                    </div>
                                </div> 
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <div class="form-line"> 
                                            <label>ganti File *Jika Perlu</label>
                                            <input type="file" name="file" class="form-control">
                                            <small>file saat ini <a href="../assets/file/<?=$i['file']?>">disini</a></small>
                                        </div>                                                          
                                    </div>
                                </div> 
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Tanggal Cetak</label>
                                        <input type="date" name="tgl_cetakan" class="form-control" value="<?=$i['tgl_cetakan']?>">
                                    </div>
                                </div>  
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <button class="btn btn-primary waves-effect" id="simpan" onclick="saveToDatabase()">Simpan</button>                                                             
                                    </div>
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

<script src="../assets/adminBSB/plugins/jquery/jquery.min.js"></script>