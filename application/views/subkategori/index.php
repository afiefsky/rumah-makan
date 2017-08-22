<h2>Kategori Menu</h2>
<?php
    echo anchor('subkategori/add', 'Tambah', ['class' => 'btn btn-success btn-sm']);
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
                ".anchor('subkategori/edit/'.$r->id, 'Edit', ['class' => 'btn btn-info btn-sm'])."
                ".anchor('subkategori/delete/'.$r->id, 'Delete', ['class' => 'btn btn-danger btn-sm'])."
            </td>
        </tr>";
    }
    ?>
</table>