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
            echo '<tr style="cursor:pointer;" class="modal-trigger" data-toggle="modal" data-target="#update_account">';
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

?>