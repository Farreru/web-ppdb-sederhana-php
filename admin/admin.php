<?php
session_start();
if(!isset($_SESSION['logged'])){
    header('location: /ppdb/?page=login');
    exit(); // Add this line to stop further execution
}
$title = "Home - Admin";
require_once('../layout/header.php');

?>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4 display-6 pb-1">Dashboard</h1>


            <div class="row ">


                <div class="col-sm-12">
                    <h1 class="display-4 text-center mt-5 py-5">Selamat Datang Di Halaman Admin!
                        <br>(<?= $_SESSION['username']?>)
                    </h1>
                </div>


            </div>
    </main>
</div>


<?php
require_once('../layout/footer.php');
?>