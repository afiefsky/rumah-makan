<h3>Edit Data Menu</h3>
<?php
echo form_open('kategori/edit');
?>
<input type="hidden" value="<?php echo $record['id_kategori']?>" name="id">
<table class="table table border">
    <tr><div class="col-sm-3"><td>Nama Menu</td></div>
        <td><input type="text" name="menu_kategori" class ="form-control" placeholder="menu_kategori"
                   value="<?php echo $record['menu_kategori']?>">
        </td></tr>
    <tr><td colspan="2"><button type="submit" class='btn btn-primary btn-sm' name="submit">Simpan</button></tr>
</table>
</form>

