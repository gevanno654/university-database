<?php
ob_start();
$title = 'Mahasiswa Terfilter';
include 'layout/header.php';

// Dapatkan Prodi, Angkatan, dan IPK yang dipilih dari URL
$selectedProdi = $_GET['prodiFilter'] ?? '';
$selectedAngkatan = $_GET['angkatanFilter'] ?? '';
$selectedIPK = $_GET['ipkFilter'] ?? '';

// Kondisi filter untuk Prodi
$filterProdi = ($selectedProdi !== '') ? "Prodi = '$selectedProdi'" : '1';

// Kondisi filter untuk Angkatan
$filterAngkatan = ($selectedAngkatan !== '') ? "LEFT(NPM, 2) = '$selectedAngkatan'" : '1';

// Kondisi filter untuk IPK
$filterIPK = '';
if ($selectedIPK === 'belowAverage') {
    $filterIPK = 'IPK < (SELECT AVG(IPK) FROM mahasiswa)';
} elseif ($selectedIPK === 'aboveAverage') {
    $filterIPK = 'IPK >= (SELECT AVG(IPK) FROM mahasiswa)';
}

// Gabungkan semua kondisi filter
$filterConditions = implode(' AND ', array_filter([$filterProdi, $filterAngkatan, $filterIPK]));

// Kueri untuk mendapatkan data yang difilter
$filteredData = select("SELECT * FROM mahasiswa " . ($filterConditions ? "WHERE $filterConditions" : "") . " ORDER BY NPM ASC");
ob_end_flush();
?>

<div class="container mt-5">
    <a href="mahasiswa.php" class="fixed-button shadow"><i class="fa fa-arrow-left-long" style="color: #E1E1E1"></i></a>
    <h1>
        <i class="fas fa-database" style="color: #ff6600;"></i> Database Mahasiswa<br>
        <?php
        echo ($selectedProdi !== '') ? $selectedProdi : 'Semua Prodi';
        echo ($selectedProdi !== '' && $selectedAngkatan !== '') ? ' ' : '';
        echo ($selectedAngkatan !== '') ? 'Angkatan Tahun 20' . $selectedAngkatan : '';
        ?>
    </h1>

    <?php if (empty($filteredData)) : ?>
        <p>Data tidak tersedia</p>
    <?php else : ?>
        <p>Data mahasiswa sesuai filter: </p>
        <hr>

        <!-- Formulir Filter -->
        <form method="GET" action="mahasiswa.php" class="mb-3">
            <div class="row">
                <div class="col-md-9">
                    <label for="prodiFilter" class="form-label">Filter berdasarkan:</label>
                    <div class="row">
                        <div class="col-md-4">
                            <select name="prodiFilter" id="prodiFilter" class="form-select" style="border-color: #DF6711; background-color: #474542; color: #E1E1E1;">
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
                            <select name="angkatanFilter" id="angkatanFilter" class="form-select" style="border-color: #DF6711; background-color: #474542; color: #E1E1E1;">
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
                            <select name="ipkFilter" id="ipkFilter" class="form-select" style="border-color: #DF6711; background-color: #474542; color: #E1E1E1;">
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
                    <th class="text-center">IPK</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>

            <tbody>
                <?php $no = 1; ?>
                <?php foreach ($filteredData as $mahasiswa) : ?>
                    <tr>
                        <td width="1%" class="text-center"><?= $no++; ?></td>
                        <td width="10%"><?= $mahasiswa['NPM']; ?></td>
                        <td><?= $mahasiswa['Nama']; ?></td>
                        <td width="1%" class="text-center"><?= $mahasiswa['IPK']; ?></td>
                        <td width="5%" class="text-center">
                            <a href="form-mahasiswa/detail-mahasiswa.php?id_mahasiswa=<?= $mahasiswa['id_mahasiswa']; ?>" class="btn btn-info"><i class="fas fa-info-circle" style="color: #ffffff;"></i></a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>

    <a href="form-mahasiswa/form-tambah-mahasiswa.php" class="btn mb-1" style="background-color:#DF6711; color: #ffffff;"><i class="fas fa-plus-circle" style="color: #ffffff;"></i> Tambah Data Mahasiswa</a>
</div>

<?php
include 'layout/footer.php';
?>
