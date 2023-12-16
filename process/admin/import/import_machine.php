<?php
session_start();
// error_reporting(0);
require '../../conn.php';

function check_csv($file, $conn)
{
    // READ FILE
    $csvFile = fopen($file, 'r');
    // SKIP FIRST LINE MAIN
    fgetcsv($csvFile);

    while (($line = fgetcsv($csvFile)) !== false) {
        // Check if the row is blank or consists only of whitespace
        if (empty(implode('', $line))) {
            continue; // Skip blank lines
        }
    }

    fclose($csvFile);
}

if (isset($_POST['upload'])) {
    $csvMimes = array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'text/plain');

    if (!empty($_FILES['file']['name']) && in_array($_FILES['file']['type'], $csvMimes)) {
        if (is_uploaded_file($_FILES['file']['tmp_name'])) {

            // Check CSV before importing
            $chkCsvMsg = check_csv($_FILES['file']['tmp_name'], $conn);
            if ($chkCsvMsg == '') {
                // If no errors found
                //READ FILE
                $csvFile = fopen($_FILES['file']['tmp_name'], 'r');
                // SKIP FIRST LINE MAIN
                fgetcsv($csvFile);
                // PARSE
                $error = 0;

                // Begin transaction
                $conn->beginTransaction();

                while (($line = fgetcsv($csvFile)) !== false) {
                    // Check if the row is blank or consists only of whitespace
                    if (empty(implode('', $line))) {
                        continue; // Skip blank lines
                    }

                    $error_date = $line[0];
                    $error_code = $line[2];
                    $error_name = $line[3];

                    //skip the row if the error code == ALM
                    if (!empty($error_code)) {
                        $alm = substr($error_code, 0, 3);
                        if ($alm == "ALM") {
                            continue;
                        }

                        $category = 'Category'; // Initialize with a default value

                        switch ($line[2]) {
                            case 'M18045':
                                $category = 'Feed NG';
                                break;
                            case 'M18051':
                                $category = 'Left Strip NG';
                                break;
                            case 'M18052':
                                $category = 'Right Strip NG';
                                break;
                            case in_array($line[2], ['M18255', 'M18247', 'M18253', 'M18258', 'M18261', 'M18260', 'M18056', 'M18055', 'M18236', 'M18238', 'M18237', 'M18244', 'M18239', 'M18259', 'M18241', 'M18243', 'M18254', 'M18257', 'M18263', 'M18252', 'M18242'], true):
                                $category = 'Camera Error';
                                break;
                            case 'M18067':
                            case 'M18069':
                                $category = 'Mis-insertion (connector)';
                                break;
                            case 'M18168':
                                $category = 'Mis-insertion (Gomusen)';
                                break;
                        }
                    }

                    $sam_machine = $_POST['import_machine_data'];

                    // Use prepared statements for SQL queries
                    $insert = "INSERT INTO sam_error(`sam_machine`, `category`, `error_code`, `error_name`, `error_date`) VALUES (:sam_machine, :category, :error_code, :error_name, :error_date)";
                    $stmt = $conn->prepare($insert);
                    $stmt->bindParam(':sam_machine', $sam_machine, PDO::PARAM_STR);
                    $stmt->bindParam(':category', $category, PDO::PARAM_STR);
                    $stmt->bindParam(':error_code', $error_code, PDO::PARAM_STR);
                    $stmt->bindParam(':error_name', $error_name, PDO::PARAM_STR);
                    $stmt->bindParam(':error_date', $error_date, PDO::PARAM_STR);
                    $stmt->execute();
                }

                // Commit the transaction
                $conn->commit();

                fclose($csvFile);

                // Move JavaScript redirect logic to the end
                $redirectScript = '<script>
                    var x = confirm("';
                if ($error == 0) {
                    $redirectScript .= 'SUCCESS!';
                } else {
                    $redirectScript .= 'WITH ERROR! # OF ERRORS ' . $error . ' ';
                }
                $redirectScript .= '");
                    if (x == true) {
                        location.replace("../../../page/admin/dashboard.php");
                    } else {
                        location.replace("../../../page/admin/dashboard.php");
                    }
                </script>';
                echo $redirectScript;

            } else {
                // If errors found
                echo '<script>
                    var x = confirm("' . $chkCsvMsg . '");
                    if (x == true) {
                        location.replace("../../../page/admin/dashboard.php");
                    } else {
                        location.replace("../../../page/admin/dashboard.php");
                    }
                </script>';
            }
        } else {
            echo '<script>
                var x = confirm("CSV FILE NOT UPLOADED!");
                if (x == true) {
                    location.replace("../../../page/admin/dashboard.php");
                } else {
                    location.replace("../../../page/admin/dashboard.php");
                }
            </script>';
        }
    } else {
        echo '<script>
                var x = confirm("INVALID FILE FORMAT!");
                if (x == true) {
                    location.replace("../../../page/admin/dashboard.php");
                } else {
                    location.replace("../../../page/admin/dashboard.php");
                }
        </script>';
    }
}

// KILL CONNECTION
$conn = null;
?>