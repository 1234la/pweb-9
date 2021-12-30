<?php
//Note :
// - "include" akan memproduksi error warning, yang mana kode program selanjutnya masih akan tetap dieksekusi.
// - "require" akan memproduksi fatal error yang akan memberhentikan alur kerja program yang artinya kode program selanjutnya tidak akan pernah dieksekusi.
// - dianjurakan menggunakan "require" krn akan memudahkan kita mendeteksi error jika terjadi error, dan mengurangi celah keamanan dari projek yang kita bangun.

require("config.php");
    //isset -> mengecek apakah variable tersebut tlah dibuat belum?
    // cek apakah tombol daftar sudah diklik atau blum?
    if(isset($_POST['submit'])){
    // var_dump($_POST);
    // var_dump($_FILES);
    // die();
    // ambil data dari formulir
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $jk = $_POST['jenis_kelamin'];
    $agama = $_POST['agama'];
    $sekolah = $_POST['sekolah_asal'];
    $foto = $_FILES['foto']['name'];
    $temp = $_FILES['foto']['tmp_name'];

    $nama_foto = date('dmYHis') . '_' . $foto;
    $path_foto = 'image/' . $nama_foto;

    if (is_uploaded_file($temp)) {
        if (move_uploaded_file($temp, $path_foto)) {
            $sql = "INSERT INTO calon_siswa (nama, alamat, jenis_kelamin, agama, sekolah_asal, foto) VALUE ('$nama', '$alamat', '$jk', '$agama', '$sekolah', '$nama_foto')";
            $query = mysqli_query($db, $sql);
            
            if ($query) {
                header('Location: list-siswas.php?status=sukses');
            } else {
                header('Location: list-siswas.php?status=gagal');
            }
        } else {
            header('Location: list-siswas.php?status=gagal-upload');
        } 
    } else {
        header('Location: list-siswas.php?status=gagal');
    }
} else {
    die("Akses dilarang...");
}

?>