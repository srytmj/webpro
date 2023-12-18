<html>
<head>
    <title>Transaction Form</title>
</head>
<body>

<?php echo form_open('transaksi/submit'); ?>

    <label for="id_transaksi">Id_Transaksi:</label>
    <input type="text" name="id_transaksi" required><br>

    <label for="tanggal_transaksi">Tgl_Transaksi:</label>
    <input type="date" name="tanggal_transaksi" required><br>

    <label for="total">Total:</label>
    <input type="text" name="total" required><br>

    <label for="status">Status:</label>
    <?php
        $options = array(
            'Lunas' => 'Lunas',
            'Belum Lunas' => 'Belum Lunas'
        );
        echo form_dropdown('status', $options, 'Lunas');
    ?><br>

    <input type="submit" value="Submit">
    
<?php echo form_close(); ?>

</body>
</html>
