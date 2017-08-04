<?php
class model_pegawai extends CI_Model{
    
    
    
    function tampilkan_data(){
        
        return $this->db->get('model_operator');
    }
    
    function post()
    { 
        if(isset($_POST['submit'])){     
        }
            $nama_lengkap = $this->input->post('nama_lengkap',TRUE);
            $Alamat       =   $this->input->post('Alamat',TRUE);
            $nomer_hp     =   $this->input->post('nomer_hp',TRUE);
            $username     =   $this->input->post('username',TRUE);
            $password     =   $this->input->post('password',TRUE);
            $status       =   $this->input->post('status',TRUE);
            $data               =  array('nama_lengkap'=>$nama_lengkap,
                                         'alamat'=>$Alamat,
                                         'nomer_hp'=>$nomer_hp,
                                         'username'=>$username,
                                         'status'=>$status,
                                         'password'=>  md5($password));
        $this->db->insert('model_operator',$data);
    }
    
    
    function edit()
    {
        if(isset($_POST['submit'])){     
        }
            $nama_lengkap = $this->input->post('nama_lengkap',TRUE);
            $Alamat       =   $this->input->post('Alamat',TRUE);
            $nomer_hp     =   $this->input->post('nomer_hp',TRUE);
            $username     =   $this->input->post('username',TRUE);
            $password     =   $this->input->post('password',TRUE);
            $status       =   $this->input->post('status',TRUE);
            $data               =  array('nama_lengkap'=>$nama_lengkap,
                                         'alamat'=>$Alamat,
                                         'nomer_hp'=>$nomer_hp,
                                         'username'=>$username,
                                         'status'=>$status,
                                         'password'=>  md5($password));
        $this->db->where('operator_id',$this->input->post('id'));
        $this->db->update('model_operator',$data);
    }
    
    
    function get_one($id)
    {
        $param = array('operator_id'=>$id);
        return $this->db->get_where('model_operator',$param);
    }
    function delete($id)
    {
        $this->db->where('operator_id',$id);
        $this->db->delete('model_operator');
    }
}
