<?php
class model_kategori extends CI_Model{
    
    
    
    function tampilkan_data(){
        
        return $this->db->get('kategori_menu');
    }
    
    function post(){
        $data=array(
            'menu_kategori'=> $this->input->post('menu_kategori'));
        $this->db->insert('kategori_menu',$data);
    }
    
    
    function edit()
    {
        $data=array(
            'menu_kategori'=> $this->input->post('menu_kategori'));
        $this->db->where('id_kategori',$this->input->post('id'));
        $this->db->update('kategori_menu',$data);
    }
    
    function get_one($id)
    {
        $param = array('id_kategori'=>$id);
        return $this->db->get_where('kategori_menu',$param);
    }
    function delete($id)
    {
        $this->db->where('id_kategori',$id);
        $this->db->delete('kategori_menu');
    }
}
