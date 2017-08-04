<h3> <center>Halaman Menu Kasir</center></h3>

<hr>

<table>
    <tr>
<?php
$no=1;
$batas = 0;
foreach ($record->result() as $r)
{
    if($batas<=5){
        $status = $r->Status;
    $hasil = '';
    if($status==1)
    {
    $hasil='Terisi';
    }  else {
    $hasil='Kosong';    
    };
    echo "
            <td width='20'><img src='".base_url()."uploads/$r->nm_gbr' height='100' width='100'>".anchor('transaksi/trans/'.$r->Nomer_meja,'Input',array('class'=>'btn btn-primary btn-sm'))."$hasil</td>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
            ";
        
        
    $no++;
    $batas++;
    }else{
        echo "</tr><tr><tr><td>&nbsp;&nbsp;&nbsp;&nbsp;</td></tr>";
        $batas=0;
    }
    
}
?>
    </tr>
</table>