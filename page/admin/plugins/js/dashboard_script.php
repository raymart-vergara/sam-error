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
                        datasets: [{
                            label: 'Feed NG',
                            backgroundColor: 'rgba(255, 99, 132)',
                            borderColor: 'rgba(255, 99, 132, 1)',
                            borderWidth: 1,
                            data: Feed_NG,
                        },
                        {
                            label: 'Target',
                            backgroundColor: 'rgba(23,162,184)',
                            borderColor: 'rgba(23,162,184)',
                            type: 'line',
                            borderWidth: 2,
                            data: target,
                        }],
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
                        datasets: [{
                            label: 'Right Strip NG',
                            backgroundColor: 'rgba(255, 99, 132)',
                            borderColor: 'rgba(255, 99, 132, 1)',
                            borderWidth: 1,
                            data: Feed_NG,
                        },
                        {
                            label: 'Target',
                            backgroundColor: 'rgba(23,162,184)',
                            borderColor: 'rgba(23,162,184)',
                            type: 'line',
                            borderWidth: 2,
                            data: target,
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
                        datasets: [{
                            label: 'Left Strip NG',
                            backgroundColor: 'rgba(255, 99, 132)',
                            borderColor: 'rgba(255, 99, 132, 1)',
                            borderWidth: 1,
                            data: Feed_NG,
                        },
                        {
                            label: 'Target',
                            backgroundColor: 'rgba(23,162,184)',
                            borderColor: 'rgba(23,162,184)',
                            type: 'line',
                            borderWidth: 2,
                            data: target,
                        }],
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
                        datasets: [{
                            label: 'Camera NG',
                            backgroundColor: 'rgba(255, 99, 132)',
                            borderColor: 'rgba(255, 99, 132, 1)',
                            borderWidth: 1,
                            data: Feed_NG,
                        },
                        {
                            label: 'Target',
                            backgroundColor: 'rgba(23,162,184)',
                            borderColor: 'rgba(23,162,184)',
                            type: 'line',
                            borderWidth: 2,
                            data: target,
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