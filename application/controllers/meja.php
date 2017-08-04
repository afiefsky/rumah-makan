<?php
class meja extends CI_Controller{
    
    function __construct() {
        parent::__construct();
        $this->load->model(array('model_meja', 'model_transaksi'));
    }
            function index(){
            $id=  $this->uri->segment(3);
        //$this->load->model('model_transaksi');
        
        //$data['record']     =  $this->model_transaksi->get_one($id)->row_array();
        $data['detail']= $this->model_transaksi->tampilkan_detai_transaksi($id)->result();
        $data['record']= $this->model_meja->tampilkan_data();
        //$this->load->view('meja/lihat_data',$data);
        $this->template->load('template','meja/lihat_data',$data);
    }
    
    
    function post()
    {
        if(isset($_POST['submit'])){
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'gif|jpg|png';
        $this->load->library('upload', $config);
        $this->upload->do_upload();
        $hasil=$this->upload->data();
        $data   = array('id_meja' => $this->input->post('id_meja'),
                    'Nomer_meja'=> $this->input->post('Nomer_meja'),
                    'nm_gbr'=>$hasil['filename']);
        $this->db->insert('meja', $data);
        redirect('meja');        
        }
        else{
            $this->template->load('template','meja/form_input');
        }
    }
    
    function edit()
    {
       if(isset($_POST['submit'])){
            // proses pegawai
            $this->model_meja->edit();
            redirect('meja');
        }
        else{
            $id= $this->uri->segment(3);
            $data['record']= $this->model_meja->get_one($id)->row_array();
            $this->load->view('meja/form_edit',$data);
        }
    }
    
    function selesai()
    {
        $id= $this->uri->segment(3);
        
        $this->db->where('id_meja',$this->input->post('id'));
        $data = array(
            'Status' => '0'
        );
        $this->db->update('meja',$data);
        redirect('meja');
    }
}