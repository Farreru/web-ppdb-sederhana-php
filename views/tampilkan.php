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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
                <a class="navbar-brand" href="index.php">PPDB SEKOLAH</a>
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

    <div class="container">

        <?php

        $id = $_GET['id'];
        $data = callApi('getPendaftaranByID&id='.$id);
        $data = json_decode($data);
        foreach($data as $item){
        ?>
        <img src="http://localhost/ppdb/assets/img/<?= $item->photo ?>" class=" mt-4  mx-auto d-block rounded-circle"
            width="350" height="370" alt="">
        <h1 class="display-6 text-center mt-2"><b><?= $item->nama_siswa ?></b></h1>
        <div class="mt-2">
            <?php if ($item->status == '1') : ?>
            <h1 class="display-4 text-center text-warning"> PENDING</h1>
            <p class="text-muted text-center">Data sedang dicek terlebih dahulu dengan admin.. mohon ditunggu</p>
            <?php endif; ?>

            <?php if ($item->status == '2') : ?>
            <h1 class="display-4 text-center text-success"> DITERIMA</h1>
            <p class="text-muted text-center">Selamat! Kamu diterima untuk Sekolah di <?= $item->nama_sekolah ?></p>
            <?php endif; ?>

            <?php if ($item->status == '3') : ?>
            <h1 class="display-4 text-center text-danger"> DITOLAK</h1>
            <p class="text-muted text-center">Mohon Maaf. Kamu ditolak untuk Sekolah di <?= $item->nama_sekolah ?></p>
            <?php endif; ?>
        </div>
        <button onClick='getLink()' class="mx-auto mb-5 d-block btn btn-light border">Dapatkan link untuk halaman
            ini!</button>
        <?php } ?>


    </div>



    <script>
    function getLink() {
        var dummy = document.createElement('input'),
            text = window.location.href;

        document.body.appendChild(dummy);
        dummy.value = text;
        dummy.select();
        document.execCommand('copy');
        document.body.removeChild(dummy);
        Swal.fire({
            title: "Berhasil",
            text: "Link telah disalin ke papan klip",
            icon: "success"

        });
    }
    </script>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>


</body>

</html>