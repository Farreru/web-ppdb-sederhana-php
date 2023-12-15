<?php
session_start();
if(!isset($_SESSION['logged'])){
    header('location: /ppdb/?page=login');
    exit(); // Add this line to stop further execution
}
$title = "Home - Admin";
require_once('../layout/header.php');
require_once('../layout/modals/ortuSiswa.php');

?>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4 display-6 pb-1">Data Orang Tua Siswa</h1>


            <div class="row ">

                <div class="col-sm-12">
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table me-1"></i>
                            List Sekolah
                        </div>
                        <div class="card-body ">
                            <?php 
                                if(callApi('getCountOrtuSiswa') > 0): ?>
                            <table id="datatablesSimple">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>ID</th>
                                        <th>NAMA SISWA</th>
                                        <th>NAMA AYAH</th>
                                        <th>PEKERJAAN AYAH</th>
                                        <th>NAMA IBU</th>
                                        <th>PEKERJAAN IBU</th>
                                        <th>AKSI</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>#</th>
                                        <th>ID</th>
                                        <th>NAMA SISWA</th>
                                        <th>NAMA AYAH</th>
                                        <th>PEKERJAAN AYAH</th>
                                        <th>NAMA IBU</th>
                                        <th>PEKERJAAN IBU</th>
                                        <th>AKSI</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <!-- CALL WITH API -->
                                    <?php
$no = 1;

$data = callApi('getAllOrtuSiswa');
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
                                        <td><?= $data->nama_siswa ?></td>
                                        <td><?= $data->nama_ayah ?></td>
                                        <td><?= $data->pekerjaan_ayah ?></td>
                                        <td><?= $data->nama_ibu ?></td>
                                        <td><?= $data->pekerjaan_ibu ?></td>

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
            <script src="http://localhost/ppdb/admin/assets/js/ortuSiswa.js"></script>


        </div>
    </main>
</div>


<?php
require_once('../layout/footer.php');
?>