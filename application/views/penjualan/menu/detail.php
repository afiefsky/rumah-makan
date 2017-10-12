<table class="table table-bordered">
    <tr>
        <th width="5%">No</th>
        <th width="20%">Kasir</th>
        <th width="20%">Menu</th>
        <th width="20%">qty</th>
        <th width="20%">Harga</th>
        <th width="5%">Subtotal</th>
    </tr>
    <?php
    $no = 0;
    $subtotal = 0;
    $total = 0;
    foreach ($record->result() as $r) {
        $no++;
        echo "<tr>
            <td width='10%'>$no</td>
            <td width='10%'>$r->nama_depan".' '."$r->nama_belakang</td>
            <td width='10%'>$r->nama</td>
            <td width='10%'>$r->harga</td>
            <td width='10%'>$r->qty</td>
            <td width='10%'>".$subtotal = $r->harga * $r->qty."</td>
        </tr>";
        $total = $total + $subtotal;
    }
    ?>
    <tr>
        <td colspan="5" align="right">Total :</td>
        <td><?php echo $total; ?></td>
    </tr>
</table>