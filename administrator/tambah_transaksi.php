<?php  
require_once("../controller/dbcontroller.php");
$db_handle = new DBController();
$sql = "SELECT * from tb_buku WHERE status = 'Y' ORDER BY id_buku DESC ";
$faq = $db_handle->runQuery($sql);
?>
<section class="content">
	
	<div class="container-fluid">
		<div class="row clearfix">
			<!-- <form method="post" enctype="multipart/form-data"> -->
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<div class="card">
						<div class="header">
							<h2>
								Form Data Transaksi
							</h2>                    
						</div>
						<div class="body">
                        	<div class="row clearfix" id="clearfix">
                        		<div class="col-sm-12">
                        			<div class="form-group">
                        				<div class="form-line">
                        					<label>Id Peminjam</label>
                        					<input type="text" name="id_peminjam" id="id_peminjam" class="form-control" placeholder="Id Peminjam" required>
                        				</div>
                        			</div>       
                        		</div>
                        		<div class="col-sm-12">
                        			<div class="form-group">
                        				<div class="form-line">
                        					<label>Nama Peminjam</label>
                        					<input type="text" name="nama_peminjam" id="nama_peminjam" class="form-control" placeholder="Nama Peminjam" required readonly>
                        				</div>
                        			</div>       
                        		</div>
                        		<div class="col-sm-12">
                        			<div class="form-group">
                        				<div class="form-line">
                        					<label>Bidang</label>
                        					<input type="text" name="bidang" id="bidang" class="form-control" placeholder="Bidang" required readonly>
                        				</div>
                        			</div>       
                        		</div>
                        		<div class="col-sm-12" id="dataBuku">
                        			<div class="form-group" id="data">
                        				<div class="form-line">
                        					<label>Buku</label>
                        					<select class="form-control" name="buku[]" id="buku" required>
                        						<?php foreach ($faq as $i) {  ?>
                        							<option value="<?=$i['id_buku']?>"><?=$i['sub_judul']?></option>
                        						<?php } ?>
                        					</select>
                        				</div>
                        			</div>       
                        		</div>
                        		<button id="tambah" onclick="tambahBuku()">Tambah</button>
                        		<br>
                        		<br>
								<!-- <div class="col-sm-12">
									<div class="demo-radio-button">
											<label>Kodisi Sampul</label>
											<input name="sampul" type="radio" id="radio_1" value="Y">
											<label for="radio_1">Baik</label>
											<input name="sampul" type="radio" id="radio_2" value="N">
											<label for="radio_2">Tidak Baik</label>
                            		</div>  
									<div class="demo-radio-button">
											
											<label>Kodisi Coretan</label>
											<input name="coretan" type="radio" id="radio_3" value="Y">
											<label for="radio_3">Ada</label>
											<input name="coretan" type="radio" id="radio_4" value="N">
											<label for="radio_4">Tidak Ada</label>
                            		</div>  
									<div class="demo-radio-button">
											
											<label>Kodisi Lipatan</label>
											<input name="lipatan" type="radio" id="radio_5" value="Y">
											<label for="radio_5">Ada</label>
											<input name="lipatan" type="radio" id="radio_6" value="N">
											<label for="radio_6">Tidak Ada</label>
                            		</div>        
                        		</div>
 -->                        		<div class="col-sm-12">
                        			<div class="form-group">
                        				<button class="btn btn-primary waves-effect" id="simpan" name="simpan" onclick="getMax()">Simpan</button>                       					
                        			</div>
                        		</div> 
                        	</div>
                        </div>
					</div>
				</div>
			<!-- </form> -->
			<!-- <button class="btn btn-primary waves-effect" id="simpan" name="simpan" onclick="getMax()">Simpan</button>    -->
		</div>
	</div>
</section>

<script src="../assets/adminBSB/plugins/jquery/jquery.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<!-- <script src="../assets/adminBSB/plugins/sweetalert/sweetalert.min.js"></script> -->


<script>
	function getMax() {
		var arr = [];
		let id_peminjam = $("#id_peminjam").val();

		$('select[name="buku[]"]').each(function() {
			arr.push($(this).val());			
		});

		console.log(arr);
		$.post('../query/simpan_transaksi.php', {id_peminjam: id_peminjam}, (result) => {
			let max_id = JSON.parse(result);
			$.post('../query/simpan_transaksi_detail.php', {buku: arr, id_transaksi: max_id.id_transaksi}, (result) => {
				swal("Sukses", "Menambahkan Menambahkan Data Transaksi dan Mendapatkan Penambahan Point", "success");
				setTimeout(function(){ window.location="?page=transaksi" }, 2000)
			});
			//console.log(max_id.id_transaksi);
		});
		//console.log(b);
		// let id_peminjam = $("#id_peminjam").val();
		// let nama_peminjam = $("#nama_peminjam").val();
		// let bidang = $("#bidang").val();
		// let buku = $("#buku").val();
		// let sampul = $("input[name='sampul']:checked").val();
		// let coretan = $("input[name='coretan']:checked").val();
		// let lipatan = $("input[name='lipatan']:checked").val();

		// $.post('../query/simpan_transaksi.php', {id_peminjam: id_peminjam, nama_peminjam: nama_peminjam, bidang: bidang, buku: buku}, (result) => {
		// 	$.post('../query/simpan_kondisi.php', {sampul: sampul, coretan: coretan, lipatan: lipatan}, (result) => {
		// 		$.get('../query/getMaxKondisi.php', {}, (result) => {
		// 			var kondisi = JSON.parse(result);
		// 			var id_kondisi = kondisi.id_kondisi;					
		// 			$.get('../query/getMaxTransaksi.php', {}, (result) => {
		// 				var trx = JSON.parse(result);
		// 				var id_trx = trx.id_transaksi;	
		// 				$.post('../query/update_transaksi.php', {id_kondisi: id_kondisi, id_transaksi: id_trx}, (result) => {
		// 					swal("Sukses", "Menambahkan Data Transaksi", "success");
		// 					setTimeout(() => {
  //                           	window.location.href = '?page=transaksi';
  //                       	}, 3000);
		// 				})						
		// 			})
		// 		})											
		// 	})
		// })	
	}

	function tambahBuku() {
		$("#data").append(`
			<div class="form-group">
				<div class="form-line">
					<label>Buku</label>
						<select class="form-control" name="buku[]" id="buku" required>
							<?php foreach ($faq as $i) {  ?>
								<option value="<?=$i['id_buku']?>"><?=$i['sub_judul']?></option>
							<?php } ?>
						</select>
				</div>
			</div>  
		`);
	}

	$(function() {
		$("#simpan").attr('disabled', false);

		$("#id_peminjam").on('keydown', function(e) {
           if(e.which == 13) {
                let id_peminjam = $("#id_peminjam").val();
                $.post("../query/get_nama_peminjam.php", {id_peminjam: id_peminjam}, (result) => {										
					console.log(result);
                    if (result === "error") {
                        alert("ID TIDAK DITEMUKAN");
						$("#simpan").attr('disabled', true);
                        $("#nama_peminjam").val("");
						$("#bidang").val("");
                    } else {		
						let parseResult = JSON.parse(result);				
                        $("#simpan").attr('disabled', false);
                        $("#nama_peminjam").val(parseResult.nama);
						$("#bidang").val(parseResult.bidang);
                    }                    
                })
            }
        })
	})
</script>