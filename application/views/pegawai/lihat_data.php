<h3>Data Pegawai</h3>
<?php
echo anchor('pegawai/post','Tambah data',array ('class'=>'btn btn-primary'))
?>
<hr>
<table class="table table-bordered">
    <tr><th>No</th><th>Nama Lengkap</th><th>Alamat</th><th>Nomer Hp</th><th>Username</th><th>Status</th><th>Last Login</th><th colspan="2">Operasi</th></tr>
<?php
$no=1;
foreach ($record->result() as $r)
{
    echo "<tr>
            <td>$no</td>
            <td>$r->nama_lengkap</td>
            <td>$r->Alamat</td>
            <td>$r->nomer_hp</td>
            <td>$r->username</td>
            <td>$r->status</td>
            <td>$r->last_login</td>
            <td>".anchor('pegawai/edit/'.$r->operator_id,'Update',array('class'=>'btn btn-danger btn-sm'))."
            ".anchor('pegawai/delete/'.$r->operator_id,'Delete',array('class'=>'btn btn-danger btn-sm'))."</td>
            </tr>";
    $no++;
    
}
?>
</table>