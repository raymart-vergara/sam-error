<script type="text/javascript"> 
$(document).ready(function () {
    load_error();
});


const load_error = () => {
        $.ajax({
            type: 'POST',
            url: '../../process/admin/errors/error_p.php',
            cache: false,
            data: {
                method: 'error_list'
            },
            success: function (response) {
                $('#list_of_errors').html(response);
            }
        });
    }


</script>