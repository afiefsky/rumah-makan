<h3>Kategori Makanan</h3>
<?php
echo anchor('kategori/post','Tambah Data',array ('class'=>'btn btn-primary'))
?>
<hr>
<table class="table table-bordered">
    <tr><th>NO</th><th>Nama Kategori</th><th colspan="2">Operasi</th></tr>
<?php
$no=1;
foreach ($record->result() as $r)
{
    echo "<tr>
            <td width='10'>$no</td>
            <td>$r->menu_kategori</td>
            <td width='10'>".anchor('kategori/edit/'.$r->id_kategori,'Update',array('class'=>'btn btn-danger btn-sm'))."</td>
            <td width='10'>".anchor('kategori/delete/'.$r->id_kategori,'Delete',array('class'=>'btn btn-danger btn-sm'))."</td>
            </tr>";
    $no++;
    
}
?>
</table>