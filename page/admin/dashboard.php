<?php include 'plugins/navbar.php'; ?>
<?php include 'plugins/sidebar/dashboard_bar.php'; ?>

<div class="background-img content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-white">Dashboard</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                        <li class="breadcrumb-item active">Web Template</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <section>
        <div class="container-lg">
            <div class="row">
                <div class="col-6">
                    <div class="card">
                        <div id="chart-container">
                            <canvas id="myChart"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="card">
                        <div id="chart-container">
                            <canvas id="myChart2"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
            <div class="col-6">
                    <div class="card">
                        <div id="chart-container">
                            <canvas id="myChart3"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="card">
                        <div id="chart-container">
                            <canvas id="myChart4"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<?php include 'plugins/footer.php'; ?>
<?php include 'plugins/js/dashboard_script.php'; ?>