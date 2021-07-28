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
    
    <!-- DataTables -->
	<script src="{{ asset('cpanel/vendor/datatables/jquery.dataTables.js') }}"></script>
	<script src="{{ asset('cpanel/vendor/datatables/dataTables.bootstrap4.js') }}"></script>
	<script>
			$(document).ready(function() {
				var table = $('#table-data').DataTable({
					"bFilter": false
				});
			});
	</script>
    <script type="text/javascript">
        $(function () {
            $('#tanggal').datetimepicker({
                format : 'YYYY-MM-DD hh:mm:ss',
                ignoreReadonly: true
            });
        });
    </script>
    <script type="text/javascript" src="{{ asset('cpanel/vendor/bootstrap-datetimepicker/moment.js') }}"></script>
    <script type="text/javascript" src="{{ asset('cpanel/vendor/bootstrap-datetimepicker/tempusdominus-bootstrap-4.min.js') }}"></script>
    <!-- CK Editor -->
    <script type="text/javascript" src="{{ asset('cpanel/vendor/ckeditor/ckeditor.js') }}"></script>
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
		$('#jumlah_beli').on('input', function() {
			var input_harga_menu = $('option:selected', $('#id_menu')).attr('info');
			var input_jumlah_beli = $(this).val();
			var total_harga = input_harga_menu * input_jumlah_beli;

			var input_total_harga = $('#total_harga');
			input_total_harga.val(total_harga);
		});
	</script>
</body>

</html>