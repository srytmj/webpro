<h1>Form Transaksi</h1>
<?= form_open('transaksi'); ?>
<table class="table table-bordered">
    <tr class="success">
        <th>Form</th>
    </tr>
    <tr>
        <td>
            <div class="col-sm-6">
                <?= form_input(['name' => 'barang', 'placeholder' => 'Masukkan nama barang', 'class' => 'form-control']); ?>
            </div>
            <div class="col-sm-1">
                <?= form_input(['name' => 'qty', 'placeholder' => 'QTY', 'class' => 'form-control']); ?>
            </div>
        </td>
    </tr>
    <tr>
        <td>
            <?= form_submit('submit', 'Simpan', ['class' => 'btn btn-default']); ?>
            <?= anchor('transaksi/selesai_belanja', 'Selesai', ['class' => 'btn btn-default']); ?>
        </td>
    </tr>
</table>
<?= form_close(); ?>

<table class="table table-bordered" border="2">
    <tr class="success">
        <th colspan="6">Detail Transaksi</th>
    </tr>
    <tr>
        <th>No</th>
        <th>Nama Barang</th>
        <th>Qty</th>
        <th>Harga</th>
        <th>Subtotal</th>
        <th>Cancel</th>
    </tr>
    <?php
    $no = 1;
    $total = 0;
    foreach ($detail as $r) : ?>
        <tr>
            <td><?= $no++; ?></td>
            <td><?= $r->nama_barang; ?></td>
            <td><?= $r->qty; ?></td>
            <td><?= $r->harga; ?></td>
            <td><?= $r->qty * $r->harga; ?></td>
            <td><?= anchor('transaksi/hapusitem/' . $r->t_detail_id, 'Hapus'); ?></td>
        </tr>
        <?php
        $total += $r->qty * $r->harga;
    endforeach; ?>
    <tr>
        <td colspan="4" align="right">Total</td>
        <td><?= $total; ?></td>
    </tr>
</table>

<datalist id="barang">
    <?php foreach ($barang->result() as $b) : ?>
        <option value='<?= $b->nama_barang; ?>'>
    <?php endforeach; ?>
</datalist>
