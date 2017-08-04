<?php
function check_session()
{
    $CI= & get_instance();
    $session=$CI->session->userdata('status_login');
    
        if($session!='oke_pegawai'){
            redirect('auth/login');
        }
    
}

function check_session_admin()
{
    $CI= & get_instance();
    $session=$CI->session->userdata('status_login');
        if($session!='oke_admin'){
            redirect('auth/login');
        }
}

?>
