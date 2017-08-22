<?php
    echo anchor('penjualan/add', 'Tambah', ['class' => 'btn btn-primary btn-sm']);
    echo " ";
    echo anchor('penjualan/laporan', 'Laporan', ['class' => 'btn btn-info btn-sm']);
?><br><br>
<br><br>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>Pengurus</th>
            <th>Tanggal</th>
            <th>Total</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $no = 0;
        foreach ($record->result() as $r) {
            $no++;
            echo "<tr>
                <td>$no</td>
                <td>$r->nama_depan $r->nama_belakang</td>
                <td>$r->created_at</td>
                <td>".$r->per_price * $r->qty."</td>
                <td>".anchor('penjualan/cetak/'.$r->id, 'Cetak', ['class' => 'btn btn-success btn-sm'])."</td>
            </tr>";
        }
        ?>
    </tbody>
</table>