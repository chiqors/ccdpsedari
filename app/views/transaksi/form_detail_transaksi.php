<?php require APP_ROOT . '/views/inc/header_alur.php' ?>
<?php require APP_ROOT . '/views/inc/leftsider.php' ?>

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Alur Transaksi (Bagian 1) <small></small></h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item">Alur Transaksi</li>
                    <li class="breadcrumb-item active">Detail Transaksi</li>
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
                    <li class="active"><span>Detail Transaksi</span></li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <form role="form" action="<?php echo URL_ROOT; ?>/transaksi/store_detail_transaksi" enctype="multipart/form-data" method="POST">
            <div class="row">
                <!-- left column -->
                <div class="col-md-6">
                    <!-- general form elements -->
                    <div class="card card-primary">
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
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="id_transaksi">ID Transaksi</label>
                                        <input type="text" class="form-control" name="id_transaksi" value="<?php echo $data['info_transaksi']; ?>" readonly>
                                    </div>
                                    <div class="form-group">
										<label for="id_menu">Menu</label>
                                        <select id="id_menu" class="form-control" name="id_menu">
                                            <?php if(@$data['info_menu']) { ?>
                                            <?php foreach($data['info_menu'] as $menu) : ?>
											<option value="<?php echo $menu->id; ?>" info="<?php echo $menu->harga; ?>">#<?php echo $menu->id; ?> - <?php echo $menu->nama_menu; ?> - Rp.<?php echo $menu->harga; ?></option>
											<?php endforeach ?>
											<?php } else { ?>
											<option value="">--MENU TIDAK TERSEDIA--</option>
											<?php } ?>
										</select>
                                    </div>
                                    <div class="form-group">
                                        <label for="jumlah_beli">Jumlah Beli</label>
                                        <input id="jumlah_beli" type="text" class="form-control" name="jumlah_beli">
									</div>
									<div class="form-group">
                                        <label for="total_harga">Total Harga</label>
                                        <input id="total_harga" type="number" class="form-control" name="total_harga" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
							<button type="submit" class="btn btn-info" name="submitForm" value="loop">Selesai & Ulangi</button> | 
							<button type="submit" class="btn btn-primary" name="submitForm">Selesai & Lanjut</button>
                        </div>
                    </div>
                    <!-- /.card -->
				</div>
				<div class="col-md-6">
                    <!-- table form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Daftar Pesanan Menu</h3>
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
								<table id="table-data" class="table table-bordered table-striped text-center table-responsive-sm">
									<thead>
										<tr>
											<th>#</th>
											<th>Nama Menu</th>
											<th>Harga</th>
											<th>Jumlah Beli</th>
											<th>Total Harga</th>
										</tr>
									</thead>
									<tbody>
                                        <?php
                                            $i = 1;
                                        ?>
                                        <?php if(@$data['info_transaksi_menu']) { ?>
                                        <?php foreach($data['info_transaksi_menu'] as $info_data) : ?>
										<tr>
											<td><?php echo $i++; ?></td>
											<td><?php echo $info_data->nama_menu; ?></td>
											<td>Rp. <?php echo $info_data->harga; ?></td>
											<td><?php echo $info_data->jumlah_beli; ?></td>
											<td>Rp. <?php echo $info_data->total_harga; ?></td>
										</tr>
                                        <?php endforeach ?>
										<?php } ?>
									</tbody>
									<tfoot>
										<tr>
											<td colspan="4"><b>Sub Total</b></td>
											<td>Rp. <?php echo (empty($data['info_sub_total']->sub_total)) ? '0' : $data['info_sub_total']->sub_total ?></td>
										</tr>
									</tfoot>
								</table>
							</div>
                        </div>
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </form>
    </div>
</section>
<?php require APP_ROOT . '/views/inc/footer_alur.php' ?>