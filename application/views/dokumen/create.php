<h2>Tambah Dokumen</h2>
<form method="post" action="<?php echo base_url('index.php/dokumen/save'); ?>">
    ID Pegawai: <input type="text" name="id_pegawai" required><br>
    ID Client:  <input type="text" name="username" required><br>
    Tanggal Pengiriman: <input type="date" name="tanggal_pengiriman" required><br>
       Jenis Dokumen: 
    <select name="jenis_dokumen" required>
        <option value="foto">Foto</option>
        <option value="video">Video</option>
        <option value="foto dan video">foto dan video</option>
    </select><br>

    <button type="submit">Simpan</button>
</form>
