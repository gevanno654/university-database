<?php
include '../config/app.php';

//menerima id mata kuliah yang dipilih pengguna
$id_daftarmahasiswa = (int)$_GET['id_daftarmahasiswa'];

if (delete_daftarmahasiswa($id_daftarmahasiswa) > 0) {
    echo "<script>
            alert('Mahasiswa berhasil dihapus dari Matakuliah tersebut');
            document.location.href = '../matakuliah.php';
          </script>";
} else {
    echo "<script>
            alert('Mahasiswa gagal dihapus dari Matakuliah tersebut');
            document.location.href = '../matakuliah.php';
          </script>";
}

?>