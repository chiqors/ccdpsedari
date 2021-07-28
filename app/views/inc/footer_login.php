    <!-- jQuery -->
    <script src="<?php echo URL_ROOT; ?>/cpanel/vendor/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?php echo URL_ROOT; ?>/cpanel/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- iCheck -->
    <script src="<?php echo URL_ROOT; ?>/cpanel/vendor/iCheck/icheck.min.js"></script>
    <script>
    $(function () {
        $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass   : 'iradio_square-blue',
            increaseArea : '20%' // optional
        })
    })
    </script>
</body>
</html>
