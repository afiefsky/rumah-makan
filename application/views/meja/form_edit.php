<h3>Edit Data Menu</h3>
<?php
echo form_open('meja/edit');
?>
<input type="hidden" value="<?php echo $record['id_meja']?>" name="id">
<table class="table table-bordered">
    <tr><td>Atas Nama</td>
        <td><input type="text" name="atas_nama" placeholder="atas_nama"
                   value="<?php echo $record['atas_nama']?>">
        </td></tr>
    <tr><td colspan="2"><button type="submit" name="submit">Simpan</button></tr>
   
</table>
</form>

