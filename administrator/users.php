<?php  
error_reporting(0);
require_once("../controller/dbcontroller.php");
$db_handle = new DBController();
$sql = "SELECT * from tb_user";
$faq = $db_handle->runQuery($sql);
?>

<section class="content">

	<div class="container-fluid">
		
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                        DATA USERS
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
                        <table class="table table-bordered table-striped table-hover js-basic-example dataTable" id="tb">                            
                            <thead>
                                <tr>
                                    <td colspan="6">
                                        <a href="?page=tambah_user" class="btn btn-primary waves-effect">Tambah Data</a>
                                    </td>
                                </tr>
                                <tr>
                                    <th>No</th>
                                    <th>Username</th>
                                    <th>Role</th>
                                    <th>Point</th>
                                    <th>Foto</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Username</th>
                                    <th>Role</th>
                                    <th>Point</th>
                                    <th>Foto</th>
                                    <th>Actions</th>
                                </tr>
                            </tfoot>
                            <tbody>
                            	<?php $no = 1; foreach ($faq as $i) { ?>
                                    <tr>
                                        <td><?=$no?></td>   
                                        <td><?=$i['nama']?></td>
                                        <td><?=$i['role']?></td>
                                        <td><?=$i['point']?></td>
                                        <td>
                                            <?php 
                                                if ($i['foto_user'] == '') { ?>
                                                    <img src="https://www.synergy-learning.com/hubfs/SynergyLearning_September2018/Images/default-1.jpg" width="100" />
                                                <?php } else { ?>
                                                    <img src="../assets/user/<?=$i['foto_user']?>" width="100" />
                                                <?php }
                                            ?>
                                        </td>
                                        <td>
                                            <a href="?page=edit_user&id=<?=$i['id']?>" class="btn btn-primary waves-effect">Edit</a>
                                            <!-- <a href="?page=hapus_user&id=<?=$i['key_karyawan']?>" class="btn btn-primary waves-effect">Hapus</a> -->
                                            <button class="btn btn-primary waves-effect" onclick="hapusUser(<?=$i['id']?>)">Hapus</button>
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
<script>
    function hapusUser(id) {
        var result = confirm("Yakin Ingin Menghapusnya ?");
        if (result) {
            $.post("../query/hapus_user.php", {id: id}, (response) => {
                // console.log(response);
                var url = window.location;
                $( "#tb" ).load(`${url} #tb` );
            })
        }        
    }
</script>