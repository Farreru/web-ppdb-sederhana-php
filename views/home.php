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
        <div class="d-flex flex-wrap justify-content-evenly mt-5 p-3">
            <div class="p-2">
                <h2>PPDB 2023/2024</h2>
                <h4 class="text-muted">Daftar sekarang dengan menekan tombol dibawah!</h4>
                <!-- Button trigger modal -->
                <a href="/ppdb/?page=daftar" target="_blank" class="btn btn-primary">
                    Daftar Sekarang
                </a>



            </div>

            <div class="p-2">
                <img src="assets/img/smk.png" class="img-fluid" width="500px" alt="">
            </div>
        </div>
    </div>

    <div id="second-content" class="bg-light pb-5">
        <div class="container">
            <div class="mt-5 text-center p-5">
                <h3><u>Statistik PPDB</u> </h3>
            </div>


            <?php
            
            $siswa =  callApi('getCountSiswa');
            $sekolah =  callApi('getCountSekolah');
            
            ?>

            <div class="mx-auto">
                <div class="row">
                    <div class="col-sm-6 mb-5 p-5">
                        <div class="card">
                            <div class="card-body mx-auto text-center">
                                <h5 class="card-title">Total Siswa Yang Terdaftar</h5>
                                <h4 class="p-2"><b><?= $siswa ?></b></h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 mb-5 p-5">
                        <div class="card">
                            <div class="card-body mx-auto text-center">
                                <h5 class="card-title">Total Sekolah</h5>
                                <h4 class="p-2"><b><?= $sekolah ?></b></h4>
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