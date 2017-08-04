<?php
    echo anchor('pembelian/add', 'Tambah', ['class' => 'btn btn-success btn-sm']);
?><br><br>
<table class="table table-bordered">
    <tr>
        <td>No</td>
        <td>Pengurus</td>
        <td>Tanggal</td>
        <td>Aksi</td>
    </tr>
    <?php
        $no = 0;
        foreach ($record->result() as $r) {
            $no++;
            echo "<tr>
                <td>$no</td>
                <td>$r->nama_depan $r->nama_belakang</td>
                <td>$r->created_at</td>
                <td>
                    ".anchor('pembelian/detail/'.$r->id, 'Detail', ['class' => 'btn btn-success btn-sm'])."
                    ".anchor('pembelian/edit/'.$r->id, 'Edit', ['class' => 'btn btn-info btn-sm'])."
                    ".anchor('pembelian/delete/'.$r->id, 'Delete', ['class' => 'btn btn-danger btn-sm'])."
                </td>
            </tr>";
        }
    ?>
</table>