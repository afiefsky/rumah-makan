<h2>Edit Menu</h2>
<br />
<?php
  echo form_open('menu/edit/'.$this->uri->segment(3));
?>
<table class="table table-bordered">
  <tr>
    <td>Nama Menu</td>
    <td><input type="text" name="nama" class="form-control" placeholder="Nama menu" value="<?php echo $record['nama']; ?>" required></td>
  </tr>
  <tr>
    <td>Kategori</td>
    <td>
      <select name="kategori" class="form-control">
        <option value="Makanan">Makanan</option>
        <option value="Minuman">Minuman</option>
      </select>
    </td>
  </tr>
  <tr>
    <td>Harga</td>
    <td><input type="text" name="harga" class="form-control" placeholder="Harga" value="<?php echo $record['harga']; ?>" required></td>
  </tr>
  <tr>
    <td colspan="2"><input type="submit" name="submit" value="Submit" class="btn btn-primary btn-sm"></td>
  </tr>
</table>
<?php
  echo form_close();
?>