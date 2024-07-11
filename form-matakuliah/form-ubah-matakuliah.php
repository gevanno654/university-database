<?php
$title = 'Ubah Data Mata Kuliah';
include '../layout/header-form.php';

//check tombol ubah ditekan
if (isset($_POST['ubah'])){
    if(update_matakuliah($_POST) > 0){
        echo "<script>
                alert('Data Mata Kuliah berhasil diubah');
                document.location.href = '../matakuliah.php';
             </script>";
    } else {
        echo "<script>
                alert('Data Mata Kuliah gagal diubah');
                document.location.href = '../matakuliah.php';
             </script>";
    }
}

//mengambil data dari id_matakuliah dengan url
$id_matakuliah = (int)$_GET['id_matakuliah'];

//query ambil data mahasiswa
$matakuliah = select("SELECT * FROM matakuliah WHERE id_matakuliah = $id_matakuliah")[0];

// Query untuk mendapatkan daftar dosen
$query = "SELECT NIP, Nama FROM dosen";
$result = $db->query($query);

?>

    <div class="container mt-5">
        <a href="../matakuliah.php" class="fixed-button shadow"><i class="fa fa-arrow-left-long" style="color: #E1E1E1"></i></a>
        <h1>Data Mata Kuliah <?= $matakuliah['KodeMatkul']; ?></h1>
        <hr>

        <form action="" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id_matakuliah" value="<?= $matakuliah['id_matakuliah']; ?>">
            
            <div class="mb-3">
                <label for="KodeMatkul" class="form-label">Kode Mata Kuliah</label>
                <input type="text" class="form-control" style="border-color: #DF6711; background-color: #D9D9D9; color: #000000;" id="KodeMatkul" name="KodeMatkul" placeholder="IF0203" required value="<?= $matakuliah['KodeMatkul']; ?>">
            </div>

            <div class="mb-3">
                <label for="NamaMatkul" class="form-label">Pilih Nama Mata Kuliah</label>
                <input type="text" class="form-control" style="border-color: #DF6711; background-color: #D9D9D9; color: #000000;" id="NamaMatkul" name="NamaMatkul" placeholder="Arsitektur Komputer" required value="<?= $matakuliah['NamaMatkul']; ?>">
            </div>

            <div class="mb-3">
                <label for="KodeKelas" class="form-label">Pilih Kode Kelas</label>
                <input type="text" class="form-control" style="border-color: #DF6711; background-color: #D9D9D9; color: #000000;" id="KodeKelas" name="KodeKelas" placeholder="A081" required value="<?= $matakuliah['KodeKelas']; ?>">
            </div>

            <div class="mb-3">
                <label for="NIP" class="form-label">Pilih Dosen Pengampu</label>
                <select name="NIP" id="NIP" class="form-control" style="border-color: #DF6711; background-color: #D9D9D9; color: #000000;" required>
                    <?php $Prodi = $matakuliah['NIP']; ?>
                    <?php
                    // Tampilkan hasil query sebagai opsi dalam dropdown
                    while ($row = $result->fetch_assoc()) {
                        echo "<option value='" . $row['NIP'] . "'>" . $row['Nama'] . "</option>";
                    }
                    ?>
                </select>
            </div>

            <div class="mb-3">
                <label for="HariMatkul" class="form-label">Pilih Hari Mata Kuliah</label>
                <select name="HariMatkul" id="HariMatkul" class="form-control" style="border-color: #DF6711; background-color: #D9D9D9; color: #000000;" required>
                    <?php $Prodi = $matakuliah['HariMatkul']; ?>
                    <option value="Senin">Senin</option>
                    <option value="Selasa">Selasa</option>
                    <option value="Rabu">Rabu</option>
                    <option value="Kamis">Kamis</option>
                    <option value="Jumat">Jumat</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="JamMatkul" class="form-label">Pilih Jam Mata Kuliah</label>
                <select name="JamMatkul" id="JamMatkul" class="form-control" style="border-color: #DF6711; background-color: #D9D9D9; color: #000000;" required>
                    <?php $Prodi = $matakuliah['JamMatkul']; ?>
                    <option value="07:00 - 09.29">07:00 - 09.29</option>
                    <option value="09.30 - 12.00">09.30 - 12.00</option>
                    <option value="13.00 - 15.29">13.00 - 15.29</option>
                    <option value="15.30 - 18.00">15.30 - 18.00</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="RuangMatkul" class="form-label">Pilih Ruang Mata Kuliah</label>
                <select name="RuangMatkul" id="RuangMatkul" class="form-control" style="border-color: #DF6711; background-color: #D9D9D9; color: #000000;" required>
                    <?php $Prodi = $matakuliah['RuangMatkul']; ?>
                    <option value="Gd. FIK I - 201">Gd. FIK I - 201</option>
                    <option value="Gd. FIK I - 202">Gd. FIK I - 202</option>
                    <option value="Gd. FIK I - 301">Gd. FIK I - 301</option>
                    <option value="Gd. FIK I - 302">Gd. FIK I - 302</option>
                    <option value="Gd. FIK I - 303">Gd. FIK I - 303</option>
                    <option value="Gd. FIK I - 304">Gd. FIK I - 304</option>
                    <option value="Gd. FIK I - 305">Gd. FIK I - 305</option>
                    <option value="Gd. FIK I - 306">Gd. FIK I - 306</option>
                    <option value="Gd. FIK II - 102">Gd. FIK II - 101</option>
                    <option value="Gd. FIK II - 102">Gd. FIK II - 102</option>
                    <option value="Gd. FIK II - 103">Gd. FIK II - 103</option>
                    <option value="Gd. FIK II - 104">Gd. FIK II - 104</option>
                    <option value="Gd. FIK II - Lab. TIFA">Gd. FIK II - Lab. TIFA</option>
                    <option value="Gd. FIK II - Lab. SIFO">Gd. FIK II - Lab. SIFO</option>
                    <option value="Gd. FIK II - Lab. SADA">Gd. FIK II - Lab. SADA</option>
                    <option value="Gd. FIK II - Lab. BIDIG">Gd. FIK II - Lab. BIDIG</option>
                    <option value="Gd. FIK II - Lab. TEINFO">Gd. FIK II - Lab. TEINFO</option>
                    <option value="Gd. FIK II - Lab. 205">Gd. FIK II - Lab. 205</option>
                    <option value="Gd. FIK III - 301">Gd. FIK III - 301</option>
                    <option value="Gd. FIK III - 302">Gd. FIK III - 302</option>
                    <option value="Gd. FIK III - 303">Gd. FIK III - 303</option>
                    <option value="Gd. FIK III - 304">Gd. FIK III - 304</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="SKS" class="form-label">SKS Mata Kuliah</label>
                <input type="text" class="form-control" style="border-color: #DF6711; background-color: #D9D9D9; color: #000000;" id="SKS" name="SKS" placeholder="3" required value="<?= $matakuliah['SKS']; ?>">
            </div>

            <button type="submit" name="ubah" class="btn" style="background-color:#DF6711; color: #ffffff; float: right;"><i class="fas fa-save" style="color: #ffffff;"></i> Simpan Data</button>
        </form>
    </div>


<?php
include'../layout/footer-form.php';
?>