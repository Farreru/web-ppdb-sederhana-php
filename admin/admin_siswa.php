<?php
session_start();
if(!isset($_SESSION['logged'])){
    header('location: /ppdb/?page=login');
    exit(); // Add this line to stop further execution
}
$title = "Home - Admin";
require_once('../layout/header.php');
require_once('../layout/modals/siswa.php');
?>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4 display-6 pb-1">Data Siswa</h1>


            <div class="row ">

                <div class="col-sm-12">
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table me-1"></i>
                            List Sekolah
                        </div>
                        <div class="card-body ">
                            <?php 
                                if(callApi('getCountSiswa') > 0): ?>
                            <table id="datatablesSimple">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>ID</th>
                                        <th>ID ORTU</th>
                                        <th>NISN</th>
                                        <th>NAMA SISWA</th>
                                        <th>TANGGAL LAHIR</th>
                                        <th>TEMPAT LAHIR</th>
                                        <th>NO TELEPON</th>
                                        <th>ASAL SEKOLAH</th>
                                        <th>Photo</th>
                                        <th>AKSI</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>#</th>
                                        <th>ID</th>
                                        <th>ID ORTU</th>
                                        <th>NISN</th>
                                        <th>NAMA SISWA</th>
                                        <th>TANGGAL LAHIR</th>
                                        <th>TEMPAT LAHIR</th>
                                        <th>NO TELEPON</th>
                                        <th>ASAL SEKOLAH</th>
                                        <th>Photo</th>
                                        <th>AKSI</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <!-- CALL WITH API -->
                                    <?php
$no = 1;

$data = callApi('getAllSiswa');
if ($data === false) {
    echo 'Failed to fetch data from the API.';
    exit;
}

// Decode the JSON data
$sekolahList = json_decode($data);

foreach ($sekolahList as $data) {
    ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $data->id ?></td>
                                        <td><?= $data->id_ortu ?></td>
                                        <td><?= $data->nisn ?></td>
                                        <td><?= $data->nama ?></td>
                                        <td><?= $data->tanggal_lahir ?></td>
                                        <td><?= $data->tempat_lahir ?></td>
                                        <td><?= $data->no_telp ?></td>
                                        <td><?= $data->asal_sekolah ?></td>
                                        <td><img width="110px" height="110px" class="mx-auto d-grid rounded-circle"
                                                src="http://localhost/ppdb/assets/img/<?= $data->photo ?>" alt=""></td>


                                        <td>
                                            <button class="btn btn-warning"
                                                onclick="edit_row(<?= $data->id ?>)">Edit</button>
                                            <button class="btn btn-danger"
                                                onclick="delete_row(<?= $data->id ?>)">Delete</button>
                                        </td>
                                    </tr>
                                    <?php
}
?>

                                </tbody>
                            </table>
                            <?php else: ?>
                            <h1 class="display-6">Data Tidak Tersedia.</h1>
                            <?php endif; ?>
                        </div>

                    </div>


                </div>

            </div>



            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"
                integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw=="
                crossorigin="anonymous" referrerpolicy="no-referrer"></script>
            <script src="http://localhost/ppdb/admin/assets/js/siswa.js"></script>


        </div>
    </main>
</div>


<?php
require_once('../layout/footer.php');
?>