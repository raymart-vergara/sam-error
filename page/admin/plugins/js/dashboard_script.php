<script type="text/javascript">

    $(document).ready(function () {
        sam_error()
    });


    const sam_error = () => {
        $.ajax({
            url: '../../process/admin/dashboard/dashboard_p.php',
            type: 'POST',
            dataType: 'json',
            data: {
                method: 'feed_ng'
            },
            success: function (data) {
                var error_date = [];
                var Feed_NG = [];
                var target = [];

                for (var i = 0; i < data.length; i++) {
                    error_date.push(data[i].error_date);
                    Feed_NG.push(data[i].Feed_NG);
                    target.push(data[i].target);
                }

                var ctx = document.getElementById('bar-chart').getContext('2d');
                var barChart = new Chart(ctx, {
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

                });
            },
        });
    }












    const ctx2 = document.getElementById('myChart2');

    new Chart(ctx2, {
        type: 'bar',
        data: {
            labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
            datasets: [{
                label: '# of Votes',
                data: [12, 19, 3, 5, 2, 3],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });

    const ctx3 = document.getElementById('myChart3');

    new Chart(ctx3, {
        type: 'bar',
        data: {
            labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
            datasets: [{
                label: '# of Votes',
                data: [12, 19, 3, 5, 2, 3],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });

    const ctx4 = document.getElementById('myChart4');

    new Chart(ctx4, {
        type: 'bar',
        data: {
            labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
            datasets: [{
                label: '# of Votes',
                data: [12, 19, 3, 5, 2, 3],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });


</script>