<?php
include("../../conn.php");

$method = $_POST['method'];

if ($method == 'account_list') {
    $c = 0;
    $query = "SELECT * FROM users_account";
    $stmt = $conn->prepare($query);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        foreach ($stmt as $row) {
            $c++;
            echo "<tr>";
            echo "<td>" . $c . "</td>";
            echo "<td>" . $row["username"] . "</td>";
            echo "<td>" . $row["full_name"] . "</td>";
            echo "<td>" . $row["role"] . "</td>";
            echo "</tr>";
        }
    }
}

if ($method == 'register_account') {
    $full_name = trim($_POST['full_name']);
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    $role = trim($_POST['role']);

    $check = "SELECT id FROM users_account WHERE username = '$username'";
    $stmt = $conn->prepare($check);
    $stmt->execute();
    if ($stmt->rowCount() > 0) {
        echo 'Already Exist';
    } else {
        $stmt = NULL;
        $query = "INSERT INTO users_account (`full_name`, `username`, `password`,  `role`)VALUES('$full_name','$username','$password','$role')";
        $stmt = $conn->prepare($query);
        if ($stmt->execute()) {
            echo 'success';
        } else {
            echo 'error';
        }
    }
}

?>