<?php 
include("../../conn.php");

$method = $_POST['method'];

if ($method == 'machine_list') {
    $c = 0;
    $query = "SELECT * FROM sam_machine ORDER BY id ASC";
    $stmt = $conn->prepare($query);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        foreach ($stmt as $row) {
            $c++;
            echo '<tr>';
            echo "<td>" . $c . "</td>";
            echo "<td>" . $row["sam_machine"] . "</td>";
            echo "<td>" . $row["ip_address"] . "</td>";
        }
    } else {
        echo "<td> No Result</td>";
    }
}
if ($method == 'register_machine_list') {
    $sam_machine_list = trim($_POST['sam_machine_list']);
    $sam_ip_list = trim($_POST['sam_ip_list']);

    $check = "SELECT id FROM sam_machine WHERE sam_machine = '$sam_machine_list' OR  ip_address ='$sam_ip_list' ";
    $stmt = $conn->prepare($check);
    $stmt->execute();
    if ($stmt->rowCount() > 0) {
        echo 'Already Exist';
    } else {
        $stmt = NULL;
        $query = "INSERT INTO sam_machine (`sam_machine`, `ip_address`)VALUES('$sam_machine_list','$sam_ip_list')";
        $stmt = $conn->prepare($query);
        if ($stmt->execute()) {
            echo 'success';
        } else {
            echo 'error';
        }
    }
}

if ($method == 'search_machine') {
    $search_machine_list = $_POST['search_machine_list'];
    $c = 0;

    $query = "SELECT * FROM sam_machine WHERE `sam_machine` LIKE '%$search_machine_list%' OR `ip_address` LIKE  '%$search_machine_list%'";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    if ($stmt->rowCount() > 0) {
        foreach ($stmt->fetchAll() as $row){
            $c++;
            echo '<tr>';
            echo "<td>" . $c . "</td>";
            echo "<td>" . $row["sam_machine"] . "</td>";
            echo "<td>" . $row["ip_address"] . "</td>";
            echo "</tr>";
        }
    }else {
		echo '<tr>';
		echo '<td colspan="6" style="text-align:center; color:red;">No Result !!!</td>';
		echo '</tr>';
	}
}

?>