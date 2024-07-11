<?php
$title = 'Data Mata Kuliah';

include '../layout/header-form.php';

// Mengambil data dari id_mahasiswa dengan URL
$id_matakuliah = (int)$_GET['id_matakuliah'];

// Mengecek apakah filter diatur
$filter = isset($_GET['filter']) ? $_GET['filter'] : 'all';

// Kueri untuk mendapatkan rata-rata nilai
$average_query = "SELECT AVG(Nilai) as average FROM daftarmahasiswa";
$average_result = select($average_query);
$average_value = $average_result[0]['average'];

// Subquery untuk mendapatkan data mahasiswa berdasarkan filter
$subquery = "(SELECT 1 
              FROM daftarmahasiswa
              WHERE daftarmahasiswa.NPM = mahasiswa.NPM
                    AND (
                        ('$filter' = 'below_average' AND daftarmahasiswa.Nilai < $average_value)
                        OR ('$filter' = 'above_average' AND daftarmahasiswa.Nilai >= $average_value)
                        OR ('$filter' = 'above_75' AND daftarmahasiswa.Nilai > 75)
                        OR ('$filter' = 'below_75' AND daftarmahasiswa.Nilai < 75)
                        OR ('$filter' = 'all')
                    )
              LIMIT 1)";

// Kueri utama untuk menampilkan data mahasiswa berdasarkan subquery
$data_daftarmahasiswa = select("SELECT mahasiswa.Nama, mahasiswa.NPM, daftarmahasiswa.Nilai, daftarmahasiswa.id_daftarmahasiswa 
                                FROM mahasiswa
                                INNER JOIN daftarmahasiswa ON daftarmahasiswa.NPM = mahasiswa.NPM 
                                WHERE EXISTS $subquery
                                ORDER BY mahasiswa.NPM ASC");

$matakuliah = select("SELECT matakuliah.*, 
                              (SELECT COUNT(NPM) FROM daftarmahasiswa WHERE daftarmahasiswa.KodeMatkul = matakuliah.KodeMatkul) AS JumlahMahasiswa
                       FROM matakuliah 
                       WHERE id_matakuliah = $id_matakuliah")[0];

?>
    <div class="container mt-5">
        <a href="javascript:history.go(-1)" class="fixed-button shadow"><i class="fa fa-arrow-left-long" style="color: #E1E1E1"></i></a>
        <h1>Daftar Mahasiswa kelas A081</h1>
        <hr>

        <table class="table table-bordered" id="tabledetail">
            <tr>
                <th>KodeMatkul</th>
                <td> <?= $matakuliah['KodeMatkul']; ?></td>
            </tr>
            <tr>
                <th>Nama Mata Kuliah</th>
                <td> <?= $matakuliah['NamaMatkul']; ?></td>
            </tr>
            <tr>
                <th>Kode Kelas</th>
                <td> <?= $matakuliah['KodeKelas']; ?></td>
            </tr>
            <tr>
                <th>NIP</th>
                <td> <?= $matakuliah['NIP']; ?></td>
            </tr>
            <tr>
                <th>Hari Mata Kuliah</th>
                <td> <?= $matakuliah['HariMatkul']; ?></td>
            </tr>
            <tr>
                <th>Jam Mata Kuliah</th>
                <td> <?= $matakuliah['JamMatkul']; ?></td>
            </tr>
            <tr>
                <th>Ruang Mata Kuliah</th>
                <td> <?= $matakuliah['RuangMatkul']; ?></td>
            </tr>
            <tr>
                <th>SKS</th>
                <td> <?= $matakuliah['SKS']; ?></td>
            </tr>
            <tr>
                <th>JumlahMahasiswa</th>
                <td> <?= $matakuliah['JumlahMahasiswa']; ?></td>
            </tr>
        </table>

        <hr>
        <hr>
        <!-- Tambahkan bagian untuk link filter -->
        <div class="mb-3" style="float: right;">
            <form action="detail-matakuliah.php" method="get" class="form-inline">
                <input type="hidden" name="id_matakuliah" value="<?= $id_matakuliah; ?>">
                <div class="form-group mr-2">
                    <label for="filterSelect" class="sr-only">Filter</label>
                    <select class="form-control" id="filterSelect" name="filter" style="border-color: #DF6711; background-color: #D9D9D9; color: #000000;">
                        <option value="all" <?= $filter === 'all' ? 'selected' : ''; ?>>Pilih Filter Nilai</option>
                        <option value="below_average" <?= $filter === 'below_average' ? 'selected' : ''; ?>>Nilai di bawah Rata-rata</option>
                        <option value="above_average" <?= $filter === 'above_average' ? 'selected' : ''; ?>>Nilai di atas Rata-rata</option>
                        <option value="below_75" <?= $filter === 'below_75' ? 'selected' : ''; ?>>Nilai di bawah 75</option>
                        <option value="above_75" <?= $filter === 'above_75' ? 'selected' : ''; ?>>Nilai di atas 75</option>
                    </select>
                </div>
                <button type="submit" class="btn" style="background-color:#DF6711; color: #ffffff;"><i class="fas fa-filter"></i> Terapkan Filter</button>
            </form>
        </div>
        <p>Daftar mahasiswa yang mendaftar di kelas ini:</p>
        <table class="table table-bordered table-striped" id="tabledetail">
            <thead>
                <tr>
                    <th class="text-center">No</th>
                    <th>NPM</th>
                    <th>Nama Mahasiswa</th>
                    <th class="text-center">Nilai</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>

            <tbody>
              <?php $no = 1; ?>
              <?php foreach ($data_daftarmahasiswa as $daftarmahasiswa) : ?>
                <tr>
                    <td width="1%"class="text-center"><?= $no++; ?></td>
                    <td width="1%"><?= $daftarmahasiswa['NPM']; ?></td>
                    <td width="10%"><?= $daftarmahasiswa['Nama']; ?></td>
                    <td width="1%" class="text-center"><?= $daftarmahasiswa['Nilai']; ?></td>
                    <td width="1%" class="text-center">
                        <a href="form-ubah-daftarmahasiswa.php?id_daftarmahasiswa=<?= $daftarmahasiswa['id_daftarmahasiswa']; ?>" class="btn btn-secondary"><i class="fas fa-edit" style="color: #ffffff;"></i></a>
                        <a href="form-hapus-daftarmahasiswa.php?id_daftarmahasiswa=<?= $daftarmahasiswa['id_daftarmahasiswa']; ?>" class="btn btn-danger"><i class="fas fa-trash-alt" style="color: #ffffff;"></i></a> 
                    </td>
                </tr>
              <?php endforeach; ?>
            </tbody>
        </table>

        <a href="form-tambah-daftarmahasiswa.php" class="btn mb-1" style="background-color:#DF6711; color: #ffffff;"><i class="fas fa-plus-circle" style="color: #ffffff;"></i> Tambahkan Mahasiswa</a>
    </div>
    
    
<?php
include '../layout/footer-form.php';
?>