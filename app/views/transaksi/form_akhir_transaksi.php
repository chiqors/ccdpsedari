<?php require APP_ROOT . '/views/inc/header_akhir.php' ?>
<?php require APP_ROOT . '/views/inc/leftsider.php' ?>

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Alur Transaksi (Bagian Terakhir) <small></small></h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item">Alur Transaksi</li>
                    <li class="breadcrumb-item active">Transaksi</li>
                </ol>
            </div>
		</div>
		<div class="row">
            <div class="col-sm-12">
                <hr class="separator">
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="d-flex justify-content-center align-items-center">
                    <h5>Cara untuk membuat alur transaksi:</h5>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <ol class="breadcrumb arr-bread d-flex justify-content-center align-items-center">
                    <li><a href="#">Alur Data</a></li>
					<li><a href="#">Detail Transaksi</a></li>
					<li class="active"><span>Transaksi</span></li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <form role="form" action="<?php echo URL_ROOT; ?>/transaksi/store_transaksi/<?php echo $_SESSION['info_alur_id_transaksi']; ?>" enctype="multipart/form-data" method="POST">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Transaksi</h3>
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
                                <div class="col-lg-12">
									<div class="form-group">
										<label for="id">ID Transaksi (<?php echo $_SESSION['info_alur_id_transaksi']; ?>)</label>
                                    </div>
                                    <div class="form-group">
                                        <label for="tanggal">Tanggal Transaksi</label>
                                        <div class="input-group date" id="tanggal" data-target-input="nearest">
											<input type="text" class="form-control datetimepicker-input" name="tanggal" data-target="#tanggal" placeholder="Silahkan, tekan icon tanggal untuk menginput" readonly/>
											<div class="input-group-append" data-target="#tanggal" data-toggle="datetimepicker">
												<div class="input-group-text"><i class="fa fa-calendar"></i></div>
											</div>
										</div>
                                    </div>
                                    <div class="form-group">
										<label for="sub_total">Sub Total</label>
										<input id="sub_total" type="text" class="form-control" name="sub_total" value="<?php echo $data['info_sub_total_transaksi']; ?>" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="kupon">Kupon</label>
                                        <select id="kupon" class="form-control" name="kupon">
											<option value="" info="0" selected>TIDAK PAKAI KUPON</option>
                                            <?php if(@$data['info_kupon']) { ?>
                                            <?php foreach($data['info_kupon'] as $info_data) : ?>
											<option value="<?php echo $info_data->id; ?>" info="<?php echo $info_data->diskon; ?>">Kupon #<?php echo $info_data->id; ?> (<?php echo $info_data->diskon; ?>%)</option>
											<?php endforeach ?>
											<?php } else { ?>
											<option>--KUPON TIDAK TERSEDIA--</option>
											<?php } ?>
										</select>
									</div>
									<div class="form-group">
                                        <label for="total_harga">Total Harga</label>
                                        <input id="total_harga" type="text" class="form-control" name="total_harga" value="<?php echo $data['info_sub_total_transaksi']; ?>" readonly>
									</div>
									<div class="form-group">
                                        <label for="bayar">Bayar</label>
                                        <input id="bayar" type="text" class="form-control" name="bayar" value="0">
									</div>
									<div class="form-group">
                                        <label for="kembalian">Kembalian</label>
                                        <input id="kembalian" type="text" class="form-control" name="kembalian" value="0" readonly>
									</div>
									<div class="form-group">
                                        <label for="kasir">Kasir</label>
                                        <input type="text" class="form-control" name="kasir" name="kasir" value="<?php echo $_SESSION['user_nip']; ?>" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Finish</button>
                        </div>
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </form>
    </div>
</section>
<!-- /.content -->

<?php require APP_ROOT . '/views/inc/footer_akhir.php' ?>