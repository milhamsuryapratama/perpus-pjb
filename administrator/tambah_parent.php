<?php  
require_once("../controller/dbcontroller.php");
$db_handle = new DBController();
$sql = "SELECT * from tb_kategori";
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
								Form Data Parent
							</h2>                    
						</div>
						<div class="body">
                        	<div class="row clearfix">
                        		<div class="col-sm-12">
                        			<div class="form-group">
                        				<div class="form-line">
                        					<label>Key Judul</label>
                        					<input type="text" name="key_judul" class="form-control" placeholder="Key Judul">
                        				</div>
                        			</div>       
                        		</div>
                        		<div class="col-sm-12">
                        			<div class="form-group">
                        				<div class="form-line">
                        					<label>Judul</label>
                        					<input type="text" name="judul_parent" class="form-control" placeholder="Judul">
                        				</div>
                        			</div>       
                        		</div>
                        		<div class="col-sm-12">
        								<div class="form-group">
        									<div class="form-line">
        										<label>Kategori</label>
        										<select class="form-control" name="id_kategori">
        											<?php foreach ($faq as $i) { ?>
        												<option value="<?=$i['id_kategori']?>"><?=$i['nm_kategori']?></option>
        											<?php } ?>
        										</select>
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
        $id_judulp = $_POST['key_judul'];
        $judul = $_POST['judul_parent'];
        $id_kategori = $_POST['id_kategori'];

        $result = $db_handle->executeUpdate("INSERT INTO tb_judulparent (id_judulp,judulp,id_kategori) VALUES('$id_judulp','$judul','$id_kategori')");

        if ($result) {
                echo '<script>swal("Sukses", "Menambahkan Menambahkan Data Parent", "success")</script>';
                echo '<script>setTimeout(function(){ window.location="?page=parent" }, 2000)</script>';
        }
}
?>