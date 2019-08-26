<?php  
require_once("../controller/dbcontroller.php");
$db_handle = new DBController();

$id = $_GET['id'];

$sql1 = "SELECT * from tb_rak WHERE id_rak = '$id' ";
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
								Form Data Buku
							</h2>                    
						</div>
						<div class="body">
                        	<div class="row clearfix">
                        		<input type="hidden" name="id_rak" value="<?=$i['id_rak']?>">
                        		<div class="col-sm-12">
                        			<div class="form-group">
                        				<div class="form-line">
                        					<label>Nama Rak</label>
                        					<input type="text" name="nama_rak" class="form-control" placeholder="Nama Rak" value="<?=$i['nama_rak']?>">
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
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<?php  
	if (isset($_POST['simpan'])) {
		$db_handle = new DBController();

		$id_rak = $_POST['id_rak'];
		$nama_rak = $_POST['nama_rak'];

		$result = $db_handle->executeUpdate("UPDATE tb_rak SET nama_rak = '$nama_rak' WHERE id_rak = '$id_rak' ");

		if ($result) {
			echo '<script>swal("Sukses", "Menambahkan Memperbarui Data Rak", "success")</script>';
			echo '<script>setTimeout(function(){ window.location="?page=rak" }, 2000)</script>';
		}
	}
?>