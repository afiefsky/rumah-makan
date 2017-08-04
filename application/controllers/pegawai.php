<?php
class pegawai extends CI_Controller{
    
    function __construct() {
        parent::__construct();
        $this->load->model('model_pegawai');
    }
            function index(){
            $data['record']= $this->model_pegawai->tampilkan_data();
        //$this->load->view('pegawai/lihat_data',$data);
            $this->template->load('template_pemilik','pegawai/lihat_data',$data);
    }
    
    
    function post()
    {
        if(isset($_POST['submit'])){
            // proses pegawai
            $this->model_pegawai->post();
            redirect('pegawai');
        }
        else{
            //$this->load->view('pegawai/form_input');
            $this->template->load('template','pegawai/form_input');
        }
    }
    
    function edit()
    {
       if(isset($_POST['submit'])){
            // proses pegawai
            $this->model_pegawai->edit();
            redirect('pegawai');
        }
        else{
            $id= $this->uri->segment(3);
            $data['record']= $this->model_pegawai->get_one($id)->row_array();
            //$this->load->view('pegawai/form_edit',$data);
            $this->template->load('template','pegawai/form_edit',$data);
        }
    }
    function delete()
    {
        $id=  $this->uri->segment(3);
        $this->model_pegawai->delete($id);
        redirect('pegawai');
    }
}