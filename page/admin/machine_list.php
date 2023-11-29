<?php include 'plugins/navbar.php'; ?>
<?php include 'plugins/sidebar/machine_list_bar.php'; ?>

<section class="container-fluid m-0 p-0">
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header bg-info">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-white">MACHINE LIST</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                            <li class="breadcrumb-item active">Machine List</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
        <!-- Main content -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <!-- /.card-header -->
                    <section class="container-lg">
                        <div class="d-flex mt-5">
                            <div class="mr-auto p-2">
                            <a href="#" class="btn btn-info" data-toggle="modal" data-target="#add_new_machine">+ Add Machine</a>
                            </div>
                            <div class="p-2"> 
                                <input type="text" id="search_machine_list" class="form-control shadow border-0"
                                    autocomplete="off" placeholder="Sam Machine" />
                                </div>
                            <div class="p-2">
                            <button class="btn btn-info shadow bg-info" id="searchReqBtn"
                                    onclick="search_machine()">Search <i class="fas fa-search"></i></button>
                            </div>
                        </div>
                        <div class="card-body table-responsive mb-5 mt-3 p-0 " style="height: 600px;">
                            <table class="table table-bordered table-head-fixed  text-nowrap table-hover shadow"
                                id="accounts_table">
                                <thead style="text-align:center;">
                                    <th class="bg-info"> # </th>
                                    <th class="bg-info"> Sam Machine </th>
                                    <th class="bg-info"> Ip Address </th>
                                </thead>
                                <tbody id="list_of_machines" class="shadow"style="text-align:center;"></tbody>
                            </table>
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
<?php include 'plugins/js/machine_list_script.php'; ?>