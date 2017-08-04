<h3>Tambah Data menu</h3>
<?php
echo form_open('menu/post');
?>
<table class="table table border">
    <tr><td>Nama Menu</td>
        <td><div class="col-sm-3"><input type="text" name="nama_menu" class ="form-control" placeholder="nama_menu"></div>
    <tr><td>kategori</td>
        <td><div class="col-sm-3">
    <select name="id_kategori" class ="form-control">
    <?php
    foreach ($kategori as $k)
    {
        echo "<option value='$k->id_kategori'>$k->menu_kategori </ooption>" ;
    }
    ?>
        </select>
        </td></div>
    </tr>
    <tr><td>Harga</td>
        <td><div class="col-sm-3"><input type="text" name="harga" class ="form-control" placeholder="harga"></div>
        </td></tr>
    <tr><td colspan="2"><button type="submit" class='btn btn-primary btn-sm' name="submit">Simpan</button>
        <?php echo anchor('menu','Kembali',array('class'=>'btn btn-primary btn-sm'))?>
        </td></tr>
    
</table>
</form>

