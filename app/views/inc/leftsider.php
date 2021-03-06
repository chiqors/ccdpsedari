<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?php echo URL_ROOT; ?>/transaksi" class="brand-link bg-primary">
        <img src="<?php echo URL_ROOT; ?>/cpanel/img/logo.png" alt="Logo" class="brand-image"
            style="opacity: .8">
        <span class="brand-text font-weight"><b><?php echo SITE_NAME; ?> (Kasir)</b></span>
    </a>
    <!-- Profile panel -->
    <div class="user-profile d-flex">
        <div class="profile-canvas" style="background-image: linear-gradient(135deg,rgba(45,53,61,.79) 0,rgba(45,53,61,.5) 100%),url(<?php echo URL_ROOT; ?>cpanel/img/bg.jpg)"></div>
        <a href="#" class="profile-link">
            <img src="<?php echo URL_ROOT; ?>/cpanel/img/_kasir.png" alt="Logo" class="brand-image img-circle elevation-3">
            <span class="brand-text profile-text font-weight-light"><b><?php echo $_SESSION['user_username']; ?></b></span>
        </a>
    </div>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2 sidebar-container">
            <ul class="nav nav-pills nav-sidebar flex-column sidebar-menu" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
            with font-awesome or any other icon font library -->
				<li class="nav-item menu-open">
                    <a href="<?php echo URL_ROOT; ?>/transaksi" class="nav-link active">
                        <i class="nav-icon fa fa-exchange"></i>
                        <p>
                            Transaksi
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>