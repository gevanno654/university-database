<?php
$title = 'Sunting Data Dosen';
include '../layout/header-form.php';

//check tombol ubah ditekan
if (isset($_POST['ubah'])){
    if(update_dosen($_POST) > 0){
        echo "<script>
                alert('Data Dosen berhasil diubah');
                document.location.href = '../dosen.php';
             </script>";
    } else {
        echo "<script>
                alert('Data Dosen gagal diubah');
                document.location.href = '../dosen.php';
             </script>";
    }
}

//mengambil data dari id_dosen dengan url
$id_dosen = (int)$_GET['id_dosen'];

//query ambil data dosen
$dosen = select("SELECT * FROM dosen WHERE id_dosen = $id_dosen")[0];

?>

    <div class="container mt-5">
        <a href="../dosen.php" class="fixed-button shadow"><i class="fa fa-arrow-left-long" style="color: #E1E1E1"></i></a>
        <h1>Sunting Data Dosen <?= $dosen['NIP']; ?></h1>
        <hr>

        <form action="" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id_dosen" value="<?= $dosen['id_dosen']; ?>">
            
            <div class="mb-3">
            <label for="NIP" class="form-label">NIP</label>
                <input type="text" class="form-control" style="border-color: #DF6711; background-color: #D9D9D9; color: #000000;" id="NIP" name="NIP" placeholder="220020354001" required value="<?= $dosen['NIP']; ?>">
            </div>

            <div class="mb-3">
            <label for="Nama" class="form-label">Nama Lengkap Dosen</label>
                <input type="text" class="form-control" style="border-color: #DF6711; background-color: #D9D9D9; color: #000000;" id="Nama" name="Nama" placeholder="Bambang Jatmiko" required value="<?= $dosen['Nama']; ?>">
            </div>

            <div class="mb-3">
                <label for="Alamat" class="form-label">Alamat Lengkap Dosen</label>
                <textarea name="Alamat" id="Alamat"><?= $dosen['Alamat']; ?></textarea>
            </div>

            <div class="row">
                <div class="mb-3 col-6">
                    <label for="JK" class="form-label">Jenis Kelamin Dosen</label>
                    <select name="JK" id="JK" class="form-control" style="border-color: #DF6711; background-color: #D9D9D9; color: #000000;" required>
                        <?php $JK = $dosen['JK']; ?>
                        <option value="Laki-Laki"<?= $JK == 'Laki-Laki' ? 'selected' : null ?>>Laki-Laki</option>
                        <option value="Perempuan"<?= $JK == 'Perempuan' ? 'selected' : null ?>>Perempuan</option>
                    </select>
                </div>
            </div>

            <div class="mb-3">
            <label for="NoHP" class="form-label">No HP Dosen yang masih aktif</label>
                <input type="number" class="form-control" style="border-color: #DF6711; background-color: #D9D9D9; color: #000000;" id="NoHP" name="NoHP" placeholder="081888001111" required value="<?= $dosen['NoHP']; ?>">
            </div>

            <div class="mb-3">
            <label for="Email" class="form-label">Email Dosen yang masih aktif</label>
                <input type="email" class="form-control" style="border-color: #DF6711; background-color: #D9D9D9; color: #000000;" id="Email" name="Email" placeholder="example123@gmail.com" required value="<?= $dosen['Email']; ?>">
            </div>

            <div class="mb-3">
            <label for="TglStartBekerja" class="form-label">Tanggal Mulai Bekerja</label>
                <input type="date" class="form-control" style="border-color: #DF6711; background-color: #D9D9D9; color: #000000;" id="TglStartBekerja" name="TglStartBekerja" required value="<?= $dosen['TglStartBekerja']; ?>">
            </div>

            <div class="mb-3">
            <label for="Jabatan" class="form-label">Jabatan Dosen saat ini</label>
                <input type="text" class="form-control" style="border-color: #DF6711; background-color: #D9D9D9; color: #000000;" id="Jabatan" name="Jabatan" placeholder="Wakil Dekan 3" required value="<?= $dosen['Jabatan']; ?>">
            </div>

            <div class="mb-3">
                <label for="Gaji" class="form-label">Gaji Dosen saat ini</label>
                <input type="number" class="form-control" style="border-color: #DF6711; background-color: #D9D9D9; color: #000000;" id="Gaji" name="Gaji" placeholder="5000000" required value="<?= $dosen['Gaji']; ?>">
            </div>

            <button type="submit" name="ubah" class="btn" style="background-color:#DF6711; color: #ffffff; float: right;"><i class="fas fa-save" style="color: #ffffff;"></i> Simpan Data</button>
        </form>
    </div>


<?php
include'../layout/footer-form.php';
?>