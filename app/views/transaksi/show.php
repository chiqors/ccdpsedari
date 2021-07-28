<?php require APP_ROOT . '/views/inc/header.php' ?>
<?php require APP_ROOT . '/views/inc/leftsider.php' ?>

<?php if(@$_SESSION['success']) : ?>
    <div class="alert alert-success">
        <div class="container">
            <?php echo $_SESSION['success'] ?>
        </div>
    </div>
    <?php unset($_SESSION['success']) ?>
<?php endif ?>
<?php if(@$_SESSION['error']) : ?>
    <div class="alert alert-danger">
        <div class="container">
            <?php echo $_SESSION['error'] ?>
        </div>
    </div>
    <?php unset($_SESSION['error']) ?>
<?php endif ?>

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Tampil Transaksi <small></small></h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?php echo URL_ROOT; ?>/transaksi">Transaksi</a></li>
                    <li class="breadcrumb-item active">Tampil Transaksi</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
<!-- Main content -->
<section class="content">
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title"><b>Informasi Transaksi</b></h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                            <i class="fa fa-minus"></i></button>
                        <button type="button" class="btn btn-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                            <i class="fa fa-times"></i></button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-user-information">
                                <tbody>
                                    <tr>
                                        <td>Tanggal Transaksi</td>
                                        <td><?php echo $data['transaksi']->tanggal ?></td>
                                    </tr>
                                    <tr>
                                        <td>Sub Total</td>
                                        <td>Rp. <?php echo $data['transaksi']->sub_total ?></td>
                                    </tr>
                                    <tr>
                                        <td>Kupon</td>
                                        <td>ID #<?php echo $data['transaksi']->kupon ?></td>
                                    </tr>
                                    <tr>
                                        <td>Total Harga</td>
                                        <td>Rp. <?php echo $data['transaksi']->total_harga ?></td>
                                    </tr>
                                    <tr>
                                        <td>Bayar</td>
                                        <td>Rp. <?php echo $data['transaksi']->bayar ?></td>
                                    </tr>
                                    <tr>
                                        <td>Kembalian</td>
                                        <td>Rp. <?php echo $data['transaksi']->kembalian ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Detail Transaksi</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                            <i class="fa fa-minus"></i></button>
                        <button type="button" class="btn btn-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                            <i class="fa fa-times"></i></button>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="row">
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <table id="table-data" class="table table-bordered table-striped text-center table-responsive-sm">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Menu</th>
                                    <th>Jumlah Beli</th>
                                    <th>Total Harga</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($data['detail_transaksi'] as $dtransaksi) : ?>
                                    <tr>
                                        <td><?php echo $dtransaksi->id ?></td>
                                        <td><?php echo $dtransaksi->nama_menu ?></td>
                                        <td><?php echo $dtransaksi->jumlah_beli ?></td>
                                        <td>Rp. <?php echo $dtransaksi->total_harga ?></td>
                                    </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>
</div>
<!-- /.row -->
</section>

<?php require APP_ROOT . '/views/inc/footer.php' ?>