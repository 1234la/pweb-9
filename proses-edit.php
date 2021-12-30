<?php

include("config.php");

// cek apakah tombol simpan sudah diklik atau blum?
if(isset($_POST['submit'])){

    // ambil data dari formulir
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $jk = $_POST['jenis_kelamin'];
    $agama = $_POST['agama'];
    $sekolah = $_POST['sekolah_asal'];
    $foto = $_FILES['foto']['name'];
    $temp = $_FILES['foto']['tmp_name'];

    $nama_foto = date('dmYHis') . $foto;
    $path_foto = 'image/' . $nama_foto;

    // buat query update
    $sql = "UPDATE calon_siswa SET nama='$nama', alamat='$alamat', jenis_kelamin='$jk', agama='$agama', sekolah_asal='$sekolah' WHERE id=$id";
    $query = mysqli_query($db, $sql);

    // jika tidak mengganti foto
    if (empty($foto)) {
        $sql = "UPDATE calon_siswa SET nama='$nama', alamat='$alamat', jenis_kelamin='$jk', agama='$agama', sekolah_asal='$sekolah' WHERE id=$id";
        $query = mysqli_query($db, $sql);
        if ($query) {
            header('Location: list-siswas.php');
        } else {
            die("Gagal menyimpan perubahan...");
        }
    } else {
        if (move_uploaded_file($temp, $path_foto)) {
            // unlink foto jika sudah ada
            $sql = "SELECT foto FROM calon_siswa WHERE id=$id";
            $query = mysqli_query($db, $sql);
            $data_lama = mysqli_fetch_array($query);
            if (is_file("image/" . $data_lama['nama_foto'])) {
                unlink("image/" . $data_lama['nama_foto']);
            }
            // update
            $sql = "UPDATE calon_siswa SET nama='$nama', alamat='$alamat', jenis_kelamin='$jk', agama='$agama', sekolah_asal='$sekolah', foto='$nama_foto' WHERE id=$id";
            $query = mysqli_query($db, $sql);                
            if ($query) {
                header('Location: list-siswas.php');
            } else {
                die("Gagal menyimpan perubahan...");
            }
        } else {
            die("Gagal menyimpan perubahan...");
        } 
    }
} else {
    die("Akses dilarang...");
}

// apakah query update berhasil?
//     if( $query ) {
//         // kalau berhasil alihkan ke halaman list-siswa.php
//         header('Location: list-siswas.php');
//     } else {
//         // kalau gagal tampilkan pesan
//         die("Gagal menyimpan perubahan...");
//     }


// } else {
//     die("Akses dilarang...");
// }

?>