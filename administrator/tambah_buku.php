<?php  
require_once("../controller/dbcontroller.php");
$db_handle = new DBController();
$sql = "SELECT * from tb_judulparent JOIN tb_kategori ON tb_judulparent.id_kategori = tb_kategori.id_kategori";
$faq = $db_handle->runQuery($sql);
?>

<section class="content">
	<div class="container-fluid">
		<div class="row clearfix">
			<form method="post" action="../query/simpan_buku.php" enctype="multipart/form-data">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<div class="card">
						<div class="header">
							<h2>
								Form Data Buku
							</h2>                    
						</div>
						<div class="body">
                        	<div class="row clearfix">
                        		<div class="col-sm-12">
                        			<div class="form-group">
                        				<div class="form-line">
                        					<label>Sub Judul</label>
                        					<input type="text" name="sub_judul" class="form-control" placeholder="Nama Sub Judul">
                        				</div>
                        			</div>       
                        			<div class="col-sm-12">
                        				<div class="form-group">
                        					<label>Id Parent</label>
                        					<select class="form-control" name="id_parent">
                        					  <?php foreach ($faq as $i) { 
                        					  	if ($i['judulp'] == 'umum') { ?>
                        					  		<option value="<?=$i['id']?>"><?=$i['judulp']?> - <?=$i['nm_kategori']?></option>
                        					  	<?php } else { ?>
                        					  		<option value="<?=$i['id']?>"><?=$i['judulp']?></option>
                        					  	<?php }
                        					  	?>
                        					  	
                        					  <?php } ?>
                        					</select>
                        				</div>
                        			</div>  
                        			<div class="col-sm-12">
                        				<div class="form-group">
                        					<label>Tanggal Perolehan</label>
                        					<input type="date" name="tgl_perolehan" class="form-control">
                        				</div>
                        			</div>         
                        			<div class="col-sm-12">
                        				<div class="form-group">
                        					<div class="form-line"> 
                        						<label>Penerbit</label>
                        						<input type="text" name="penerbit" class="form-control" placeholder="Nama Penerbit">
                        					</div>                        					
                        				</div>
                        			</div>
                        			<div class="col-sm-12">
                        				<div class="form-group">
                        					<div class="form-line"> 
                        						<label>Pengarang</label>
                        						<input type="text" name="pengarang" class="form-control" placeholder="Nama Pengarang">
                        					</div>                        					
                        				</div>
                        			</div>       
                        			<div class="col-sm-12">
                        				<div class="form-group">
                        					<div class="form-line"> 
                        						<label>Sinopsis</label>
                        						<textarea name="sinopsis" class="form-control"></textarea>
                        					</div>                        					
                        				</div>
                        			</div>
                        			<div class="col-sm-12">
                        				<div class="form-group">
                        					<div class="form-line"> 
                        						<label>Bahasa</label>
                        						<input type="text" name="bahasa" class="form-control" placeholder="Bahasa">
                        					</div>                        					
                        				</div>
                        			</div> 
                        			<div class="col-sm-12">
                        				<div class="form-group">
                        					<div class="form-line"> 
                        						<label>Halaman</label>
                        						<input type="text" name="halaman" class="form-control" placeholder="Halaman">
                        					</div>                        					
                        				</div>
                        			</div> 
                        			<div class="col-sm-12">
                        				<div class="form-group">
                        					<div class="form-line"> 
                        						<label>Jumlah</label>
                        						<input type="number" name="jumlah" class="form-control" placeholder="Jumlah">
                        					</div>                        					
                        				</div>
                        			</div> 
                        			<div class="col-sm-12">
                        				<div class="form-group">
                        					<div class="form-line"> 
                        						<label>Tahun Terbit</label>
                        						<input type="text" name="terbit" class="form-control" placeholder="Terbit">
                        					</div>                        					
                        				</div>
                        			</div> 
                        			<div class="col-sm-12">
                        				<div class="form-group">
                        					<div class="form-line"> 
                        						<label>File</label>
                        						<input type="file" name="file_buku" class="form-control">
                        					</div>                        					
                        				</div>
                        			</div> 
                                                <div class="col-sm-12">
                                                        <div class="form-group">
                                                                <label>Tanggal Cetak</label>
                                                                <input type="date" name="tgl_cetakan" class="form-control">
                                                        </div>
                                                </div>  
                        			<div class="col-sm-12">
                        				<div class="form-group">
                        					<button class="btn btn-primary waves-effect" id="simpan" onclick="saveToDatabase()">Simpan</button>                       					
                        				</div>
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

<script src="../assets/adminBSB/plugins/jquery/jquery.min.js"></script>