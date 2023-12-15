<?php
session_start();
if(!isset($_SESSION['logged'])){
    header('location: /ppdb/?page=login');
    exit(); // Add this line to stop further execution
}
$title = "Home - Admin";
require_once('../layout/header.php');
?>

<script src="http://localhost/ppdb/admin/assets/js/pendaftaran.js"></script>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4 display-6 pb-1">Dashboard</h1>

            <div class="row ">

                <div class="col-sm-12">
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table me-1"></i>
                            List Ditolak Pendaftaran
                        </div>
                        <div class="card-body ">
                            <?php 
                                if(callApi('getCountDitolakPendaftaran') > 0): ?>
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
                                        <th>ALAMAT</th>
                                        <th>NO TELEPON</th>
                                        <th>ASAL SEKOLAH</th>
                                        <th>PILIH SEKOLAH</th>
                                        <th>JURUSAN</th>
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
                                        <th>ALAMAT</th>
                                        <th>NO TELEPON</th>
                                        <th>ASAL SEKOLAH</th>
                                        <th>PILIH SEKOLAH</th>
                                        <th>JURUSAN</th>
                                        <th>AKSI</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <!-- CALL WITH API -->
                                    <?php
$no = 1;

$data = callApi('getAllDitolakPendaftaran');
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
                                        <td><?= $data->nama_siswa ?></td>
                                        <td><?= $data->tanggal_lahir ?></td>
                                        <td><?= $data->tempat_lahir ?></td>
                                        <td><?= $data->alamat ?></td>
                                        <td><?= $data->no_telp ?></td>
                                        <td><?= $data->asal_sekolah ?></td>
                                        <td><?= $data->nama_sekolah ?></td>
                                        <td><?= $data->jurusan ?></td>



                                        <td>
                                            <div class="row p-2 d-grid">
                                                <button class="btn btn-warning mb-2"
                                                    onclick="pending(<?= $data->id ?>)">Pending</button>
                                                <button class="btn btn-success mb-2"
                                                    onclick="terima(<?= $data->id ?>)">Terima</button>
                                                <button class="btn btn-primary mb-2"
                                                    onclick="tolak(<?= $data->id ?>)">Tolak</button>
                                                <button class="btn btn-danger mb-2"
                                                    onclick="hapus_pendaftaran(<?= $data->id ?>)">Hapus</button>
                                            </div>
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
        </div>
    </main>
</div>


<?php
require_once('../layout/footer.php');
?>