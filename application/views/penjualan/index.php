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
        <td><b />Tanggal</td>
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
            <td>$r->created_at</td>
            <td>$r->nama</td>
            <td>$r->jenis</td>
            <td>$r->per_price</td>
            <td>
                ".$edit."
                ".$delete."
            </td>
        </tr>";
    }
    ?>
</table>