<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="dashboard.php" class="brand-link">
    <img src="../../dist/img/sam-error-logo.png" alt="Logo" class="brand-image img-circle elevation-3"
      style="opacity: .8">
    <span class="brand-text font-weight-light">&ensp;SAM &ensp;|&ensp; ERROR</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="../../dist/img/user.png" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="dashboard.php" class="d-block">
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
          <a href="dashboard.php" class="nav-link active bg-info">
            <i class="nav-icon fas fa-chart-bar"></i>
            <p>
              Dashboard
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="machine_list.php" class="nav-link">
            <i class="nav-icon fas fa-laptop"></i>
            <p>
              Machine List
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="error_list.php" class="nav-link">
            <i class="nav-icon fas fa-bug"></i>
            <p>
              Error List
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="sam_charts.php" class="nav-link">
          <i class="nav-icon fas fa-chart-bar"></i>
            <p>
             Sam Charts
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="hourly_charts.php" class="nav-link">
          <i class="nav-icon fas fa-chart-bar"></i>
            <p>
             Hourly Chart
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="accounts.php" class="nav-link">
            <i class="nav-icon fas fa-user-cog"></i>
            <p>
              Account Management
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