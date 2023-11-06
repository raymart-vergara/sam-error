<?php
date_default_timezone_set('Asia/Manila');
$servername = 'localhost';
 $username = 'root'; 
 $password = '';

try {
    $conn = new PDO ("mysql:host=$servername;dbname=sam_error_db",$username,$password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'NO CONNECTION'.$e->getMessage();
}
?>