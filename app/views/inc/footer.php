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
    <script src="<?php echo URL_ROOT; ?>/cpanel/vendor/datatables/jquery.dataTables.js"></script>
    <script src="<?php echo URL_ROOT; ?>/cpanel/vendor/datatables/dataTables.bootstrap4.js"></script>
    <!-- Page Script -->
    <script>
    $(document).ready(function() {
        var table = $('#table-data').DataTable();

        $('.dataTables_filter input').unbind().bind('keyup', function() {
            var colIndex = document.querySelector('#table-data-filter-column').selectedIndex;
            table.column( colIndex).search( this.value ).draw();
        });
    } );
    </script>
</body>

</html>