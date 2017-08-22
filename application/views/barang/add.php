<h2>Form Pengisian Pembelian</h2>
<?php
  echo form_open('barang/add');
?><br />
<table class="table table-bordered">
  <tr>
    <td>Nama</td>
    <td><input type="text" name="nama" placeholder="Masukkan nama" class="form-control"></td>
  </tr>
  <tr>
    <td>Jenis</td>
    <td>
      <select name="jenis" class="form-control">
        <?php
          foreach ($all->result() as $a) {
            echo "<option>$a->nama</option>";
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
      <input type="text" name="harga_per_kilo" placeholder="Harga kilo" class="form-control">
    </td>
  </tr>
  <tr>
    <td>
      Jumlah Per Kilo
    </td>
    <td>
      <input type="text" name="jumlah_per_kilo" placeholder="Jumlah per kilo" class="form-control">
    </td>
  </tr>
  <tr>
    <td colspan="2"><input type="submit" name="submit" value="Simpan" class="btn btn-primary btn-sm"></td>
  </tr>
</table>
<?php
  echo form_close();
?>