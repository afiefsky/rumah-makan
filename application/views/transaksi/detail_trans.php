<h3><center>Struk Pembayaran Cafe Breakout</center></h3>
<h3><center>Jalan Manjaran Timur No.21</center></h3>
<center><?php echo date('D, d-M-Y | H:i'); ?><br><br>
<center>
<?php
function format_rupiah($angka){
 $rupiah=number_format($angka,0,',','.');
 return $rupiah;
}
?>
<?php
echo form_open('transaksi/detail_transaksi');
?>
<table>
    <?php
    $no=1;
    $total = 0;
    foreach ($record as $r)
      
    {
        $subtotal = ($r->qty*$r->harga);
       echo "<tr>
              <td>$r->nama_menu</td>
              <td>Rp. ".format_rupiah ($r->harga)."</td>
              <td>$r->qty</td>
              <td>Rp. ".format_rupiah ($subtotal)."</td> 
                  </tr><tr> 
                      <td align='right' colspan='4'>Cash Rp. ".$cash['value']."</td>
            </tr><tr>
            ";
       $total = $total+($r->qty*$r->harga);
       $kembalian = $cash['value'] - $total;
       echo "<td align='right' colspan='4'>Kembalian Rp." . $kembalian . "</td>";
       echo "</tr>";
        $no++;
        }
        
        
        
    ?>
    <tr>
        <tr><td colspan="3"><p align="right">Total</p></td><td align="right"><?php echo 'Rp. '. format_rupiah($total);?></td></tr>       
</table>
    <h4><center>Simpan Tanda Terima Ini</center></h4>
<h4><center>Sebagai Bukti Transaksi Yang Sah</center></h4>