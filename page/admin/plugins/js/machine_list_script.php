<script type="text/javascript"> 
$(document).ready(function () {
    load_machine();
});


const load_machine = () => {
        $.ajax({
            type: 'POST',
            url: '../../process/admin/machines/machine_p.php',
            cache: false,
            data: {
                method: 'machine_list'
            },
            success: function (response) {
                $('#list_of_machines').html(response);
            }
        });
    }


</script>