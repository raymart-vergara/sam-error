<aside class="glassmorph main-sidebar sidebar-primary elevation-4">
    <!-- Brand Logo -->
    <a href="dashboard.php" class="brand-link">
        <img src="../../dist/img/sam-error-logo.png" alt="Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light text-white">&ensp;WEB &ensp;|&ensp; Admin</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="../../dist/img/user.png" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="dashboard.php" class="d-block text-white">
                    <?= htmlspecialchars($_SESSION['name']); ?>
                </a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="dashboard.php" class="text-white nav-link"  >
                        <i class="nav-icon fas fa-bus"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="accounts.php" class="text-white nav-link active" style="background-color:#00c8c8;">
                        <i class="nav-icon fas fa-user-cog"></i>
                        <p>
                            Account Management
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="exercise.php" class="text-white nav-link">
                        <i class="nav-icon fas fa-user-cog"></i>
                        <p>
                            Exercise JS
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="pagination.php" class="text-white nav-link">
                        <i class="nav-icon fas fa-user-cog"></i>
                        <p>
                            Pagination
                        </p>
                    </a>
                </li>
                <?php include 'logout.php'; ?>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>