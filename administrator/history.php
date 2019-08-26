<?php  
error_reporting(0);
require_once("../controller/dbcontroller.php");
$db_handle = new DBController();
$sql = "SELECT * from tb_alasan JOIN tb_buku ON tb_alasan.id_buku = tb_buku.id_buku JOIN tb_user ON tb_alasan.user = tb_user.id ORDER BY tb_alasan.id_alasan DESC";
$faq = $db_handle->runQuery($sql);
?>
<section class="content">

	<div class="container-fluid">
		
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                        DATA HISTORY
                    </h2>
                </div>
                <div class="body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover js-basic-example dataTable">                            
                            <thead>
                                <!-- <tr>
                                    <td colspan="4">
                                        <a href="?page=tambah_rak" class="btn btn-primary waves-effect">Tambah Data</a>
                                    </td>
                                </tr> -->
                                <tr>
                                    <th>No</th>
                                    <th>Nama Buku</th>
                                    <th>Petugas</th>
                                    <th>Alasan</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Buku</th>
                                    <th>Petugas</th>
                                    <th>Alasan</th>
                                </tr>
                            </tfoot>
                            <tbody>
                            	<?php $no = 1; foreach ($faq as $i) { ?>
                            		<tr>
                            			<td><?=$no?></td>
                            			<td><?=$i['sub_judul']?></td>
                                        <td><?=$i['nama']?></td>
                                        <td><?=$i['alasan']?></td>
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