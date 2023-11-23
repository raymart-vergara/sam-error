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
            echo '<tr style="cursor:pointer;" class="modal-trigger" data-toggle="modal" data-target="#update_account">';
            echo "<td>" . $c . "</td>";
            echo "<td>" . $row["sam_machine"] . "</td>";
            echo "<td>" . $row["ip_address"] . "</td>";
        }
    } else {
        echo "<td> No Result</td>";
    }
}

?>