<h2>Perhitungan Belanja</h2><br>
<?php
    echo anchor('barang/add', 'Tambah', ['class' => 'btn btn-success btn-sm']);
?><br><br>
<table class="table table-bordered">
    <tr>
        <td><b />No</td>
        <td><b />Nama</td>
        <td><b />Jenis</td>
        <td><b />Harga/Kiloan</td>
        <td><b />Jumlah Per Kilo</td>
        <td><b />Aksi</td>
    </tr>
    <?php
    $no = 0;
    foreach ($record->result() as $r) {
        $no++;
        echo "<tr>
            <td>$no</td>
            <td>$r->nama</td>
            <td>$r->jenis</td>
            <td>$r->harga_per_kilo</td>
            <td>$r->jumlah_per_kilo</td>
            <td>
                ".anchor('barang/edit/'.$r->id, 'Edit', ['class' => 'btn btn-info btn-sm'])."
                ".anchor('barang/delete/'.$r->id, 'Delete', ['class' => 'btn btn-danger btn-sm'])."
            </td>
        </tr>";
    }
    ?>
</table>

<?php echo form_open('barang/index'); ?>
<table>
    <tr>
        <td>
            <select name="page_length" class="form-control">
                <option value="1">1</option>
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