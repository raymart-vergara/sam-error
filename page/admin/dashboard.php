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
            <div class="row m-0 p-0 mb-3">
                <div class="col m-0 p-0 mb-3">
                    <button class="btn btn-secondary shadow">Import Machine</button>
                    <a href="#" class="btn btn-info" data-toggle="modal" data-target="#target_data_modal">+ Add
                        Target</a>
                </div>

                <div class="row">
                    <div class="col mb-3 shadow">
                        <input type="date" id="date_from_search" class="form-control" autocomplete="off" onchange="feed_ng()">
                    </div>
                    <div class="col mb-3 shadow">
                        <input type="date" id="date_to_search" class="form-control" autocomplete="off" onchange="feed_ng()">
                    </div>
                    <div class="col">
                        <select name="sam_machine_data" id="sam_machine_data" autocomplete="off"
                        style="color: #525252;font-size: 15px;border-radius: .22rem; border: 1px solid #ced4da; background: #FFF;height:37px; width:100%;"
                            class="pl-2" required>
                            <!-- <option>Select Machine</option> -->
                        </select>
                    </div>

                </div>
            </div>

        </div>
        <div class="container-lg">
            <div class="row">
                <div class="col-lg-6 col-md-12">
                    <div class="card shadow">
                        <div id="chart-container">
                            <canvas id="feed_ng_chart"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12">
                    <div class="card shadow">
                        <div id="chart-container">
                            <canvas id="right_strip_chart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 col-md-12">
                    <div class="card shadow">
                        <div id="chart-container">
                            <canvas id="left_strip_chart"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12">
                    <div class="card shadow">
                        <div id="chart-container">
                            <canvas id="camera_chart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<?php include 'plugins/footer.php'; ?>
<?php include 'plugins/js/dashboard_script.php'; ?>