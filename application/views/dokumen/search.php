<!DOCTYPE html>
<html>
<head>
    <title>Search Dokumen</title>
</head>
<body>

<h2>Search Results for ID <?php echo $username; ?> </h2>
<table>
<?php if (!empty($dokumen)) : ?>
        <tr>
        <th>ID Dokumen</th>
        <th>ID Pegawai</th>
        <th>Tanggal Pengiriman</th>
        <th>Jenis Dokumen</th>
        </tr>
        <?php foreach ($dokumen as $doc) : ?>
            <tr>
                <td><?php echo $doc->id_dokumen; ?></td>
                <td><?php echo $doc->id_pegawai; ?></td>
                <td><?php echo $doc->tgl_pengiriman; ?></td>
                <td><?php echo $doc->jenis_dokumen; ?></td>
            </tr>
        <?php endforeach; ?>
<?php else : ?>
    <p>No documents found.</p>
<?php endif; ?> 
</table>

</body>
</html>
