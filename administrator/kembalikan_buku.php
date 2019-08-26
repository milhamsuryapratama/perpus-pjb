<?php  
error_reporting(0);
require_once("../controller/dbcontroller.php");
$db_handle = new DBController();
$transaksi = $_GET['transaksi'];
$kondisi = $_GET['kondisi'];
$peminjam = $_GET['peminjam'];

$sql = "SELECT * FROM tb_transaksi_detail WHERE id_transaksi = '$transaksi' ORDER BY id_transaksi_detail DESC";
$faq = $db_handle->runQuery($sql);
// $sql = "SELECT * from tb_buku JOIN tb_judulparent ON tb_buku.id_judulp = tb_judulparent.id JOIN tb_kategori ON tb_judulparent.id_kategori = tb_kategori.id_kategori JOIN tb_rak ON tb_kategori.id_rak = tb_rak.id_rak JOIN tb_user ON tb_buku.id_user = tb_user.id WHERE tb_buku.status = 'Y' ORDER BY tb_buku.id_buku DESC";
// $faq = $db_handle->runQuery($sql);
?>
<section class="content">
	
	<div class="container-fluid">
		<div class="row clearfix">
			<form method="post" enctype="multipart/form-data">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<div class="card">
						<div class="header">
							<h2>
								<!-- <?php foreach ($faq as $f) {
                                    $cek = "SELECT * FROM tb_transaksi_kondisi JOIN tb_master_kondisi ON tb_transaksi_kondisi.id_master_kondisi = tb_master_kondisi.id_master_kondisi WHERE tb_transaksi_kondisi.id_transaksi_detail = '".$f['id_transaksi_detail']."' ";
                                    $cek_exec = $db_handle->runQuery($cek);

                                    if (count($cek_exec) > 0) {
                                        foreach ($cek_exec as $c) { ?>

                                            <p><?=$c['kondisi']?> : <?=$c['ket_kondisi']?></p> <br>

                                        <?php }
                                    } else {
                                        echo "Tidak Ada Kondisi";
                                    }                                   
                                    break;
                                } ?> -->
							</h2>                    
						</div>
						<div class="body">
                           
                            <?php 
                                $get = "SELECT * FROM tb_transaksi_detail JOIN tb_buku ON tb_transaksi_detail.id_buku = tb_buku.id_buku WHERE tb_transaksi_detail.id_transaksi = '$transaksi' ";
                                $run_get = $db_handle->runQuery($get);
                                foreach ($run_get as $r) { ?>
                                    <div class="row clearfix">
                                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                            <div class="card">
                                                <div class="header">
                                                    <center>
                                                        <img src="">
                                                    </center>                                  
                                                </div>
                                                <div class="body">
                                                    <table class="table-bordered"  style="font-size: 14px">
                                                        <tr>
                                                            <th>Judul</th>
                                                            <td><?=$r['sub_judul']?></td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                            <div class="card">
                                                <div class="header">
                                                    <center>
                                                        Kondisi Terakhir
                                                    </center>                                  
                                                </div>
                                                <div class="body">
                                                    <table class="table-bordered"  style="font-size: 14px">
                                                        <?php foreach ($faq as $f) {
                                                            $cek = "SELECT * FROM tb_transaksi_kondisi JOIN tb_master_kondisi ON tb_transaksi_kondisi.id_master_kondisi = tb_master_kondisi.id_master_kondisi WHERE tb_transaksi_kondisi.id_transaksi_detail = '".$f['id_transaksi_detail']."' ";
                                                            $cek_exec = $db_handle->runQuery($cek);

                                                            if (count($cek_exec) > 0) {
                                                                foreach ($cek_exec as $c) { ?>

                                                                    <tr>
                                                                        <th><?=$c['kondisi']?></th>
                                                                        <td><?=$c['ket_kondisi']?></td>
                                                                    </tr>
                                                                <?php }
                                                            } else {
                                                                echo "Tidak Ada Kondisi";
                                                            }                                   
                                                            break;
                                                        } ?>

                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                            <div class="card">
                                                <div class="header">
                                                    <center>
                                                        Kondisi Terakhir
                                                    </center>                                  
                                                </div>
                                                <div class="body">
                                                    <table class="table-bordered"  style="font-size: 14px">
                                                        <?php foreach ($faq as $f) {
                                                            $cek = "SELECT * FROM tb_master_kondisi";
                                                            $cek_exec = $db_handle->runQuery($cek);
                                                            $n = 1;

                                                            if (count($cek_exec) > 0) {
                                                                foreach ($cek_exec as $c) { ?>

                                                                    <tr>
                                                                        <th><?=$c['kondisi']?></th>
                                                                        <td><input name="group1" type="radio" id="radio_<?=$n?>"> <label for="radio_<?=$n?>">Radio - 1</label></td>
                                                                    </tr>
                                                                <?php }
                                                            } else {
                                                                echo "Tidak Ada Kondisi";
                                                            }                                   
                                                            break;
                                                        } ?>

                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php }
                            ?>                                                      
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>

<script src="../assets/adminBSB/plugins/jquery/jquery.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<!-- <script src="../assets/adminBSB/plugins/sweetalert/sweetalert.min.js"></script> -->

<script>
    function cek_kembali() {
        let sampul = $("input[name='sampul']:checked").val();
        let coretan = $("input[name='coretan']:checked").val();
        let lipatan = $("input[name='lipatan']:checked").val();
        let kondisi_buku = $("#id_kondisi").val();
        let id_peminjam = $("#peminjam").val();
        var id_transaksi = $("#transaksi").val();
        var today = new Date();
        var dd = String(today.getDate()).padStart(2, '0');
        var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
        var yyyy = today.getFullYear();

        today = yyyy + '-' + mm + '-' + dd;
        console.log(today);

        $.post('../query/getPointUser.php', {id_peminjam: id_peminjam}, (result) => {
            var parsePoint = JSON.parse(result);
            console.log(parsePoint);
            $.post('../query/getKondisiId.php', {id_kondisi: kondisi_buku}, (result) => {
                var parseKondisi = JSON.parse(result);
                console.log(parseKondisi);  
                if (sampul == parseKondisi.sampul && coretan == parseKondisi.coretan && lipatan == parseKondisi.lipatan) {
                    $.post('../query/update_status_transaksi.php', {id_trx: id_transaksi, date: today, id_peminjam: id_peminjam}, (result) => {
                        swal("Sukses", "Sukses Mengembalikan Buku", "success");
                        setTimeout(() => {
                            window.location.href = '?page=transaksi';
                        }, 3000);
                    })                      
                } else {
                 console.log(parseKondisi.sampul);
                 $.post('../query/cekSampul.php', {currentSampul: sampul, dbSampul: parseKondisi.sampul, id_peminjam: id_peminjam}, (result) => {
                    $.post('../query/cekCoretan.php', {currentCoretan: coretan, dbCoretan: parseKondisi.coretan, id_peminjam: id_peminjam}, (result) => {
                        $.post('../query/cekLipatan.php', {currentLipatan: lipatan, dbLipatan: parseKondisi.lipatan, id_peminjam: id_peminjam}, (result) => {
                            $.post('../query/update_status_transaksi.php', {id_trx: id_transaksi, date: today, id_peminjam: id_peminjam}, (result) => {
                                swal("Sukses", "Anda Mendapatkan Pengurangan Point", "success");
                                setTimeout(() => {
                                    window.location.href = '?page=transaksi';
                                }, 3000);
                            })                                 
                        })
                    })
                })
             }
         })
        })
    }
</script>
