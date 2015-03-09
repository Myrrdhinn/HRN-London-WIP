<?php
/**
 * PHPExcel
 *
 * Copyright (C) 2006 - 2014 PHPExcel
 *
 * This library is free software; you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation; either
 * version 2.1 of the License, or (at your option) any later version.
 *
 * This library is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
 * Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public
 * License along with this library; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301  USA
 *
 * @category   PHPExcel
 * @package    PHPExcel
 * @copyright  Copyright (c) 2006 - 2014 PHPExcel (http://www.codeplex.com/PHPExcel)
 * @license    http://www.gnu.org/licenses/old-licenses/lgpl-2.1.txt	LGPL
 * @version    1.8.0, 2014-03-02
 */

/** Error reporting */
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);
date_default_timezone_set('Europe/Budapest');

if (PHP_SAPI == 'cli')
	die('This example should only be run from a Web Browser');

/** Include PHPExcel */
require_once 'Excel/PHPExcel.php';


// Create new PHPExcel object
$objPHPExcel = new PHPExcel();

// Set document properties
$objPHPExcel->getProperties()->setCreator("HRN Europe Admin site")
							 ->setLastModifiedBy("HRN Europe Admin site")
							 ->setTitle("Sponsor Booking Data")
							 ->setSubject("Sponsor Booking Data")
							 ->setDescription("Contains informations about people, who want to meet with sponsors.")
							 ->setKeywords("HRN Sponsors office PHPExcel")
							 ->setCategory("HRN");


// Add the header
$objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A1', 'Number')
            ->setCellValue('B1', 'First Name')
            ->setCellValue('C1', 'Last Name')
            ->setCellValue('D1', 'Email')
			->setCellValue('E1', 'Phone Number')
			->setCellValue('F1', 'Company')
			->setCellValue('G1', 'Job Title')
			->setCellValue('H1', 'Day')
			->setCellValue('I1', 'Time')
			->setCellValue('J1', 'Sponsor')
			->setCellValue('K1', 'Recorded');
			
			

$sharedStyle1 = new PHPExcel_Style();

$sharedStyle1->applyFromArray(
	array('fill' 	=> array(
								'type'		=> PHPExcel_Style_Fill::FILL_SOLID,
								'color'		=> array('argb' => 'D5E3E5')
							),
		  'borders' => array(
								'bottom'	=> array('style' => PHPExcel_Style_Border::BORDER_THIN)
							)
		 ));
		 
$objPHPExcel->getActiveSheet()->setSharedStyle($sharedStyle1, "A1:K1");	

$objPHPExcel->getActiveSheet()->getStyle("A1")->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle("B1")->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle("C1")->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle("D1")->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle("E1")->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle("F1")->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle("G1")->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle("H1")->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle("I1")->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle("J1")->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle("K1")->getFont()->setBold(true);
	 
			
$id = 2;			
foreach ($content as $data) {
	
	// Add the data
$objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A'.$id, $data[0])
            ->setCellValue('B'.$id, $data[1])
            ->setCellValue('C'.$id, $data[2])
            ->setCellValue('D'.$id, $data[3])
			->setCellValue('E'.$id, $data[4])
			->setCellValue('F'.$id, $data[5])
			->setCellValue('G'.$id, $data[6])
			->setCellValue('H'.$id, $data[7])
			->setCellValue('I'.$id, $data[8])
			->setCellValue('J'.$id, $data[9])
			->setCellValue('K'.$id, $data[10]);
	$id++;
}
			

$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);	
$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->getColumnDimension('G')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->getColumnDimension('H')->setAutoSize(true);		
$objPHPExcel->getActiveSheet()->getColumnDimension('I')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->getColumnDimension('J')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->getColumnDimension('K')->setAutoSize(true);
	
// Rename worksheet
$objPHPExcel->getActiveSheet()->setTitle('Bookings');


// Set active sheet index to the first sheet, so Excel opens this as the first sheet
$objPHPExcel->setActiveSheetIndex(0);


// Redirect output to a client’s web browser (Excel2007)
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="Bookings-'.gmdate('D-d-M-Y-H-i').'.xlsx"');
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
