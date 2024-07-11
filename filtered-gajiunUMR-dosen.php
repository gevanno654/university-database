<?php
ob_start();
$title = 'Gaji Dosen dibawah UMR';
include 'layout/header.php';

//deklarasi value umr
$umr = 4500000;

$query = "SELECT NIP, Nama, Gaji FROM dosen WHERE NIP IN (SELECT NIP FROM dosen WHERE Gaji <$umr)";
$filteredData = select($query);

// Periksa apakah filter sudah diterapkan
$filter = isset($_GET['filter']) ? $_GET['filter'] : 'below_umr';

// Tentukan URL tujuan berdasarkan filter
if ($filter != 'no_filter') {
    $filtered_url = 'filtered-gaji';
    if ($filter == 'below_umr') {
        $filtered_url .= 'unUMR';
    } elseif ($filter == 'above_umr') {
        $filtered_url .= 'upUMR';
    } elseif ($filter == 'below_avg') {
        $filtered_url .= 'unAVG';
    } elseif ($filter == 'above_avg') {
        $filtered_url .= 'upAVG';
    }
    $filtered_url .= '-dosen.php';
} else {
    $filtered_url = 'dosen.php'; // Jika tidak ada filter, tetap di halaman dosen.php
}

// Jika formulir dikirimkan (tombol Terapkan Filter ditekan), maka arahkan ke URL tujuan
if (isset($_GET['filter_submit'])) {
    header("Location: $filtered_url");
    exit();
}
ob_end_flush();
?>

<div class="container mt-5">
    <a href="dosen.php" class="fixed-button shadow"><i class="fa fa-arrow-left-long" style="color: #E1E1E1"></i></a>
    <h1><i class="fas fa-database" style="color: #ff6600;"></i> Database Dosen<br>dengan Gaji dibawah UMR</h1>

    <?php if(empty($filteredData)) : ?>
        <p>Data tidak tersedia</p>
    <?php else : ?>
        <p>UMR Surabaya = Rp 4.500.000</p>
        <p>Data Dosen dengan Gaji dibawah UMR: </p>
        <hr>

        <!-- Tambahkan dropdown filter -->
        <form action="" method="get" class="mb-3">
            <div class="row">
                <div class="col-md-10">
                    <label for="filter">Filter berdasarkan Gaji:</label>
                    <div class="input-group">
                        <select name="filter" id="filter" class="form-control" style="border-color: #DF6711; background-color: #474542; color: #E1E1E1;">
                            <option value="no_filter" <?= ($filter == 'no_filter') ? 'selected' : ''; ?>>Tidak Memilih Filter</option>
                            <option value="below_umr" <?= ($filter == 'below_umr') ? 'selected' : ''; ?>>Di Bawah UMR</option>
                            <option value="above_umr" <?= ($filter == 'above_umr') ? 'selected' : ''; ?>>Di Atas UMR</option>
                            <option value="above_avg" <?= ($filter == 'above_avg') ? 'selected' : ''; ?>>Di Atas Rata-rata</option>
                            <option value="below_avg" <?= ($filter == 'below_avg') ? 'selected' : ''; ?>>Di Bawah Rata-rata</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-2" style="display: flex; align-items: flex-end;">
                    <button type="submit" class="btn" style="background-color:#DF6711; color: #ffffff; width: 100%;"><i class="fas fa-filter"></i> Terapkan Filter</button>
                </div>
            </div>
        </form>


        <table class="table table-bordered table-striped" id="table">
                <thead>
                    <tr>
                        <th class="text-center">No</th>
                        <th class="text-center">NIP</th>
                        <th class="text-center">Nama</th>
                        <th class="text-center">Gaji</th>
                    </tr>
                </thead>

                <tbody>
                <?php $no = 1; ?>
                <?php foreach ($filteredData as $dosen) : ?>
                    <tr>
                        <td width="1%" class="text-center"><?= $no++; ?></td>
                        <td width="10%" class="text-center"><?= $dosen['NIP']; ?></td>
                        <td class="text-center"><?= $dosen['Nama']; ?></td>
                        <td class="text-center">Rp<?= number_format($dosen['Gaji'],0,',','.');?></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>
</div>

<?php
include 'layout/footer.php';
?>