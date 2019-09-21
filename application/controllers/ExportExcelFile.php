<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class ExportExcelFile extends CI_Controller {
    
	public function index()
	{
	}

    public function ajax_excel() {

        // instantiate Spreadsheet
        $spreadsheet = new Spreadsheet(); 

        // initiate new sheet
        $sheet = $spreadsheet->getActiveSheet();

        // initial model person
        $this->load->model('person_model','person');

        // get model porson from db
        $list = $this->person->get_all();
        $data = array();
        $no = 2;

        // manually set table data value
        $sheet->setCellValue('A1', 'FirstName');
        $sheet->setCellValue('B1', 'LastName');
        $sheet->setCellValue('C1', 'Gender');
        $sheet->setCellValue('D1', 'Address');
        $sheet->setCellValue('E1', 'DOB');

        // loop data person
        foreach ($list as $person) {
            $sheet->setCellValue('A'.$no, $person->firstName);
            $sheet->setCellValue('B'.$no, $person->lastName);
            $sheet->setCellValue('C'.$no, $person->gender);
            $sheet->setCellValue('D'.$no, $person->address);
            $sheet->setCellValue('E'.$no, $person->dob);
            $no++;
        }

        $writer = new Xlsx($spreadsheet); // instantiate Xlsx
        
        $filename = 'person'; // set filename for excel file
        
        header('Content-Type: application/vnd.ms-excel'); // generate excel file
        header('Content-Disposition: attachment;filename="'. $filename .'.xlsx"'); 
        header('Cache-Control: max-age=0');
        
        $writer->save('php://output'); // download file

    }

}