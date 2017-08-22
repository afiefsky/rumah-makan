<p>
<?php echo anchor('pegawai/add', 'Tambah', ['class' => 'btn btn-primary btn-sm']); ?>
</p>

<table class="table table-bordered">
  <thead>
    <tr>
        <th>No</th>
        <th>Nama</th>
        <th>No HP</th>
        <th>Posisi</th>
        <th>Gaji Per Bulan</th>
        <th>Aksi</th>
    </tr>
  </thead>
  <tbody>
  <?php
  $no = 0;
  foreach ($record->result() as $r) {
      $no++;
      echo "<tr>
        <td>$no</td>
        <td>$r->nama_depan $r->nama_belakang</td>
        <td>$r->no_hp</td>
        <td>$r->posisi</td>
        <td>$r->gaji</td>
        <td>".
          anchor('pegawai/edit/'.$r->id, 'Edit', ['class' => 'btn btn-info btn-sm'])
        ."</td>
      </tr>";
      $no++;
  }
  ?>
  </tbody>
</table>