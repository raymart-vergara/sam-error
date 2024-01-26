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
        all_feed_ng();
    }

    const fetch_opt_sam_machine_data = () => {
        $.ajax({
            url: '../../process/admin/sam_charts/sam_charts_p.php',
            type: 'POST',
            cache: false,
            data: {
                method: 'fetch_opt_sam_machine_data',
            },
            success: function (response) {
                $('#category').html(response);
            }
        });
    }

    const all_feed_ng = () => {
        let all_date_from_search = document.getElementById('all_date_from_search').value;
        let all_date_to_search = document.getElementById('all_date_to_search').value;
        let category = document.getElementById('category').value;
        $.ajax({
            url: '../../process/admin/sam_charts/sam_charts_p.php',
            type: 'POST',
            dataType: 'json',
            data: {
                method: 'all_machine_ng',
                all_date_from_search: all_date_from_search,
                all_date_to_search: all_date_to_search,
                category: category
            },
            success: function (data) {
                let error_date = [];
                let Feed_NG = [];
                let target = [];
                let category = []
                for (let i = 0; i < data.length; i++) {
                    error_date.push(data[i].sam_machine);
                    Feed_NG.push(data[i].totalCount);
                    target.push(data[i].m_target);
                    category.push(data[i].category);
                }

                let ctx = document.getElementById('all_feed_ng_chart').getContext('2d');
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
                                label: category[0],
                                backgroundColor: 'rgba(23, 162, 184, 0.5)',
                                borderColor: 'rgba(23, 162, 184, 1)',
                                borderWidth: 1,
                                data: Feed_NG,
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

    const m_update_target = async () => {
    let m_input_target = document.getElementById('m_input_target').value;
    let m_input_date_from = document.getElementById('m_input_date_from').value;
    let m_input_date_to = document.getElementById('m_input_date_to').value;

    const showError = (message) => {
        Swal.fire({
            icon: 'info',
            title: message,
            text: 'Information',
            showConfirmButton: false,
            timer: 1000
        });
    };

    if (!m_input_target) {
        showError('Please Input Target !!!');
    } else if (!m_input_date_from) {
        showError('Please Input Date From !!!');
    } else if (!m_input_date_to) {
        showError('Please Input Date To !!!');
    } else {
        try {
            const response = await $.ajax({
                type: 'POST',
                url: '../../process/admin/sam_charts/sam_charts_p.php',
                cache: false,
                data: {
                    method: 'm_update_target',
                    m_input_target,
                    m_input_date_from,
                    m_input_date_to
                }
            });

            if (response.trim() === 'success') {
                Swal.fire({
                    icon: 'info',
                    title: 'Successfully Recorded !!!',
                    text: 'Information',
                    showConfirmButton: false,
                    timer: 1000
                });

                $('#m_target_data_modal').modal('hide');
                $('#m_input_target').val('');
                fitler_all();
            } else {
                throw new Error('Error !!!');
            }
        } catch (error) {
            showError('Error !!!');
        }
    }
};



</script>