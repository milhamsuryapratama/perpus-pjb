<?php  
error_reporting(0);
require_once("../controller/dbcontroller.php");
$db_handle = new DBController();
$sql = "SELECT * from tb_kategori WHERE jenis_pustaka = 'umum' ";
$faq = $db_handle->runQuery($sql);

$judul_query = "SELECT * FROM tb_judulparent WHERE judulp = 'umum' ";
$j = $db_handle->runQuery($judul_query);

$parent_query = "SELECT * FROM tb_kategori WHERE jenis_pustaka = 'khusus' ";
$prnt = $db_handle->runQuery($parent_query);

$date = date("Y-m-d");
$d = date_parse_from_format("Y-m-d", $date);

$sql = "SELECT * from tb_buku JOIN tb_judulparent ON tb_buku.id_judulp = tb_judulparent.id JOIN tb_kategori ON tb_judulparent.id_kategori = tb_kategori.id_kategori JOIN tb_rak ON tb_kategori.id_rak = tb_rak.id_rak WHERE tb_buku.status = 'Y' AND tb_kategori.jenis_pustaka = 'umum' ORDER BY tb_buku.tgl_cetakan DESC";
$res = $db_handle->runQuery($sql);
?>

<section class="content" id="content">
	<h2 align="center">SELAMAT DATANG</h2>
	<div class="card">
		<div class="header">
			<h2>DATA BUKU TERBARU</h2>
			<ul class="header-dropdown m-r--5">
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
			</ul>
		</div>
		<div class="body">
			<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
				<!-- Indicators -->
				<ol class="carousel-indicators">
					<?php for ($i=0; $i < count($res); $i++) { ?>
						<li data-target="#carousel-example-generic" data-slide-to="<?=$i?>"></li>
					<?php } ?>
					
				</ol>

				<!-- Wrapper for slides -->
				<div class="carousel-inner" role="listbox">
				<?php for ($i=0; $i < 1; $i++) { ?>
					<div class="item active">
						<center><img src="../assets/file/<?=$res[$i]['file']?>" width="500" height="300" />
							<div class="carousel-caption">
                                <h3><?=$res[$i]['sub_judul']?></h3>
                            </div>
						</center>
					</div>
				<?php } ?>
				<?php for ($i=1; $i < count($res); $i++) { ?>
					<div class="item">
						<center><img src="../assets/file/<?=$res[$i]['file']?>" width="500" height="300" />
						<div class="carousel-caption">
                                            <h3><?=$res[$i]['sub_judul']?></h3>
                                        </div>
						</center>
					</div>
				<?php } ?>
				</div>			

				<!-- Controls -->
				<a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
					<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
					<span class="sr-only">Previous</span>
				</a>
				<a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
					<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
					<span class="sr-only">Next</span>
				</a>
			</div>
		</div>
	</div>
	
	<div align="center">
		<input type="text" name="s" id="s" class="form-control" style="width: 30%; display: inline-block;" onkeypress="return cariBukuForm(event)"> <button name="cari" onclick="cariBuku()" class="btn">Cari</button>
	</div>
	<div class="clearfix m-b-20" id="clear">		

		<div class="dd">
			<ol class="dd-list">
				<li class="dd-item dd-collapsed" data-id="2">
					<div class="dd-handle">Jenis Pustaka</div>
					<ol class="dd-list" style="display: none;">

						<li class="dd-item" data-id="3">
							<div class="dd-handle">Umum</div>

							<ol class="dd-list" style="display: none;">

								<?php foreach ($faq as $i) { ?>
									<li class="dd-item" data-id="6"><button data-action="expand" type="button" onclick="getSubJudul(<?=$i['id_kategori']?>)" style="display: block;">Expand</button>
										<div class="dd-handle"><?=$i['nm_kategori']?></div>
										<ol class="dd-list" style="display: none;" id="jdl<?=$i['id_kategori']?>">

										</ol>
									</li>
								<?php } ?>

							</ol>
						</li>
						<li class="dd-item" data-id="4">
							<div class="dd-handle">Khusus</div>

							<ol class="dd-list" style="display: none;">

								<?php foreach ($prnt as $i) { ?>
									<li class="dd-item" data-id="6"> <button data-action="collapse" type="button" style="display: none;">Collapse</button><button data-action="expand" type="button" onclick="getParent(<?=$i['id_kategori']?>)" style="display: block;">Expand</button>
										<div class="dd-handle"><?=$i['nm_kategori']?></div>
										<ol class="dd-list" style="display: none;" id="parent<?=$i['id_kategori']?>">

										</ol>
									</li>
								<?php } ?>

							</ol>
						</li>						
					</ol>	
				</li>
			</ol>
		</div>
	</div>
</section>

