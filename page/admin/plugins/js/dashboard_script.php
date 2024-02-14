<script type="text/javascript">
    let chart; // define chart variable outside of function
    let right_strip; // define chart variable outside of function
    let left_strip; // define chart variable outside of function
    let camera;
    $(document).ready(function () {
        fetch_opt_sam_machine_data();
        fitler_all();
    });

    const fitler_all = () => {
        feed_ng();
        right_strip_ng();
        left_strip_ng();
        camera_ng();
    }
    const import_machine_func = () => {
        let import_machine_data = document.getElementById('import_machine_data').value;
        if (import_machine_data === '') {
            Swal.fire({
                icon: 'info',
                title: 'Select Machine !!!',
                text: 'Information',
                showConfirmButton: false,
                timer: 1000
            });
        } else {
            $('#import_error_data').modal('hide');
            Swal.fire({
                icon: 'info',
                title: 'Please Wait!!',
                text: '',
                showConfirmButton: false,
                allowOutsideClick: false,
                allowEscapeKey: false,
                allowEnterKey: false
            });
        }
    }



    const fetch_opt_sam_machine_data = () => {
        $.ajax({
            url: '../../process/admin/dashboard/dashboard_p.php',
            type: 'POST',
            cache: false,
            data: {
                method: 'fetch_opt_sam_machine_data',
            },
            success: function (response) {
                $('#sam_machine_data').html(response);
                $('#input_sam_machine').html(response);
                $('#import_machine_data').html(response);
                $('#delete_sam_machine').html(response);
            }
        });
    }

    const feed_ng = () => {
        let date_from_search = document.getElementById('date_from_search').value;
        let date_to_search = document.getElementById('date_to_search').value;
        let sam_machine_data = document.getElementById('sam_machine_data').value;
        $.ajax({
            url: '../../process/admin/dashboard/dashboard_p.php',
            type: 'POST',
            dataType: 'json',
            data: {
                method: 'feed_ng',
                date_from_search: date_from_search,
                date_to_search: date_to_search,
                sam_machine_data: sam_machine_data
            },
            success: function (data) {
                let error_date = [];
                let Feed_NG = [];
                let target = [];
                for (let i = 0; i < data.length; i++) {
                    error_date.push(data[i].error_date);
                    Feed_NG.push(data[i].Feed_NG);
                    target.push(data[i].target);
                }

                let ctx = document.getElementById('feed_ng_chart').getContext('2d');
                let configuration = 0;

                configuration = {
                    type: 'bar',
                    // options: {
                    //   indexAxis: 'y',
                    // },
                    data: {
                        labels: error_date,
                        datasets: [
                            {
                                label: 'Target',
                                backgroundColor: 'rgba(27,27,27)',
                                borderColor: 'rgba(27,27,27)',
                                type: 'line',
                                borderWidth: 2,
                                data: target,
                            }, {
                                label: 'Feed NG',
                                backgroundColor: 'rgba(23, 162, 184, 0.5)',
                                borderColor: 'rgba(23, 162, 184, 1)',
                                borderWidth: 1,
                                data: Feed_NG,
                            }
                        ],
                    },
                }

                if (chart) {
                    chart.destroy();
                    chart = new Chart(ctx, configuration);
                } else {
                    chart = new Chart(ctx, configuration);
                }
            },
        });

    }

    const right_strip_ng = () => {
        let date_from_search = document.getElementById('date_from_search').value;
        let date_to_search = document.getElementById('date_to_search').value;
        let sam_machine_data = document.getElementById('sam_machine_data').value;
        $.ajax({
            url: '../../process/admin/dashboard/dashboard_p.php',
            type: 'POST',
            dataType: 'json',
            data: {
                method: 'right_strip_ng',
                date_from_search: date_from_search,
                date_to_search: date_to_search,
                sam_machine_data: sam_machine_data
            },
            success: function (data) {
                let error_date = [];
                let Feed_NG = [];
                let target = [];

                for (let i = 0; i < data.length; i++) {
                    error_date.push(data[i].error_date);
                    Feed_NG.push(data[i].Feed_NG);
                    target.push(data[i].target);
                }

                let ctx = document.getElementById('right_strip_chart').getContext('2d');
                let configuration = 0;

                configuration = {
                    type: 'bar',
                    // options: {
                    //   indexAxis: 'y',
                    // },
                    data: {
                        labels: error_date,
                        datasets: [
                            {
                                label: 'Target',
                                backgroundColor: 'rgba(27,27,27)',
                                borderColor: 'rgba(27,27,27)',
                                type: 'line',
                                borderWidth: 2,
                                data: target,
                            },
                            {
                                label: 'Right Strip NG',
                                backgroundColor: 'rgba(23, 162, 184, 0.5)',
                                borderColor: 'rgba(23, 162, 184, 1)',
                                borderWidth: 1,
                                data: Feed_NG,
                            }],
                    },
                }

                if (right_strip) {
                    right_strip.destroy();
                    right_strip = new Chart(ctx, configuration);
                } else {
                    right_strip = new Chart(ctx, configuration);
                }
            },
        });
    }

    const left_strip_ng = () => {
        let date_from_search = document.getElementById('date_from_search').value;
        let date_to_search = document.getElementById('date_to_search').value;
        let sam_machine_data = document.getElementById('sam_machine_data').value;
        $.ajax({
            url: '../../process/admin/dashboard/dashboard_p.php',
            type: 'POST',
            dataType: 'json',
            data: {
                method: 'left_strip_ng',
                date_from_search: date_from_search,
                date_to_search: date_to_search,
                sam_machine_data: sam_machine_data
            },
            success: function (data) {
                let error_date = [];
                let Feed_NG = [];
                let target = [];

                for (let i = 0; i < data.length; i++) {
                    error_date.push(data[i].error_date);
                    Feed_NG.push(data[i].Feed_NG);
                    target.push(data[i].target);
                }

                let ctx = document.getElementById('left_strip_chart').getContext('2d');
                let configuration = 0;
                configuration = {
                    type: 'bar',
                    // options: {
                    //   indexAxis: 'y',
                    // },
                    data: {
                        labels: error_date,
                        datasets: [
                            {
                                label: 'Target',
                                backgroundColor: 'rgba(27,27,27)',
                                borderColor: 'rgba(27,27,27)',
                                type: 'line',
                                borderWidth: 2,
                                data: target,
                            },
                            {
                                label: 'Left Strip NG',
                                backgroundColor: 'rgba(23, 162, 184, 0.5)',
                                borderColor: 'rgba(23, 162, 184, 1)',
                                borderWidth: 1,
                                data: Feed_NG,
                            }
                        ],
                    },
                }


                if (left_strip) {
                    left_strip.destroy();
                    left_strip = new Chart(ctx, configuration);
                } else {
                    left_strip = new Chart(ctx, configuration);
                }
            },
        });
    }

    const camera_ng = () => {
        let date_from_search = document.getElementById('date_from_search').value;
        let date_to_search = document.getElementById('date_to_search').value;
        let sam_machine_data = document.getElementById('sam_machine_data').value;
        $.ajax({
            url: '../../process/admin/dashboard/dashboard_p.php',
            type: 'POST',
            dataType: 'json',
            data: {
                method: 'camera_ng',
                date_from_search: date_from_search,
                date_to_search: date_to_search,
                sam_machine_data: sam_machine_data
            },
            success: function (data) {
                let error_date = [];
                let Feed_NG = [];
                let target = [];
                for (let i = 0; i < data.length; i++) {
                    error_date.push(data[i].error_date);
                    Feed_NG.push(data[i].Feed_NG);
                    target.push(data[i].target);
                }

                let ctx = document.getElementById('camera_chart').getContext('2d');
                let configuration = 0;
                configuration = {
                    type: 'bar',
                    // options: {
                    //   indexAxis: 'y',
                    // },
                    data: {
                        labels: error_date,
                        datasets: [
                            {
                                label: 'Target',
                                backgroundColor: 'rgba(27,27,27)',
                                borderColor: 'rgba(27,27,27)',
                                type: 'line',
                                borderWidth: 2,
                                data: target,
                            },
                            {
                                label: 'Camera NG',
                                backgroundColor: 'rgba(23, 162, 184, 0.5)',
                                borderColor: 'rgba(23, 162, 184, 1)',
                                borderWidth: 1,
                                data: Feed_NG,
                            }],
                    },
                }
                if (camera) {
                    camera.destroy();
                    camera = new Chart(ctx, configuration);
                } else {
                    camera = new Chart(ctx, configuration);
                }

            },
        });
    }

    const update_target = () => {
        let input_sam_machine = document.getElementById('input_sam_machine').value;
        let input_target = document.getElementById('input_target').value;
        let input_date_from = document.getElementById('input_date_from').value;
        let input_date_to = document.getElementById('input_date_to').value;

        if (input_sam_machine == '') {
            Swal.fire({
                icon: 'info',
                title: 'Please Input SAM Machine !!!',
                text: 'Information',
                showConfirmButton: false,
                timer: 1000
            });
        } else if (input_target == '') {
            Swal.fire({
                icon: 'info',
                title: 'Please Input Target !!!',
                text: 'Information',
                showConfirmButton: false,
                timer: 1000
            });
        } else if (input_date_from == '') {
            Swal.fire({
                icon: 'info',
                title: 'Please Input Date From !!!',
                text: 'Information',
                showConfirmButton: false,
                timer: 1000
            });
        } else if (input_date_to == '') {
            Swal.fire({
                icon: 'info',
                title: 'Please Input Date To !!!',
                text: 'Information',
                showConfirmButton: false,
                timer: 1000
            });
        } else {
            $.ajax({
                type: "POST",
                url: '../../process/admin/dashboard/dashboard_p.php',
                cache: false,
                data: {
                    method: 'update_target',
                    input_sam_machine: input_sam_machine,
                    input_target: input_target,
                    input_date_from: input_date_from,
                    input_date_to: input_date_to
                }, success: function (response) {
                    response = response.trim();
                    if (response == 'success') {
                        Swal.fire({
                            icon: 'info',
                            title: 'Succesfully Recorded !!!',
                            text: 'Information',
                            showConfirmButton: false,
                            timer: 1000
                        });
                        $('#target_data_modal').modal('hide');
                        $('#input_target').val('');
                        fitler_all();
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error !!!',
                            text: 'Error',
                            showConfirmButton: false,
                            timer: 1000
                        });
                    }
                }
            });
        }
    }

    const delete_sam_error = () => {
        let delete_sam_machine = document.getElementById('delete_sam_machine').value;
        let delete_date_from = document.getElementById('delete_date_from').value;
        let delete_date_to = document.getElementById('delete_date_to').value;

        if (delete_sam_machine == '') {
            Swal.fire({
                icon: 'info',
                title: 'Please Input SAM Machine !!!',
                text: 'Information',
                showConfirmButton: false,
                timer: 1000
            });
        } else if (delete_date_from == '') {
            Swal.fire({
                icon: 'info',
                title: 'Please Input Date From  !!!',
                text: 'Information',
                showConfirmButton: false,
                timer: 1000
            });
        } else if (delete_date_to == '') {
            Swal.fire({
                icon: 'info',
                title: 'Please Input Date To !!!',
                text: 'Information',
                showConfirmButton: false,
                timer: 1000
            });
        } else {
            $.ajax({
                type: "POST",
                url: '../../process/admin/dashboard/dashboard_p.php',
                cache: false,
                data: {
                    method: 'delete_sam_error',
                    delete_sam_machine: delete_sam_machine,
                    delete_date_from: delete_date_from,
                    delete_date_to: delete_date_to
                }, success: function (response) {
                    if (response == 'success') {
                        Swal.fire({
                            icon: 'info',
                            title: 'Succesfully Deleted !!!',
                            text: 'Information',
                            showConfirmButton: false,
                            timer: 1000
                        });
                        $('#delete_data_modal').modal('hide');
                        fitler_all();
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error !!!',
                            text: 'Error',
                            showConfirmButton: false,
                            timer: 1000
                        });
                    }
                }
            });
        }

    }



</script>