<?php  
require_once("../controller/dbcontroller.php");
$db_handle = new DBController();

$id = $_GET['id'];

$sql1 = "SELECT * from tb_kategori WHERE id_kategori = '$id' ";
$i = $db_handle->runQueryById($sql1);

$sql = "SELECT * from tb_rak";
$faq = $db_handle->runQuery($sql);
?>

<section class="content">
	<div class="container-fluid">
		<div class="row clearfix">
			<form method="post">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<div class="card">
						<div class="header">
							<h2>
								Form Data Kategori
							</h2>                    
						</div>
						<div class="body">
                        	<div class="row clearfix">
                        		<input type="hidden" name="id_kategori" value="<?=$i['id_kategori']?>">
                        		<div class="col-sm-12">
                        			<div class="form-group">
                        				<div class="form-line">
                        					<label>Key Kategori</label>
                        					<input type="text" name="key_kategori" class="form-control" placeholder="Key Kategori" value="<?=$i['key_kategori']?>">
                        				</div>
                        			</div>       
                        		</div>
                        		<div class="col-sm-12">
                        			<div class="form-group">
                        				<div class="form-line">
                        					<label>Nama Kategori</label>
                        					<input type="text" name="nama_kategori" class="form-control" placeholder="Nama Kategori" value="<?=$i['nm_kategori']?>">
                        				</div>
                        			</div>       
                        		</div>
                        		<div class="col-sm-12">
                        			<div class="form-group">
                        				<div class="form-line">
                        					<label>Kuantitas Box</label>
                        					<input type="text" name="quantity" class="form-control" placeholder="Kuantitas Box" value="<?=$i['quantitybox']?>">
                        				</div>
                        			</div>       
                        		</div>
                        		<div class="col-sm-12">
                        			<div class="form-group">
                        				<div class="form-line">
                        					<label>Rak</label>
                        					<select class="form-control" name="rak">
                        					  <?php foreach ($faq as $a) { 
                        					  	if ($a['id_rak'] == $i['id_rak']) { ?>
                        					  		<option value="<?=$a['id_rak']?>" selected><?=$a['nama_rak']?></option>
                        					  	<?php } else { ?>
                        					  		<option value="<?=$a['id_rak']?>"><?=$a['nama_rak']?></option>
                        					  	<?php } ?>                        					  	
                        					  <?php } ?>
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
                $db_handle = new DBController();

                $id_kategori = $_POST['id_kategori'];
                $key_kategori = $_POST['key_kategori'];
                $nama_kategori = $_POST['nama_kategori'];
                $quantity = $_POST['quantity'];
                $id_rak = $_POST['rak'];

                $result = $db_handle->executeUpdate("UPDATE tb_kategori SET key_kategori = '$key_kategori', nm_kategori = '$nama_kategori', quantitybox = '$quantity', id_rak = '$id_rak' WHERE id_kategori = '$id_kategori' ");

                if ($result) {
                        echo '<script>swal("Sukses", "Menambahkan Memperbarui Data Kategori", "success")</script>';
                        echo '<script>setTimeout(function(){ window.location="?page=kategori" }, 2000)</script>';
                }
        }
?>