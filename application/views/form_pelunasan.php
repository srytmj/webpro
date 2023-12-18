<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Transaksi Pelunasan</title>
</head>

<body>
    <h2>FORM Pelunasan</h2>
    <?php echo form_open('pelunasan'); ?>
    <table class="table table-bordered">
        <tr class="success">
            <th>Form</th>
        </tr>
        <tr>
            <td>
                <div class="col-sm-6">
                    <input list="client" name="client" placeholder="Masukan nama pegawai" class="form-control">
                </div>
                <div class="col-sm-1">
                    <input type="number" name="total_pelunasan" placeholder="total_pelunasan" class="form-control" required min="0">
                </div>
            </td>
        </tr>
        <tr>
            <td>
                <button type="submit" name="submit" class="btn btn-default">Simpan</button>
                <?php echo anchor('pelunasan/selesai_pelunasan', 'Selesai', array('class' => 'btn btn-default')) ?>
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
        <th>Tanggal</th>
        <th>Nama Client</th>
        <th>Nominal DP</th>
        <th>Total Pelunasan</th>
        <th>Total Transaksi</th>
        <th>Status</th>
 
        <th>Cancel</th>
    </tr>
    <?php
        $no = 1;
        $total = 0;

        foreach ($detail as $r) {
            $status = ($r->total_transaksi >= $r->total) ? "lunas" : "belum lunas";
            echo "<tr>
                <td>$no</td>
                <td>" . date('d-m-Y') . "</td>
                <td>" . $r->nama_client . "</td>
                <td>" . ($r->total * 30 % $some_value) . "</td>
                <td>" . $r->total_pelunasan . "</td>
                <td>" . $r->total . "</td>
                <td>$status</td>
                <td>" . anchor('pelunasan/hapusitem/' . $r->p_detail_id, 'Hapus') . "</td>
            </tr>";

            $total += $r->total_pelunasan;
            $no++;
        }
        ?>
        <tr>
            <td colspan="4">Total</td>
            <td colspan="3"><?php echo $total ?></td>
            <td></td>
        </tr>
    </table>

    <datalist id="client">
        <?php
        foreach ($client as $b) {
            echo "<option value='$b->nama_client'>";
        }
        ?>
    </datalist>
</body>

</html>