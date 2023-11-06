<?php
session_start();
include 'conn.php';

if (isset($_POST['login_btn'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (empty($username)) {
        echo '<script>alert("Please Enter Username")</script>';
    } else if (empty($password)) {
        echo '<script>alert("Please Enter Password")</script>';
    } else {
        $check = "SELECT full_name, role FROM users_account WHERE BINARY username = '$username' AND BINARY password = '$password'";
        $stmt = $conn->prepare($check);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            foreach ($stmt->fetchALL() as $x) {
                $name = $x['full_name'];
                $role = $x['role'];

                $_SESSION['username'] = $username;
                $_SESSION['name'] = $name;
                $_SESSION['role'] = $role;
                $_SESSION['section'] = $section;
                
                if ($role == 'admin') {
                    header('location: page/admin/dashboard.php');
                } elseif ($role == 'user') {
                    header('location: page/user/dashboard.php');
                }
            }
        } else {
            echo '<script>alert("Sign In Failed. Maybe an incorrect credential or account not found")</script>';
        }
    }
}

if (isset($_POST['Logout'])) {
    session_unset();
    session_destroy();
    header('location: ../../index.php');
}
?>