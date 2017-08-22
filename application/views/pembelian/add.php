<h3>Daftar Pembelian</h3>
<?php
  echo form_open('pembelian/add');
?>
<table class="table table-bordered">
  <tr class="success">
    <th colspan="2">Form</th>
  </tr>
  <tr>
    <td>
      Barang:
      <select name="barang_id">
        <?php
        foreach ($barang->result() as $r) {
            echo "<option value='$r->id'";
            echo $selected_barang['id'] == $r->id ? 'selected' : '';
            echo ">$r->nama</option>";
        }
        ?>
      </select>
      Qty: <input type="text" name="qty" id="qty" size="5" value="<?php echo $qty; ?>" required>&nbsp;KG | 
      <button type="submit" name="submit_check">Check</button>
    </td>
  </tr>
  <!-- <tr>
      <td> -->
        <input type="hidden" name="potong" value="<?php echo $potong; ?>"
          placeholder="Harga setelah check" readonly>
      <!-- </td>
  </tr> -->
  <tr>
    <td>
      Jumlah Per Kilo:
    </td>
    <td>
      <input type="text" name="jumlah_per_kilo" value="<?php echo $jumlah_per_kilo; ?>"
        placeholder="Harga setelah check" readonly>
    </td>
  </tr>
  <tr>
    <td>
      Harga Per Kilo:
    </td>
    <td>
      <input type="text" name="harga_per_kilo" value="<?php echo $harga_per_kilo; ?>"
        placeholder="Harga setelah check" readonly>
    </td>
  </tr>
  <tr>
    <td>
      Total:
    </td>
    <td>
      <input type="text" name="hrg_per_kilo" value="<?php echo $harga_total; ?>"
        placeholder="Harga setelah check" readonly>
    </td>
  </tr>
  <tr>
    <td>
      <?php
      if ($button == 0) {
          echo "<button type='submit' name='submit_keranjang' id='submit_pembelian'
            class='btn btn-danger btn-sm' disabled>Tambah Ke Keranjang</button>";
      } else {
          echo "<button type='submit' name='submit_keranjang' id='submit_pembelian'
            class='btn btn-success btn-sm'>Tambah Ke Keranjang</button>";
      }
      ?>
    </td>
    <td>
      <?php
      if ($allowEnd == 0) {
          echo anchor('pembelian/selesai/'. $pembelian_id, 'Selesai Pembelian', ['class' => 'btn btn-danger btn-sm', 'disabled' => 'true']);
      } else {
          echo anchor('pembelian/selesai/'. $pembelian_id, 'Selesai Pembelian', ['class' => 'btn btn-success btn-sm']);
      }
      ?>
    </td>
  </tr>
</table>
<?php
    echo form_close();
?>

<table class="table table-bordered">
    <tr class="success">
      <th colspan="6">Detail Transaksi</th>
    </tr>
    <tr>
      <th>No</th>
      <th>Nama Barang</th>
      <th>Qty</th>
      <th>Harga Per Kilo</th>
      <th>Subtotal</th>
      <th>Aksi</th>
    </tr>
    <?php
    $no = 0;
    $total = 0;
    foreach ($select_pembelian->result() as $r) {
        $no++;
        echo "<tr>
          <td>$no</td>
          <td>$r->nama</td>
          <td>$r->qty</td>
          <td>$r->price</td>
          <td>". $subtotal = $r->qty * $r->price ."</td>
          <td>".
            anchor('pembelian/delete/'.$r->id, 'Batal', ['class' => 'btn btn-danger btn-sm'])
          ."</td>
        </tr>";
        $total = $total + $subtotal;
    }
    ?>
    <tr>
      <td colspan="4">
        <p align="right">Total</p>
      </td>
      <td colspan="2">
        <?php echo $total; ?>
      </td>
    </tr>
</table>