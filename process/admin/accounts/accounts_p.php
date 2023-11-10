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
            echo '<tr style="cursor:pointer;" class="modal-trigger" data-toggle="modal" data-target="#update_account" onclick="get_account_details(&quot;' . $row['id'] . '~!~' . $row['username'] . '~!~' . $row['full_name'] . '~!~' . $row['password'] . '~!~' . $row['role'] . '&quot;)">';
            echo "<td>" . $c . "</td>";
            echo "<td>" . $row["username"] . "</td>";
            echo "<td>" . $row["full_name"] . "</td>";
            echo "<td>" . $row["role"] . "</td>";
            echo "</tr>";
        }
    } else {
        echo "<td> No Result</td>";
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

if ($method == 'update_account') {
    $update_id = $_POST['update_id'];
    $update_full_name = trim($_POST['update_full_name']);
    $update_username = trim($_POST['update_username']);
    $update_password = trim($_POST['update_password']);
    $update_role = trim($_POST['update_role']);

    $query = "SELECT `id` FROM `users_account` WHERE `full_name` ='$update_full_name' AND `username` = '$update_username' AND `role` = '$update_role'";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    if ($stmt->rowCount() > 0) {
        echo "duplicate";
    } else {
        $stmt = NULL;
        $query = "UPDATE users_account SET `full_name`= '$update_full_name' , `username` = '$update_username', `password` = '$update_password', `role` = '$update_role' WHERE id = '$update_id'";
        $stmt = $conn->prepare($query);
        if ($stmt->execute()) {
            echo "success";
        } else {
            echo "error";
        }
    }
}

if ($method == "search_account") {
    $full_name = $_POST['full_name'];
    $c=0;

    $query = "SELECT * FROM users_account WHERE `full_name` LIKE '%$full_name%'";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    if ($stmt->rowCount() > 0) {
        foreach ($stmt->fetchAll() as $row){
            $c++;
            echo '<tr style="cursor:pointer;" class="modal-trigger" data-toggle="modal" data-target="#update_account" onclick="get_account_details(&quot;' . $row['id'] . '~!~' . $row['username'] . '~!~' . $row['full_name'] . '~!~' . $row['password'] . '~!~' . $row['role'] . '&quot;)">';
            echo "<td>" . $c . "</td>";
            echo "<td>" . $row["username"] . "</td>";
            echo "<td>" . $row["full_name"] . "</td>";
            echo "<td>" . $row["role"] . "</td>";
            echo "</tr>";
        }
    }else {
		echo '<tr>';
		echo '<td colspan="6" style="text-align:center; color:red;">No Result !!!</td>';
		echo '</tr>';
	}
}

if ($method == 'delete_account') {
    $update_id = $_POST['update_id'];

    $query = "DELETE FROM users_account WHERE id = '$update_id'";
    $stmt = $conn->prepare($query);
    if ($stmt->execute()) {
        echo 'success';
    } else {
        echo 'error';
    }
}


$conn = NULL;
?>