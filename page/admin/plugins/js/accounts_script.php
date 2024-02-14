<script type="text/javascript">
    $(document).ready(function () {
        load_accounts();
    });

    const load_accounts = () => {
        $.ajax({
            type: 'POST',
            url: '../../process/admin/accounts/accounts_p.php',
            cache: false,
            data: {
                method: 'account_list'
            },
            success: function (response) {
                $('#list_of_accounts').html(response);
            }
        });
    }

    const   search_account =()=>{
        let full_name = document.getElementById('full_name_search').value;
        $.ajax({
            type: "POST",
            url: '../../process/admin/accounts/accounts_p.php',
            cache: false,
            data:{
                method:'search_account',
                full_name:full_name
            },success: function (response) {
                $('#list_of_accounts').html(response);
                $('#spinner').fadeOut();
              
            }
        });
    }

    const register_accounts = () => {
        let full_name = document.getElementById('full_name').value;
        let username = document.getElementById('username').value;
        let password = document.getElementById('password').value;
        let role = document.getElementById('role').value;

        if (full_name == '') {
            Swal.fire({
                icon: 'info',
                title: 'Please Input  Fullname !!!',
                text: 'Information',
                showConfirmButton: false,
                timer: 1000
            });
        } else if (username == '') {
            Swal.fire({
                icon: 'info',
                title: 'Please Input Username!!!',
                text: 'Information',
                showConfirmButton: false,
                timer: 1000
            });
        } else if (password == '') {
            Swal.fire({
                icon: 'info',
                title: 'Please Input Password !!!',
                text: 'Information',
                showConfirmButton: false,
                timer: 1000
            });
        } else if (role == '') {
            Swal.fire({
                icon: 'info',
                title: 'Please Input Role !!!',
                text: 'Information',
                showConfirmButton: false,
                timer: 1000
            });
        } else {
            $.ajax({
                type: "POST",
                url: "../../process/admin/accounts/accounts_p.php",
                cache: false,
                data: {
                    method: 'register_account',
                    full_name: full_name,
                    username: username,
                    password: password,
                    role: role
                }, success: function (response) {
                    if (response == 'success') {
                        Swal.fire({
                            icon: 'success',
                            title: 'Succesfully Recorded!!!',
                            text: 'Success',
                            showConfirmButton: false,
                            timer: 1000
                        });
                        load_accounts();
                        $('#full_name').val('');
                        $('#username').val('');
                        $('#password').val('');
                        $('#section').val('');
                        $('#role').val('');
                        $('#new_account').modal('hide');
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

    const get_account_details = (param) => {

        let string = param.split('~!~');
        let id = string[0];
        let username = string[1];
        let full_name = string[2];
        let password = string[3];
        let role = string[4];

        document.getElementById('update_id').value = id;
        document.getElementById('update_full_name').value = full_name;
        document.getElementById('update_username').value = username;
        document.getElementById('update_password').value = password;
        document.getElementById('update_role').value = role;
    }

    const update_account = () => {
        let update_id = document.getElementById('update_id').value;
        let update_full_name = document.getElementById('update_full_name').value;
        let update_username = document.getElementById('update_username').value;
        let update_password = document.getElementById('update_password').value;
        let update_role = document.getElementById('update_role').value;

        $.ajax({
            type: "POST",
            url: "../../process/admin/accounts/accounts_p.php",
            cache: false,
            data: {
                method: 'update_account',
                update_id: update_id,
                update_full_name: update_full_name,
                update_username: update_username,
                update_password: update_password,
                update_role: update_role
            }, success: function (response) {
                if (response == 'success') {
                    Swal.fire({
                        icon: 'success',
                        title: 'Succesfully Updated!!!',
                        text: 'Success',
                        showConfirmButton: false,
                        timer: 1000
                    });
                    load_accounts();
                    $('#update_account').modal('hide');
                    $('#update_full_name').val('');
                    $('#update_username').val('');
                    $('#update_password').val('');
                    $('#update_role').val('');

                } else if (response == 'duplicate') {
                    Swal.fire({
                        icon: 'info',
                        title: 'Duplicate Data !!!',
                        text: 'Information',
                        showConfirmButton: false,
                        timer: 1000
                    });
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

    const delete_account = () => {
        let update_id = document.getElementById('update_id').value;
        $.ajax({
            type: "POST",
            url: "../../process/admin/accounts/accounts_p.php",
            cache: false,
            data: {
                method: 'delete_account',
                update_id: update_id
            },
            success: function (response) {
                if (response == 'success') {
                    Swal.fire({
                        icon: 'info',
                        title: 'Succesfully Deleted !!!',
                        text: 'Information',
                        showConfirmButton: false,
                        timer: 1000
                    });
                    load_accounts();
                    $('#update_account').modal('hide');
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




</script>