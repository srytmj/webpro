<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Transaksi Gaji</title>
</head>

<body>
    <h2>FORM GAJI</h2>
    <?php echo form_open('gaji'); ?>
    <table class="table table-bordered">
        <tr class="success">
            <th>Form</th>
        </tr>
        <tr>
            <td>
                <div class="col-sm-6">
                    <input list="pegawai" name="pegawai" placeholder="Masukan nama pegawai" class="form-control">
                </div>
                <div class="col-sm-1">
                    <input type="number" name="jumlah_proyek" placeholder="jumlah_poryek" class="form-control" required min="0">
                </div>
            </td>
        </tr>
        <tr>
            <td>
                <button type="submit" name="submit" class="btn btn-default">Simpan</button>
                <?php echo anchor('gaji/selesai_gaji', 'Selesai', array('class' => 'btn btn-default')) ?>
            </td>
        </tr>
    </table>
    <?php echo form_close(); ?>


    <table class="table table-bordered" border="2">
    <tr class="success">
        <th colspan="8">Detail transaksi</th>
    </tr>
    <tr>
        <th>No</th>
        <th>Nama Pegawai</th>
        <th>Gaji Pokok</th>
        <th>Jumlah Proyek</th>
        <th>Total Gaji</th>
        <th>Status Pegawai</th>
        <th>Tanggal</th>
        <th>Cancel</th>
    </tr>
    <?php
$no = 1;
$total = 0;

foreach ($detail as $r) {
    $gaji_total = 0;

    if ($r->status_pegawai == 'pegawai tetap') {
        $gaji_total = $r->jumlah_proyek * $r->gaji_pokok;
        $gaji_pokok = $r->gaji_pokok;
    } else {
        $gaji_total = $r->jumlah_proyek * 4000000;
        $gaji_pokok = 4000000;
    }

    echo "<tr>
        <td>$no</td>
        <td>" . $r->nama_pegawai . "</td>
        <td>" . $gaji_pokok . "</td>
        <td>" . $r->jumlah_proyek . "</td>
        <td>" . $gaji_total . "</td>
        <td>" . $r->status_pegawai . "</td>
        <td>" . date('d-m-Y') . "</td>
        <td>" . anchor('gaji/hapusitem/' . $r->p_detail_id, 'Hapus') . "</td>
    </tr>";

    $total += $gaji_total;
    $no++;
}
?>
<tr>
    <td colspan="4">Total</td>
    <td colspan="3"><?php echo $total ?></td>
    <td></td>
</tr>

</table>

    <datalist id="pegawai">
        <?php
        foreach ($pegawai->result() as $b) {
            echo "<option value='$b->nama_pegawai'>";
        }
        ?>
    </datalist>
</body>

</html>
