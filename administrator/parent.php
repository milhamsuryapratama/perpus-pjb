<?php  
error_reporting(0);
require_once("../controller/dbcontroller.php");
$db_handle = new DBController();
$sql = "SELECT * from tb_judulparent JOIN tb_kategori ON tb_judulparent.id_kategori = tb_kategori.id_kategori ORDER BY tb_judulparent.id DESC";
$faq = $db_handle->runQuery($sql);
?>
<section class="content">

	<div class="container-fluid">
		
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                        DATA PARENT BUKU
                    </h2>
                   <!--  <ul class="header-dropdown m-r--5">
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
                                    <td colspan="5">
                                        <a href="?page=tambah_parent" class="btn btn-primary waves-effect">Tambah Data</a>
                                    </td>
                                </tr>
                                <tr>
                                    <th>No</th>
                                    <th>Key Judul</th>
                                    <th>Judul</th>
                                    <th>Kategori</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Key Judul</th>
                                    <th>Judul</th>
                                    <th>Kategori</th>
                                    <th>Actions</th>
                                </tr>
                            </tfoot>
                            <tbody>
                            	<?php $no = 1; foreach ($faq as $i) { ?>
                            		<tr>
                            			<td><?=$no?></td>
                            			<td><?=$i['id_judulp']?></td>
                                        <td><?=$i['judulp']?></td>
                                        <td><?=$i['nm_kategori']?></td>
                            			<td>
                            				<a href="?page=edit_parent&id=<?=$i['id']?>" class="btn btn-primary waves-effect">Edit</a>
                            				<a href="../query/hapus_parent.php?id=<?=$i['id']?>" class="btn btn-primary waves-effect">Hapus</a>
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

<script src="../assets/adminBSB/plugins/jquery/jquery.min.js"></script>