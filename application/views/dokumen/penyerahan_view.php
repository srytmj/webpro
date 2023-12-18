<!-- application/views/view.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Dokumen</title>
</head>
<body>

    <h2>List of Dokumen</h2>

    <table border="1">
        <tr>
            <th>ID Dokumen</th>
            <th>Tanggal Pengiriman</th>
            <th>Jenis Dokumen</th>
        </tr>

        <?php foreach ($dokumen as $row): ?>
            <tr>
                <td><?php echo $row['id_dokumen']; ?></td>
                <td><?php echo $row['tgl_pengiriman']; ?></td>
                <td><?php echo $row['jenis_dokumen']; ?></td>
            </tr>
        <?php endforeach; ?>
    </table>

</body>
</html>
