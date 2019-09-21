<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ExportPdfFile extends CI_Controller {
    
    public function index()
    {
        
    }
    
    public function ajax_pdf() 
    {
        // Load helper tcpdf
        $this->load->helper('tcpdfhelper');
        
        // create new PDF document
        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        
        // set document information
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('Our Code World');
        $pdf->SetTitle('Belajar Codeigniter Export PDF');
        
        // set default header data
        $headerTitleString = "TCPDF Example";
        $headerAuthorString = "by Wahid Kamarullah \nwww.tcpdf.org";
        $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, $headerTitleString.' 006', $headerAuthorString);
        
        // set header and footer fonts
        $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
        $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
        
        // set default monospaced font
        $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
        
        // set margins
        $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
        $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
        $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
        
        // set auto page breaks
        $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
        
        // set image scale factor
        $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
        
        // add a page
        $pdf->AddPage();
        
        $html = '<h4>Person Data</h4><br><p>Welcome to the Jungle</p>';
        
        // initial model person
        $this->load->model('person_model','person');
        
        // get model porson from db
        $list = $this->person->get_all();
        
        // Add Header Tag Table
        $html = $html."<table>";
        $html = $html."<tr>";
        $html = $html."<td>FirstName</td>";
        $html = $html."<td>LastName</td>";
        $html = $html."<td>Gender</td>";
        $html = $html."<td>Address</td>";
        $html = $html."<td>DOB</td>";
        $html = $html."</tr>";
        
        // loop data person
        foreach ($list as $person) {
            $html = $html."<tr>";
            $html = $html."<td>".$person->firstName."</td>";
            $html = $html."<td>".$person->lastName."</td>";
            $html = $html."<td>".$person->gender."</td>";
            $html = $html."<td>".$person->address."</td>";
            $html = $html."<td>".$person->dob."</td>";
            $html = $html."</tr>";
        }
        
        // Add Tag Close Table
        $html = $html."</table>";
        $pdf->writeHTML($html, true, false, true, false, '');
        
        // reset pointer to the last page
        $pdf->lastPage();
        
        //Close and output PDF document
        $pdf->Output('person.pdf', 'D');
    }
    
}