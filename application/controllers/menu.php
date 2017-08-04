<?php
class menu extends CI_Controller{
    
    function __construct() {
        parent::__construct();
        $this->load->model('model_menu');
    }
    function index()
    {
        $data['record']= $this->model_menu->tampil_data()->result();       
        //$this->load->view('menu/lihat_data',$data);
        $this->template->load('template_pemilik','menu/lihat_data',$data);
    }
    
    function post()
    {
        if(isset($_POST['submit'])){
            // proses kategori
            $nama       =   $this->input->post('nama_menu');
            $id_kategori   =   $this->input->post('id_kategori');
            $harga       =   $this->input->post('harga');
            $data       =   array('nama_menu'=>$nama,
                                  'id_kategori'=>$id_kategori,
                                  'harga'=>$harga);
            $this->model_menu->post($data);
            redirect('menu');
        }
        else{
            $this->load->model('model_kategori');
            $data['kategori']= $this->model_kategori->tampilkan_data()->result();
            //$this->load->view('menu/form_input',$data);
            $this->template->load('template','menu/form_input',$data);
            
            
        }
        
    }
    function edit()
    {
        if(isset($_POST['submit'])){
            // proses kategori
            $id_menu            =    $this->input->post('id_menu');
            $nama           =   $this->input->post('nama_menu');
            $id_kategori    =   $this->input->post('id_kategori');
            $harga          =   $this->input->post('harga');
            $data           =   array('nama_menu'=>$nama,
                                  'id_kategori'=>$id_kategori,
                                  'harga'=>$harga);
            $this->model_menu->edit($data,$id_menu);
            redirect('menu');
        }
        else{
            $id= $this->uri->segment(3);
            $this->load->model('model_kategori');
            $data['kategori']   =    $this->model_kategori->tampilkan_data()->result();
            $data['record']     =    $this->model_menu->get_one($id)->row_array();
            //$this->load->view('menu/form_edit',$data);
            $this->template->load('template','menu/form_edit',$data);
    }
}
function delete()
    {
        $id=  $this->uri->segment(3);
        $this->model_menu->delete($id);
        redirect('menu');
    }
}