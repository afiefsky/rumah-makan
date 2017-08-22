<h2>Laba Hari ini, <?php echo date('d-m-Y'); ?></h2><br />

<?php
echo form_open('laba/add');
?>
<table class="table table-bordered">
    <tbody>
        <tr>
            <td>Nominal Pembelian</td>
            <td><input type="number" class="form-control" name="pembelian" placeholder="Modal hari ini" required="true" /></td>
        </tr>
        <tr>
            <td>Nominal Penjualan</td>
            <td><input type="number" class="form-control" name="penjualan" placeholder="Keuntungan hari ini" required="true" /></td>
        </tr>
        <tr>
            <td colspan="2" align="right"><input type="submit" name="submit" value="Simpan"></td>
        </tr>
    </tbody>
</table>
<?php
echo form_close();
?>