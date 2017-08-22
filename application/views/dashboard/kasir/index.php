<h2>Daftar Meja</h2>
<br /><br />
<table class='table table-bordered'>
    <tbody>
        <?php
        $i = 0;
        $status = 0;

        echo "<tr>";
        for ($i; $i<4; $i++) {
            foreach ($table->result() as $t) {
                if ($t->status == 0) {
                    $status = '<b />Kosong';
                } else {
                    $status = '<b />Terisi';
                }
                echo "<td>
                        <img src='".base_url()."uploads/1.jpg' height='150' width='150' />
                        <br />
                        Meja ".$i." : 
                        ".anchor('penjualan/index', 'Pesan', ['class' => 'btn btn-info btn-sm'])."<br />
                        Status : ".$status."
                    </td>";
                    $i++;
                if ($i == 4) {
                    echo "</tr>";
                } else {

                }
            }
            echo "</tr>";
        }
        ?>
    </tbody>
</table>

