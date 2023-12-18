<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Demo coa</title>
    <!-- Add Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>

<div class="container">
    <h2 class="mt-4">DATA Coa</h2>
    <p><a href="Coa/create" class="btn btn-primary">Tambah</a></p>
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>Kode Akun</th>
                <th>Nama Akun</th>
                <th>Ubah</th>
                <th>Hapus</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($rows as $row): ?>
                <tr>
                    <td><?php echo $row->kode_akun; ?></td>
                    <td><?php echo $row->nama_akun; ?></td>
                    <td align="center">
                        <a href="Coa/update/<?php echo $row->kode_akun; ?>" class="btn btn-warning">Ubah</a>
                    </td>
                    <td align="center">
                        <a href="Coa/delete/<?php echo $row->kode_akun; ?>" class="btn btn-danger">Hapus</a>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<!-- Add Bootstrap JS and Popper.js -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

</body>
</html>
