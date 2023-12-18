<!-- Table to display packages -->
<h3>Daftar Paket</h3>
<table border="1">
    <tr>
        <th>ID Paket</th>
        <th>Nama Paket</th>
        <th>Keterangan</th>
        <th>Harga</th>
        <th>DP</th>
    </tr>
    <?php foreach ($pakets as $paket) : ?>
        <tr>
            <td><?php echo $paket->id_paket; ?></td>
            <td><?php echo $paket->nama_paket; ?></td>
            <td><?php echo $paket->keterangan; ?></td>
            <td><?php echo $paket->harga; ?></td>
            <td><?php echo $paket->harga * 0.3; ?></td>

        </tr>
    <?php endforeach; ?>
</table>

<h2>Tambah Pemesanan</h2>
<form method="post" action="<?php echo base_url('index.php/pemesanan/save'); ?>">

    Pegawai:
    <select name="pegawai" id="pegawai" required>
        <option value="" disabled selected> -- Nama Pegawai -- </option>
        <?php foreach ($pegawais as $pegawai) : ?>
            <option value="<?php echo $pegawai->id_pegawai; ?>"><?php echo $pegawai->nama_pegawai; ?></option>
        <?php endforeach; ?>
    </select><br>

    Client:
    <select name="client" id="client" required>
        <option value="" disabled selected> -- Nama Client -- </option>
        <?php foreach ($clients as $client) : ?>
            <option value="<?php echo $client->id_client; ?>"><?php echo $client->nama_client; ?></option>
        <?php endforeach; ?>
    </select><br>

    Paket: 
    <select name="paket" id="paket" required>
        <option value="" disabled selected> -- Paket -- </option>
        <?php foreach ($pakets as $paket) : ?>
            <option value="<?php echo $paket->id_paket; ?>"><?php echo $paket->nama_paket; ?></option>
        <?php endforeach; ?>
    </select><br>

    <!-- Tanggal Pemesanan: <input type="date" name="tgl_pemesanan" required><br> -->

    Status: 
    <select name="status" required>
        <option value="" disabled selected> -- Status -- </option>
        <option value="lunas">Lunas</option>
        <option value="tidak lunas">Tidak Lunas</option>
    </select><br>
    <!-- Input for Bukti Transfer -->
    <label for="bukti_transfer">Bukti Transfer:</label>
    <input type="file" name="bukti_tf" id="bukti_tf" accept="image/*" required><br>

    <button type="submit">Simpan</button>
    <button onclick="goBack()">Back</button>

    <script>
        function goBack() {
            // Use the browser's history object to navigate back
            window.history.back();
        }
    </script>
</form>
