<?php include 'plugins/navbar.php'; ?>
<?php include 'plugins/sidebar/dashboard_bar.php'; ?>

<section class="container-fluid m-0 p-0">
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header bg-info">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-white">DASHBOARD</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item active">Home</li>
                            <li class="breadcrumb-item"><a href="accounts.php">Account Management</a></li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
        <!-- Main content -->
        <div class="row">
            <div class="col-12">
                <div class="card" style="background:white;">
                    <!-- /.card-header -->
                    <section class="container-lg">
                        <div class="d-flex mt-4">
                            <div class="p-2">
                            <a href="#" class="btn btn-secondary shadow" data-toggle="modal" data-target="#import_error_data"> Import Machine </a>
                            </div>
                            <div class="mr-auto p-2">
                                <a href="#" class="btn btn-info shadow" data-toggle="modal" data-target="#target_data_modal">+
                                    Add Target </a>
                            </div>
                            <div class="p-2 col-2">
                                <input type="date" id="date_from_search" class="form-control  border-info shadow" style="background:none;"  autocomplete="off"
                                    onchange="fitler_all()" />
                            </div>
                            <div class="p-2 col-2">
                                <input type="date" id="date_to_search" class="form-control  border-info shadow" style="background:none;" autocomplete="off"
                                    onchange="fitler_all()">
                            </div>
                            <div class="p-2 col-2">
                                <select name="sam_machine_data" id="sam_machine_data" autocomplete="off"
                                    onchange="fitler_all()"
                                    class="pl-2 form-control btn bg-info shadow" required>
                                    <!-- <option>Select Machine</option> -->
                                </select>
                            </div>
                        </div>

                        <div class="container-lg my-4 mb-5">
                            <div class="row">
                                <div class="col-lg-6 col-12">
                                    <div class="card rounded shadow"  >
                                        <div id="chart-container">
                                            <canvas id="feed_ng_chart"></canvas>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-12">
                                    <div class="card rounded shadow" >
                                        <div id="chart-container">
                                            <canvas id="right_strip_chart"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 col-12">
                                    <div class="card rounded shadow" >
                                        <div id="chart-container">
                                            <canvas id="left_strip_chart"></canvas>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-12">
                                    <div class="card rounded shadow">
                                        <div id="chart-container">
                                            <canvas id="camera_chart"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </section>
                </div>
                <!-- /.card -->
            </div>
        </div>
        <!-- /.row -->
    </div>
</section>
<?php include 'plugins/footer.php'; ?>
<?php include 'plugins/js/dashboard_script.php'; ?>