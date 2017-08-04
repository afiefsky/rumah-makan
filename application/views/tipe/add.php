<?php
	echo form_open('tipe/add');
?>
<table class="table table-bordered">
	<tr>
		<td>Nama Tipe</td>
		<td><input type="text" name="nama"></td>
	</tr>
	<tr>
		<td colspan="2"><input type="submit" name="submit" value="Simpan"></td>
	</tr>
</table>
<?php
	echo form_close();
?>