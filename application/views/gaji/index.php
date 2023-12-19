<!-- your_view_name.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Report</title>
</head>
<body>
    <h2>Monthly Report</h2>

    <!-- Form untuk filter -->
    <form method="post" action="<?php echo base_url('index.php/gaji/filter'); ?>">
        <!-- <label for="pegawai">Nama Pegawai:</label>
        <input type="text" name="pegawai" id="pegawai"> -->

        <select name="pegawai" id="pegawai" required>
        <option disabled selected> -- Nama Pegawai -- </option>
        <?php foreach ($pegawais as $pegawai) : ?>
            <option value="<?php echo $pegawai->nama_pegawai; ?>"><?php echo $pegawai->nama_pegawai; ?></option>
        <?php endforeach; ?>
        </select>

        <label for="bulan_tahun">Bulan Tahun:</label>
        <!-- Dropdown untuk bulan -->
        <select name="bulan">
            <option disabled selected> -- Bulan -- </option>
            <?php for ($i = 1; $i <= 12; $i++) : ?>
                <option value="<?php echo sprintf("%02d", $i); ?>"><?php echo date("F", mktime(0, 0, 0, $i, 1)); ?></option>
            <?php endfor; ?>
        </select>

        <!-- Dropdown untuk tahun -->
        <select name="tahun">
            <?php for ($i = date('Y'); $i >= 2000; $i--) : ?>
                <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
            <?php endfor; ?>
        </select>

        <button type="submit">Filter</button>
    </form>

    <table border="1">
        <tr>
            <th>No</th>
            <th>Bulan</th>
            <th>Nama Pegawai</th>
            <th>Gaji Pokok</th>
            <th>Jumlah Proyek</th>
            <th>Total Gaji</th>
            <th>Status Pegawai</th>
        </tr>
        <?php $no = 1; ?>
        <?php foreach ($report_data as $item) : ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $item['Bulan']; ?></td>
                <td><?php echo $item['Nama_Pegawai']; ?></td>
                <td><?php echo $item['Gaji_Pokok']; ?></td>
                <td><?php echo $item['Jumlah_Proyek']; ?></td>
                <td><?php echo $item['Total_Gaji']; ?></td>
                <td><?php echo $item['Status_Pegawai']; ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
