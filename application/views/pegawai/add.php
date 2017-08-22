<h2>Form Pegawai Baru</h2>
<br />
<?php
  echo form_open('pegawai/add');
?>
<table class="table table-bordered">
  <tr>
    <td>Nama Depan</td>
    <td><input type="text" name="nama_depan" class="form-control" placeholder="Nama depan" required></td>
  </tr>
  <tr>
    <td>Nama Belakang</td>
    <td><input type="text" name="nama_belakang" class="form-control" placeholder="Nama belakang" required></td>
  </tr>
  <tr>
    <td>No HP</td>
    <td><input type="text" name="no_hp" class="form-control" placeholder="No HP" required></td>
  </tr>
  <tr>
    <td>Posisi Pekerjaan</td>
    <td><input type="text" name="posisi" class="form-control" placeholder="Posisi pekerjaan" required></td>
  </tr>
  <tr>
    <td>Gaji Per Bulan</td>
    <td><input type="number" name="gaji" class="form-control" placeholder="Gaji per bulan" required></td>
  </tr>
  <tr>
    <td colspan="2"><input type="submit" name="submit" value="Submit" class="btn btn-primary btn-sm"></td>
  </tr>
</table>
<?php
  echo form_close();
?>