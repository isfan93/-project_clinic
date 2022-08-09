<?php
session_start();
include 'config.php';
?>
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="index3.html" class="brand-link">
        <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Admin</span>
    </a>

    <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block"><?php echo $_SESSION['username']; ?> </a>
                <a href="logout.php">Logout</a>
            </div>
        </div>

        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                <li class="nav-item">
                    <a href="home.php" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="menu.php" class="nav-link">
                        <i class="nav-icon fas fa-pencil-alt"></i>
                        <p>Pendaftaran Pasien</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="menu2.php" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>Daftar Pasien</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="farmasi.php" class="nav-link">
                        <i class="nav-icon fas fa-medkit"></i>
                        <p>Farmasi</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="kasir.php" class="nav-link">
                        <i class="nav-icon fa fa-tags" aria-hidden="true"></i>
                        <p>Kasir</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="master.php" class="nav-link">
                        <i class="nav-icon fa fa-file" aria-hidden="true"></i>
                        <p>Master</p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>




</aside>