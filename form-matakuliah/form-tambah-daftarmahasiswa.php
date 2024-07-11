<?php 

$title = 'Tambah Mahasiswa';
include '../layout/header-form.php';

//check tombol tambah ditekan
if (isset($_POST['tambah'])){
    if(create_daftarmahasiswa($_POST) > 0){
        echo "<script>
                alert('Mahasiswa berhasil ditambahkan');
                document.location.href = '../matakuliah.php';
             </script>";
    } else {
        echo "<script>
                alert('Mahasiswa gagal ditambahkan');
                document.location.href = '../matakuliah.php';
             </script>";
    }
}

// Query untuk mendapatkan daftar mahasiswa
$queryMahasiswa = "SELECT NPM, Nama FROM mahasiswa";
$resultMahasiswa = $db->query($queryMahasiswa);

// Query untuk mendapatkan daftar kodematkul
$queryMatkul = "SELECT KodeMatkul FROM matakuliah";
$resultMatkul = $db->query($queryMatkul);

?>

    <div class="container mt-5">
        <a href="javascript:history.go(-1)" class="fixed-button shadow"><i class="fa fa-arrow-left-long" style="color: #E1E1E1"></i></a>
        <h1>Tambah Mahasiswa pada Mata Kuliah</h1>
        <hr>

        <form action="" method="post">
            <div class="mb-3">
                <label for="KodeMatkul" class="form-label">Pilih Kode Matakuliah</label>
                <select name="KodeMatkul" id="KodeMatkul" class="form-control" style="border-color: #DF6711; background-color: #D9D9D9; color: #000000;" required>
                    <option value="">-- Pilih Kode Matakuliah --</option>
                    <?php
                    // Tampilkan hasil query sebagai opsi dalam dropdown
                    while ($rowMatkul = $resultMatkul->fetch_assoc()) {
                        echo "<option value='" . $rowMatkul['KodeMatkul'] . "'>" . $rowMatkul['KodeMatkul'] . "</option>";
                    }
                    ?>
                </select>
            </div>

            <div class="mb-3">
                <label for="NPM" class="form-label">Pilih Mahasiswa</label>
                <select name="NPM" id="NPM" class="form-control" style="border-color: #DF6711; background-color: #D9D9D9; color: #000000;" required>
                    <option value="">-- Pilih Mahasiswa --</option>
                    <?php
                    // Tampilkan hasil query sebagai opsi dalam dropdown
                    while ($rowMahasiswa = $resultMahasiswa->fetch_assoc()) {
                        echo "<option value='" . $rowMahasiswa['NPM'] . "'>" . $rowMahasiswa['Nama'] . " - " . $rowMahasiswa['NPM'] . "</option>";
                    }
                    ?>
                </select>
            </div>

            <div class="mb-3">
                <label for="Nilai" class="form-label">Nilai Mahasiswa</label>
                <input type="text" class="form-control" style="border-color: #DF6711; background-color: #D9D9D9; color: #000000;" id="Nilai" name="Nilai" placeholder="80" required>
            </div>

            <button type="submit" name="tambah" class="btn" style="background-color:#DF6711; color: #ffffff; float: right;"><i class="fas fa-save" style="color: #ffffff;"></i> Simpan Data</button>
        </form>
    </div>


<?php
include '../layout/footer-form.php';
?>