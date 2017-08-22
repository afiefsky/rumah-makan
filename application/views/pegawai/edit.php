<?php
  echo form_open('pegawai/edit/'.$this->uri->segment(3));
?>
<table class="table table-bordered">
  <tr>
    <td>Nama Depan</td>
    <td><input type="text" name="nama_depan" value="<?php echo $record['nama_depan']; ?>" class="form-control"></td>
  </tr>
  <tr>
    <td>Nama Belakang</td>
    <td><input type="text" name="nama_belakang" value="<?php echo $record['nama_belakang']; ?>" class="form-control"></td>
  </tr>
  <tr>
    <td>No HP</td>
    <td><input type="text" name="no_hp" value="<?php echo $record['no_hp']; ?>" class="form-control"></td>
  </tr>
  <tr>
    <td>Posisi</td>
    <td><input type="text" name="posisi" value="<?php echo $record['posisi']; ?>" class="form-control"></td>
  </tr>
  <tr>
    <td>Gaji</td>
    <td><input type="text" name="gaji" value="<?php echo $record['gaji']; ?>" class="form-control"></td>
  </tr>
  <tr>
    <td colspan="2"><input type="submit" name="submit" value="Submit" class="btn btn-primary btn-sm"></td>
  </tr>
</table>
<?php
  echo form_close();
?>