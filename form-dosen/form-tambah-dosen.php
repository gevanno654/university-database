<?php
$title = 'Tambah Data Dosen';
include '../layout/header-form.php';

//check tombol tambah ditekan
if (isset($_POST['tambah'])){
    if(create_dosen($_POST) > 0){
        echo "<script>
                alert('Data Dosen berhasil ditambahkan');
                document.location.href = '../dosen.php';
             </script>";
    } else {
        echo "<script>
                alert('Data Dosen gagal ditambahkan');
                document.location.href = '../dosen.php';
             </script>";
    }
}
?>

    <div class="container mt-5">
        <a href="../dosen.php" class="fixed-button shadow"><i class="fa fa-arrow-left-long" style="color: #E1E1E1"></i></a>
        <h1>Tambah Data Dosen</h1>
        <hr>

        <form action="" method="post">
            <div class="mb-3">
                <label for="NIP" class="form-label">NIP</label>
                <input type="text" class="form-control" style="border-color: #DF6711; background-color: #D9D9D9; color: #000000;" id="NIP" name="NIP" placeholder="220020354001" required>
            </div>

            <div class="mb-3">
                <label for="Nama" class="form-label">Nama Lengkap Dosen</label>
                <input type="text" class="form-control" style="border-color: #DF6711; background-color: #D9D9D9; color: #000000;" id="Nama" name="Nama" placeholder="Bambang Jatmiko" required>
            </div>

            <div class="mb-3">
                <label for="Alamat" class="form-label">Alamat Lengkap Dosen</label>
                <textarea name="Alamat" id="Alamat"></textarea>
            </div>

            <div class="row">
                <div class="mb-3 col-6">
                    <label for="JK" class="form-label">Jenis Kelamin Dosen</label>
                    <select name="JK" id="JK" class="form-control" style="border-color: #DF6711; background-color: #D9D9D9; color: #000000;" required>
                        <option value="">-- Pilih Jenis Kelamin --</option>
                        <option value="Laki-Laki">Laki-Laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                </div>
            </div>

            <div class="mb-3">
                <label for="NoHP" class="form-label">No HP Dosen yang masih aktif</label>
                <input type="number" class="form-control" style="border-color: #DF6711; background-color: #D9D9D9; color: #000000;" id="NoHP" name="NoHP" placeholder="081888001111" required>
            </div>

            <div class="mb-3">
                <label for="Email" class="form-label">Email Dosen yang masih aktif</label>
                <input type="email" class="form-control" style="border-color: #DF6711; background-color: #D9D9D9; color: #000000;" id="Email" name="Email" placeholder="example123@gmail.com" required>
            </div>

            <div class="mb-3">
                <label for="TglStartBekerja" class="form-label">Tanggal Mulai Bekerja</label>
                <input type="date" class="form-control" style="border-color: #DF6711; background-color: #D9D9D9; color: #000000;" id="TglStartBekerja" name="TglStartBekerja" required>
            </div>

            <div class="mb-3">
                <label for="Jabatan" class="form-label">Jabatan Dosen saat ini</label>
                <input type="text" class="form-control" style="border-color: #DF6711; background-color: #D9D9D9; color: #000000;" id="Jabatan" name="Jabatan" placeholder="Wakil Dekan 3" required>
            </div>

            <div class="mb-3">
                <label for="Gaji" class="form-label">Gaji Dosen saat ini</label>
                <input type="number" class="form-control" style="border-color: #DF6711; background-color: #D9D9D9; color: #000000;" id="Gaji" name="Gaji" placeholder="5000000" required>
            </div>

            <button type="submit" name="tambah" class="btn" style="background-color:#DF6711; color: #ffffff; float: right;"><i class="fas fa-save" style="color: #ffffff;"></i> Simpan Data</button>
        </form>
    </div>

<?php
include'../layout/footer-form.php';
?>