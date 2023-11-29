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