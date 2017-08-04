<h3>Edit Data pegawai</h3>
<?php
echo form_open('pegawai/edit');
?>
<input type="hidden" value="<?php echo $record['operator_id']?>" name="id">
<table class="table table border">
    <tr><td width="130">Nama Lengkap</td>
        <td><div class="col-sm-10"><input type="text" name="nama_lengkap" class ="form-control" placeholder="nama_lengkap"
                                         value="<?php echo $record['nama_lengkap']?>"></div>
    <tr><td width="130">Alamat</td>
        <td><div class="col-sm-10"><input type="text" name="Alamat" class ="form-control" placeholder="Alamat"
                                         value="<?php echo $record['Alamat']?>"></div>
    <tr><td width="130">Nomer Hp</td>
        <td><div class="col-sm-10"><input type="text" name="nomer_hp" class ="form-control" placeholder="nomer_hp"
                                         value="<?php echo $record['nomer_hp']?>"></div>
    <tr><td width="130">Username</td>
        <td><div class="col-sm-10"><input type="text" name="username" class ="form-control" placeholder="username"
                                         value="<?php echo $record['username']?>"></div>
    <tr><td width="130">Password</td>
        <td><div class="col-sm-10"><input type="text" name="password" class ="form-control" placeholder="password"
                                         value="<?php echo $record['password']?>"></div>       
    <tr><td width="130">Status</td>
        <td><div class="col-sm-10"><input type="text" name="status" class ="form-control" placeholder="status"
                                         value="<?php echo $record['status']?>"></div>
        </td></tr>
    <tr><td colspan="2"><button type="submit" class='btn btn-primary btn-sm' name="submit">Simpan</button></tr>
</table>
</form>

