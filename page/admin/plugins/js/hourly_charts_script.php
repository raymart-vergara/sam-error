<script type="text/javascript">
    let chart; // define chart variable outside of function
    let right_strip; // define chart variable outside of function
    let left_strip; // define chart variable outside of function
    let camera;
    $(document).ready(function () {
        h_fetch_machinelist();
        h_categorylist();
        h_error_chart();
    });

    const h_fetch_machinelist = () => {
        $.ajax({
            url: '../../process/admin/hourly_charts/hourly_charts_p.php',
            type: 'POST',
            cache: false,
            data: {
                method: 'h_fetch_machinelist',
            },
            success: function (response) {
                $('#h_machine_list').html(response);
            }
        });
    }
    const h_categorylist = () => {
        $.ajax({
            url: '../../process/admin/hourly_charts/hourly_charts_p.php',
            type: 'POST',
            cache: false,
            data: {
                method: 'h_categorylist',
            },
            success: function (response) {
                $('#h_category_list').html(response);
                $('#h_category_list2').html(response);

            }
        });
    }

    const h_error_chart = () => {
        let h_machine_list = document.getElementById('h_machine_list').value;
        let h_category_list = document.getElementById('h_category_list').value;
        let h_category_list2 = document.getElementById('h_category_list2').value;
        let h_date = document.getElementById('h_date').value;
        $.ajax({
            url: '../../process/admin/hourly_charts/hourly_charts_p.php',
            type: 'POST',
            dataType: 'json',
            data: {
                method: 'h_error_chart',
                h_machine_list: h_machine_list,
                h_category_list: h_category_list,
                h_category_list2: h_category_list2,
                h_date: h_date
            },
            success: function (data) {
                let hour_of_error = [];
                let count_per_hour = [];
                let category = []
                for (let i = 0; i < data.length; i++) {
                    hour_of_error.push(data[i].hour_of_error);
                    count_per_hour.push(data[i].count_per_hour);
                    category.push(data[i].total_error);
                }
                    console.log(data)
                let ctx = document.getElementById('hourly_chart').getContext('2d');
                let configuration = 0;

                configuration = {
                    type: 'bar',
                    options: {
                        // indexAxis: 'y',
                        scales: {
                            y: {
                                ticks: {
                                    autoSkip: false,
                                    // stepSize: 100
                                }

                            },
                            x: {
                                ticks: {
                                    autoSkip: false,

                                }

                            },
                        }
                    },
                    data: {
                        labels: hour_of_error,
                        datasets: [
                            {
                                label: category[0],
                                backgroundColor: 'rgba(23, 162, 184, 0.5)',
                                borderColor: 'rgba(23, 162, 184, 1)',
                                borderWidth: 1,
                                data: count_per_hour,
                            }
                        ],
                    },
                }
                console.log(data)

                if (chart) {
                    chart.destroy();
                    chart = new Chart(ctx, configuration);
                } else {
                    chart = new Chart(ctx, configuration);
                }
            },
        });

    }


</script>