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
                    $error_code = trim($line[2]);
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
                            case in_array($line[2], ['M18066', 'M18067'], true):
                                $category = 'Mis-Insertion Right NG';
                                break;
                            case in_array($line[2], [
                            'M17534',
                            'M17535',
                            'M17536',
                            'M17537',
                            'M17538',
                            'M17539',
                            'M17540',
                            'M17542',
                            'M17543',
                            'M17544',
                            'M17547',
                            'M17548',
                            'M17549',
                            'M17550',
                            'M17551',
                            'M17552',
                            'M17553',
                            'M17554',
                            'M17555',
                            'M17556',
                            'M17557',
                            'M17558',
                            'M17559',
                            'M17560'
                            ], true):
                                $category = 'SVM Error';
                                break;
                            case in_array($line[2], [
                            'M17660',
                            'M17661',
                            'M17662',
                            'M17663',
                            'M17664',
                            'M17665',
                            'M17666',
                            'M17667',
                            'M17668',
                            'M17669'
                            ], true):
                                $category = 'S-DR Error';
                                break;
                            case in_array($line[2], [
                            'M17715',
                            'M17721',
                            'M17768',
                            'M17770',
                            'M17772',
                            'M17780',
                            'M17784',
                            'M17786',
                            'M17788',
                            'M17791',
                            'M17799',
                            'M17814',
                            'M17828',
                            'M18044',
                            'M18117',
                            'M18140',
                            'M18143',
                            'M18145',
                            'M18146',
                            'M18149',
                            'M18163'
                            ], true):
                                $category = 'Time Over';
                                break;
                            case in_array($line[2], ['M18068', 'M18069'], true):
                                $category = 'Mis-Insertion Left NG';
                                break;
                            case in_array($line[2], ['M18105', 'M18106', 'M18200'], true):
                                $category = 'Beam Error';
                                break;
                            case in_array($line[2], [
                            'M18172',
                            'M18173',
                            'M18174',
                            'M18175',
                            'M18177',
                            'M18178',
                            'M18179',
                            'M18180',
                            'M18181'
                            ], true):
                                $category = 'Crimping Error';
                                break;
                            case in_array($line[2], [
                            'M18284',
                            'M18286',
                            'M18288',
                            'M18290'
                            ], true):
                                $category = 'Out-of-step Error';
                                break;
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