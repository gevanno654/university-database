<?php


$title = 'Beranda';
include 'layout/header.php';
?>

    <div class="container mt-5">
        <h1>Beranda</h1>
        <p>Website Database Fakultas Ilmu Komputer UPN "Veteran" Jawa Timur</p>

        <div class="row" style="margin-top: 60px;">
        <p>Klik database yang ingin Anda lihat:</p>
            <div class="col-sm-1">
                <div class="card" onclick="openLink('dosen.php')">
                <div class="card-body">
                    <h5 class="card-title">Dosen</h5>
                    <p class="card-text">Database dosen.</p>
                </div>
                </div>
            </div>

            <div class="col-sm-1" style="margin-left: 150px; margin-right: 150px;">
                <div class="card" onclick="openLink('matakuliah.php')">
                <div class="card-body">
                    <h5 class="card-title">Mata Kuliah</h5>
                    <p class="card-text">Databse mata kuliah.</p>
                </div>
                </div>
            </div>

            <div class="col-sm-1">
                <div class="card" onclick="openLink('mahasiswa.php')">
                <div class="card-body">
                    <h5 class="card-title">Mahasiswa</h5>
                    <p class="card-text">Databse mahasiswa.</p>
                </div>
                </div>
            </div>
        </div>
<?php
include 'layout/footer.php';
?>