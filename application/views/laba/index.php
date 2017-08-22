<h2>Manajemen Laba</h2><br />
<?php
echo anchor('laba/add', 'Tambah', ['class' => 'btn btn-primary btn-sm']);
?>
<br /><br />
<table class="table table-bordered">
<tr>
    <td><b />No</td>
    <td><b />Tanggal</td>
    <td><b />Modal</td>
    <td><b />Penjualan</td>
    <td><b />Hasil</td>
</tr>
<?php
$no = 0;
foreach ($record->result() AS $r) {
    $no++;
    echo "<tr>
        <td>$no</td>
        <td>$r->created_at</td>
        <td>".transform($r->pembelian)."</td>
        <td>".transform($r->penjualan)."</td>
        <td>".transform($r->hasil)."</td>
    </tr>";
}
?>
</table>

<?php
function transform($value)
{
    $result = "Rp " . number_format($value,2,',','.');

    return $result;
}
?>

<?php echo form_open('laba/index'); ?>
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