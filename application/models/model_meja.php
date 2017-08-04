<?php
class model_meja extends CI_Model{
    
    
    
    function tampilkan_data(){
        
        return $this->db->get('meja');
    }
    
    function post(){
         $data=array(
            'Nomer_meja'=> $this->input->post('Nomer_meja'));
            
        $this->db->insert('meja',$data);
    }
    
    
    function edit()
    {
        $data=array(
        'Nomer_meja'=> $this->input->post('Nomer_meja'));
        $this->db->update('meja',$data);
    }
    
    function get_one($id)
    {
        $param = array('id_meja'=>$id);
        return $this->db->get_where('meja',$param);
    }
    
    
    function selesai()
    {
        
    }
    
}
