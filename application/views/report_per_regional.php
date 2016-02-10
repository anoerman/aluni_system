<?php

/** Error reporting */
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);
date_default_timezone_set('Asia/Jakarta');

if (PHP_SAPI == 'cli')
	die('This example should only be run from a Web Browser');

/** Include PHPExcel */
require_once dirname(__FILE__) . '/../../assets/classes/PHPExcel.php';

// Create new PHPExcel object
$objPHPExcel = new PHPExcel();

// Set document properties
$objPHPExcel->getProperties()->setCreator("Noerman Agustiyan")
							 ->setLastModifiedBy("Noerman Agustiyan")
							 ->setTitle("Member Report Per Regional")
							 ->setSubject("Member Report Per Regional")
							 ->setDescription("Showing member data ordered by member regional.")
							 ->setKeywords("alumni database php");

// Rename worksheet
$objPHPExcel->getActiveSheet()->setTitle('Member Report Per Regional');

// Header Title
$objPHPExcel->getActiveSheet()->setCellValue("B2", $system_name." Report Per Regional");
$objPHPExcel->getActiveSheet()->getStyle('B2')->getFont()->setSize(20);
$objPHPExcel->getActiveSheet()->getStyle('B2')->getFont()->setBold(true);

// Header Column Setting
$objPHPExcel->getActiveSheet()->mergeCells('B4:B5'); // No
$objPHPExcel->getActiveSheet()->mergeCells('C4:G4'); // Basic
$objPHPExcel->getActiveSheet()->mergeCells('H4:I4'); // Family
$objPHPExcel->getActiveSheet()->mergeCells('J4:Q4'); // Contact
$objPHPExcel->getActiveSheet()->mergeCells('R4:U4'); // Parent
$objPHPExcel->getActiveSheet()->mergeCells('V4:Z4'); // Academic
$objPHPExcel->getActiveSheet()->getStyle('B4:V4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$objPHPExcel->getActiveSheet()->getStyle('B4:V4')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);

// Width
$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(25);
$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(25);
$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(25);
$objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(35);
$objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(25);
$objPHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth(25);
$objPHPExcel->getActiveSheet()->getColumnDimension('J')->setWidth(15);
$objPHPExcel->getActiveSheet()->getColumnDimension('K')->setWidth(15);
$objPHPExcel->getActiveSheet()->getColumnDimension('L')->setWidth(15);
$objPHPExcel->getActiveSheet()->getColumnDimension('M')->setWidth(10);
$objPHPExcel->getActiveSheet()->getColumnDimension('N')->setWidth(20);
$objPHPExcel->getActiveSheet()->getColumnDimension('O')->setWidth(20);
$objPHPExcel->getActiveSheet()->getColumnDimension('P')->setWidth(25);
$objPHPExcel->getActiveSheet()->getColumnDimension('Q')->setWidth(20);
$objPHPExcel->getActiveSheet()->getColumnDimension('R')->setWidth(25);
$objPHPExcel->getActiveSheet()->getColumnDimension('S')->setWidth(25);
$objPHPExcel->getActiveSheet()->getColumnDimension('T')->setWidth(25);
$objPHPExcel->getActiveSheet()->getColumnDimension('U')->setWidth(35);
$objPHPExcel->getActiveSheet()->getColumnDimension('V')->setWidth(10);
$objPHPExcel->getActiveSheet()->getColumnDimension('W')->setWidth(10);
$objPHPExcel->getActiveSheet()->getColumnDimension('X')->setWidth(10);
$objPHPExcel->getActiveSheet()->getColumnDimension('Y')->setWidth(15);
$objPHPExcel->getActiveSheet()->getColumnDimension('Z')->setWidth(25);

// Value
$objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('B4', 'No')
            ->setCellValue('C4', 'Basic Information')
            ->setCellValue('C5', 'Fullname')
            ->setCellValue('D5', 'Nickname')
            ->setCellValue('E5', 'Gender')
            ->setCellValue('F5', 'Place & Date of birth')
            ->setCellValue('G5', 'Address')
            ->setCellValue('H4', 'Family Information')
            ->setCellValue('H5', 'Husband / Wife')
            ->setCellValue('I5', 'Childrens')
            ->setCellValue('J4', 'Contact Information')
            ->setCellValue('J5', 'Home Number')
            ->setCellValue('K5', 'Phone Number 1')
            ->setCellValue('L5', 'Phone Number 2')
            ->setCellValue('M5', 'BB Pin')
            ->setCellValue('N5', 'Email Address')
            ->setCellValue('O5', 'Web Address')
            ->setCellValue('P5', 'Facebook')
            ->setCellValue('Q5', 'Twitter')
            ->setCellValue('R4', 'Parent Information')
            ->setCellValue('R5', 'Father Name')
            ->setCellValue('S5', 'Mother Name')
            ->setCellValue('T5', 'Guardian Name')
            ->setCellValue('U5', 'Parent Address')
            ->setCellValue('V4', 'Academic Information')
            ->setCellValue('V5', 'Generation')
            ->setCellValue('W5', 'Year Entry')
            ->setCellValue('X5', 'Year Out')
            ->setCellValue('Y5', 'Last Class')
            ->setCellValue('Z5', 'Notes')
            ;

// Header style
$objPHPExcel->getActiveSheet()->getStyle('B4:Z5')->applyFromArray(
	array(
		'fill' => array(
			'type'  => PHPExcel_Style_Fill::FILL_SOLID,
			'color' => array('argb' => 'ccffcc')
		),
		'borders' => array(
			'top'    => array('style' => PHPExcel_Style_Border::BORDER_MEDIUM),
			'left'   => array('style' => PHPExcel_Style_Border::BORDER_MEDIUM),
			'right'  => array('style' => PHPExcel_Style_Border::BORDER_MEDIUM),
			'bottom' => array('style' => PHPExcel_Style_Border::BORDER_MEDIUM)
		)
	)
);

// Top Limit
$top_limit = 5;

// Content
$no = 0;
foreach ($data_list->result() as $dl) {
	$no++;
	$top_limit++;
	
	// Content style
	$objPHPExcel->getActiveSheet()->getStyle('B'.$top_limit.':Z'.$top_limit)->applyFromArray(
		array(
			'borders' => array(
				'top'    => array('style' => PHPExcel_Style_Border::BORDER_THIN),
				'left'   => array('style' => PHPExcel_Style_Border::BORDER_MEDIUM),
				'right'  => array('style' => PHPExcel_Style_Border::BORDER_MEDIUM),
				'bottom' => array('style' => PHPExcel_Style_Border::BORDER_THIN)
			)
		)
	);

	// Set zebra color (odds number)
	if ($top_limit%2==1) {
		$objPHPExcel->getActiveSheet()->getStyle('B'.$top_limit.':Z'.$top_limit)->applyFromArray(
			array(
				'fill' => array(
				'type'  => PHPExcel_Style_Fill::FILL_SOLID,
				'color' => array('argb' => 'e1eaea')
				)
			)
		);
	}

	// Set child
	$childrens = "";
	$dt_child  = explode("|", $dl->childrens);
	for ($i=0; $i < count($dt_child); $i++) { 
		if ($dt_child[$i]!="") {
			$childrens .= "> ".$dt_child[$i]."\n";
		}
	}

	// Content 
	$objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue("B".$top_limit, $no)
            ->setCellValue("C".$top_limit, $dl->fullname)
            ->setCellValue("D".$top_limit, $dl->nickname)
            ->setCellValue("E".$top_limit, $dl->gender)
            ->setCellValue("F".$top_limit, $dl->place_of_birth." / ".$dl->date_of_birth)
            ->setCellValue("G".$top_limit, $dl->member_city.", ".$dl->member_province."\n".$dl->address)
            ->setCellValue("H".$top_limit, $dl->partner_name)
            ->setCellValue("I".$top_limit, $childrens)
            ->setCellValue("J".$top_limit, $dl->home_number)
            ->setCellValue("K".$top_limit, $dl->phone_number_1)
            ->setCellValue("L".$top_limit, $dl->phone_number_2)
            ->setCellValue("M".$top_limit, $dl->blackberry_pin)
            ->setCellValue("N".$top_limit, $dl->email_address)
            ->setCellValue("O".$top_limit, $dl->website_address)
            ->setCellValue("P".$top_limit, $dl->facebook)
            ->setCellValue("Q".$top_limit, $dl->twitter)
            ->setCellValue("R".$top_limit, $dl->father_name)
            ->setCellValue("S".$top_limit, $dl->mother_name)
            ->setCellValue("T".$top_limit, $dl->guardian_name)
            ->setCellValue("U".$top_limit, $dl->parent_city.", ".$dl->parent_province."\n".$dl->parent_address)
            ->setCellValue("V".$top_limit, $dl->generation)
            ->setCellValue("W".$top_limit, $dl->year_entry)
            ->setCellValue("X".$top_limit, $dl->year_out)
            ->setCellValue("Y".$top_limit, $dl->last_class)
            ->setCellValue("Z".$top_limit, $dl->academic_notes)
            ;
}

// Wrap it
$objPHPExcel->getActiveSheet()->getStyle('B6:Z'.$top_limit)->getAlignment()->setWrapText(true);


// Set active sheet index to the first sheet, so Excel opens this as the first sheet
$objPHPExcel->setActiveSheetIndex(0);


// Redirect output to a client’s web browser (Excel2007)
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="'.$system_name.'-report-per-regional-'.date('d/m/Y').'.xlsx"');
header('Cache-Control: max-age=0');
// If you're serving to IE 9, then the following may be needed
header('Cache-Control: max-age=1');

// If you're serving to IE over SSL, then the following may be needed
header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
header ('Pragma: public'); // HTTP/1.0

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$objWriter->save('php://output');
exit;


?>