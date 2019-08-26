<?php  
require_once("../controller/dbcontroller.php");
$db_handle = new DBController();
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
                                                                <div class="col-sm-12">
                                                                        <div class="form-group">
                                                                                <div class="form-line">
                                                                                        <label>Jenis Pustaka</label>
                                                                                        <select class="form-control" name="jenis" id="jenis" onchange="getJenis()">
                                                                                                <option value="umum">Umum</option>
                                                                                                <option value="khusus">Khusus</option>
                                                                                        </select>
                                                                                </div>
                                                                        </div>       
                                                                </div>
        							<div class="col-sm-12" id="key">
        								<div class="form-group">
        									<div class="form-line">
        										<label>Key Kategori</label>
        										<input type="text" name="key_kategori" class="form-control" placeholder="Key Kategori">
        									</div>
        								</div>       
        							</div>
        							<div class="col-sm-12">
        								<div class="form-group">
        									<div class="form-line">
        										<label>Nama Kategori</label>
        										<input type="text" name="nama_kategori" class="form-control" placeholder="Nama Kategori">
        									</div>
        								</div>       
        							</div>
        							<div class="col-sm-12" id="qty">
        								<div class="form-group">
        									<div class="form-line">
        										<label>Kuantitas Box</label>
        										<input type="text" name="quantity" class="form-control" placeholder="Kuantitas Box">
        									</div>
        								</div>       
        							</div>
        							<div class="col-sm-12">
        								<div class="form-group">
        									<div class="form-line">
        										<label>Rak</label>
        										<select class="form-control" name="rak">
        											<?php foreach ($faq as $i) { ?>
        												<option value="<?=$i['id_rak']?>"><?=$i['nama_rak']?></option>
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

<script src="../assets/adminBSB/plugins/jquery/jquery.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script>
        
        $("#qty").css('display','none');
        $("#key").css('display','none');

        function getJenis() {
                var jp = $("#jenis").val();     
                
                if (jp == 'khusus') {
                        $("#qty").css('display','');
                        $("#key").css('display','');
                } else {
                        $("#qty").css('display','none');
                        $("#key").css('display','none');
                }

        }

</script>

<?php  
if (isset($_POST['simpan'])) {
       require_once("../controller/dbcontroller.php");
       $db_handle = new DBController();

       $key_kategori = $_POST['key_kategori'];
       $nama_kategori = $_POST['nama_kategori'];
       $quantity = $_POST['quantity'];
       $id_rak = $_POST['rak'];
       $jp = $_POST['jenis'];

       if ($jp == 'khusus') {
        $result = $db_handle->executeUpdate("INSERT INTO tb_kategori (key_kategori,jenis_pustaka,nm_kategori,quantitybox,id_rak) VALUES('$key_kategori','$jp','$nama_kategori','$quantity','$id_rak')");

        } else {
                $result = $db_handle->executeUpdate("INSERT INTO tb_kategori (key_kategori,jenis_pustaka,nm_kategori,quantitybox,id_rak) VALUES('0','$jp','$nama_kategori','0','$id_rak')");

        }

        if ($result) {
                echo '<script>swal("Sukses", "Menambahkan Menambahkan Data Kategori", "success")</script>';
                echo '<script>setTimeout(function(){ window.location="?page=kategori" }, 2000)</script>';
        }
}
?>