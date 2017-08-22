<?php
  echo form_open('barang/edit/'.$this->uri->segment(3));
?>
<h2>Form Pengisian Edit Pembelian</h2>
<br />
<table class="table table-bordered">
  <tr>
    <td>Nama</td>
    <td><input type="text" name="nama" placeholder="Masukkan nama" value="<?php echo $record['nama'] ?>" class="form-control"></td>
  </tr>
  <tr>
    <td>Jenis</td>
    <td>
      <select name="jenis" class="form-control">
        <?php
          foreach ($all->result() as $a) {
            echo "<option value='$a->nama'";
            echo $record['jenis']==$a->nama?'selected':'';
            echo ">$a->nama</option>";
          }
        ?>
      </select>
    </td>
  </tr>
  <tr>
    <td>
      Harga Kilo
    </td>
    <td>
      <input type="text" name="harga_per_kilo" placeholder="Harga kilo" value="<?php echo $record['harga_per_kilo'] ?>" class="form-control">
    </td>
  </tr>
  <tr>
    <td>
      Jumlah Per Kilo
    </td>
    <td>
      <input type="text" name="jumlah_per_kilo" placeholder="Jumlah per kilo" value="<?php echo $record['jumlah_per_kilo'] ?>" class="form-control">
    </td>
  </tr>
  <tr>
    <td colspan="2"><input type="submit" name="submit" value="Simpan" class="btn btn-primary btn-sm"></td>
  </tr>
</table>
<?php
  echo form_close();
?>