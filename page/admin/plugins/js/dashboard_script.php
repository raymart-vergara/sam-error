<script type="text/javascript">
    let chart; // define chart variable outside of function

    $(document).ready(function () {
        feed_ng();
        right_strip_ng();
        left_strip_ng();
        camera_ng();
        fetch_opt_sam_machine_data();

    });
    

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
        $.ajax({
            url: '../../process/admin/dashboard/dashboard_p.php',
            type: 'POST',
            dataType: 'json',
            data: {
                method: 'feed_ng',
                date_from_search: date_from_search,
                date_to_search: date_to_search
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
                            backgroundColor: 'rgba(255, 99, 132, 0.2)',
                            borderColor: 'rgba(255, 99, 132, 1)',
                            borderWidth: 1,
                            data: Feed_NG,
                        },
                        {
                            label: 'Target',
                            backgroundColor: 'rgba(54, 162, 235, 0.2)',
                            borderColor: 'rgba(54, 162, 235, 1)',
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
        $.ajax({
            url: '../../process/admin/dashboard/dashboard_p.php',
            type: 'POST',
            dataType: 'json',
            data: {
                method: 'right_strip_ng'
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

                let ctx2 = document.getElementById('right_strip_chart').getContext('2d');
                let barChart = new Chart(ctx2, {
                    type: 'bar',
                    // options: {
                    //   indexAxis: 'y',
                    // },
                    data: {
                        labels: error_date,
                        datasets: [{
                            label: 'Right Strip NG',
                            backgroundColor: 'rgba(255, 99, 132, 0.2)',
                            borderColor: 'rgba(255, 99, 132, 1)',
                            borderWidth: 1,
                            data: Feed_NG,
                        },
                        {
                            label: 'Target',
                            backgroundColor: 'rgba(54, 162, 235, 0.2)',
                            borderColor: 'rgba(54, 162, 235, 1)',
                            type: 'line',
                            borderWidth: 2,
                            data: target,
                        }],
                    },

                });
            },
        });
    }

    const left_strip_ng = () => {
        $.ajax({
            url: '../../process/admin/dashboard/dashboard_p.php',
            type: 'POST',
            dataType: 'json',
            data: {
                method: 'left_strip_ng'
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

                let ctx2 = document.getElementById('left_strip_chart').getContext('2d');
                let barChart = new Chart(ctx2, {
                    type: 'bar',
                    // options: {
                    //   indexAxis: 'y',
                    // },
                    data: {
                        labels: error_date,
                        datasets: [{
                            label: 'Left Strip NG',
                            backgroundColor: 'rgba(255, 99, 132, 0.2)',
                            borderColor: 'rgba(255, 99, 132, 1)',
                            borderWidth: 1,
                            data: Feed_NG,
                        },
                        {
                            label: 'Target',
                            backgroundColor: 'rgba(54, 162, 235, 0.2)',
                            borderColor: 'rgba(54, 162, 235, 1)',
                            type: 'line',
                            borderWidth: 2,
                            data: target,
                        }],
                    },

                });
            },
        });
    }

    const camera_ng = () => {
        $.ajax({
            url: '../../process/admin/dashboard/dashboard_p.php',
            type: 'POST',
            dataType: 'json',
            data: {
                method: 'camera_ng'
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

                let ctx2 = document.getElementById('camera_chart').getContext('2d');
                let barChart = new Chart(ctx2, {
                    type: 'bar',
                    // options: {
                    //   indexAxis: 'y',
                    // },
                    data: {
                        labels: error_date,
                        datasets: [{
                            label: 'Camera Error',
                            backgroundColor: 'rgba(255, 99, 132, 0.2)',
                            borderColor: 'rgba(255, 99, 132, 1)',
                            borderWidth: 1,
                            data: Feed_NG,
                        },
                        {
                            label: 'Target',
                            backgroundColor: 'rgba(54, 162, 235, 0.2)',
                            borderColor: 'rgba(54, 162, 235, 1)',
                            type: 'line',
                            borderWidth: 2,
                            data: target,
                        }],
                    },

                });
            },
        });
    }

</script>