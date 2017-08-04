<h3>edit Data menu</h3>
<?php
echo form_open('menu/edit');
?>
<input type="hidden" name="id_menu" value="<?php echo $record['id_menu']?>">
<table class="table table border">
    <tr><td width="130">Nama Menu</td>
        <td><div class="col-sm-2"><input type="text" name="nama_menu" value="<?php echo $record['nama_menu']?>" class ="form-control" placeholder="nama_menu"></div>
    <tr><td width="130">kategori</td>
        <td><div class="col-sm-2">
    <select name="id_kategori" class ="form-control">
    <?php
    foreach ($kategori as $k)
    {
        echo "<option value='$k->id_kategori'";
        echo $record['id_kategori']==$k->id_kategori?'selected':'';
        echo ">$k->menu_kategori</ooption>";
    }
    ?>
        </select>
        </td></div>
    </tr>
    <tr><td width="130">Harga</td></div>
        <td><div class="col-sm-2"><input type="text" name="harga"value="<?php echo $record['harga']?>" class ="form-control" placeholder="harga"></div>
        </td></tr>
    <tr><td colspan="2"><button type="submit" class='btn btn-primary btn-sm' name="submit">Simpan</button></tr>
</table>
</form>

