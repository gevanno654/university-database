<?php
include '../config/app.php';

//menerima id mata kuliah yang dipilih pengguna
$id_matakuliah = (int)$_GET['id_matakuliah'];

if (delete_matakuliah($id_matakuliah) > 0) {
    echo "<script>
            alert('Data Mata Kuliah berhasil dihapus');
            document.location.href = '../matakuliah.php';
          </script>";
} else {
    echo "<script>
            alert('Data Mata Kuliah gagal dihapus');
            document.location.href = '../matakuliah.php';
          </script>";
}

?>