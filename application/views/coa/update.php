<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Demo client</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h2>DATA CLIENT</h2>
        <p><strong>Update Data</strong></p>

        <form action="update" method="post">
            <div class="form-group">
                <label for="kode_akun"><?php echo $model->labels['kode_akun']; ?></label>
                <input type="text" class="form-control" name="kode_akun" size="10" maxlength="4" readonly value="<?php echo $model->kode_akun; ?>" />
            </div>

            <div class="form-group">
                <label for="nama_akun"><?php echo $model->labels['nama_akun']; ?></label>
                <input type="text" class="form-control" name="nama_akun" size="30" maxlength="25" value="<?php echo $model->nama_akun; ?>" />
            </div>

            <button type="submit" class="btn btn-primary" name="btnSubmit">Simpan</button>
            <button type="button" class="btn btn-secondary" onclick="javascript:history.go(-1);">Batal</button>
        </form>
    </div>

    <!-- Bootstrap JS and Popper.js (required for Bootstrap) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
