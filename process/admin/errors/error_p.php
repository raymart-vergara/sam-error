<?php 
include("../../conn.php");

$method = $_POST['method'];

if ($method == 'error_list') {
    $c = 0;
    $query = "SELECT * FROM machine_error ORDER BY error_code ASC";
    $stmt = $conn->prepare($query);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        foreach ($stmt as $row) {
            $c++;
            echo '<tr>';
            echo "<td>" . $c . "</td>";
            echo "<td>" . $row["error_code"] . "</td>";
            echo "<td>" . $row["error_name"] . "</td>";
            echo "<td>" . $row["category"] . "</td>";
            echo "</tr>";
        }
    } else {
        echo "<td> No Result</td>";
    }
}

if ($method == 'register_error_list') {
    $error_code_list = trim($_POST['error_code_list']);
    $error_name_list = trim($_POST['error_name_list']);
    $error_category_list = trim($_POST['error_category_list']);

    $check = "SELECT id FROM machine_error WHERE error_code = '$error_code_list' OR  error_name ='$error_name_list' ";
    $stmt = $conn->prepare($check);
    $stmt->execute();
    if ($stmt->rowCount() > 0) {
        echo 'Already Exist';
    } else {
        $stmt = NULL;
        $query = "INSERT INTO machine_error (`error_code`, `error_name`, `category`)VALUES('$error_code_list','$error_name_list', '$error_category_list')";
        $stmt = $conn->prepare($query);
        if ($stmt->execute()) {
            echo 'success';
        } else {
            echo 'error';
        }
    }
}

if ($method == 'search_error') {
    $search_error_list = $_POST['search_error_list'];
    $c = 0;

    $query = "SELECT * FROM machine_error WHERE `error_code` LIKE '%$search_error_list%'";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    if ($stmt->rowCount() > 0) {
        foreach ($stmt->fetchAll() as $row){
            $c++;
            echo '<tr>';
            echo "<td>" . $c . "</td>";
            echo "<td>" . $row["error_code"] . "</td>";
            echo "<td>" . $row["error_name"] . "</td>";
            echo "<td>" . $row["category"] . "</td>";
            echo "</tr>";
        }
    }else {
		echo '<tr>';
		echo '<td colspan="6" style="text-align:center; color:red;">No Result !!!</td>';
		echo '</tr>';
	}
}

?>