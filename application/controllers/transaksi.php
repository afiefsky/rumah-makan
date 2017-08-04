<?php
class transaksi extends CI_Controller{
    
    function __construct() {
        parent::__construct();
        $this->load->model(array('model_menu','model_transaksi'));
    }
    function trans()
    {
       if(isset($_POST['submit']))
       {
           $id=  $this->uri->segment(3);
           $this->model_transaksi->simpan_menu($id);
           $this->db->query("update meja set Status='1' where id_meja='$id'");
           redirect('transaksi/trans/'.$id);
           
       }
       else 
       {
        $id=  $this->uri->segment(3);
        //$this->load->model('model_transaksi');
        $data['menu']= $this->model_menu->tampil_data()->result();
        //$data['record']     =  $this->model_transaksi->get_one($id)->row_array();
        $data['detail']= $this->model_transaksi->tampilkan_detai_transaksi($id)->result();
        $data['cash']= $this->model_transaksi->cash_select()->result();
        $this->template->load('template','transaksi/form_transaksi',$data);
       }
    }

    function selesai()
    {
        $id=  $this->uri->segment(3);
        //$this->load->model('model_transaksi');
        $data['menu']= $this->model_menu->tampil_data()->result();
        //$data['record']     =  $this->model_transaksi->get_one($id)->row_array();
        $data['detail']= $this->model_transaksi->tampilkan_detai_transaksi($id)->result();
//        $this->db->query("update detail_transaksi set Status='1' where id_meja='$id'");
        $this->db->query("update meja set Status='0' where id_meja='$id'");
        $tanggal=date('Y-m-d');
        $user=  $this->session->userdata('username');
        $id_op=  $this->db->get_where('model_operator',array('username'=>$user))->row_array();
        $data=array('operator_id'=>$id_op['operator_id'],'tanggal_transaksi'=>$tanggal);
        $this->model_transaksi->selesai($data);
        redirect('meja');
        
    }
    
    function laporan()
    {
            
            $data['record']= $this->model_transaksi->laporan_default();
            //$this->template->load('template','transaksi/laporan',$data);
             $status = $this->session->userdata('status');
            if($status=='kasir'){
                $this->template->load('template','transaksi/laporan',$data);
            }else{
                $this->template->load('template_pemilik','transaksi/laporan',$data);
            }
            
            
    }
    function detail_trans($id_transaksi)
    {
        $data['record'] = $this->model_transaksi->detail_transaksi($kd_trans)->result();
        $this->template->load('template','transaksi/detail_transaksi',$data);
    }
    
    function insertcash(){
        $id=  $this->uri->segment(3);
        $cash = $this->input->post('cash');
        $this->db->query("UPDATE cash SET value=$cash");
        redirect('transaksi/trans/'.$id);
    }
    
    function detail_transaksi($kd_trans)
    {
        $kd_trans = $this->uri->segment(3);
        $data['record'] = $this->model_transaksi->detail_transaksi($kd_trans)->result();
        $this->load->view ('transaksi/detail_trans',$data);
    }
    
    function detail_transaksi_by_meja()
    {
        $id_meja = $this->uri->segment(3);
        $data['cash'] = $this->db->query("SELECT * FROM cash")->row_array();
        $data['record'] = $this->model_transaksi->detail_transaksi_by_meja($id_meja)->result();
        $this->load->view ('transaksi/detail_trans',$data);
    }
    
    function cetak(){
        $this->load->library('cfpdf');
        $pdf = new FPDF('L','mm','A4');
        $pdf->AddPage();
        $pdf->SetFont('Arial','B','L');
        $pdf->SetFontSize(14);
        $pdf->Text(10, 10, 'LAPORAN TRANSAKSI');
        
        
        $pdf->SetFontSize(10);
        $pdf->Cell(10, 10, '','',1);
        $pdf->cell(10, 7, 'No', 1, 0);
        $pdf->cell(40, 7, 'Id Transaksi', 1, 0);
        $pdf->cell(40, 7, 'Tanggal Transaksi', 1, 0);
        $pdf->cell(50, 7, 'Nama Operator', 1, 0);
        $pdf->cell(50, 7, 'Total', 1, 1);
        
        $pdf->SetFont('Arial','','L');
        $no=1;  
        $data = $this->model_transaksi->laporan_default();
        foreach ($data->result() as $r){
                $pdf->Cell(10, 7, $no, 1,0);
                $pdf->Cell(40, 7, $r->id_transaksi, 1,0);
                $pdf->Cell(40, 7, $r->tanggal_transaksi, 1,0);
                $pdf->Cell(50, 7, $r->nama_lengkap, 1,0);
                $pdf->Cell(50, 7, $r->total, 1,0);
                
                $no++;
        $pdf->Output();
    }
}
}