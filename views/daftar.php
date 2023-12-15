<?php

$baseURL = "http://localhost/ppdb/";
function callApi($class){
    global $baseURL;
    
    $url = $baseURL . "function/action.php?class=$class";
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    curl_close($ch);

return $response;

}
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="shortcut icon" href="https://ppdb.riau.go.id/images/favicon.png" type="image/x-icon">

    <title>PPDB SEKOLAH</title>
</head>

<body>

    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
                <img src="https://ppdb.riau.go.id/images/favicon.png" alt="" width="40">
                <a class="navbar-brand" href="/ppdb/">PPDB SEKOLAH</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="/ppdb/?page=daftar"><button
                                    class="btn text-white">Daftar
                                    PPDB</button></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/ppdb/?page=login"><button
                                    class="btn btn-primary">Masuk</button></a>
                        </li>

                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <div id="main-content">
        <div class="row mb-5">
            <div class="col-sm-7 mx-auto">
                <div class="card mt-5">
                    <div class="card-title">
                        <h3 class="mt-3 p-3 text-center">Formulir PPDB</h3>
                    </div>
                    <div class="card-body">
                        <p style="margin-top:-2rem;" class="text-center ">Mohon Diisi Form Dibawah ini!</p>

                        <div id='form'>
                            <form action="/ppdb/function/action.php?class=tambahPendaftar" method="POST"
                                enctype="multipart/form-data">
                                <div class="form-group row mt-4">
                                    <label class="col-sm-3"> Nama :</label>
                                    <div class="col-sm-9 mb-2">
                                        <input required type="text" name="nama" class="form-control" id="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3"> Nisn :</label>
                                    <div class="col-sm-9 mb-2">
                                        <input required type="text" name="nisn" class="form-control" id="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3"> Alamat :</label>
                                    <div class="col-sm-9 mb-2">
                                        <input required type="text" name="alamat" class="form-control" id="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3"> Tanggal Lahir:</label>
                                    <div class="col-sm-9 mb-2">
                                        <input required type="date" name="tanggal_lahir" class="form-control" id="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3"> Tempat Lahir :</label>
                                    <div class="col-sm-9 mb-2">
                                        <input required type="text" name="tempat_lahir" class="form-control" id="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 mb-2"> Jurusan :</label>
                                    <div class="col-sm-9 mb-2">
                                        <select required class="form-select" name="jurusan">
                                            <option value="" selected>Pilih Jurusan</option>
                                            <?php
                                            $data = callApi('getAllJurusan');
                                            if ($data === false) {
                                                echo 'Failed to fetch data from the API.';
                                                exit;
                                            }
                                            
                                            // Decode the JSON data
                                            $jurusan = json_decode($data);
                                            
                                            foreach ($jurusan as $data) {
                                            ?>
                                            <option value="<?= $data->id ?>"><?= $data->jurusan ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-3 mb-2"> Asal Sekolah :</label>
                                    <div class="col-sm-9 mb-2">
                                        <input required type="text" name="asal_sekolah" class="form-control" id="">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-3 mb-2"> Pilih Sekolah :</label>
                                    <div class="col-sm-9 mb-2">
                                        <select required class="form-select" name="nama_sekolah">
                                            <option value="">Pilih Disini!</option>
                                            <?php
                                            $data = callApi('getAllSekolah');
                                            if ($data === false) {
                                                echo 'Failed to fetch data from the API.';
                                                exit;
                                            }
                                            
                                            // Decode the JSON data
                                            $sekolah = json_decode($data);
                                            
                                            foreach ($sekolah as $data) {
                                            ?>
                                            <option value="<?= $data->id ?>"><?= $data->nama_sekolah ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-3 mb-2"> Nama Ayah :</label>
                                    <div class="col-sm-9 mb-2">
                                        <input required type="text" name="nama_ayah" class="form-control" id="">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-3 mb-2"> Pekejaan Ayah :</label>
                                    <div class="col-sm-9 mb-2">
                                        <input required type="text" name="pekerjaan_ayah" class="form-control" id="">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-3 mb-2"> Nama Ibu :</label>
                                    <div class="col-sm-9 mb-2">
                                        <input required type="text" name="nama_ibu" class="form-control" id="">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-3 mb-2"> Pekerjaan Ibu :</label>
                                    <div class="col-sm-9 mb-2">
                                        <input required type="text" name="pekerjaan_ibu" class="form-control" id="">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-3 mb-2"> Photo Siswa :</label>
                                    <div class="col-sm-9 mb-2">
                                        <input required type="file" name="photo" class="form-control" id="">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-3 mb-2"> No Telepon :</label>
                                    <div class="col-sm-9">
                                        <input required type="text" name="no_telepon" class="form-control" id="">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <button type="submit" class="mt-2 btn btn-primary form-control"
                                        name="daftar">Daftar</button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>






    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>


</body>

</html>