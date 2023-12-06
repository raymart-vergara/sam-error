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

    const register_error_list = () => {
        let error_code_list =  document.getElementById('error_code_list').value;
        let error_name_list = document.getElementById('error_name_list').value;
        let error_category_list = document.getElementById('error_category_list').value;

        if (error_code_list == '') {
            Swal.fire({
                icon: 'info',
                title: 'Input Error Machine !!!',
                text: 'Information',
                showConfirmButton: false,
                timer: 1000
            });
        } else if (error_name_list == '') {
            Swal.fire({
                icon: 'info',
                title: 'Input Error Name !!!',
                text: 'Information',
                showConfirmButton: false,
                timer: 1000
            });
        }  else if (error_category_list == '') {
            Swal.fire({
                icon: 'info',
                title: 'Input Category !!!',
                text: 'Information',
                showConfirmButton: false,
                timer: 1000
            });
        } else {
            $.ajax({
            type: 'POST',
            url: '../../process/admin/errors/error_p.php',
            cache: false,
            data: {
                method: 'register_error_list',
                error_code_list : error_code_list,
                error_name_list : error_name_list,
                error_category_list : error_category_list
            },
            success: function (response) {
                if (response == 'success') {
                        Swal.fire({
                            icon: 'success',
                            title: 'Succesfully Recorded!!!',
                            text: 'Success',
                            showConfirmButton: false,
                            timer: 1000
                        });
                        load_error();
                        $('#error_code_list').val('');
                        $('#error_name_list').val('');
                        $('#error_category_list').val('');
                        $('#add_error_modal').modal('hide');
                    } else if (response == 'Already Exist') {
                        Swal.fire({
                            icon: 'error',
                            title: 'Duplicate Data!!!',
                            text: 'Error',
                            showConfirmButton: false,
                            timer: 1000
                        });
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Invalid Data',
                            text: 'error',
                            showConfirmButton: false,
                            timer: 1000
                        });
                    }
            }
        });
        }
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