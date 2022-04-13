<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="refresh" content="600">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Production Dashboard </title>
    <link href="<?= base_url(); ?>assets/img/mhaicon.png" rel="icon">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/dist/css/googlefont.css">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/plugins/fontawesome-free/css/all.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/plugins/fontawesome-free/css/fontawesome.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/plugins/fontawesome-free/css/brands.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/plugins/fontawesome-free/css/solid.css">
    <!-- IonIcons -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/dist/css/ionic.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/dist/css/adminlte.min.css">
    <!-- DataTables -->
    <!-- <link rel="stylesheet" href="<?= base_url(); ?>assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css"> -->
    <!-- <link rel="stylesheet" href="<?= base_url(); ?>assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css"> -->
    <style>
        #stop_scroll {
            position: fixed;
            left: 50%;
            top: 30%;
            width: 100px;
            height: 35px;
            border: 1px solid #868A08;
            background: none;
            color: #868A08;
            font-size: 16px;
        }

        /* .chartheight{height:200%; overflow-y:auto;} */



        /* .chartWrapper {
            position: relative;
        } */

        /* .chartWrapper>canvas {
            position: absolute;
            left: 0;
            top: 0;
            pointer-events: none;
        } */

        /* .chartAreaWrapper {
            width: 100%;
            height: 1000px; 
            overflow-x: scroll;
        } */
    </style>
</head>
<!--
`body` tag options:

  Apply one or more of the following classes to to the body tag
  to get the desired effect

  * sidebar-collapse
  * sidebar-mini
-->

<body class="sidebar-mini sidebar-collapse">
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <!-- <li class="nav-item d-none d-sm-inline-block">
        <a href="index3.html" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li> -->
            </ul>
            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Navbar Search -->
                <!-- Messages Dropdown Menu -->
                <!-- Notifications Dropdown Menu -->
                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
                        <i class="fas fa-th-large"></i>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->