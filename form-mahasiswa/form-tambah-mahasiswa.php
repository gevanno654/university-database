<?php
$title = 'Tambah Data Mahasiswa';
include '../layout/header-form.php';

//check tombol tambah ditekan
if (isset($_POST['tambah'])){
    if(create_mahasiswa($_POST) > 0){
        echo "<script>
                alert('Data Mahasiswa berhasil ditambahkan');
                document.location.href = '../mahasiswa.php';
             </script>";
    } else {
        echo "<script>
                alert('Data Mahasiswa gagal ditambahkan');
                document.location.href = '../mahasiswa.php';
             </script>";
    }
}
?>

    <div class="container mt-5">
        <a href="../mahasiswa.php" class="fixed-button shadow"><i class="fa fa-arrow-left-long" style="color: #E1E1E1"></i></a>
        <h1>Tambah Data Mahasiswa</h1>
        <hr>

        <form action="" method="post">
            <div class="mb-3">
                <label for="NPM" class="form-label">NPM</label>
                <input type="text" class="form-control" style="border-color: #DF6711; background-color: #D9D9D9; color: #000000;" id="NPM" name="NPM" placeholder="22081010049" required>
            </div>

            <div class="mb-3">
                <label for="Nama" class="form-label">Nama Lengkap Mahasiswa</label>
                <input type="text" class="form-control" style="border-color: #DF6711; background-color: #D9D9D9; color: #000000;" id="Nama" name="Nama" placeholder="Gevanno Pascal Yohanes" required>
            </div>

            <div class="mb-3">
                <label for="Alamat" class="form-label">Alamat Lengkap Mahasiswa</label>
                <textarea name="Alamat" id="Alamat"></textarea>
            </div>

            <div class="row">
                <div class="mb-3 col-6">
                    <label for="Prodi" class="form-label">Program Studi Mahasiswa</label>
                    <select name="Prodi" id="Prodi" class="form-control" style="border-color: #DF6711; background-color: #D9D9D9; color: #000000;" required>
                        <option value="">-- Pilih Prodi --</option>
                        <option value="Informatika">Informatika</option>
                        <option value="Sistem Informasi">Sistem Informasi</option>
                        <option value="Sains Data">Sains Data</option>
                        <option value="Bisnis Digital">Bisnis Digital</option>
                    </select>
                </div>

                <div class="mb-3 col-6">
                    <label for="JK" class="form-label">Jenis Kelamin Mahasiswa</label>
                    <select name="JK" id="JK" class="form-control" style="border-color: #DF6711; background-color: #D9D9D9; color: #000000;" required>
                        <option value="">-- Pilih Jenis Kelamin --</option>
                        <option value="Laki-Laki">Laki-Laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                </div>
            </div>

            <div class="mb-3">
                <label for="NoHP" class="form-label">No HP Mahasiswa yang masih aktif</label>
                <input type="number" class="form-control" style="border-color: #DF6711; background-color: #D9D9D9; color: #000000;" id="NoHP" name="NoHP" placeholder="081888001111" required>
            </div>

            <div class="mb-3">
                <label for="Email" class="form-label">Email Mahasiswa yang masih aktif</label>
                <input type="email" class="form-control" style="border-color: #DF6711; background-color: #D9D9D9; color: #000000;" id="Email" name="Email" placeholder="example123@gmail.com" required>
            </div>

            <div class="mb-3">
                <label for="Semester" class="form-label">Semester Mahasiswa saat ini</label>
                <input type="number" class="form-control" style="border-color: #DF6711; background-color: #D9D9D9; color: #000000;" id="Semester" name="Semester" placeholder="3" required>
            </div>

            <div class="mb-3">
                <label for="IPK" class="form-label">IPK Mahasiswa saat ini</label>
                <input type="text" class="form-control" style="border-color: #DF6711; background-color: #D9D9D9; color: #000000;" id="IPK" name="IPK" placeholder="3.99" required>
            </div>

            <button type="submit" name="tambah" class="btn" style="background-color:#DF6711; color: #ffffff; float: right;"><i class="fas fa-save" style="color: #ffffff;"></i> Simpan Data</button>
        </form>
    </div>

<?php
include'../layout/footer-form.php';
?>