<?php
//SESSION
include '../../process/login.php';

// if (!isset($_SESSION['username'])) {
//   header('location:../../');
//   exit;
// } else if ($_SESSION['role'] == 'user') {
//   header('location: ../../page/user/dashboard.php');
//   exit;
// }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin</title>

    <link rel="stylesheet" href="css/admin-page.css">

    <link rel="icon" href="../../dist/img/sam-error-logo.png" type="image/x-icon" />
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="../../dist/css/font.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="../../plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Sweet Alert -->
    <link rel="stylesheet" href="../../plugins/sweetalert2/dist/sweetalert2.min.css">


    <style>
        .loader {
            border: 16px solid #f3f3f3;
            border-radius: 50%;
            border-top: 16px solid #536A6D;
            width: 50px;
            height: 50px;
            -webkit-animation: spin 2s linear infinite;
            animation: spin 2s linear infinite;
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(1080deg);
            }
        }

        .certificate-container {
            padding: 50px;
            width: 1024px;
            /* background-image: url("../../dist/img/CertificateTemplatev2.jpg"); */
        }

        .certificate {
            border: 20px solid #0C5280;
            padding: 25px;
            height: 600px;
            position: relative;
        }

        .certificate:after {
            content: '';
            top: 0px;
            left: 0px;
            bottom: 0px;
            right: 0px;
            position: absolute;
            background-size: 100%;
            z-index: -1;
        }

        .certificate-header>.logo {
            width: 80px;
            height: 80px;
        }

        .certificate-title {
            text-align: center;
        }

        .certificate-body {
            text-align: center;
        }

        h1 {

            font-weight: 400;
            font-size: 48px;
            color: #0C5280;
        }

        .student-name {
            font-size: 24px;
        }

        .certificate-content {
            margin: 0 auto;
            width: 750px;
        }

        .about-certificate {
            width: 380px;
            margin: 0 auto;
        }

        .topic-description {

            text-align: center;
        }
    </style>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="../../dist/img/logo.png" alt="logo" height="60" width="60">
        </div>

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand glassmorph">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link text-white" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link text-white" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->