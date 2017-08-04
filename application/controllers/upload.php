<?php
class upload extends CI_Controller
{
    
    
    
    function index()
    {
        $this->load->view('upload/form_upload');
    }
    
    
    function do_upload()
    {
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
	
	//$config['max_width']  = '1024';
	//$config['max_height']  = '768';
        $this->load->library('upload', $config);
        $this->upload->do_upload();
        $hasil=$this->upload->data();
        //$data=array('nama_file'=>$hasil['file_name'],'ukuran'=>$hasil['file_size']);
        print_r($hasil);
        /* $this->db->insert('download',$data); */
                
    }
}