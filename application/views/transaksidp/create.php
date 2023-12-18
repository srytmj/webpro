<!DOCTYPE html>
<html lang="en">
<head>
    <title>Add Transaksi DP</title>
</head>
<body>
    <h2>Add Transaksi DP</h2>

    <?= form_open("transaksidp/create"); ?>

    <label for="id_transaksi">Transaction:</label>
    <select name="id_transaksi" required>
        <?php foreach ($transaksis as $transaksi) : ?>
            <option value="<?= $transaksi['id_transaksi']; ?>"><?= $transaksi['nama_transaksi']; ?></option>
        <?php endforeach; ?>
    </select><br>

    <label for="nama_client">Nama Client:</label>
    <input type="text" name="nama_client" required><br>

    <label for="tgl_dp">Tanggal DP:</label>
    <input type="date" name="tgl_dp" required><br>

    <input type="submit" value="Add Transaksi DP">
    <?= form_close(); ?>

</body>
</html>
