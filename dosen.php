<?php
ob_start();
$title = 'Data Dosen Fasilkom UPNVJT';

include 'layout/header.php';

// Query untuk menampilkan data mahasiswa secara urut dari NPM terkecil hingga terbesar.
$data_dosen = select("SELECT * FROM dosen ORDER BY NIP ASC");

// Periksa apakah filter sudah diterapkan
$filter = isset($_GET['filter']) ? $_GET['filter'] : 'no_filter';

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

// Query untuk mendapatkan nilai AVG
$averageQuery = "SELECT AVG(Gaji) AS mean FROM dosen";
$averageResult = select($averageQuery);

// Ambil nilai AVG dari hasil query
$mean = isset($averageResult[0]['mean']) ? $averageResult[0]['mean'] : 0;
ob_end_flush();
?>

    <div class="container mt-5">
        <a href="index.php" class="fixed-button shadow"><i class="fa fa-arrow-left-long" style="color: #E1E1E1"></i></a>
        <h1><i class="fas fa-database" style="color: #ff6600;"></i> Database Dosen<br>FASILKOM UPN Veteran Jawa Timur<br></h1>
        <p>Rata-rata gaji= Rp<?= number_format($mean, 0, ',', '.'); ?> dan UMR Surabaya = Rp 4.500.000</p>
        <p>Data dosen yang masih aktif:</p>
        <hr>

        <!-- Tambahkan dropdown filter -->
        <form action="" method="get" class="mb-3">
            <div class="row">
                <div class="col-md-10">
                    <label for="filter">Filter berdasarkan Gaji:</label>
                    <div class="input-group">
                        <select name="filter" id="filter" class="form-control" style="border-color: #DF6711; background-color: #D9D9D9; color: #000000;">
                            <option value="no_filter" <?= ($filter == 'no_filter') ? 'selected' : ''; ?>>Tidak Memilih Filter</option>
                            <option value="below_umr" <?= ($filter == 'below_umr') ? 'selected' : ''; ?>>Di Bawah UMR</option>
                            <option value="above_umr" <?= ($filter == 'above_umr') ? 'selected' : ''; ?>>Di Atas UMR</option>
                            <option value="above_avg" <?= ($filter == 'above_avg') ? 'selected' : ''; ?>>Di Atas Rata-rata</option>
                            <option value="below_avg" <?= ($filter == 'below_avg') ? 'selected' : ''; ?>>Di Bawah Rata-rata</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-1" style="display: flex; align-items: flex-end;">
                    <button type="submit" name="filter_submit" class="btn mt-2" style="background-color:#DF6711; color: #ffffff;"><i class="fas fa-filter"></i> Terapkan Filter</button>
                </div>
            </div>
        </form>

        <table class="table table-bordered table-striped" id="table">
            <thead>
                <tr>
                    <th class="text-center">No</th>
                    <th>NIP</th>
                    <th>Nama</th>
                    <th class="text-center">Jenis Kelamin</th>
                    <th class="text-center">Jabatan</th>
                    <th>Gaji</th>
                    <th class="text-center">Tanggal<br>Mulai Bekerja</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>

            <tbody>
              <?php $no = 1; ?>
              <?php foreach ($data_dosen as $dosen) : ?>
                <tr>
                    <td width="1%"class="text-center"><?= $no++; ?></td>
                    <td width="10%"><?= $dosen['NIP']; ?></td>
                    <td><?= $dosen['Nama']; ?></td>
                    <td width="13%" class="text-center"><?= $dosen['JK']; ?></td>
                    <td width="15%" class="text-center"><?= $dosen['Jabatan']; ?></td>
                    <td width="10%">Rp<?= number_format($dosen['Gaji'],0,',','.');?></td>
                    <td width="15%" class="text-center"><?= date('d-F-Y', strtotime($dosen['TglStartBekerja'])); ?></td>
                    <td width="15%" class="text-center">
                        <a href="form-dosen/detail-dosen.php?id_dosen=<?= $dosen['id_dosen']; ?>" class="btn btn-info" data-bs-toggle="tooltip" title="Detail Data"><i class="fas fa-info-circle" style="color: #ffffff;"></i></a>
                        <a href="form-dosen/form-ubah-dosen.php?id_dosen=<?= $dosen['id_dosen']; ?>" class="btn btn-secondary" data-bs-toggle="tooltip" title="Sunting Data"><i class="fas fa-edit" style="color: #ffffff;"></i></a>
                        <a href="form-dosen/form-hapus-dosen.php?id_dosen=<?= $dosen['id_dosen']; ?>" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin akan menghapus data ini?');" data-bs-toggle="tooltip" title="Hapus Data"><i class="fas fa-trash-alt" style="color: #ffffff;"></i></a> 
                    </td>
                </tr>
              <?php endforeach; ?>
            </tbody>
        </table>

        <a href="form-dosen/form-tambah-dosen.php" class="btn mb-1" style="background-color:#DF6711; color: #ffffff;"><i class="fas fa-plus-circle" style="color: #ffffff;"></i> Tambah Data Dosen</a>
    </div>
    
    
<?php
include 'layout/footer.php';
?>