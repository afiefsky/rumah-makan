<?php
    echo anchor('penjualan/add', 'Tambah', ['class' => 'btn btn-primary btn-sm']);
    echo " ";
    // echo anchor('penjualan/laporan', 'Laporan', ['class' => 'btn btn-info btn-sm']);
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
                <td>".
                    anchor('penjualan/cetak/'.$r->id, 'Cetak', ['class' => 'btn btn-primary btn-sm', 'target' => '_BLANK'])
                    . '  ' .
                    anchor('penjualan/detail_penjualan/'.$r->id, 'Detail', ['class' => 'btn btn-success btn-sm'])
                ."</td>
            </tr>";
        }
        ?>
    </tbody>
</table>
<?php echo form_open('penjualan/index'); ?>
<table>
    <tr>
        <td>
            <select name="page_length" class="form-control">
                <option value="5">5</option>
                <option value="10">10</option>
                <option value="20">20</option>
                <option value="30">30</option>
                <option value="50">50</option>
            </select>
        </td>
        <td>&nbsp;&nbsp;</td>
        <td>
            <input type="submit" name="submit_page" value="Check" class="btn btn-primary btn-sm">
        </td>
        <td>&nbsp;&nbsp;</td>
        <td>
            <?php echo $paging; ?>
        </td>
    </tr>
</table>
<?php echo form_close(); ?>