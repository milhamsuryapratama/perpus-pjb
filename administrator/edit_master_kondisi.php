<?php  
require_once("../controller/dbcontroller.php");
$db_handle = new DBController();

$id = $_GET['id'];

$sql = "SELECT * from tb_master_kondisi WHERE id_master_kondisi = '$id' ";
$i = $db_handle->runQueryById($sql);
?>

<section class="content">
	
	<div class="container-fluid">
		<div class="row clearfix">
			<form method="post" enctype="multipart/form-data">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<div class="card">
						<div class="header">
							<h2>
								Edit Data Kondisi
							</h2>                    
						</div>
						<div class="body">
							<input type="hidden" name="id" value="<?=$id?>">
                        	<div class="row clearfix">
                        		<div class="col-sm-12">
                        			<div class="form-group">
                        				<div class="form-line">
                        					<label>Kondisi</label>
                        					<input type="text" name="kondisi" class="form-control" placeholder="Nama Kondisi" value="<?=$i['kondisi']?>" required>
                        				</div>
                        			</div>       
                        		</div>
                        		<div class="col-sm-12">
                        			<div class="form-group">
                        				<div class="form-line">
                        					<label>Point</label>
                        					<input type="text" name="point" class="form-control" placeholder="Pengurangan Point" value="<?=$i['point']?>" required>
                        				</div>
                        			</div>       
                        		</div>
                        		<div class="col-sm-12">
                        			<div class="form-group">
                        				<button class="btn btn-primary waves-effect" id="simpan" name="simpan">Simpan</button>                       					
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

<!-- <script src="../assets/adminBSB/plugins/jquery/jquery.min.js"></script> -->
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<!-- <script src="../assets/adminBSB/plugins/sweetalert/sweetalert.min.js"></script> -->
<?php  
	if (isset($_POST['simpan'])) {
		require_once("../controller/dbcontroller.php");
		$db_handle = new DBController();

		$kondisi = $_POST['kondisi'];
		$point = $_POST['point'];
		$id = $_POST['id'];

		$result = $db_handle->executeUpdate("UPDATE tb_master_kondisi SET kondisi = '$kondisi', point = '$point' WHERE id_master_kondisi = '$id' ");

		if ($result) {

			echo '<script>swal("Sukses", "Memperbarui Data Kondisi", "success")</script>';
			echo '<script>setTimeout(function(){ window.location="?page=master_kondisi" }, 2000)</script>';
		}
	}
?>