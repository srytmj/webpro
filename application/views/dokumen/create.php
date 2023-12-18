<h2>Tambah Dokumen</h2>
<form method="post" action="<?php echo base_url('index.php/dokumen/save'); ?>">
    <label for="nama_pegawai">Pegawai:</label>
    <select name="nama_pegawai" id="nama_pegawai" required>
        <option value="" disabled selected> -- Nama Pegawai -- </option>
        <?php foreach ($pegawais as $pegawai) : ?>
            <option value="<?php echo $pegawai->nama_pegawai; ?>"><?php echo $pegawai->nama_pegawai; ?></option>
        <?php endforeach; ?>
    </select><br>

    <label for="nama_client">Client:</label>
    <select name="nama_client" id="nama_client" required>
        <option value="" disabled selected> -- Nama Client -- </option>
        <?php foreach ($clients as $client) : ?>
            <option value="<?php echo $client->nama_client; ?>"><?php echo $client->nama_client; ?></option>
        <?php endforeach; ?>
    </select><br>

    Tanggal Pengiriman: <input type="date" name="tanggal_pengiriman" required><br>

    Jenis Dokumen: 
    <select name="jenis_dokumen" required>
        <option value="" disabled selected> -- Jenis Dokumen -- </option>
        <option value="foto">Foto</option>
        <option value="video">Video</option>
        <option value="foto dan video">foto dan video</option>
    </select><br>

    <button type="submit">Simpan</button>
    <button onclick="goBack()">Back</button>

    <script>
    function goBack() {
        // Use the browser's history object to navigate back
        window.history.back();
    }
    </script>
</form>
