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


    const search_error =()=>{
        let search_error_list = document.getElementById('search_error_list').value;
        $.ajax({
            type: "POST",
            url: '../../process/admin/errors/error_p.php',
            cache: false,
            data:{
                method:'search_error',
                search_error_list:search_error_list
            },success: function (response) {
                $('#list_of_errors').html(response);
                $('#spinner').fadeOut();
              
            }
        });
    }


</script>