<?php 
include '../../../process/conn.php';

$method = $_POST['method'];

if ($method == 'feed_ng') {
   // Fetch data from the first table (table1)
   // $check = "SELECT `category`,`error_date`, `target` FROM sam_error WHERE error_code ='M18045'";
   // $check = "SELECT COUNT(error_code) AS Feed_NG, error_date FROM sam_error WHERE error_code ='M18045' AND error_date LIKE '2023-11-07%'";
   // $check = "SELECT COUNT(error_code) as Feed_NG, `error_date`, `target` FROM sam_error GROUP BY error_date"; 
   $check = "SELECT COUNT(error_code) as `Feed_NG`, `target` , DATE_FORMAT(error_date, '%Y-%m-%d') AS `error_date`
   FROM sam_error
   GROUP BY error_date";
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