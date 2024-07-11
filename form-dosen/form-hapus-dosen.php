<?php
include '../config/app.php';

//menerima id dosen yang dipilih pengguna
$id_dosen = (int)$_GET['id_dosen'];

if (delete_dosen($id_dosen) > 0) {
    echo "<script>
            alert('Data Dosen berhasil dihapus');
            document.location.href = '../dosen.php';
          </script>";
} else {
    echo "<script>
            alert('Data Dosen gagal dihapus');
            document.location.href = '../dosen.php';
          </script>";
}

?>