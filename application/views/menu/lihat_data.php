<h3>Data Menu</h3>
<?php
echo anchor ('menu/post','Tambah data',array ('class'=>'btn btn-primary'));
?>
<hr>
<table class="table table-bordered">
    <tr><th>No</th><th>Nama Menu</th><th>Kategori Menu</th><th>Harga</th><th colspan="2">Operasi</th></tr>
    <?php
    $no=1;
    foreach ($record as $r)
    {
        echo "<tr>
                <td width='10'>$no</td>
                <td>$r->nama_menu</td>
                <td>$r->menu_kategori</td>
                <td>$r->harga</td>
                <td width='10'>".anchor('menu/edit/'.$r->id_menu,'Update',array('class'=>'btn btn-danger btn-sm'))."</td>
                <td width='10'>".anchor('menu/delete/'.$r->id_menu,'Delete',array('class'=>'btn btn-danger btn-sm'))."</td>
                </tr>";
        $no++;
    }
    ?>
</table>