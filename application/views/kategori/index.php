<h2>Kategori Belanja</h2><br>
<?php
    echo anchor('kategori/add', 'Tambah', ['class' => 'btn btn-success btn-sm']);
?><br><br>
<table class="table table-bordered">
    <tr>
        <td>No</td>
        <td>Nama</td>
        <td>Aksi</td>
    </tr>
    <?php
    $no = 0;
    foreach ($record->result() as $r) {
        $no++;
        echo "<tr>
            <td>$no</td>
            <td>$r->nama</td>
            <td>
                ".anchor('kategori/edit/'.$r->id, 'Edit', ['class' => 'btn btn-info btn-sm'])."
                ".anchor('kategori/delete/'.$r->id, 'Delete', ['class' => 'btn btn-danger btn-sm'])."
            </td>
        </tr>";
    }
    ?>
</table>