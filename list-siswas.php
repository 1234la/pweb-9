<?php
    require ("config.php");
    $sql="SELECT * FROM calon_siswa";
    $siswas = mysqli_query($db,$sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Pendaftar SMA</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <!-- Jquery pagination table -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script>
    <!-- CSS Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <!-- CSS Bootsrap Data Table -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css">
    <!-- JS Bootsrap Data Table -->
    <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <!-- SweetAlert -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <title>PPDB Jawa Timur</title>
    <link rel="shortcut icon" href="/logo-big.png" type="image/x-icon">
    <!-- CDN Data Table css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.1.0/css/buttons.dataTables.min.css">
    <!-- CDN Data Table JS-->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.1.0/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.1.0/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.1.0/js/buttons.print.min.js"></script>
</head>
<body>
    <header class="sticky-top">
        <nav class="navbar shadow d-flex justify-content-between pt-3" style="background-color: #0275d8;">
            <div class="container align-items-center">
                <a href="index.php" style="color:white; text-decoration:none">
                    <i class="bi bi-arrow-left-circle-fill me-2"></i>
                    Kembali ke menu utama
                </a>
                <div class="content d-flex align-items-center">
                    <img src="/logo-big.png" alt="" width="60px" height="60px">
                    <h4 class="me-2">PPDB Jatim | </h4>
                    <h5 style="color:white;"> List Pendaftar SMA</h5>
                </div>
            </div>
        </nav>
    </header>

    <div class="container">
        <?php if(isset($_GET['status'])): ?>
            <p>
                <?php
                    if($_GET['status'] == 'sukses') {
                        echo "<div class=\"alert alert-success mt-4\" role=\"alert\">";
                        echo "Pendaftaran siswa baru berhasil!";
                        echo "</div>";
                    } elseif($_GET['status'] == 'gagal-upload') {
                        echo "<div class=\"alert alert-danger mt-4\" role=\"alert\">";
                        echo "Upload foto pendaftar gagal";
                        echo "</div>";
                    }else {
                        echo "<div class=\"alert alert-danger mt-4\" role=\"alert\">";
                        echo "Pendaftaran gagal";
                        echo "</div>";
                    }
                ?>
            </p>
        <?php endif; ?>
    </div>

    <div class="container shadow my-3 py-5 px-5 border rounded-3">
        <div style="background: #0275d8; height: 6rem" class="px-3 d-flex align-items-center mb-3">
            <h2 class="fs-1" style="color:white;font-weight: bold;">
                Data Pendaftar Jenjang SMA <span style="font-size: 1.2rem; font-weight: lighter">Tahun Ajaran 2021/2022</span>
            </h2> 
        </div>
        <div class="mb-3 d-flex justify-content-end">
            <a href="form-daftar.php">
                <button class="btn btn-success">[+] Tambah Baru</button>
            </a>
        </div>
        <div class="table-responsive" style="overflow: hidden;">
            <table id="list" class="table table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th scope="col">No.</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">Jenis Kelamin</th>
                        <th scope="col">Agama</th>
                        <th scope="col">Sekolah Asal</th>
                        <th scope="col">Foto</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $counter=1;?>
                    <?php foreach( $siswas as $siswa) :?>
                        <tr>
                            <th scope="row"><?= $counter++ ?></th>
                            <td><?= $siswa["nama"]?></td>
                            <td><?= $siswa["alamat"]?></td>
                            <td><?= $siswa["jenis_kelamin"]?></td>
                            <td><?= $siswa["agama"]?></td>
                            <td><?= $siswa["sekolah_asal"]?></td>
                            <td><img src="./image/<?= $siswa['foto'] ?>" width=110px height=120px></td>
                            <td>
                                <div class="row mb-2">
                                    <a href="form-edit.php?id=<?= $siswa["id"] ?>">
                                        <button type="button" name="edit" class="btn btn-warning">Edit</button>
                                    </a>
                                </div>
                                <div class="row">
                                    <a href="hapus.php?id=<?= $siswa["id"]?>" onclick="return confirm('Apakah Anda yakin ingin menghapus data?')">
                                        <button type="button" class="btn btn-danger">Hapus</button>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <!-- <p>Total: <?php echo mysqli_num_rows($siswas) ?></p> -->
    </div>
</body>
</html>

<script>
    $(document).ready(function() {
        $('#list').DataTable();
    } );
</script>