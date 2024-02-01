<?php
include '../../../process/conn.php';
$method = $_POST['method'];

if ($method == 'h_fetch_machinelist') {
   $query = "SELECT `sam_machine` FROM `sam_machine` ORDER BY `id` ASC;";
   $stmt = $conn->prepare($query);
   $stmt->execute();
   if ($stmt->rowCount() > 0) {
      echo '<option value="">Select Machine</option>';
      foreach ($stmt->fetchALL(PDO::FETCH_ASSOC) as $row) {
         echo '<option value="' . $row['sam_machine'] . '">' . htmlspecialchars($row['sam_machine']) . '</option>';
      }
   } else {
      echo '<option value="">Select Machine</option>';
   }
} 
if ($method == 'h_categorylist') {
    $query = "SELECT DISTINCT `category` FROM `machine_error` ORDER BY `category` ASC;";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    if ($stmt->rowCount() > 0) {
       echo '<option value="">Select Error</option>';
       foreach ($stmt->fetchALL(PDO::FETCH_ASSOC) as $row) {
          echo '<option value="' . $row['category'] . '">' . htmlspecialchars($row['category']) . '</option>';
       }
    } else {
       echo '<option value=" ">Select Machine</option>';
    }
 } 

if ($method == 'h_error_chart') {
   $h_machine_list = $_POST['h_machine_list'];
   $h_category_list = $_POST['h_category_list'];
   $h_category_list2 = $_POST['h_category_list2'];
   $h_date = $_POST['h_date'];
   // $check = "SELECT DATE(error_date) AS error_date , `target`, COUNT( error_date ) AS Feed_NG FROM sam_error WHERE error_code='M18045' AND sam_machine = '$sam_machine_data'  AND (error_date >= '$date_from_search 00:00:00' AND error_date <= '$date_to_search 23:59:59') GROUP BY DATE(error_date)";
   $check = "SELECT DATE_FORMAT(error_date, '%H') AS hour_of_error, COUNT(*) AS count_per_hour, category FROM sam_error WHERE error_date LIKE '$h_date%' AND sam_machine='$h_machine_list' AND  category IN ('$h_category_list','$h_category_list2')  GROUP BY hour_of_error;";
   $stmt = $conn->prepare($check);
   $stmt->execute();
   $data = [];
   foreach ($stmt->fetchALL(PDO::FETCH_ASSOC) as $row) {
      $data[] = $row;
   }
   // Fetch data from the second table (table2)
   echo json_encode($data);
} 

?>