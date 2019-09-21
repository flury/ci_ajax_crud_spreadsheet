<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once ('tcpdf/tcpdf.php');

class TcpdfHelper_Helper extends TCPDF {
    
    function __construct()
    {
        parent::__construct();
    }
}