<?php

require 'vendor/autoload.php'; // Include PhpSpreadsheet library

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

session_start();

if (empty($_SESSION['id_admin'])) {
    header("Location: index.php");
    exit();
}

require_once("../db.php");

// Create a new Spreadsheet
$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();

$sheet->setCellValue('A1', 'Regno');
$sheet->setCellValue('B1', 'Name');
$sheet->setCellValue('C1', 'Department');
$sheet->setCellValue('D1', 'Coordinator');
$sheet->setCellValue('E1', 'Designation');
$sheet->setCellValue('F1', 'CTC');
$sheet->setCellValue('G1', 'Email Id');

$rowIndex = 2;

$sql = $_SESSION['QUERY'];
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $sheet->setCellValue('A' . $rowIndex, $row['regno']);
        $sheet->setCellValue('B' . $rowIndex, $row['name']);
        $sheet->setCellValue('C' . $rowIndex, $row['dept']);
        $sheet->setCellValue('D' . $rowIndex, $row['cmp']);
        $sheet->setCellValue('E' . $rowIndex, $row['des']);
        $sheet->setCellValue('F' . $rowIndex, $row['sal']);
        $sheet->setCellValue('G' . $rowIndex, $row['email']);
        $rowIndex++;
    }
}

$writer = new Xlsx($spreadsheet);

header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment; filename="report.xlsx"');
$writer->save('php://output');
