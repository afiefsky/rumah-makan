<h2>Form Transaksi</h2>
<?php echo form_open('penjualan/add'); ?>
<table class="table table-bordered">
    <tr>
        <td colspan="2">
            Menu: <select name="barang_id">
                <?php
                foreach ($record_barang->result() as $r) {
                    echo "<option value='$r->id'";
                    echo $find_barang_array['id'] == $r->id ? 'selected' : '';
                    echo ">$r->nama</option>";
                }
                ?>
            </select> 
            Qty: <input type="text" name="qty" size="4" maxlength="4" value="<?php echo $qty; ?>" required="true">
            <input type="submit" name="submit_check" value="Check">
        </td>
    </tr>
    <tr>
        <td align="right">Harga :</td>
        <td><input type="text" name="harga" value="<?php echo $record_harga; ?>" readonly="true"></td>
    </tr>
    <tr>
        <td align="right">Harga * Qty :</td>
        <td><input type="text" name="harga" value="<?php echo $record_harga_calculated; ?>" readonly="true"></td>
    </tr>
    <tr>
        <td><input type="submit" name="submit_keranjang" value="Tambah Ke Keranjang" class="btn btn-primary btn-sm"></td>
        <td>
        <?php
            if ($selesai == 1) {
                echo anchor('penjualan/selesai/'. $this->session->userdata('penjualan_id'), 'Selesai', ['class' => 'btn btn-success btn-sm', 'align' => 'right']);
            } else {
                echo anchor('penjualan/selesai/'. $this->session->userdata('penjualan_id'), 'Selesai', ['class' => 'btn btn-danger btn-sm', 'align' => 'right', 'disabled' => 'true']);
            }
        ?>
        </td>
    </tr>
</table>
<table class="table table-bordered">
    <tr>
        <th>No</th>
        <th>Nama Menu</th>
        <th>Harga</th>
        <th>Qty</th>
        <th>Subtotal</th>
    </tr>
    <?php
    $no = 0;
    $total = 0;
    foreach ($record_purchased->result() as $r) {
        $no++;
        echo "<tr>
            <td>$no</td>
            <td>$r->nama</td>
            <td>$r->per_price</td>
            <td>$r->qty</td>
            <td>$r->subtotal</td>
        </tr>";
        $total = $total + $r->subtotal;
    }
    ?>
    <tr>
        <td align="right" colspan="4">Total :</td>
        <td><input type="text" name="total" value="<?php echo $total; ?>" readonly="true"></td>
    </tr>
    <tr>
        <td align="right" colspan="4">Nominal Uang :</td>
        <td><input type="text" name="cash" value="<?php echo $cash; ?>"></td>
    </tr>
    <tr>
        <td align="right" colspan="4">Kembalian :</td>
        <td><input type="text" name="charge" value="<?php echo $this->session->userdata('charge'); ?>"> <input type="submit" name="submit_charge" value="Check"></td>
    </tr>
</table>
<?php echo form_close(); ?>