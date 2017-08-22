<h2>Data Menu</h2><br />
<?php
if ($this->session->userdata('kategori_id') == 2) {

} else {
    echo anchor('menu/add', 'Tambah', ['class' => 'btn btn-success btn-sm']);
}
?><br /><br />
<table class="table table-bordered">
    <tr>
        <td><b />No</td>
        <td><b />Nama</td>
        <td><b />Jenis</td>
        <td><b />Harga</td>
        <td><b />Aksi</td>
    </tr>
    <?php
    $no = 0;
    foreach ($record->result() as $r) {
        $no++;
        $this->session->userdata('kategori_id') == 2 ? 
            $edit = '' :
            $edit = anchor('menu/edit/'.$r->id, 'Edit', ['class' => 'btn btn-info btn-sm']);

        $this->session->userdata('kategori_id') == 2 ? 
            $delete = '' :
            $delete = anchor('menu/delete/'.$r->id, 'Delete', ['class' => 'btn btn-danger btn-sm']);
        echo "<tr>
            <td>$no</td>
            <td>$r->nama</td>
            <td>$r->kategori</td>
            <td>$r->harga</td>
            <td>".
                $edit . ' ' . $delete
            ."</td>
        </tr>";
    }
    ?>
</table>
<?php echo form_open('menu/index'); ?>
<table>
    <tr>
        <td>
            <select name="page_length" class="form-control">
                <option value="5">5</option>
                <option value="10">10</option>
                <option value="20">20</option>
                <option value="30">30</option>
                <option value="50">50</option>
            </select>
        </td>
        <td>&nbsp;&nbsp;</td>
        <td>
            <input type="submit" name="submit_page" value="Check" class="btn btn-primary btn-sm">
        </td>
        <td>&nbsp;&nbsp;</td>
        <td>
            <?php echo $paging; ?>
        </td>
    </tr>
</table>
<?php echo form_close(); ?>