<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
</head>
<body>

<h2>Welcome, <?php echo $username; ?>!</h2>
<h1>Master Data</h1>

<a href="<?php echo base_url('index.php/coa'); ?>">COA</a><br>
<h1>Transaksi</h1>
<a href="<?php echo base_url('index.php/Transaksi'); ?>">Search</a><br>

<h1>Dokumen</h1>
<a href="<?php echo base_url('index.php/dokumen/search'); ?>">Search</a><br>
<a href="<?php echo base_url('index.php/dokumen/create'); ?>">Create</a><br>
<a href="<?php echo base_url('index.php/dokumen/index'); ?>">Index</a><br>

<h1>Pelunasan</h1><br>
<a href="<?php echo base_url('index.php/pelunasan'); ?>">Index</a><br>

<h1>Gaji</h1>
<a href="<?php echo base_url('index.php/gaji'); ?>">Index</a><br>
<br><br>
<a href="<?php echo base_url('index.php/auth/logout'); ?>">Logout</a>

</body>
</html>
