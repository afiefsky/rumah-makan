<?php
class model_transaksi extends CI_Model
{
    
    
    function simpan_menu($id)
    {
        $nama_menu  =   $this->input->post('nama_menu');
        $qty        =   $this->input->post('qty');
        $idmenu     =   $this->db->get_where('menu',array('nama_menu'=>$nama_menu))->row_array();
        $data       =   array('id_menu'=>$idmenu['id_menu'],
                              'qty'=>$qty,
                              'harga'=>$idmenu['harga'],
                              'status'=>'0',
                                'id_meja'=>$id);
                          $this->db->insert('detail_transaksi',$data);
    }
    
    function get_one($id)
    {
        $param  =   array('id_meja'=>$id);
        return $this->db->get_where('detail_transaksi',$param);
    }
    
    function tampilkan_detai_transaksi($id)
    {
        $query  ="SELECT dt.id_detail,dt.qty,dt.harga,b.nama_menu
                FROM detail_transaksi as dt,menu as b
                WHERE b.id_menu=dt.id_menu and dt.status='0' and
                dt.id_meja='$id'";
        return $this->db->query($query);
    }
    
    function selesai($data)
    {
        $this->db->insert('transaksi',$data);
        $last_id =  $this->db->query("select id_transaksi from transaksi order by id_transaksi desc")->row_array();
        $this->db->query("update detail_transaksi set id_transaksi='".$last_id['id_transaksi']."' where status='0'");
        $this->db->query("update detail_transaksi set status='1' where status='0'");
    }
    
    function laporan_default()
    {
      $query = "SELECT
                t.id_transaksi,
                t.tanggal_transaksi,
                o.nama_lengkap,
                sum(td.harga*td.qty) as total
                FROM transaksi as t,detail_transaksi as td,model_operator as o
                WHERE td.id_transaksi=t.id_transaksi and o.operator_id=t.operator_id 
                group by t.id_transaksi";
       return $this->db->query($query);
    }
            
    function cash_select() {
        $query = "SELECT * FROM cash";
        return $this->db->query($query);
    }
    
    function detail_transaksi($kd_trans){
        $query      = "SELECT dt.id_detail,dt.id_transaksi,dt.harga,dt.qty,m.nama_menu,dt.id_meja
                       FROM detail_transaksi as dt,transaksi as tr,menu as m
                       WHERE dt.id_transaksi = tr.id_transaksi AND m.id_menu = dt.id_menu
                       AND dt.id_transaksi = '$kd_trans'
                       ";
        return $this->db->query($query);
    }
    
    function detail_transaksi_by_meja($id_meja){
        $query      = "SELECT dt.id_detail,dt.harga,dt.qty,m.nama_menu,dt.id_meja
                       FROM detail_transaksi as dt, menu as m
                       WHERE m.id_menu = dt.id_menu
                       AND dt.id_meja = '$id_meja'
                       AND dt.status = '0'";
        return $this->db->query($query);
    }
   
    function laporan($id_transaksi){
        $query      = "SELECT dt.id_detail,dt.id_transaksi,dt.harga,dt.qty,m.nama_menu,dt.id_meja
                       FROM detail_transaksi as dt,transaksi as tr,menu as m
                       WHERE dt.id_transaksi = tr.id_transaksi AND m.id_menu = dt.id_menu
                       AND dt.id_transaksi = '$id_transaksi'
                       ";
        return $this->db->query($query);
    }
}

