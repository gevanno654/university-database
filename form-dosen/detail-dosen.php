<?php

$title = 'Detail Data Dosen';

//mengambil data dari id_dosen dengan url
$id_dosen = (int)$_GET['id_dosen'];

include '../layout/header-form.php';
$dosen = select("SELECT * FROM dosen WHERE id_dosen = $id_dosen")[0];
?>

    <div class="container mt-5">
        <a href="../dosen.php" class="fixed-button shadow"><i class="fa fa-arrow-left-long" style="color: #E1E1E1"></i></a>
        <h1>Data Dosen <?= $dosen['NIP']; ?></h1>
        <hr>
        <table class="table table-bordered" id="tabledetail">
            <tr>
                <th>NPM</th>
                <td> <?= $dosen['NIP']; ?></td>
            </tr>
            <tr>
                <th>Nama Lengkap</th>
                <td> <?= $dosen['Nama']; ?></td>
            </tr>
            <tr>
                <th>Alamat</th>
                <td> <?= $dosen['Alamat']; ?></td>
            </tr>
            <tr>
                <th>Jenis Kelamin</th>
                <td> <?= $dosen['JK']; ?></td>
            </tr>
            <tr>
                <th>Nomor HP</th>
                <td> <?= $dosen['NoHP']; ?></td>
            </tr>
            <tr>
                <th>Email</th>
                <td> <?= $dosen['Email']; ?></td>
            </tr>
            <tr>
                <th>Tanggal Mulai Bekerja</th>
                <td><?= date('D, d-F-Y', strtotime($dosen['TglStartBekerja'])); ?></td>
            </tr>
            <tr>
                <th>Jabatan</th>
                <td> <?= $dosen['Jabatan']; ?></td>
            </tr>
            <tr>
                <th>Gaji</th>
                <td>Rp<?= number_format($dosen['Gaji'],0,',','.');?></td>
            </tr>
        </table>
        <a href="form-ubah-dosen.php?id_dosen=<?= $dosen['id_dosen']; ?>" class="btn" style="background-color:#DF6711; color: #ffffff; float: right;"><i class="fas fa-edit" style="color: #ffffff;"></i> Edit</a>
    </div>
    
    
<?php
include '../layout/footer-form.php';
?>