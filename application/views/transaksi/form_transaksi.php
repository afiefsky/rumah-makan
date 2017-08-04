<h3>Tampilan Pesanan</h3>
<?php
$id=  $this->uri->segment(3);
echo form_open('transaksi/trans/'.$id);
?>
    <table class="table table-bordered">
        <tr class="success"><tr><th>Pesanan</th></tr>
    <tr><td>
            <div class="col-sm-4">
                <input list="menu" name="nama_menu" placeholder="masukan nama menu" class="form-control">
            </div>
            <div class="col-sm-1">
                 <input type="text" name="qty" placeholder="QTY" class="form-control">
            </div>
        </td></tr>
    <td><tr>
    <tr><th><button type="submit" class='btn btn-primary btn-sm' name="submit">simpan</button>
    <?php echo anchor('transaksi/selesai/'.$id,'selesai',array('class'=>'btn btn-primary btn-sm'))?>
     <?php echo anchor('transaksi/detail_transaksi_by_meja/'.$id,'Cetak Struk',array('class'=>'btn btn-danger btn-sm'))?> 
    </td></tr>
</table>
</form>
<table class="table table-bordered">
    <tr class="success"><th colspan="5">Detail Pesanan</th></tr>
    <tr><th>No</th><th>Nama menu</th><th>Qty</th><th>Harga</th><th>Subtotal</th></tr>
    <?php
    $no=1;
    $total=0;
    $kembali=0;
    foreach ($detail as $r)
    {
        echo "<tr><td>$no</td>
              <td>$r->nama_menu</td>
              <td>$r->qty</td>
              <td>$r->harga</td>
              <td>".$r->qty*$r->harga."</td>
              </tr>";
        $total=$total+($r->qty*$r->harga);
        $no++;
    }
    
    ?>
    <tr><td colspan="4"><p align="right">Total</p></td><td><?php echo $total; ?></td></tr>
    <tr>
        <td colspan="4"><p align="right">Cash</p>
        </td>
        <td>
            <?php
                        foreach ($cash AS $c){
                            echo $c->value;
                        }
                    ?>
            <br><br>
            <?php
                echo form_open('transaksi/insertcash/'.$id);
            ?>
                <input type="text" name="cash" placeholder="Cash"
                value="<?php
                        $money = $c->value;
                        foreach ($cash AS $c){
                            echo $money;
                        }
                    ?>"
                >
                <!--<button type="submit" name="submit">Submit Cash</button>-->
            </form> 
        </td>
    </tr>
    <?php
        $kembali = $money - $total;
    ?>
    <tr><td colspan="4"><p align="right">Kembali</p></td><td><?php echo $kembali; ?></td></tr>
    
   
        
<datalist id="menu">
   <?php
   foreach ($menu as $m)
   {
       echo "<option value='$m->nama_menu'>";
   }
   ?>
</datalist>
