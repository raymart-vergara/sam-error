<?php
include '../../../process/conn.php';

$method = $_POST['method'];

if ($method == 'fetch_opt_sam_machine_data') {
   $query = "SELECT DISTINCT `category` FROM `machine_error` ORDER BY `category` ASC;";
   $stmt = $conn->prepare($query);
   $stmt->execute();
   if ($stmt->rowCount() > 0) {
      echo '<option value="">Select Error</option>';
      foreach ($stmt->fetchALL(PDO::FETCH_ASSOC) as $row) {
         echo '<option value="' . $row['category'] . '">' . htmlspecialchars($row['category']) . '</option>';
      }
   } else {
      echo '<option value="">Select Machine</option>';
   }
} else if ($method == 'all_machine_ng') {
   $all_date_from_search = $_POST['all_date_from_search'];
   $all_date_to_search = $_POST['all_date_to_search'];
   $category = $_POST['category'];
   // $check = "SELECT DATE(error_date) AS error_date , `target`, COUNT( error_date ) AS Feed_NG FROM sam_error WHERE error_code='M18045' AND sam_machine = '$sam_machine_data'  AND (error_date >= '$date_from_search 00:00:00' AND error_date <= '$date_to_search 23:59:59') GROUP BY DATE(error_date)";
   $check = "SELECT sam_machine, category, COUNT(*) AS totalCount,`m_target`
   FROM sam_error WHERE (error_date BETWEEN '$all_date_from_search 00:00:00'AND '$all_date_to_search 23:59:59' ) AND `category` ='$category' GROUP BY sam_machine ORDER BY 
   totalCount DESC";
   $stmt = $conn->prepare($check);
   $stmt->execute();
   $data = [];
   foreach ($stmt->fetchALL(PDO::FETCH_ASSOC) as $row) {
      $data[] = $row;
   }
   // Fetch data from the second table (table2)
   echo json_encode($data);

} else if ($method == 'm_update_target') {
   // Trim input to prevent SQL injection using prepared statements
   $m_input_target = trim($_POST['m_input_target']);
   $m_input_date_from = trim($_POST['m_input_date_from']);
   $m_input_date_to = trim($_POST['m_input_date_to']);
   // Use prepared statements and placeholders
   $query = "UPDATE sam_error SET `m_target` = $m_input_target WHERE error_date BETWEEN '$m_input_date_from 00:00:00' AND '$m_input_date_to 23:59:59'";
   // $query = "UPDATE sam_error SET m_target = $m_input_target WHERE error_date IN (SELECT DISTINCT error_Date FROM sam_error);";
   $stmt = $conn->prepare($query);
   // Execute the query
   try {
      // Execute the query
      if ($stmt->execute()) {
          echo "success";
      } else {
          echo "error";
      }
  } catch (PDOException $e) {
      echo "Database Error: " . $e->getMessage();
  }

}
?>