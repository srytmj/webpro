<h2>List Pemesanan</h2>
<a href="<?php echo base_url('index.php/pemesanan/create'); ?>">Tambah Pemesanan</a>
<table border="1">
    <tr>
        <th>Tanggal Pemesanan</th>
        <th>ID Pemesanan</th>
        <th>Client</th>
        <th>Pegawai</th>
        <th>Paket</th>
        <th>Bukti Tf</th>
        <th>Aksi</th>
    </tr>
    <?php foreach ($pemesanan as $item) : ?>
        <tr>
            <td><?php echo $item['tgl_pemesanan']; ?></td>
            <td><?php echo $item['id_pemesanan']; ?></td>
            <td><?php echo $item['nama_client']; ?></td>
            <td><?php echo $item['nama_pegawai']; ?></td>
            <td><?php echo $item['nama_paket']; ?></td>
            <td><?php echo $item['bukti_tf']; ?></td>

            <td>
                <a href="<?php echo base_url('index.php/pemesanan/edit/' . $item['id_pemesanan']); ?>">Edit</a>
                <a>|</a>
                <a href="<?php echo base_url('index.php/pemesanan/delete/' . $item['id_pemesanan']); ?>">delete</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
<button onclick="goBack()">Back</button>

<script>
function goBack() {
    // Use the browser's history object to navigate back
    window.history.back();
}
</script>