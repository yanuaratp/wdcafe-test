<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class pdfreport extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('m_pdf');
        $this->load->model('web_app_model');
    }

    function cetakpdf_manager() {
        $table="pegawai";
        $data['pegawai']=$this->web_app_model->getAllData($table);
        
        $this->load->view('downloadmanager',$data);
        $sumber = $this->load->view('downloadmanager', $data, TRUE);
        $html = $sumber;


        $pdfFilePath = "data_manager.pdf";
        //lokasi file css yang akan di load
        $css = $this->load->view('admin/css/bootstrap.min.css');
        $stylesheet = file_get_contents($css);

        $pdf = $this->m_pdf->load();

        $pdf->AddPage('L');
        $pdf->WriteHTML($stylesheet, 1);
        $pdf->WriteHTML($html);
        
        $pdf->Output($pdfFilePath, "D");
        exit();
    }

    function cetakpdf_order() {
        $table="order_view";
        $data['order_view']=$this->web_app_model->getAllData($table);
        
        $this->load->view('downloadorder',$data);
        $sumber = $this->load->view('downloadorder', $data, TRUE);
        $html = $sumber;


        $pdfFilePath = "data_order.pdf";
        //lokasi file css yang akan di load
        $css = $this->load->view('admin/css/bootstrap.min.css');
        $stylesheet = file_get_contents($css);

        $pdf = $this->m_pdf->load();

        $pdf->AddPage('L');
        $pdf->WriteHTML($stylesheet, 1);
        $pdf->WriteHTML($html);
        
        $pdf->Output($pdfFilePath, "D");
        exit();
    }
}

?>