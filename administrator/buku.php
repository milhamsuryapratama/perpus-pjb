<?php  
error_reporting(0);
require_once("../controller/dbcontroller.php");
$db_handle = new DBController();
$sql = "SELECT * from tb_buku JOIN tb_judulparent ON tb_buku.id_judulp = tb_judulparent.id JOIN tb_kategori ON tb_judulparent.id_kategori = tb_kategori.id_kategori JOIN tb_rak ON tb_kategori.id_rak = tb_rak.id_rak JOIN tb_user ON tb_buku.id_user = tb_user.id WHERE tb_buku.status = 'Y' ORDER BY tb_buku.id_buku DESC";
$faq = $db_handle->runQuery($sql);
?>
<section class="content">

	<div class="container-fluid">
		
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                        DATA BUKU
                    </h2>
                  <!--   <ul class="header-dropdown m-r--5">
                        <li class="dropdown">
                            <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                <i class="material-icons">more_vert</i>
                            </a>
                            <ul class="dropdown-menu pull-right">
                                <li><a href="javascript:void(0);">Action</a></li>
                                <li><a href="javascript:void(0);">Another action</a></li>
                                <li><a href="javascript:void(0);">Something else here</a></li>
                            </ul>
                        </li>
                    </ul> -->
                </div>
                <div class="body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover js-basic-example dataTable">                            
                            <thead>
                                <tr>
                                    <td colspan="8">
                                        <a href="?page=tambah_buku" class="btn btn-primary waves-effect">Tambah Data</a>
                                    </td>
                                </tr>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Jumlah</th>
                                    <th>Judul Parent</th>
                                    <th>Kategori</th>
                                    <th>Rak</th>
                                    <th>Admin</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Jumlah</th>
                                    <th>Judul Parent</th>
                                    <th>Kategori</th>
                                    <th>Rak</th>
                                    <th>Admin</th>
                                    <th>Actions</th>
                                </tr>
                            </tfoot>
                            <tbody>
                            	<?php $no = 1; foreach ($faq as $i) { ?>
                            		<tr>
                            			<td><?=$no?></td>
                            			<td><?=$i['sub_judul']?></td>
                                        <td><?=$i['jumlah']?></td>
                                        <td><?=$i['judulp']?></td>
                                        <td><?=$i['nm_kategori']?></td>
                            			<td><?=$i['nama_rak']?></td>
                                        <td><?=$i['nama']?></td>
                            			<td>
                            				<a href="?page=edit_buku&id=<?=$i['id_buku']?>" class="btn btn-primary waves-effect">Edit</a>
                            				<!-- <a href="../query/hapus_buku.php?id=<?=$i['id_buku']?>" class="btn btn-primary waves-effect">Hapus</a> -->
                                            <button type="button" class="btn btn-primary waves-effect" data-toggle="modal" data-target="#modalAlasan<?=$no?>">Hapus</button>
                                            <button type="button" class="btn btn-primary waves-effect" data-toggle="modal" data-target="#defaultModal<?=$no?>">Detail</button>
                            				<!-- <a href="#" class="btn btn-primary waves-effect">Detail</a> -->
                            				<a href="download.php?file=<?=$i['file']?>" class="btn btn-primary waves-effect">Download</a> 
                            			</td>
                            		</tr>
                            	<?php $no++; } ?>                         	
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

	</div>

</section>

<?php $n = 1; foreach ($faq as $i) { ?>
    <div class="modal fade" id="defaultModal<?=$n?>" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="defaultModalLabel"><?=$i['sub_judul']?></h4>
                </div>
                <div class="modal-body">
                    <table class="table-bordered" align="center">
                        <tr align="center">
                            <td colspan="4">
                                <?php if (strpos($i['file'], 'jpg') || strpos($i['file'], 'jpeg') || strpos($i['file'], 'png')) { ?>
                                    <img src="../assets/file/<?=$i['file']?>" width="200" height="200">
                                <?php } else { ?>
                                    <img src="../assets/img/logopdf.png" width="200" height="200">
                                <?php } ?>
                            </td>
                        </tr>
                        <tr>
                            <th>Sub Judul</th>
                            <th>Jumlah</th>
                            <th>Kategori</th>
                            <th>Jenis Buku</th>
                            <th>Rak</th>
                        </tr>
                        <tr>
                            <td><?=$i['sub_judul']?></td>
                            <td><?=$i['jumlah']?></td>
                            <td><?=$i['nm_kategori']?></td>
                            <td><?=$i['jenis_pustaka']?></td>
                            <td><?=$i['nama_rak']?></td>
                        </tr>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                </div>
            </div>
        </div>
    </div>
<?php $n++; } ?>

<?php $n = 1; foreach ($faq as $i) { ?>
    <div class="modal fade" id="modalAlasan<?=$n?>" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="defaultModalLabel"><?=$i['sub_judul']?></h4>
                </div>
                <div class="modal-body">
                    <form method="post" action="../query/alasan.php">
                        <input type="hidden" name="id_buku" value="<?=$i['id_buku']?>">
                        <textarea class="form-control" name="alasan" placeholder="Beri Alasan Mengapa Buku Ini Akan Dihapus ?" required></textarea>
                        <button type="submit" name="hapus">Hapus</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                </div>
            </div>
        </div>
    </div>
<?php $n++; } ?>
