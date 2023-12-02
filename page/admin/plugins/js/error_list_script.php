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
        let sam_machine_list =  document.getElementById('sam_machine_list').value;
        let sam_ip_list = document.getElementById('sam_ip_list').value;

        if (sam_machine_list == '') {
            Swal.fire({
                icon: 'info',
                title: 'Input Sam Machine !!!',
                text: 'Information',
                showConfirmButton: false,
                timer: 1000
            });
        } else if (sam_ip_list == '') {
            Swal.fire({
                icon: 'info',
                title: 'Input IP Address !!!',
                text: 'Information',
                showConfirmButton: false,
                timer: 1000
            });
        } else {
            $.ajax({
            type: 'POST',
            url: '../../process/admin/machines/machine_p.php',
            cache: false,
            data: {
                method: 'register_machine_list',
                sam_machine_list : sam_machine_list,
                sam_ip_list : sam_ip_list
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
                        load_machine();
                        $('#sam_machine_list').val('');
                        $('#sam_ip_list').val('');
                        $('#add_new_machine').modal('hide');
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