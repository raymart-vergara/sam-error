<?php include 'plugins/navbar.php'; ?>
<?php include 'plugins/sidebar/hourly_charts_bar.php'; ?>

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
                        <div class=" d-flex align-items-end mt-4">
                            <div class="p-2 col-3">
                                <label for="">Machine </label>
                                <select name="h_machine_list" id="h_machine_list" autocomplete="off" onchange="h_error_chart()"
                                    class="pl-2 form-control btn bg-info shadow">
                                    <!-- <option>Select Machine</option> -->
                                </select>
                            </div>
                            <div class="p-2 col-3">
                                <label for="">Error </label>
                                <select name="h_category_list" id="h_category_list" autocomplete="off" onchange="h_error_chart()"
                                    class="pl-2 form-control btn bg-info shadow">
                                    <!-- <option>Select Machine</option> -->
                                </select>
                            </div>
                            <div class="p-2 col-3">
                                <label for="">Error </label>
                                <select name="" id="h_category_list2" autocomplete="off" onchange="h_error_chart()"
                                    class="pl-2 form-control btn bg-info shadow">
                                    <!-- <option>Select Machine</option> -->
                                </select>
                            </div>
                            <div class="p-2 col-3">
                                <label for="">Date:</label>
                                <input type="date" id="h_date" class="form-control  border-info shadow"
                                    autocomplete="off" onchange="h_error_chart()" />
                            </div>
                        </div>
                        <div class="container-fluid my-4 mb-5">
                            <div class="col-12 p-0">
                                <div class="card rounded shadow">
                                    <div id="chart-container">
                                        <canvas id="hourly_chart"
                                            style="position: relative; height: 25vh; width:80vw"></canvas>
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
<?php
include 'plugins/js/hourly_charts_script.php'; 
?>