<!DOCTYPE html>
<html>
<head>
    <title>Search Dokumen</title>
</head>
<body>

<h2>Search Results for Client</h2>

<!-- Dropdown for selecting client -->
<form action="<?php echo base_url('index.php/dokumen/search'); ?>" method="post">
    <label for="nama_client">Select Client:</label>
    <select name="nama_client" id="nama_client">
        <option value="" disabled selected> -- Nama Client -- </option>
        <?php foreach ($clients as $client) : ?>
            <option value="<?php echo $client->nama_client; ?>"><?php echo $client->nama_client; ?></option>
        <?php endforeach; ?>
    </select>
    <button type="submit">Search</button>
</form>

<!-- <h2>Search Results for Client: <?php echo $nama_client; ?> </h2> -->

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
<button onclick="goBack()">Back</button>

<script>
function goBack() {
    // Use the browser's history object to navigate back
    window.history.back();
}
</script>
</body>
</html>
