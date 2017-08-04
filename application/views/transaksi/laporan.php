<h3>Laporan Transaksi</h3>
<hr>
<?php
echo form_open('transaksi/laporan');
?>
<table class="table table-bordered">
    <tr><th>No</th><th>Kode Transaksi</th><th>Tanggal Transaksi</th><th>Kasir</th><th>Total Transaksi</th>
   <?php 
   $no=1;
   foreach ($record->result() as $r)
   {
       echo "<tr><td>$no</td>
           <td>$r->id_transaksi</td>
            <td>$r->tanggal_transaksi</td>
            <td>$r->nama_lengkap</td>
            <td>$r->total</td>
            <td>";
       
       $no++;
   }
   
   ?>  
</table>