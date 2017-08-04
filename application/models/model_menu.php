<?php
class model_menu extends CI_Model{
    
    
    function tampil_data()
    {
        $query = "SELECT b.id_menu,kb.menu_kategori,b.harga,b.nama_menu
                  FROM menu as b,kategori_menu as kb
                  WHERE b.id_kategori=kb.id_kategori  ";
        return $this->db->query($query);
    }
    
    function post($data)
    {
        $this->db->insert('menu',$data);
    }
    function get_one($id)
    {
        $param = array('id_menu'=>$id);
        return $this->db->get_where('menu',$param);
    }
    function edit($data,$id)
    {
        $this->db->where('id_menu',$id);
        $this->db->update('menu',$data);
    }
    function delete($id)
    {
        $this->db->where('id_menu',$id);
        $this->db->delete('menu');
    }
}