<h2>Detail Pembelian</h2><br />
<table class="table table-bordered">
    <tr>
        <td><b />No</td>
        <td><b />Barang</td>
        <td><b />Harga</td>
        <td><b />Jumlah Per Kilo</td>
        <td><b />Subtotal</td>
    </tr>
    <?php
        $subtotal = 0;
        $total = 0;
        $no = 0;
        foreach ($record->result() as $r) {
            $no++;
            echo "<tr>
                <td>$no</td>
                <td>$r->nama</td>
                <td>$r->price</td>
                <td>$r->qty</td>
                <td>".$subtotal = $r->price * $r->qty."</td>
            </tr>";
            $total = $total + $subtotal;
        }
    ?>
    <tr>
        <td colspan="4" align="right">Total:</td>
        <td>
            <?php echo $total; ?>
        </td>
    </tr>
</table>