<script src="../assets/adminBSB/plugins/jquery/jquery.min.js"></script>
<script>
	function getSubJudul(i) {
		$.post("../query/getSubJudul.php", {id: i}, (response) => {
			var n = JSON.parse(response);
			
			$.post("../query/getJudul.php" , {id: n[0].id}, (response) => {		
				var m = JSON.parse(response);
				if (m.length > 0) {
					$(`#jdl${i}`).html('');
					m.map(a => {					
						$(`#jdl${i}`).append(`
							<li class="dd-item" data-id="6"><button data-action="collapse" type="button" style="display: none;">Collapse</button><button data-action="expand" type="button" onclick="getUmumDetail(${a.id_buku})" style="display: block;">Expand</button>
							<div class="dd-handle">${a.sub_judul}</div>
							<ol class="dd-list" style="display: none;" id="detailUmum${a.id_buku}">

							</ol>
							</li>
							`);
					})
				} else {
					$(`#jdl${i}`).append(`<h2>Tidak ada buku</h2>`)
				}
				
			})
		})
	}

	function getParent(i) {
		$.post("../query/getSubJudul.php", {id: i}, (response) => {
			var n = JSON.parse(response);
			
			$.post("../query/getParent.php" , {id: n[0].id_kategori}, (response) => {
				var m = JSON.parse(response);
				
				m.map(a => {
					$(`#parent${i}`).html('');
					$(`#parent${i}`).append(`
						<li class="dd-item" data-id="6"><button data-action="collapse" type="button" style="display: none;">Collapse</button><button data-action="expand" type="button" onclick="getSubJudulKhusus(${a.id})" style="display: block;">Expand</button>
							<div class="dd-handle">${a.judulp}</div>
							<ol class="dd-list" style="display: none;" id="sub_judul_parent${a.id}">

							</ol>
						</li>
					`);
				})
			})
		})
	}

	function getSubJudulKhusus(id) {
		$(`#sub_judul_parent${id}`).html('');
		$.post("../query/getJudul.php", {id: id}, (response) => {
			var res = JSON.parse(response);
			console.log(res);
			res.map(r => {				
				$(`#sub_judul_parent${id}`).append(`
					<li class="dd-item" data-id="6"><button data-action="collapse" type="button" style="display: none;">Collapse</button><button data-action="expand" type="button" onclick="getKhususDetail(${r.id_buku})"style="display: block;">Expand</button>
					<div class="dd-handle">${r.sub_judul}</div>
					<ol class="dd-list" style="display: none;" id="detailKhusus${r.id_buku}">

					</ol>
					</li>
				`);
			})
		})
	}

	function getUmumDetail(id)
	{
		$.post("../query/getDetailBuku.php", {id: id}, (response) => {
			var resp = JSON.parse(response);

			$(`#detailUmum${id}`).html('');
			$(`#detailUmum${id}`).append(`
				<table>
					<tr>
						<td>
							<div class="panel-body">
								Penerbit : ${resp.penerbit} <br/>
								Pengarang : ${resp.pengarang} <br/>
								Jumlah : ${resp.jumlah} <br/>
								Sinopsis : ${resp.sinopsis} <br/>
								Halaman : ${resp.halaman} <br/>
								Tahun Terbit : ${resp.th_terbit} <br/>
								Rak : ${resp.nama_rak}
							</div>
						</td>
						<td>
							<div class="panel-body">
								<img src="../assets/file/${resp.file}" width="100"/>
							</div>
						</td>
					</tr>
				</table>
			`);
		})
	}

	function getKhususDetail(id)
	{
		$.post("../query/getDetailBuku.php", {id: id}, (response) => {
			var resp = JSON.parse(response);

			$(`#detailKhusus${id}`).html('');
			$(`#detailKhusus${id}`).append(`
				<table>
					<tr>
						<td>
							<div class="panel-body">
								Penerbit : ${resp.penerbit} <br/>
								Pengarang : ${resp.pengarang} <br/>
								Jumlah : ${resp.jumlah} <br/>
								Sinopsis : ${resp.sinopsis} <br/>
								Halaman : ${resp.halaman} <br/>
								Tahun Terbit : ${resp.th_terbit} <br/>
								Download : <a href="../administrator/download.php?file=${resp.file}">Download</a>
							</div>
						</td>
					</tr>
				</table>
			`);
		})
	}

	function cariBukuForm(e)
	{
		if (e.keyCode == 13) {
	        cariBuku();
    	}
	}

	function cariBuku()
	{
		var s = $("#s").val();
		$.post("../query/cari.php", {s: s}, (response) => {

			$("#clear").html('');

			var resp = JSON.parse(response);
			$("#clear").html('<br>');



			resp.map(i => {
				var f = i.file;
				var checkJpg = f.includes("jpg");
				var checkJpeg = f.includes("jpeg");
				var checkPng = f.includes("png");

				if (checkJpg == true || checkJpeg == true || checkPng == true) {
					var fi = `<img src="../assets/file/${i.file}" width="200" height="200"/>`;
				} else {
					var fi = `<img src="../assets/img/logopdf.png" width="200" height="200"/>`;
				}

					$("#clear").append(`
							<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
								<div class="card">
		                        <div class="header">
		                            <center>${fi}</center>		                            
		                        </div>
		                        <div class="body">
		                            <table class="table-bordered"  style="font-size: 14px">
		                            	<tr>
		                            		<th>Judul</th>
		                            		<td>${i.sub_judul}</td>
		                            	</tr>
		                            	<tr>
		                            		<th>Kategori</th>
		                            		<td>${i.nm_kategori}</td>
		                            	</tr>
		                            	<tr>
		                            		<th>Jumlah</th>
		                            		<td>${i.jumlah}</td>
		                            	</tr>
		                            	<tr>
		                            		<th>Jenis Buku</th>
		                            		<td>${i.jenis_pustaka}</td>
		                            	</tr>
		                            	<tr>
		                            		<th>Parent</th>
		                            		<td>${i.key_judulp}</td>
		                            	</tr>
		                            	<tr>
		                            		<th>Rak</th>
		                            		<td>${i.nama_rak}</td>
		                            	</tr>
		                            	<tr>
		                            		<th>Download</th>
		                            		<td><a href="../administrator/download.php?file=${i.file}">Download</a></td>
		                            	</tr>
		                            </table>
		                        </div>
		                    </div>
							</div>
					`);
			})
		})		
	}

</script>