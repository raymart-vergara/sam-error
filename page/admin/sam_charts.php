<?php include 'plugins/navbar.php'; ?>
<?php include 'plugins/sidebar/sam_charts_bar.php'; ?>

<section class="container-fluid m-0 p-0">
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header bg-info">
            <div class="container-fluid">
                <div class="row">
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
                                <!-- <a href="#" class="btn btn-secondary shadow" data-toggle="modal"
                                    data-target="#import_error_data"> </a> -->
                            </div>
                            <div class="p-2">
                                <!-- <a href="#" class="btn btn-info shadow" data-toggle="modal"
                                    data-target="#target_data_modal">+
                                    Add Target </a> -->
                            </div>
                            <div class="mr-auto p-2">
                                <!-- <a href="#" class="btn btn-danger shadow" data-toggle="modal"
                                    data-target="#delete_data_modal">
                                    Delete Error </a> -->
                            </div>
                            <div class="p-2 col-3">
                                <label for="date_from_search">Date From:</label>
                                <input type="date" id="date_from_search" class="form-control  border-info shadow"
                                    style="background:none;" autocomplete="off" onchange="fitler_all()" />
                            </div>
                            <div class="p-2 col-3">
                                <label for="date_to_search">Date To:</label>
                                <input type="date" id="date_to_search" class="form-control  border-info shadow"
                                    style="background:none;" autocomplete="off" onchange="fitler_all()">
                            </div>
                            <div class="p-2 col-3">
                                <label for="sam_machine_data">&nbsp </label>
                                <select name="sam_machine_data" id="category" autocomplete="off" onchange="fitler_all()"
                                    class="pl-2 form-control btn bg-info shadow" required>
                                    <!-- <option>Select Machine</option> -->
                                </select>
                            </div>
                        </div>

                        <div class="container-fluid my-4 mb-5">
                            <div class="col-12">
                                <div class="card rounded shadow">
                                    <div id="chart-container">
                                        <canvas id="all_feed_ng_chart"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </div>
</section>
<?php include 'plugins/footer.php'; ?>
<?php include 'plugins/js/sam_charts_script.php'; ?>