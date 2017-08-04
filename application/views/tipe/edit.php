<?php
	echo form_open('tipe/edit/'.$this->uri->segment(3));
?>
<table class="table table-bordered">
	<tr>
		<td>Nama</td>
		<td><input type="text" name="nama" value="<?php echo $record['nama']; ?>"></td>
	</tr>
	<tr>
		<td colspan="2"><input type="submit" name="submit" value="Simpan"></td>
	</tr>
</table>
<?php
	echo form_close();
?>