<?php
$title = 'Ubah Data Mahasiswa';
include '../layout/header-form.php';

//check tombol ubah ditekan
if (isset($_POST['ubah'])){
    if(update_mahasiswa($_POST) > 0){
        echo "<script>
                alert('Data Mahasiswa berhasil diubah');
                document.location.href = '../mahasiswa.php';
             </script>";
    } else {
        echo "<script>
                alert('Data Mahasiswa gagal diubah');
                document.location.href = '../mahasiswa.php';
             </script>";
    }
}

//mengambil data dari id_mahasiswa dengan url
$id_mahasiswa = (int)$_GET['id_mahasiswa'];

//query ambil data mahasiswa
$mahasiswa = select("SELECT * FROM mahasiswa WHERE id_mahasiswa = $id_mahasiswa")[0];

?>

    <div class="container mt-5">
        <a href="../mahasiswa.php" class="fixed-button shadow"><i class="fa fa-arrow-left-long" style="color: #E1E1E1"></i></a>
        <h1>Data Mahasiswa <?= $mahasiswa['NPM']; ?></h1>
        <hr>

        <form action="" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id_mahasiswa" value="<?= $mahasiswa['id_mahasiswa']; ?>">
            
            <div class="mb-3">
                <label for="NPM" class="form-label">NPM</label>
                <input type="text" class="form-control" style="border-color: #DF6711; background-color: #D9D9D9; color: #000000;" id="NPM" name="NPM" placeholder="22081010049" required value="<?= $mahasiswa['NPM']; ?>">
            </div>

            <div class="mb-3">
                <label for="Nama" class="form-label">Nama Lengkap Mahasiswa</label>
                <input type="text" class="form-control" style="border-color: #DF6711; background-color: #D9D9D9; color: #000000;" id="Nama" name="Nama" placeholder="Gevanno Pascal Yohanes" required value="<?= $mahasiswa['Nama']; ?>">
            </div>

            <div class="mb-3">
                <label for="Alamat" class="form-label">Alamat Lengkap Mahasiswa</label>
                <textarea name="Alamat" id="Alamat"><?= $mahasiswa['Alamat']; ?></textarea>
            </div>

            <div class="row">
                <div class="mb-3 col-6">
                    <label for="Prodi" class="form-label">Program Studi Mahasiswa</label>
                    <select name="Prodi" id="Prodi" class="form-control" style="border-color: #DF6711; background-color: #D9D9D9; color: #000000;" required>
                        <?php $Prodi = $mahasiswa['Prodi']; ?>
                        <option value="Informatika"<?= $Prodi == 'Informatika' ? 'selected' : null ?>>Informatika</option>
                        <option value="Sistem Informasi"<?= $Prodi == 'Sistem Informasi' ? 'selected' : null ?>>Sistem Informasi</option>
                        <option value="Sains Data"<?= $Prodi == 'Sains Data' ? 'selected' : null ?>>Sains Data</option>
                        <option value="Bisnis Digital"<?= $Prodi == 'Bisnis Digital' ? 'selected' : null ?>>Bisnis Digital</option>
                    </select>
                </div>

                <div class="mb-3 col-6">
                    <label for="JK" class="form-label">Jenis Kelamin Mahasiswa</label>
                    <select name="JK" id="JK" class="form-control" style="border-color: #DF6711; background-color: #D9D9D9; color: #000000;" required>
                        <?php $JK = $mahasiswa['JK']; ?>
                        <option value="Laki-Laki"<?= $JK == 'Laki-Laki' ? 'selected' : null ?>>Laki-Laki</option>
                        <option value="Perempuan"<?= $JK == 'Perempuan' ? 'selected' : null ?>>Perempuan</option>
                    </select>
                </div>
            </div>

            <div class="mb-3">
                <label for="NoHP" class="form-label">No HP Mahasiswa yang masih aktif</label>
                <input type="number" class="form-control" style="border-color: #DF6711; background-color: #D9D9D9; color: #000000;" id="NoHP" name="NoHP" placeholder="081888001111" required value="<?= $mahasiswa['NoHP']; ?>">
            </div>

            <div class="mb-3">
                <label for="Email" class="form-label">Email Mahasiswa yang masih aktif</label>
                <input type="email" class="form-control" style="border-color: #DF6711; background-color: #D9D9D9; color: #000000;" id="Email" name="Email" placeholder="example123@gmail.com" required value="<?= $mahasiswa['Email']; ?>">
            </div>

            <div class="mb-3">
                <label for="Semester" class="form-label">Semester Mahasiswa saat ini</label>
                <input type="number" class="form-control" style="border-color: #DF6711; background-color: #D9D9D9; color: #000000;" id="Semester" name="Semester" placeholder="3" required value="<?= $mahasiswa['Semester']; ?>">
            </div>

            <div class="mb-3">
                <label for="IPK" class="form-label">IPK Mahasiswa saat ini</label>
                <input type="text" class="form-control" style="border-color: #DF6711; background-color: #D9D9D9; color: #000000;" id="IPK" name="IPK" placeholder="3.99" required value="<?= $mahasiswa['IPK']; ?>">
            </div>

            <button type="submit" name="ubah" class="btn" style="background-color:#DF6711; color: #ffffff; float: right;"><i class="fas fa-save" style="color: #ffffff;"></i> Simpan Data</button>
        </form>
    </div>


<?php
include'../layout/footer-form.php';
?>