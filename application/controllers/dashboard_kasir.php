<?php
class dashboard_kasir extends CI_Controller{
    function index(){
        $this->template->load('template','view_dashboard_kasir');
        redirect('meja');
    }
}