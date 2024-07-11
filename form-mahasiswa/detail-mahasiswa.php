<?php

$title = 'Detail Data Mahasiswa';
include '../layout/header-form.php';

//mengambil data dari id_mahasiswa dengan url
$id_mahasiswa = (int)$_GET['id_mahasiswa'];
$mahasiswa = select("SELECT * FROM mahasiswa WHERE id_mahasiswa = $id_mahasiswa")[0];

?>

    <div class="container mt-5">
        <a href="../mahasiswa.php" class="fixed-button shadow"><i class="fa fa-arrow-left-long" style="color: #E1E1E1"></i></a>
        <h1>Data Mahasiswa <?= $mahasiswa['NPM']; ?></h1>
        <hr>
        <table class="table table-bordered" id="tabledetail">
            <tr>
                <th>NPM</th>
                <td> <?= $mahasiswa['NPM']; ?></td>
            </tr>
            <tr>
                <th>Nama Lengkap</th>
                <td> <?= $mahasiswa['Nama']; ?></td>
            </tr>
            <tr>
                <th>Alamat</th>
                <td> <?= $mahasiswa['Alamat']; ?></td>
            </tr>
            <tr>
                <th>Program Studi</th>
                <td> <?= $mahasiswa['Prodi']; ?></td>
            </tr>
            <tr>
                <th>Jenis Kelamin</th>
                <td> <?= $mahasiswa['JK']; ?></td>
            </tr>
            <tr>
                <th>Nomor HP</th>
                <td> <?= $mahasiswa['NoHP']; ?></td>
            </tr>
            <tr>
                <th>Email</th>
                <td> <?= $mahasiswa['Email']; ?></td>
            </tr>
            <tr>
                <th>Semester</th>
                <td> <?= $mahasiswa['Semester']; ?></td>
            </tr>
            <tr>
                <th>IPK</th>
                <td> <?= $mahasiswa['IPK']; ?></td>
            </tr>
        </table>
        <a href="form-ubah-mahasiswa.php?id_mahasiswa=<?= $mahasiswa['id_mahasiswa']; ?>" class="btn" style="background-color:#DF6711; color: #ffffff; float: right;"><i class="fas fa-edit" style="color: #ffffff;"></i> Edit</a>
    </div>
    
    
<?php
include '../layout/footer-form.php';
?>