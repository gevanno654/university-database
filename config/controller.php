<?php 

//fungsi menampilkan data
  function select($query){
    //panggil koneksi database
    global $db;
  
    $result = mysqli_query($db, $query);
    $rows = [];
  
    while($row = mysqli_fetch_assoc($result)){
      $rows[] = $row;
    }
  
    return $rows;
  }

  //fungsi menambahkan data mahasiswa
  function create_mahasiswa($post){
    global $db;

    $NPM      = $post['NPM'];
    $Nama     = $post['Nama'];
    $Alamat   = $post['Alamat'];
    $Prodi    = $post['Prodi'];
    $JK       = $post['JK'];
    $NoHP     = $post['NoHP'];
    $Email    = $post['Email'];
    $Semester = $post['Semester'];
    $IPK      = $post['IPK'];

    //query tambah data
    $query = "INSERT INTO mahasiswa VALUES(null, '$NPM', '$Nama', '$Alamat', '$Prodi', '$JK', '$NoHP', '$Email', '$Semester', '$IPK')";

    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
  }

  //fungsi mengubah data mahasiswa
  function update_mahasiswa($post){
    global $db;

    $id_mahasiswa = $post['id_mahasiswa'];
    $NPM      = $post['NPM'];
    $Nama     = $post['Nama'];
    $Alamat   = $post['Alamat'];
    $Prodi    = $post['Prodi'];
    $JK       = $post['JK'];
    $NoHP     = $post['NoHP'];
    $Email    = $post['Email'];
    $Semester = $post['Semester'];
    $IPK      = $post['IPK'];

    //query ubah data
    $query = "UPDATE mahasiswa
              SET NPM     = '$NPM',
                Nama      = '$Nama',
                Alamat    = '$Alamat',
                Prodi     = '$Prodi',
                JK        = '$JK',
                NoHP      = '$NoHP',
                Email     = '$Email',
                Semester  = '$Semester',
                IPK       = '$IPK'
              WHERE id_mahasiswa = $id_mahasiswa";

    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
  }

  //fungsi menghapus data mahasiswa
  function delete_mahasiswa($id_mahasiswa){
    global $db;

    //query hapus data dosen
    $query = "DELETE FROM mahasiswa WHERE id_mahasiswa = $id_mahasiswa";

    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
  }
   

  //fungsi menambahkan data dosen
  function create_dosen($post){
    global $db;

    $NIP              = $post['NIP'];
    $Nama             = $post['Nama'];
    $Alamat           = $post['Alamat'];
    $JK               = $post['JK'];
    $NoHP             = $post['NoHP'];
    $Email            = $post['Email'];
    $TglStartBekerja  = $post['TglStartBekerja'];
    $Jabatan          = $post['Jabatan'];
    $Gaji             = $post['Gaji'];

    //query tambah data
    $query = "INSERT INTO dosen VALUES(null, '$NIP', '$Nama', '$Alamat', '$JK', '$NoHP', '$Email', '$TglStartBekerja', '$Jabatan', '$Gaji' )";

    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
  }
  
  //fungsi mengubah data dosen
  function update_dosen($post){
    global $db;

    $id_dosen         = $post['id_dosen'];
    $NIP              = $post['NIP'];
    $Nama             = $post['Nama'];
    $Alamat           = $post['Alamat'];
    $JK               = $post['JK'];
    $NoHP             = $post['NoHP'];
    $Email            = $post['Email'];
    $Jabatan          = $post['Jabatan'];
    $Gaji             = $post['Gaji'];
    $TglStartBekerja  = $post['TglStartBekerja'];

    //query ubah data
    $query = "UPDATE dosen
              SET NIP           = '$NIP',
                Nama            = '$Nama',
                Alamat          = '$Alamat',
                JK              = '$JK',
                NoHP            = '$NoHP',
                Email           = '$Email',
                TglStartBekerja = '$TglStartBekerja',
                Jabatan         = '$Jabatan',
                Gaji            = '$Gaji'
              WHERE id_dosen = $id_dosen";

    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
  }

  //fungsi menghapus data dosen
  function delete_dosen($id_dosen){
    global $db;

    //query hapus data dosen
    $query = "DELETE FROM dosen WHERE id_dosen = $id_dosen";

    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
  }

  //fungsi menambahkan data mata kuliah
  function create_matakuliah($post){
    global $db;

    $KodeMatkul       = $post['KodeMatkul'];
    $NamaMatkul       = $post['NamaMatkul'];
    $KodeKelas        = $post['KodeKelas'];
    $NIP              = $post['NIP'];
    $HariMatkul       = $post['HariMatkul'];
    $JamMatkul        = $post['JamMatkul'];
    $RuangMatkul      = $post['RuangMatkul'];
    $SKS              = $post['SKS'];
    $JumlahMahasiswa  = $post['JumlahMahasiswa'];

    //query tambah data
    $query = "INSERT INTO matakuliah VALUES(null, '$KodeMatkul', '$NamaMatkul', '$KodeKelas', '$NIP', '$HariMatkul', '$JamMatkul', '$RuangMatkul', '$SKS', '$JumlahMahasiswa' )";

    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
  }

  //fungsi mengubah data mata kuliah
  function update_matakuliah($post){
    global $db;

    $id_matakuliah    = $post['id_matakuliah'];
    $KodeMatkul       = $post['KodeMatkul'];
    $NamaMatkul       = $post['NamaMatkul'];
    $KodeKelas        = $post['KodeKelas'];
    $NIP              = $post['NIP'];
    $HariMatkul       = $post['HariMatkul'];
    $JamMatkul        = $post['JamMatkul'];
    $RuangMatkul      = $post['RuangMatkul'];
    $SKS              = $post['SKS'];
    $JumlahMahasiswa  = $post['JumlahMahasiswa'];

    //query ubah data
    $query = "UPDATE matakuliah
              SET KodeMatkul    = '$KodeMatkul',
                NamaMatkul      = '$NamaMatkul',
                KodeKelas       = '$KodeKelas',
                NIP             = '$NIP',
                HariMatkul      = '$HariMatkul',
                JamMatkul       = '$JamMatkul',
                RuangMatkul     = '$RuangMatkul',
                SKS             = '$SKS',
                JumlahMahasiswa = '$JumlahMahasiswa'
              WHERE id_matakuliah = $id_matakuliah";

    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
  }

  //fungsi menghapus data mata kuliah
  function delete_matakuliah($id_matakuliah){
    global $db;

    //query hapus data mata kuliah
    $query = "DELETE FROM matakuliah WHERE id_matakuliah = $id_matakuliah";

    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
  }

  //fungsi menambahkan mahasiswa di matakuliah
  function create_daftarmahasiswa($post){
    global $db;

    $KodeMatkul   = $post['KodeMatkul'];
    $NPM          = $post['NPM'];
    $Nilai        = $post['Nilai'];
    
    //query tambah data
    $query = "INSERT INTO daftarmahasiswa VALUES(null, '$KodeMatkul', '$NPM', '$Nilai')";

    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
  }

  //fungsi mengubah detail mahasiswa di matakuliah
  function update_daftarmahasiswa($post){
    global $db;

    $id_daftarmahasiswa    = $post['id_daftarmahasiswa'];
    $Nilai                 = $post['Nilai'];

    //query ubah data
    $query = "UPDATE daftarmahasiswa
              SET Nilai    = '$Nilai'
              WHERE id_daftarmahasiswa = $id_daftarmahasiswa";

    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
  }

  //fungsi menghapus mahasiswa di matakuliah
  function delete_daftarmahasiswa($id_daftarmahasiswa){
    global $db;

    //query hapus mahasiswa di matakuliah
    $query = "DELETE FROM daftarmahasiswa WHERE id_daftarmahasiswa = $id_daftarmahasiswa";

    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
  }
?>