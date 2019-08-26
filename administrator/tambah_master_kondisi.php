
<section class="content">
	
	<div class="container-fluid">
		<div class="row clearfix">
			<form method="post" enctype="multipart/form-data">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<div class="card">
						<div class="header">
							<h2>
								Form Data Kondisi
							</h2>                    
						</div>
						<div class="body">
                        	<div class="row clearfix">
                        		<div class="col-sm-12">
                        			<div class="form-group">
                        				<div class="form-line">
                        					<label>Kondisi</label>
                        					<input type="text" name="kondisi" class="form-control" placeholder="Nama Kondisi" required>
                        				</div>
                        			</div>       
                        		</div>
                        		<div class="col-sm-12">
                        			<div class="form-group">
                        				<div class="form-line">
                        					<label>Point</label>
                        					<input type="text" name="point" class="form-control" placeholder="Pengurangan Point" required>
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

		$result = $db_handle->executeUpdate("INSERT INTO tb_master_kondisi (kondisi, point) VALUES('$kondisi', '$point')");

		if ($result) {

			echo '<script>swal("Sukses", "Menambahkan Data Kondisi", "success")</script>';
			echo '<script>setTimeout(function(){ window.location="?page=master_kondisi" }, 2000)</script>';
		}
	}
?>