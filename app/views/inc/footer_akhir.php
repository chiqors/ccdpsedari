        </div>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->
    
    <!-- jQuery -->
    <script src="<?php echo URL_ROOT; ?>/cpanel/vendor/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?php echo URL_ROOT; ?>/cpanel/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- SlimScroll -->
    <script src="<?php echo URL_ROOT; ?>/cpanel/vendor/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="<?php echo URL_ROOT; ?>/cpanel/vendor/fastclick/fastclick.js"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo URL_ROOT; ?>/cpanel/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="<?php echo URL_ROOT; ?>/cpanel/js/demo.js"></script>
    
    <script type="text/javascript">
        $(function () {
            $('#tanggal').datetimepicker({
                format : 'YYYY-MM-DD hh:mm:ss',
                ignoreReadonly: true
            });
        });
    </script>
    <script type="text/javascript" src="<?php echo URL_ROOT; ?>/cpanel/vendor/bootstrap-datetimepicker/moment.js"></script>
    <script type="text/javascript" src="<?php echo URL_ROOT; ?>/cpanel/vendor/bootstrap-datetimepicker/tempusdominus-bootstrap-4.min.js"></script>
    <!-- CK Editor -->
    <script type="text/javascript" src="<?php echo URL_ROOT; ?>/cpanel/vendor/ckeditor/ckeditor.js"></script>
    <script>
        $(function () {
            ClassicEditor
            .create(document.querySelector('#body-editor'))
            .then(function (editor) {
                // The editor instance
            })
            .catch(function (error) {
                console.error(error)
            })
        })
	</script>
	<script>
		$('#kupon').on('change', function() {
			var input_sub_total = $('#sub_total').val();
			var input_kupon_diskon = $('option:selected', this).attr('info');
			var input_total_harga = $('#total_harga');
			var total_harga_kurang = input_sub_total * (input_kupon_diskon/100);
			var total_harga = input_sub_total - total_harga_kurang;
			input_total_harga.val(total_harga);
		});
		$('#bayar').on('input', function() {
			var input_total_harga = $('#total_harga').val();
			var input_bayar = $(this).val();
			var kembalian = input_bayar - input_total_harga;
			if (kembalian < 0) {
				$('#kembalian').val('Belum Valid');
			} else {
				$('#kembalian').val(kembalian);
			}
		});
	</script>
</body>

</html>