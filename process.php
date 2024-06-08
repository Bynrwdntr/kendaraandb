<?php
require 'connection.php';
require 'PhpSpreadsheet/autoload.php';
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

// Query untuk mengambil data dari tabel kendaraan
$query = "SELECT * FROM kendaraan";
$result = $conn->query($query);

// Inisialisasi objek PHPExcel
$objPHPExcel = new Spreadsheet();


// Set properties dokumen
$objPHPExcel->getProperties()->setCreator("Nama Pengguna")
                             ->setLastModifiedBy("Nama Pengguna")
                             ->setTitle("Data Kendaraan")
                             ->setSubject("Data Kendaraan")
                             ->setDescription("Data Kendaraan")
                             ->setKeywords("excel php")
                             ->setCategory("Data Kendaraan");

// Tambahkan judul kolom
$objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A1', 'ID')
            ->setCellValue('B1', 'Jarak Tempuh Harian')
            ->setCellValue('C1', 'Kebutuhan Penumpang')
            ->setCellValue('D1', 'Lokasi')
            ->setCellValue('E1', 'Anggaran')
            ->setCellValue('F1', 'Jenis Kendaraan');

// Masukkan data dari database
$row = 2;
while($row_data = $result->fetch_assoc()) {
    $objPHPExcel->setActiveSheetIndex(0)
                ->setCellValue('A'.$row, $row_data['id'])
                ->setCellValue('B'.$row, $row_data['jarak_tempuh_harian'])
                ->setCellValue('C'.$row, $row_data['kebutuhan_penumpang'])
                ->setCellValue('D'.$row, $row_data['lokasi'])
                ->setCellValue('E'.$row, $row_data['anggaran'])
                ->setCellValue('F'.$row, $row_data['jenis_kendaraan']);
    $row++;
}

// Set active sheet index ke sheet pertama
$objPHPExcel->setActiveSheetIndex(0);

// Simpan dalam format Excel 2007 (.xlsx)
$filename = 'data_kendaraan.xlsx';
$objWriter = PhpOffice\PhpSpreadsheet\IOFactory::createWriter($objPHPExcel, 'Excel2007');
$objWriter->save($filename);

echo "Data berhasil disimpan dalam file Excel.";
?>
