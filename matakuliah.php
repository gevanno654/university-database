<?php
$title = 'Database Mata Kuliah Fasilkom UPNVJT';
include 'layout/header.php';

// Query untuk menampilkan data mata kuliah secara urut dari NPM terkecil hingga terbesar.
$data_matakuliah = select("SELECT matakuliah.*, dosen.Nama,
                                  (SELECT COUNT(NPM) FROM daftarmahasiswa WHERE daftarmahasiswa.KodeMatkul = matakuliah.KodeMatkul) AS JumlahMahasiswa
                           FROM matakuliah
                           JOIN dosen ON matakuliah.NIP = dosen.NIP 
                           ORDER BY matakuliah.KodeMatkul ASC");

?>

    <div class="container mt-5">
        <a href="index.php" class="fixed-button shadow"><i class="fa fa-arrow-left-long" style="color: #E1E1E1"></i></a>
        <h1><i class="fas fa-database" style="color: #ff6600;"></i> Database Mata Kuliah<br>FASILKOM UPN Veteran Jawa Timur</h1>
        <p>Daftar mata kuliah yang masih aktif:</p>
        <hr>

        <table class="table table-bordered table-striped" id="table">
            <thead>
                <tr>
                    <th class="text-center">No</th>
                    <th>Kode Mata Kuliah</th>
                    <th>Nama Mata Kuliah</th>
                    <th>Kode Kelas</th>
                    <th>Dosen Pengampu</th>
                    <th>Hari Mata Kuliah</th>
                    <th>Jam Mata Kuliah</th>
                    <th>Ruang Mata Kuliah</th>
                    <th class="text-center">SKS</th>
                    <th class="text-center">Jumlah Mahasiswa</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>

            <tbody>
              <?php $no = 1; ?>
              <?php foreach ($data_matakuliah as $matakuliah) : ?>
                <tr>
                    <td width="1%"class="text-center"><?= $no++; ?></td>
                    <td width="8%"><?= $matakuliah['KodeMatkul']; ?></td>
                    <td><?= $matakuliah['NamaMatkul']; ?></td>
                    <td width="1%"><?= $matakuliah['KodeKelas']; ?></td>
                    <td><?= $matakuliah['Nama']; ?></td>
                    <td width="5%"><?= $matakuliah['HariMatkul']; ?></td>
                    <td width="11%"><?= $matakuliah['JamMatkul']; ?></td>
                    <td width="12%"><?= $matakuliah['RuangMatkul']; ?></td>
                    <td class="text-center"><?= $matakuliah['SKS']; ?></td>
                    <td width="0.1%" class="text-center"><?= $matakuliah['JumlahMahasiswa']; ?></td>
                    <td width="12%" class="text-center">
                        <a href="form-matakuliah/detail-matakuliah.php?id_matakuliah=<?= $matakuliah['id_matakuliah']; ?>" class="btn btn-info btn-sm" data-bs-toggle="tooltip" title="Daftar Mahasiswa"><i class="fas fa-info-circle" style="color: #ffffff;"></i></a>
                        <a href="form-matakuliah/form-ubah-matakuliah.php?id_matakuliah=<?= $matakuliah['id_matakuliah']; ?>" class="btn btn-secondary btn-sm" data-bs-toggle="tooltip" title="Sunting Data"><i class="fas fa-edit" style="color: #ffffff;"></i></a>
                        <a href="form-matakuliah/form-hapus-matakuliah.php?id_matakuliah=<?= $matakuliah['id_matakuliah']; ?>" class="btn btn-danger btn-sm" data-bs-toggle="tooltip" title="Hapus Data"><i class="fas fa-trash-alt" style="color: #ffffff;"></i></a> 
                    </td>
                </tr>
              <?php endforeach; ?>
            </tbody>
        </table>

        <a href="form-matakuliah/form-tambah-matakuliah.php" class="btn mb-1" style="background-color:#DF6711; color: #ffffff;"><i class="fas fa-plus-circle" style="color: #ffffff;"></i> Tambahkan Kelas Mata Kuliah</a>
    </div>
    
    
<?php
include 'layout/footer.php';
?>