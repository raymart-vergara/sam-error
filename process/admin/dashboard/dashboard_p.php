<?php
include '../../../process/conn.php';

$method = $_POST['method'];

if ($method == 'fetch_opt_sam_machine_data') {
   $query = "SELECT `sam_machine` FROM `sam_machine` ORDER BY id ASC";
   $stmt = $conn->prepare($query);
   $stmt->execute();
   if ($stmt->rowCount() > 0) {
       echo '<option value="">Select Machine</option>';
       foreach ($stmt->fetchALL() as $row) {
           echo '<option>' . htmlspecialchars($row['sam_machine']) . '</option>';
       }
   } else {
       echo '<option>Select Machine</option>';
   }
}




if ($method == 'feed_ng') {
   $date_from_search = $_POST['date_from_search'];
   $date_to_search = $_POST['date_to_search'];
   // Fetch data from the first table (table1)
   // $check = "SELECT `category`,`error_date`, `target` FROM sam_error WHERE error_code ='M18045'";
   // $check = "SELECT COUNT(error_code) AS Feed_NG, error_date FROM sam_error WHERE error_code ='M18045' AND error_date LIKE '2023-11-07%'";
   // $check = "SELECT COUNT(error_code) as Feed_NG, `error_date`, `target` FROM sam_error GROUP BY error_date"; 
   // $check = "SELECT  DISTINCT(DATE(error_date)) AS `error_date`, COUNT(error_code) as `Feed_NG`, `target` 
   // FROM sam_error
   // GROUP BY error_date";
   $check = "SELECT DATE(error_date) AS error_date , `target`, COUNT( error_date ) AS Feed_NG FROM sam_error WHERE error_code='M18045'  AND (error_date >= '$date_from_search 00:00:00' AND error_date <= '$date_to_search 23:59:59') GROUP BY DATE(error_date)";
   $stmt = $conn->prepare($check);
   $stmt->execute();

   $data = [];
   foreach ($stmt->fetchALL() as $row) {
      $data[] = $row;
   }
   // Fetch data from the second table (table2)
   echo json_encode($data);
}


if ($method == 'right_strip_ng') {
   $check = "SELECT DATE(error_date) AS error_date,`target`, COUNT( error_date ) AS Feed_NG FROM sam_error WHERE error_code='M18052' GROUP BY DATE(error_date)";
   $stmt = $conn->prepare($check);
   $stmt->execute();

   $data = [];
   foreach ($stmt->fetchALL() as $row) {
      $data[] = $row;
   }
   // Fetch data from the second table (table2)
   echo json_encode($data);
}

if ($method == 'left_strip_ng') {
   $check = "SELECT DATE(error_date) AS error_date,`target`, COUNT( error_date ) AS Feed_NG FROM sam_error WHERE error_code='M18051' GROUP BY DATE(error_date)";
   $stmt = $conn->prepare($check);
   $stmt->execute();

   $data = [];
   foreach ($stmt->fetchALL() as $row) {
      $data[] = $row;
   }
   // Fetch data from the second table (table2)
   echo json_encode($data);
}

if ($method == 'camera_ng') {
   $check = "SELECT DATE(error_date) AS error_date,`target`, COUNT( error_date ) AS Feed_NG FROM sam_error WHERE error_code IN(
   'M18255',
   'M18247',
   'M18253',
   'M18258',
   'M18261',
   'M18260',
   'M18056',
   'M18055',
   'M18236',
   'M18238',
   'M18237',
   'M18244',
   'M18239',
   'M18259',
   'M18241',
   'M18243',
   'M18254',
   'M18257',
   'M18263',
   'M18252',
   'M18242'
   )  GROUP BY DATE(error_date)";
   $stmt = $conn->prepare($check);
   $stmt->execute();

   $data = [];
   foreach ($stmt->fetchALL() as $row) {
      $data[] = $row;
   }
   // Fetch data from the second table (table2)
   echo json_encode($data);
}

?>
