<?php

include 'config/app.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <!-- template admin -->
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
    rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
    crossorigin="anonymous">

    <!-- sidebar -->
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    
    <!-- Untuk Datatables jangan diubah! -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">

    <!-- filter -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
    crossorigin="anonymous">

    <!-- Montserrat Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap">

    <script src="/docs/5.3/assets/js/color-modes.js"></script>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/sign-in/">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">
    <link href="/docs/5.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
    crossorigin="anonymous">

    <!-- Favicons -->
    <link rel="apple-touch-icon" href="/docs/5.3/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
    <link rel="icon" href="/docs/5.3/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
    <link rel="icon" href="/docs/5.3/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
    <link rel="manifest" href="/docs/5.3/assets/img/favicons/manifest.json">
    <link rel="mask-icon" href="/docs/5.3/assets/img/favicons/safari-pinned-tab.svg" color="#712cf9">
    <link rel="icon" href="/docs/5.3/assets/img/favicons/favicon.ico">
    <meta name="theme-color" content="#712cf9">

    <link href="sign-in.css" rel="stylesheet">

    <!-- Custom CSS untuk menyesuaikan judul -->
    <style>
        body {
            font-family: 'Montserrat', sans-serif;
            font-size: 14px;
            background-color: #D9D9D9;
            color: #000000;
        }

        h1 {
            font-weight: bold;
            font-size: 40px;
            color: #000000;
        }

        .card {
            width: 230px;
            height: 100px;
            background-color: #B6B6B6;
            transition: all 0.5s ease;
            cursor: pointer;
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
            border-radius: 10px;
        }

        .card:hover {
            transform: scale(1.075);
            background-color: #DF6711;
        }
        
        .card-title {
            font-weight: bold;
            font-size: 30px;
            color: #000000;
        }

        .card-text{
            font-size: 15px;
            color: #000000;
        }

        .btn {
            transition: all 0.5s ease;
            cursor: pointer;
        }

        .btn:hover {
            transform: scale(1.075);
        }

        .navbar {
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 1000;
        }

        .navbar + .container {
            padding-top: 56px;
        }

        #sidebar {
            border-left: 5px solid #474542;
            position: fixed;
            background-color: #474542;
        }

        .nav-pills .nav-link {
            position: relative;
            padding: 10px 15px;
            border-radius: 15px 0px 0px 15px;
            color: #E1E1E1;
        }

        .nav-pills .nav-link.active::before{
            content:'';
            position: absolute;
            bottom: 41px; /* Sesuaikan nilai ini untuk mengontrol ukuran lengkungan */
            left: 90%;
            width: 20px; /* Sesuaikan nilai ini untuk mengontrol lebar lengkungan */
            height: 20px; /* Sesuaikan nilai ini untuk mengontrol tinggi lengkungan */
            background-color: #474542;
            border-radius: 50%;
            box-shadow: 10px 10px 0px 0px #D9D9D9;
        }

        .nav-pills .nav-link.active::after{
            content:'';
            position: absolute;
            bottom: -20px; /* Sesuaikan nilai ini untuk mengontrol ukuran lengkungan */
            left: 90%;
            width: 20px; /* Sesuaikan nilai ini untuk mengontrol lebar lengkungan */
            height: 20px; /* Sesuaikan nilai ini untuk mengontrol tinggi lengkungan */
            background-color: #474542;
            border-radius: 50%;
            box-shadow: 10px -10px #D9D9D9;
        }

        .nav-pills .nav-link.active{
            background-color: #D9D9D9;
            color: #000000;
        }

        .dropdown-menu a.dropdown-item:hover {
            background-color: #D9D9D9 !important;
            color: #000000 !important;
        }

        #content {
            margin-top: 10px;
            margin-left: 200px;
            padding: 20px;
            color: #000000;
        }

        #table,
        #table th,
        #table td {
            border-color: #DF6711;
        }

        #table th{
            background-color: #CACACA;
        }

        #table td {
            background-color: #D9D9D9;
        }

        #table th,
        #table td {
            color: #000000;
        }
        
        #tabledetail,
        #tabledetail tr,
        #tabledetail td {
            border-color: #DF6711;
        }

        #tabledetail tr{
            background-color: #CACACA;
        }

        #tabledetail td {
            background-color: #D9D9D9;
        }

        #tabledetail tr,
        #tabledetail td {
            color: #000000;
        }

        .fixed-button {
            position: fixed;
            z-index: 9999;
            right: 20px;
            padding: 10px 20px;
            background-color: #DF6711;
            color: #E1E1E1;
            opacity: 80%;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            font-size: 16px;
            transition: all 0.5s ease;
        }

        .fixed-button:hover {
            opacity: 100%;
            color: #E1E1E1;
            text-decoration: none;
            transform: scale(1.1);
        }

        #myModal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.4);
        }

        .modal-content {
            background-color: #fefefe;
            margin: 15% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }

    </style>

    <title><?= $title; ?></title>
</head>

<body>
        <nav class="navbar shadow" style="background-color: #DF6711;">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php" style="color: white;">
            <img src="logo.png" alt="Logo" width="28" height="28" class="d-inline-block align-text-top">
            FASILKOM UPN "Veteran" Jawa Timur
            </a>
        </div>
        </nav>
        <div id="sidebar" class="d-flex flex-column" style="width: 199px; height: 100vh">
            <a href="index.php" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
            <span class="fs-5">FASILKOM UPNVJT</span>
            </a>
                <hr>
                    <ul class="nav nav-pills flex-column mb-auto">
                        <li class="nav-item">
                            <a href="index.php" class="nav-link nav-link-curve <?php echo (strpos($_SERVER['REQUEST_URI'], 'index.php') !== false) ? 'active' : ''; ?>">
                                <i class="fa fa-house fa-sm" style="color: #000000;"></i> Beranda
                            </a>
                        </li>
                        <li>
                            <a href="dosen.php" class="nav-link <?php echo (strpos($_SERVER['REQUEST_URI'], 'dosen.php') !== false) ? 'active' : ''; ?>">
                                <i class="fa fa-user-graduate fa-sm" style="color: #000000;"></i> Dosen
                            </a>
                        </li>
                        <li>
                            <a href="matakuliah.php" class="nav-link <?php echo (strpos($_SERVER['REQUEST_URI'], 'matakuliah.php') !== false) ? 'active' : ''; ?>">
                                <i class="fa fa-users-rectangle fa-sm" style="color: #000000;"></i> Mata Kuliah
                            </a>
                        </li>
                        <li>
                            <a href="mahasiswa.php" class="nav-link <?php echo (strpos($_SERVER['REQUEST_URI'], 'mahasiswa.php') !== false) ? 'active' : ''; ?>">
                                <i class="fa fa-user-group fa-sm" style="color: #000000;"></i> Mahasiswa
                            </a>
                        </li>
                    </ul>
                <hr>
        </div>
        <div id="content">