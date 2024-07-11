<?php
$title = 'Ubah Data Detail Mahasiswa pada Matakuliah';
include '../layout/header-form.php';

// Check tombol ubah ditekan
if (isset($_POST['ubah'])) {
    if (update_daftarmahasiswa($_POST) > 0) {
        echo "<script>
                alert('Detail Mahasiswa berhasil diubah di Matakuliah ini');
                document.location.href = '../matakuliah.php';
             </script>";
    } else {
        echo "<script>
                alert('Detail Mahasiswa gagal diubah di Matakuliah ini');
                document.location.href = '../matakuliah.php';
             </script>";
    }
}

// Mengambil data dari id_daftarmahasiswa dengan URL
$id_daftarmahasiswa = (int)$_GET['id_daftarmahasiswa'];

// Query ambil data daftarmahasiswa berdasarkan id_daftarmahasiswa
$daftarmahasiswa = select("SELECT * FROM daftarmahasiswa WHERE id_daftarmahasiswa = $id_daftarmahasiswa")[0];

// Query untuk mendapatkan daftar mahasiswa
$queryMahasiswa = "SELECT NPM, Nama FROM mahasiswa";
$resultMahasiswa = $db->query($queryMahasiswa);
?>

<div class="container mt-5">
    <a href="javascript:history.go(-1)" class="fixed-button shadow"><i class="fa fa-arrow-left-long" style="color: #E1E1E1"></i></a>
    <h1>Sunting Detail Mahasiswa pada Matakuliah <?= $daftarmahasiswa['KodeMatkul']; ?></h1>
    <hr>

    <form action="" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id_daftarmahasiswa" value="<?= $daftarmahasiswa['id_daftarmahasiswa']; ?>">

        <div class="mb-3">
            <label for="KodeMatkul" class="form-label">Kode Matakuliah</label>
            <input type="text" class="form-control" style="border-color: #DF6711; background-color: #D9D9D9; color: #000000;" id="KodeMatkul" name="KodeMatkul" value="<?= $daftarmahasiswa['KodeMatkul']; ?>" disabled>
        </div>

        <div class="mb-3">
            <label for="NPM" class="form-label">Pilih Mahasiswa</label>
            <select name="NPM" id="NPM" class="form-control" style="border-color: #DF6711; background-color: #D9D9D9; color: #000000;" required disabled>
                <?php
                // Menampilkan hasil query sebagai opsi dalam dropdown
                while ($rowMahasiswa = $resultMahasiswa->fetch_assoc()) {
                    $selected = ($rowMahasiswa['NPM'] == $daftarmahasiswa['NPM']) ? 'selected' : '';
                    echo "<option value='" . $rowMahasiswa['NPM'] . "' $selected>" . $rowMahasiswa['Nama'] . " - " . $rowMahasiswa['NPM'] . "</option>";
                }
                ?>
            </select>
        </div>

        <div class="mb-3">
            <label for="Nilai" class="form-label">Nilai Mahasiswa</label>
            <input type="text" class="form-control" style="border-color: #DF6711; background-color: #D9D9D9; color: #000000;" id="Nilai" name="Nilai" placeholder="80" value="<?= $daftarmahasiswa['Nilai']; ?>" required>
        </div>

        <button type="submit" name="ubah" class="btn" style="background-color:#DF6711; color: #ffffff; float: right;">
            <i class="fas fa-save" style="color: #ffffff;"></i> Simpan Data
        </button>
    </form>
</div>

<?php include '../layout/footer-form.php'; ?>
