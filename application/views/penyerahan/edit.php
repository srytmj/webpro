<!-- Form untuk mengedit penyerahan dokumen -->
<h2>Edit Penyerahan Dokumen</h2>
<form method="post" action="<?php echo base_url('index.php/penyerahan/update'); ?>">
    <input type="hidden" name="id_penyerahan" value="<?php echo $penyerahan['id_penyerahan']; ?>">
    ID Client: <input type="text" name="id_client" value="<?php echo $penyerahan['id_client']; ?>" required><br>
    Tanggal Pengiriman: <input type="date" name="tanggal_pengiriman" value="<?php echo $penyerahan['tanggal_pengiriman']; ?>" required><br>
    Jenis Dokumen: <input type="text" name="jenis_dokumen" value="<?php echo $penyerahan['jenis_dokumen']; ?>" required><br>
    <button type="submit">Simpan</button>
</form>
