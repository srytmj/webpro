<!-- views/login.php -->
<h2>Login</h2>
<form method="post" action="<?php echo base_url('index.php/user/login'); ?>">
    ID Client: <input type="text" name="id_client" required><br>
    Password: <input type="password" name="password" required><br>
    <button type="submit">Login</button>
</form>
