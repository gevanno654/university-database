<?php
ob_start();
$title = 'Data Mahasiswa Fasilkom UPNVJT';
include 'layout/header.php';

// Inisialisasi variabel filter
$selectedProdi = '';
$selectedAngkatan = '';
$selectedIPK = '';

// Cek apakah ada filter dari URL
if (isset($_GET['prodiFilter']) || isset($_GET['angkatanFilter']) || isset($_GET['ipkFilter'])) {
    // Jika ada, ambil nilai filter
    $selectedProdi = isset($_GET['prodiFilter']) ? $_GET['prodiFilter'] : '';
    $selectedAngkatan = isset($_GET['angkatanFilter']) ? $_GET['angkatanFilter'] : '';
    $selectedIPK = isset($_GET['ipkFilter']) ? $_GET['ipkFilter'] : '';
}

// Jika filter "Semua Prodi", "Semua Angkatan", dan "Semua IPK" dipilih, set filter ke kosong
if ($selectedProdi === '' && $selectedAngkatan === '' && $selectedIPK === '') {
    $selectedProdi = '';
    $selectedAngkatan = '';
    $selectedIPK = '';
}

// Query untuk menampilkan data mahasiswa secara urut dari NPM terkecil hingga terbesar.
$data_mahasiswa = select("SELECT * FROM mahasiswa ORDER BY NPM ASC");

// Jika filter "Semua Prodi", "Semua Angkatan", dan "Semua IPK" dipilih, tampilkan data langsung di halaman ini
if ($selectedProdi === '' && $selectedAngkatan === '' && $selectedIPK === '') {
    $filteredData = $data_mahasiswa;
} else {
    // Jika tidak, arahkan ke filtered-mahasiswa.php dengan filter yang dipilih
    if ($selectedProdi !== '' || $selectedAngkatan !== '' || $selectedIPK !== '') {
        $filterUrl = http_build_query([
            'prodiFilter' => $selectedProdi,
            'angkatanFilter' => $selectedAngkatan,
            'ipkFilter' => $selectedIPK,
        ]);

        header("Location: filtered-mahasiswa.php?$filterUrl");
        exit();
    }
}

