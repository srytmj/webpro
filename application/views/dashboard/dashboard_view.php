<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
</head>
<body>

<h2>Welcome, <?php echo $username; ?>!</h2>

<h1>Dokumen</h1>
<a href="<?php echo base_url('index.php/dokumen/search'); ?>">Search</a><br>
<a href="<?php echo base_url('index.php/dokumen/create'); ?>">Create</a><br>
<a href="<?php echo base_url('index.php/dokumen/index'); ?>">Index</a><br>

<h1>Gaji</h1>
<a href="<?php echo base_url('index.php/gaji'); ?>">Index</a><br>
<br><br>
<a href="<?php echo base_url('index.php/auth/logout'); ?>">Logout</a>

</body>
</html>
