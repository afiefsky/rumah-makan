<?php
	echo form_open('barang/edit/'.$this->uri->segment(3));
?>
<table class="table table-bordered">
	<tr>
		<td>Nama</td>
		<td><input type="text" name="nama" value="<?php echo $record['nama']; ?>"></td>
	</tr>
	<tr>
		<td>Jenis</td>
		<td>
			<select name="jenis">
				<?php
					foreach ($all->result() as $a) {
						echo "<option value=".$a->id.">".$a->nama."</option>";
					}
				?>
			</select>
		</td>
	</tr>
	<tr>
		<td colspan="2"><input type="submit" name="submit" value="Simpan"></td>
	</tr>
</table>
<?php
	echo form_close();
?>