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
                    Swal.fire({
                      icon: 'success',
                      title: 'Succesfully Recorded!!!',
                      text: 'Success',
                      showConfirmButton: false,
                      timer : 1000
                    });
                    load_accounts();
                    $('#full_name').val('');
                    $('#username').val('');
                    $('#password').val('');
                    $('#section').val('');
                    $('#role').val('');
                    $('#new_account').modal('hide');
                }
            });
        }
    }

</script>