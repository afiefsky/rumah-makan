<h3>Tambah Data pegawai</h3>
<?php
echo form_open('pegawai/post','Tambah data');
?>
<table class="table table border">
    <tr><td width="130">Nama Lengkap</td>
        <td><div class="col-sm-10"><input type="text" name="nama_lengkap" class ="form-control" placeholder=""></div>
    <tr><td width="130">Alamat</td>
        <td><div class="col-sm-10"><input type="text" name="Alamat" class ="form-control" placeholder=""></div>
    <tr><td width="130">Nomer Hp</td>
        <td><div class="col-sm-10"><input type="text" name="nomer_hp" class ="form-control" placeholder=""></div>
    <tr><td width="130">Username</td>
        <td><div class="col-sm-10"><input type="text" name="username" class ="form-control" placeholder=""></div>
    <tr><td width="130">Password</td>
        <td><div class="col-sm-10"><input type="text" name="password" class ="form-control" placeholder=""></div>
    <tr><td width="130">Status</td>
        <td><div class="col-sm-10"><input type="text" name="status" class ="form-control" placeholder=""></div>
        </td></tr>
    <tr><td colspan="2"><button type="submit" class='btn btn-primary btn-sm' name="submit">Simpan</button>
         <?php echo anchor('pegawai','Kembali',array('class'=>'btn btn-primary btn-sm'))?>
        </td></tr>
</table>
</form>

