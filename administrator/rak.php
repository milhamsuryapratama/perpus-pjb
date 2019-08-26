<?php  
error_reporting(0);
require_once("../controller/dbcontroller.php");
$db_handle = new DBController();
$sql = "SELECT * from tb_rak ORDER BY id_rak DESC";
$faq = $db_handle->runQuery($sql);
?>
<section class="content">

	<div class="container-fluid">
		
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                        DATA RAK
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
                                    <td colspan="3">
                                        <a href="?page=tambah_rak" class="btn btn-primary waves-effect">Tambah Data</a>
                                    </td>
                                </tr>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Rak</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Rak</th>
                                    <th>Actions</th>
                                </tr>
                            </tfoot>
                            <tbody>
                            	<?php $no = 1; foreach ($faq as $i) { ?>
                            		<tr>
                            			<td><?=$no?></td>
                            			<td><?=$i['nama_rak']?></td>
                            			<td>
                            				<a href="?page=edit_rak&id=<?=$i['id_rak']?>" class="btn btn-primary waves-effect">Edit</a>
                            				<a href="../query/hapus_rak.php?id=<?=$i['id_rak']?>" class="btn btn-primary waves-effect">Hapus</a>
                                            <!-- <a onclick="confirmDelete()" class="btn btn-primary waves-effect">Hapus</a>
                                            <button onclick="confirmDelete(<?=$i['id_rak']?>)" class="btn btn-primary waves-effect">sd</button> -->
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

<!-- <script src="../assets/adminBSB/plugins/jquery/jquery.min.js"></script> -->
<!-- <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script>
    function confirmDelete(i) {
            swal("Sukses", "Menambahkan Data Rak", "success");
    }
</script> -->

