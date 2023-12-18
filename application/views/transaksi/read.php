<html>
<head>
    <title>transaksi List</title>
</head>
<body>

<h2>transaksi List</h2>

<table border="1">
    <tr>
        <th>Id_Transaksi</th>
        <th>Tgl_Transaksi</th>
        <th>Total</th>
        <th>DP</th>
        <th>Pelunasan</th>
        <th>Status</th>
        <th>Tgl_DP</th>
        <th>Tgl_Pelunasan</th>
        <th>Action</th>
    </tr>
    <?php foreach ($transaksi as $transaksi): ?>
    <tr>
    <td><?php echo $transaksi->id_transaksi; ?></td>
    <td><?php echo $transaksi->tanggal_transaksi; ?></td>
    <td><?php echo $transaksi->total; ?></td>
    <td><?php echo $transaksi->DP; ?></td>
    <td><?php echo $transaksi->Pelunasan; ?></td>
    <td><?php echo $transaksi->status; ?></td>
    <td><?php echo $transaksi->tanggal_dp; ?></td>
    <td><?php echo $transaksi->tanggal_pelunasan; ?></td>
        <td>
            <a href="<?php echo site_url('transaksi/update/'.$transaksi->id_transaksi); ?>">Update</a>
            <a href="<?php echo site_url('transaksi/delete/'.$transaksi->id_transaksi); ?>" onclick="return confirm('Are you sure you want to delete this transaksi?')">Delete</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>

<p><a href="<?php echo site_url('transaksi/add'); ?>">Add New transaksi</a></p>

</body>
</html>