// Setelah mendapatkan nilai filter
if ($selectedIPK === 'belowAverage') {
    // Query untuk menampilkan data mahasiswa dengan IPK di bawah rata-rata
    $data_mahasiswa = select("SELECT * FROM mahasiswa WHERE IPK < (SELECT AVG(IPK) FROM mahasiswa) ORDER BY NPM ASC");
} elseif ($selectedIPK === 'aboveAverage') {
    // Query untuk menampilkan data mahasiswa dengan IPK di atas rata-rata
    $data_mahasiswa = select("SELECT * FROM mahasiswa WHERE IPK >= (SELECT AVG(IPK) FROM mahasiswa) ORDER BY NPM ASC");
}
ob_end_flush();
?>

    <div class="container mt-5">
        <a href="index.php" class="fixed-button shadow"><i class="fa fa-arrow-left-long" style="color: #E1E1E1"></i></a>
        <h1><i class="fas fa-database" style="color: #ff6600;"></i> Database Mahasiswa<br>FASILKOM UPN Veteran Jawa Timur</h1>
        <p>Data mahasiswa yang masih aktif:</p>
        <hr>

        <!-- Formulir Filter -->
        <form method="GET" action="mahasiswa.php" class="mb-3">
            <div class="row">
                <div class="col-md-9">
                    <label for="prodiFilter" class="form-label">Filter berdasarkan:</label>
                    <div class="row">
                        <div class="col-md-4">
                            <select name="prodiFilter" id="prodiFilter" class="form-select" style="border-color: #DF6711; background-color: #D9D9D9; color: #000000;">
                                <option value="">Semua Prodi</option>
                                <?php
                                $prodiOptions = select("SELECT DISTINCT Prodi FROM mahasiswa");
                                foreach ($prodiOptions as $option) {
                                    $selected = ($option['Prodi'] === $selectedProdi) ? 'selected' : '';
                                    echo '<option value="' . $option['Prodi'] . '" ' . $selected . '>' . $option['Prodi'] . '</option>';
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <select name="angkatanFilter" id="angkatanFilter" class="form-select" style="border-color: #DF6711; background-color: #D9D9D9; color: #000000;">
                                <option value="">Semua Angkatan</option>
                                <?php
                                $angkatanOptions = select("SELECT DISTINCT LEFT(NPM, 2) AS Angkatan FROM mahasiswa");
                                foreach ($angkatanOptions as $option) {
                                    // Ubah tulisan di dropdown angkatan menjadi tahun (2 angka pertama NPM)
                                    $tahun = '20' . $option['Angkatan'];
                                    $selected = ($option['Angkatan'] === $selectedAngkatan) ? 'selected' : '';
                                    echo '<option value="' . $option['Angkatan'] . '" ' . $selected . '>' . $tahun . '</option>';
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <select name="ipkFilter" id="ipkFilter" class="form-select" style="border-color: #DF6711; background-color: #D9D9D9; color: #000000;">
                                <option value="">Semua IPK</option>
                                <option value="belowAverage" <?php echo ($selectedIPK === 'belowAverage') ? 'selected' : ''; ?>>IPK Di Bawah Rata-rata</option>
                                <option value="aboveAverage" <?php echo ($selectedIPK === 'aboveAverage') ? 'selected' : ''; ?>>IPK Di Atas Rata-rata</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-md-3" style="display: flex; align-items: flex-end;">
                    <button type="submit" class="btn" style="background-color:#DF6711; color: #ffffff; width: 100%;"><i class="fas fa-filter"></i> Terapkan Filter</button>
                </div>
            </div>
        </form>

        <table class="table table-bordered table-striped" id="table">
            <thead>
                <tr>
                    <th class="text-center">No</th>
                    <th>NPM</th>
                    <th>Nama</th>
                    <th>Program Studi</th>
                    <th>Jenis Kelamin</th>
                    <th class="text-center">Semester</th>
                    <th class="text-center">IPK</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>

            <tbody>
              <?php $no = 1; ?>
              <?php foreach ($data_mahasiswa as $mahasiswa) : ?>
                <tr>
                    <td width="1%"class="text-center"><?= $no++; ?></td>
                    <td width="10%"><?= $mahasiswa['NPM']; ?></td>
                    <td><?= $mahasiswa['Nama']; ?></td>
                    <td><?= $mahasiswa['Prodi']; ?></td>
                    <td width="13%"><?= $mahasiswa['JK']; ?></td>
                    <td width="1%" class="text-center"><?= $mahasiswa['Semester']; ?></td>
                    <td width="1%" class="text-center"><?= $mahasiswa['IPK']; ?></td>
                    <td width="15%" class="text-center">
                        <a href="form-mahasiswa/detail-mahasiswa.php?id_mahasiswa=<?= $mahasiswa['id_mahasiswa']; ?>" class="btn btn-info" data-bs-toggle="tooltip" title="Detail Data"><i class="fas fa-info-circle" style="color: #ffffff;"></i></a>
                        <a href="form-mahasiswa/form-ubah-mahasiswa.php?id_mahasiswa=<?= $mahasiswa['id_mahasiswa']; ?>" class="btn btn-secondary" data-bs-toggle="tooltip" title="Sunting Data"><i class="fas fa-edit" style="color: #ffffff;"></i></a>
                        <a href="form-mahasiswa/form-hapus-mahasiswa.php?id_mahasiswa=<?= $mahasiswa['id_mahasiswa']; ?>" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin akan menghapus data ini?');" data-bs-toggle="tooltip" title="Hapus Data"><i class="fas fa-trash-alt" style="color: #ffffff;"></i></a> 
                    </td>
                </tr>
              <?php endforeach; ?>
            </tbody>
        </table>

        <a href="form-mahasiswa/form-tambah-mahasiswa.php" class="btn mb-1" style="background-color:#DF6711; color: #ffffff;"><i class="fas fa-plus-circle" style="color: #ffffff;"></i> Tambah Data Mahasiswa</a>
    </div>
    
    
<?php
include 'layout/footer.php';
?>