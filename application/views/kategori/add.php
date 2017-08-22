<?php
	echo form_open('kategori/add');
?>
<table class="table table-bordered">
	<tr>
		<td>Nama Kategori</td>
		<td><input type="text" name="nama"></td>
	</tr>
	<tr>
		<td colspan="2"><input type="submit" name="submit" value="Simpan"></td>
	</tr>
</table>
<?php
	echo form_close();
?>