<h2>Transaksi Pembelian</h2><br />
<?php
    echo anchor('pembelian/add', 'Tambah', ['class' => 'btn btn-success btn-sm']);
    echo " ";
?><br><br>
<table class="table table-bordered">
    <tr>
        <td><b />No</td>
        <td><b />Tanggal</td>
        <td width="30%"><b />Jam</td>
        <td width="20%"><b />Total Transaksi Pembelian</td>
        <td><b />Aksi</td>
    </tr>
    <?php
        $no = 0;
        foreach ($record->result() as $r) {
            $no++;
            echo "<tr>
                <td>$no</td>
                <td>$r->seldate</td>
                <td>$r->seltime</td>
                <td>$r->total</td>
                <td>
                    ".anchor('pembelian/cetak/'.$r->id, 'Cetak', ['class' => 'btn btn-primary btn-sm'])."
                    ".anchor('pembelian/detail/'.$r->id, 'Detail', ['class' => 'btn btn-success btn-sm'])."
                    ".anchor('pembelian/delete/'.$r->id, 'Delete', ['class' => 'btn btn-danger btn-sm'])."
                </td>
            </tr>";
        }
    ?>
</table>