<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

    <title>PPDB Jawa Timur</title>
    <link rel="shortcut icon" href="/logo-big.png" type="image/x-icon">
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
                    <h5 style="color:white;"> Formulir Pendaftaran</h5>
                </div>
            </div>
        </nav>
    </header>
    <div class="container shadow my-5 py-5 px-5 border rounded-3" style="width:50rem">
        <div style="background: #0275d8; height: 6rem" class="px-3 d-flex align-items-center mb-3">
                <h2 class="fs-1" style="color:white;font-weight: bold;">
                    Jenjang SMA <span style="font-size: 1.2rem; font-weight: lighter">Tahun Ajaran 2021/2022</span>
                </h2> 
        </div>

        <!-- Note :
            - pada form atribut "action" menunjukan data akan dikirim kan kemana
            - atribut method ada 2 : GET(data dikirm melalui URL), POST(data dikirm melalui form/server)
        -->
        <form action="proses-pendaftaran.php" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <!-- 
                    Note :
                    - for pasangannya id untuk label input
                    - pada input atribut "name" adalah nama atribut yang sama dengan atribut db yang akan di insert
                 -->
                <label for="nama" class="form-label">Nama</label>
                <input type="text" name="nama" class="form-control" id="nama" placeholder="Nama Lengkap" required>
            </div>
            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <textarea class="form-control" name="alamat" id="alamat" rows="3" required></textarea>
            </div>
            <div class="mb-3">
                <label class="form-label">Jenis Kelamin</label>
                    <div class="d-flex">
                        <div class="form-check me-3">
                            <input required class="form-check-input" type="radio" name="jenis_kelamin" id="laki-laki" value="Laki-laki"  checked>
                            <label class="form-check-label" for="laki-laki" >
                                Laki-laki
                            </label>
                        </div>
                        <div class="form-check">
                            <input required class="form-check-input" type="radio" name="jenis_kelamin" id="female" value="Perempuan">
                            <label class="form-check-label" for="perempuan">
                                Perempuan
                            </label>
                        </div>
                    </div>
                </div>
            <div class="mb-3">
                <label class="form-label" for="agama">
                    Agama
                </label>
                    <select name="agama" id="agama" class="form-select" aria-label="Default select example">
                    <option value="Islam" selected>Islam</option>
                    <option value="Katolik">Katolik</option>
                    <option value="Kristen">Kristen</option>
                    <option value="Budha">Budha</option>
                    <option value="Hindu">Hindu</option>
                    <option value="Konghuchu">Konghuchu</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="sekolah_asal" class="form-label">Sekolah Asal</label>
                <input required name="sekolah_asal" type="text" class="form-control" id="sekolah_asal" placeholder="Nama Sekolah Asal">
            </div>
            <div class="mb-5">
                <label for="foto" class="form-label">Foto Pendaftar</label>
                <input type="file" name="foto" accept=".jpg, .jpeg, .png" class="form-control" id="foto" required>
            </div>
            <button type="submit" name="submit" class="btn btn-success" style="width: 100%;">Submit</button>
        </form>
    </div>  
</body>
</html>
