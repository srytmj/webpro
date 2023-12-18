<h2>List Dokumen</h2>
<a href="<?php echo base_url('index.php/dokumen/create'); ?>">Tambah Dokumen</a>
<table border="1">
    <tr>
        <th>ID Dokumen</th>
        <th>ID Pegawai</th>
        <th>ID Client</th>
        <th>Tanggal Pengiriman</th>
        <th>Jenis Dokumen</th>
        <th>Aksi</th>
    </tr>
    <?php foreach ($dokumen as $item) : ?>
        <tr>
            <td><?php echo $item['id_dokumen']; ?></td>
            <td><?php echo $item['id_pegawai']; ?></td>
            <td><?php echo $item['id_client']; ?></td>
            <td><?php echo $item['tgl_pengiriman']; ?></td>
            <td><?php echo $item['jenis_dokumen']; ?></td>
            <td>
                <a href="<?php echo base_url('index.php/dokumen/edit/' . $item['id_dokumen']); ?>">Edit</a>
                <a>|</a>
                <a href="<?php echo base_url('index.php/dokumen/delete/' . $item['id_dokumen']); ?>">delete</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
