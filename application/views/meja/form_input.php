<h3>Tambah Data meja</h3>
<?php
echo form_open_multipart('meja/post');
?>
<table class="table table border">
<tr><td>No meja</td>
    <td><div class="col-sm-3"><input type="text" name="Nomer_meja" class="form-control"></div></td></tr>    
<tr><td>
<tr><td>Upload gambar</td>
    <td><div class="col-sm-3"><input type="file" name="userfile" class="form-control"></div></td></tr>    
<tr><td>    
        <button type="submit" name="submit">Simpan</button>
    </td></tr>
</table>
</form>

