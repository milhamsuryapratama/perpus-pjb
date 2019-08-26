<?php 
require_once('../assets/phpspreadsheet/vendor/autoload.php');
require_once("../controller/dbcontroller.php");

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$db_handle = new DBController();
$sql = "SELECT * from tb_transaksi JOIN tb_user ON tb_user.id = tb_transaksi.id_peminjam ORDER BY tb_transaksi.id_transaksi DESC";
$faq = $db_handle->runQuery($sql);

// echo json_encode($faq);

$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();
$sheet->setCellValue('A1', 'NO');
$sheet->setCellValue('B1', 'NAMA PEMINJAM');
$sheet->setCellValue('C1', 'BUKU');
$sheet->setCellValue('D1', 'TANGGAL PINJAM');
$sheet->setCellValue('E1', 'POINT');

$rowCount = 2;
$no = 1;

$buku = "SELECT * from tb_transaksi_detail JOIN tb_transaksi ON tb_transaksi_detail.id_transaksi = tb_transaksi.id_transaksi JOIN tb_buku ON tb_buku.id_buku = tb_transaksi_detail.id_buku";
$faq1 = $db_handle->runQuery($buku);

//echo json_encode($faq1[2]);

foreach ($faq as $trx) {
    $sheet->setCellValue('A' . $rowCount, $no);
    $sheet->setCellValue('B' . $rowCount, $trx['nama']);
    foreach ($faq1 as $b) {
    	$sheet->setCellValue('C' . $rowCount, $b['sub_judul']);
    }
	$sheet->setCellValue('D' . $rowCount, $trx['tgl_pinjam']);
    $sheet->setCellValue('E' . $rowCount, $trx['point']);
    
    $rowCount++;
	$no++;
}

$writer = new Xlsx($spreadsheet);

$filename = 'Data Peminjaman Buku';

header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="'. $filename .'.xlsx"'); 
header('Cache-Control: max-age=0');
$writer->save('php://output');

header("Location: ../administrator/home.php?page=transaksi");

?>