<?php
session_start();
include 'config.php';
if (isset($_GET['class'])) {

    $class = $_GET['class'];
    switch ($class) {

        case 'hapusPendaftaranByID':
            $alert;
            if (isset($_POST['id'])) {
                $id = $_POST['id'];
                $query = mysqli_query($conn, "DELETE FROM tbl_pendaftar WHERE id = '$id'");
                if (!$query) {
                    http_response_code(500);
                    $alert = "Terjadi kesalahan => " . mysqli_error($conn);
                } else {
                    $alert = "Data berhasil dihapus!";
                }
            } else {
                http_response_code(404);
                $alert = "Id tidak ditemukan!";
            }
            echo $alert;
            break;

        case 'hapusOrtuSiswaByID':
            $alert;
            if (isset($_POST['id'])) {
                $id = $_POST['id'];
                $query = mysqli_query($conn, "DELETE FROM tbl_orangtua_siswa WHERE id = '$id'");
                if (!$query) {
                    http_response_code(500);
                    $alert = "Terjadi kesalahan => " . mysqli_error($conn);
                } else {
                    $alert = "Data berhasil dihapus!";
                }
            } else {
                http_response_code(404);
                $alert = "Id tidak ditemukan!";
            }
            echo $alert;
            break;

        case 'hapusSiswaByID':
            $alert;
            if (isset($_POST['id'])) {
                $id = $_POST['id'];
                $query = mysqli_query($conn, "DELETE FROM tbl_siswa WHERE id = '$id'");
                if (!$query) {
                    http_response_code(500);
                    $alert = "Terjadi kesalahan => " . mysqli_error($conn);
                } else {
                    $alert = "Data berhasil dihapus!";
                }
            } else {
                http_response_code(404);
                $alert = "Id tidak ditemukan!";
            }
            echo $alert;
            break;

        case 'getSiswaByID':
            # code...
            $alert;
            if (isset($_POST['id'])) {
                $id = $_POST['id'];
                $query = mysqli_query($conn, "SELECT * FROM tbl_siswa WHERE id = '$id'");
                if (!$query) {
                    http_response_code(500);
                    $alert = "Terjadi kesalahan => " . mysqli_error($conn);
                } else {
                    $data = mysqli_fetch_assoc($query); // Fetch the row as an associative array
                    if (!$data) {
                        http_response_code(404);
                        $alert = "Data tidak ditemukan!";
                    } else {
                        http_response_code(200);
                        header('Content-Type: application/json');
                        echo json_encode($data);
                        exit();
                    }
                }
            } else {
                http_response_code(404);
                $alert = "Id tidak ditemukan!";
            }
            echo $alert;
            break;

        case 'getAllSiswa':
            # code...
            $alert;
            $query = mysqli_query($conn, "SELECT tbl_siswa.*, tbl_orangtua_siswa.id AS id_ortu 
            FROM tbl_siswa 
            JOIN tbl_orangtua_siswa ON tbl_orangtua_siswa.id_siswa = tbl_siswa.id;
            ");
            if (!$query) {
                http_response_code(500);
                $alert = "Terjadi kesalahan => " . mysqli_error($conn);
            } else {
                $data = array(); // Initialize an empty array to store the rows
                while ($row = mysqli_fetch_assoc($query)) {
                    $data[] = $row; // Append each row to the data array
                }

                if (empty($data)) {
                    http_response_code(404);
                    $alert = "Data tidak ditemukan!";
                } else {
                    http_response_code(200);
                    header('Content-Type: application/json');
                    echo json_encode($data);
                    exit();
                }
            }
            echo $alert;
            break;

        case 'getAllJurusan':
            # code...
            $alert;
            $query = mysqli_query($conn, "SELECT * FROM tbl_jurusan");
            if (!$query) {
                http_response_code(500);
                $alert = "Terjadi kesalahan => " . mysqli_error($conn);
            } else {
                $data = array(); // Initialize an empty array to store the rows
                while ($row = mysqli_fetch_assoc($query)) {
                    $data[] = $row; // Append each row to the data array
                }

                if (empty($data)) {
                    http_response_code(404);
                    $alert = "Data tidak ditemukan!";
                } else {
                    http_response_code(200);
                    header('Content-Type: application/json');
                    echo json_encode($data);
                    exit();
                }
            }
            echo $alert;
            break;

        case 'getAllSekolah':
            # code...
            $alert;
            $query = mysqli_query($conn, "SELECT * FROM tbl_sekolah");
            if (!$query) {
                http_response_code(500);
                $alert = "Terjadi kesalahan => " . mysqli_error($conn);
            } else {
                $data = array(); // Initialize an empty array to store the rows
                while ($row = mysqli_fetch_assoc($query)) {
                    $data[] = $row; // Append each row to the data array
                }

                if (empty($data)) {
                    http_response_code(404);
                    $alert = "Data tidak ditemukan!";
                } else {
                    http_response_code(200);
                    header('Content-Type: application/json');
                    echo json_encode($data);
                    exit();
                }
            }
            echo $alert;
            break;

        case 'getAllOrtuSiswa':
            # code...
            $alert;
            $query = mysqli_query($conn, "SELECT tbl_orangtua_siswa.*, tbl_siswa.nama AS nama_siswa
            FROM tbl_orangtua_siswa
            JOIN tbl_siswa ON tbl_orangtua_siswa.id_siswa = tbl_siswa.id;
            ");
            if (!$query) {
                http_response_code(500);
                $alert = "Terjadi kesalahan => " . mysqli_error($conn);
            } else {
                $data = array(); // Initialize an empty array to store the rows
                while ($row = mysqli_fetch_assoc($query)) {
                    $data[] = $row; // Append each row to the data array
                }

                if (empty($data)) {
                    http_response_code(404);
                    $alert = "Data tidak ditemukan!";
                } else {
                    http_response_code(200);
                    header('Content-Type: application/json');
                    echo json_encode($data);
                    exit();
                }
            }


            echo $alert;
            break;


        case 'getOrtuSiswaByID':
            # code...
            $alert;
            if (isset($_POST['id'])) {
                $id = $_POST['id'];
                $query = mysqli_query($conn, "SELECT * FROM tbl_orangtua_siswa WHERE id = '$id'");
                if (!$query) {
                    http_response_code(500);
                    $alert = "Terjadi kesalahan => " . mysqli_error($conn);
                } else {
                    $data = mysqli_fetch_assoc($query); // Fetch the row as an associative array
                    if (!$data) {
                        http_response_code(404);
                        $alert = "Data tidak ditemukan!";
                    } else {
                        http_response_code(200);
                        header('Content-Type: application/json');
                        echo json_encode($data);
                        exit();
                    }
                }
            } else {
                http_response_code(404);
                $alert = "Id tidak ditemukan!";
            }
            echo $alert;
            break;

        case 'getOrtuSiswaByIDSiswa':
            # code...
            $alert;
            if (isset($_POST['id_siswa'])) {
                $id = $_POST['id_siswa'];
                $query = mysqli_query($conn, "SELECT * FROM tbl_orangtua_siswa WHERE id_siswa = '$id'");
                if (!$query) {
                    http_response_code(500);
                    $alert = "Terjadi kesalahan => " . mysqli_error($conn);
                } else {
                    $data = mysqli_fetch_assoc($query); // Fetch the row as an associative array
                    if (!$data) {
                        http_response_code(404);
                        $alert = "Data tidak ditemukan!";
                    } else {
                        http_response_code(200);
                        header('Content-Type: application/json');
                        echo json_encode($data);
                        exit();
                    }
                }
            } else {
                http_response_code(404);
                $alert = "Id tidak ditemukan!";
            }
            echo $alert;
            break;

        case 'getPendaftaranByID':
            # code...
            $alert;
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $query = mysqli_query($conn, "SELECT tbl_pendaftar.*, tbl_siswa.nama AS nama_siswa, tbl_siswa.photo, tbl_sekolah.nama_sekolah
                FROM tbl_pendaftar
                JOIN tbl_siswa ON tbl_pendaftar.id_siswa = tbl_siswa.id
                JOIN tbl_sekolah ON tbl_pendaftar.id_sekolah = tbl_sekolah.id
                WHERE tbl_pendaftar.id = '$id'");
                if (!$query) {
                    http_response_code(500);
                    $alert = "Terjadi kesalahan => " . mysqli_error($conn);
                } else {
                    $data = array(); // Initialize an empty array to store the rows
                    while ($row = mysqli_fetch_assoc($query)) {
                        $data[] = $row; // Append each row to the data array
                    }

                    if (empty($data)) {
                        http_response_code(404);
                        $alert = "Data tidak ditemukan!";
                    } else {
                        http_response_code(200);
                        header('Content-Type: application/json');
                        echo json_encode($data);
                        exit();
                    }
                }
            } else {
                http_response_code(404);
                $alert = "Id tidak ditemukan!";
            }
            echo $alert;
            break;

        case 'updateStatusPendaftaranByID':
            # code...
            $alert;
            if (isset($_POST['id']) && isset($_POST['status'])) {
                $id = $_POST['id'];
                $status = $_POST['status'];
                $query = mysqli_query($conn, "UPDATE tbl_pendaftar SET status = '$status' WHERE id = '$id'");
                if ($query) {
                    $alert = "Status Pendaftaran Berhasil Diubah!";
                } else {
                    http_response_code(404);
                    $alert = "Status Pendaftaran Gagal Diubah!";
                }
                echo $alert;
            }
            break;

        case 'getAllPendingPendaftaran':
            $query = mysqli_query($conn, "SELECT 
            tbl_pendaftar.*,
            tbl_siswa.nama AS nama_siswa,
            tbl_siswa.tempat_lahir,
            tbl_siswa.tanggal_lahir,
            tbl_siswa.asal_sekolah,
            tbl_orangtua_siswa.id AS id_ortu,
            tbl_siswa.nisn,
            tbl_siswa.alamat,
            tbl_siswa.no_telp,
            tbl_jurusan.jurusan,
            tbl_sekolah.nama_sekolah
        FROM 
            tbl_pendaftar
        JOIN 
            tbl_siswa ON tbl_pendaftar.id_siswa = tbl_siswa.id
        JOIN 
            tbl_jurusan ON tbl_pendaftar.id_jurusan = tbl_jurusan.id
        JOIN 
            tbl_sekolah ON tbl_pendaftar.id_sekolah = tbl_sekolah.id
        JOIN 
            tbl_orangtua_siswa ON tbl_pendaftar.id_orangtua_siswa = tbl_orangtua_siswa.id
        WHERE 
            tbl_pendaftar.status = 1;
        
            
            
            
            ");
            if (!$query) {
                http_response_code(500);
                $alert = "Terjadi kesalahan => " . mysqli_error($conn);
            } else {
                $data = array(); // Initialize an empty array to store the rows
                while ($row = mysqli_fetch_assoc($query)) {
                    $data[] = $row; // Append each row to the data array
                }

                if (empty($data)) {
                    http_response_code(404);
                    $alert = "Data tidak ditemukan!";
                } else {
                    http_response_code(200);
                    header('Content-Type: application/json');
                    echo json_encode($data);
                    exit();
                }
            }


            echo $alert;
            break;

        case 'getAllDiterimaPendaftaran':
            $query = mysqli_query($conn, "SELECT 
            tbl_pendaftar.*,
            tbl_siswa.nama AS nama_siswa,
            tbl_siswa.tempat_lahir,
            tbl_siswa.tanggal_lahir,
            tbl_siswa.asal_sekolah,
            tbl_orangtua_siswa.id AS id_ortu,
            tbl_siswa.nisn,
            tbl_siswa.alamat,
            tbl_siswa.no_telp,
            tbl_jurusan.jurusan,
            tbl_sekolah.nama_sekolah
        FROM 
            tbl_pendaftar
        JOIN 
            tbl_siswa ON tbl_pendaftar.id_siswa = tbl_siswa.id
        JOIN 
            tbl_jurusan ON tbl_pendaftar.id_jurusan = tbl_jurusan.id
        JOIN 
            tbl_sekolah ON tbl_pendaftar.id_sekolah = tbl_sekolah.id
        JOIN 
            tbl_orangtua_siswa ON tbl_pendaftar.id_orangtua_siswa = tbl_orangtua_siswa.id
        WHERE 
            tbl_pendaftar.status = 2;

            ");
            if (!$query) {
                http_response_code(500);
                $alert = "Terjadi kesalahan => " . mysqli_error($conn);
            } else {
                $data = array(); // Initialize an empty array to store the rows
                while ($row = mysqli_fetch_assoc($query)) {
                    $data[] = $row; // Append each row to the data array
                }

                if (empty($data)) {
                    http_response_code(404);
                    $alert = "Data tidak ditemukan!";
                } else {
                    http_response_code(200);
                    header('Content-Type: application/json');
                    echo json_encode($data);
                    exit();
                }
            }


            echo $alert;
            break;

        case 'getAllDitolakPendaftaran':
            $query = mysqli_query($conn, "SELECT 
            tbl_pendaftar.*,
            tbl_siswa.nama AS nama_siswa,
            tbl_siswa.tempat_lahir,
            tbl_siswa.tanggal_lahir,
            tbl_siswa.asal_sekolah,
            tbl_orangtua_siswa.id AS id_ortu,
            tbl_siswa.nisn,
            tbl_siswa.alamat,
            tbl_siswa.no_telp,
            tbl_jurusan.jurusan,
            tbl_sekolah.nama_sekolah
        FROM 
            tbl_pendaftar
        JOIN 
            tbl_siswa ON tbl_pendaftar.id_siswa = tbl_siswa.id
        JOIN 
            tbl_jurusan ON tbl_pendaftar.id_jurusan = tbl_jurusan.id
        JOIN 
            tbl_sekolah ON tbl_pendaftar.id_sekolah = tbl_sekolah.id
        JOIN 
            tbl_orangtua_siswa ON tbl_pendaftar.id_orangtua_siswa = tbl_orangtua_siswa.id
        WHERE 
            tbl_pendaftar.status = 3;
            
            ");
            if (!$query) {
                http_response_code(500);
                $alert = "Terjadi kesalahan => " . mysqli_error($conn);
            } else {
                $data = array(); // Initialize an empty array to store the rows
                while ($row = mysqli_fetch_assoc($query)) {
                    $data[] = $row; // Append each row to the data array
                }

                if (empty($data)) {
                    http_response_code(404);
                    $alert = "Data tidak ditemukan!";
                } else {
                    http_response_code(200);
                    header('Content-Type: application/json');
                    echo json_encode($data);
                    exit();
                }
            }


            echo $alert;
            break;


        case 'logout':
            # code...

            session_destroy();
            header('location: /ppdb/?page=login');
            $_SESSION['logged'] = false;
            break;

        case 'tambahPendaftar':
            # code...
            $alert;
            if (isset($_POST['daftar'])) {
                $nama = $_POST['nama'];
                $nisn = $_POST['nisn'];
                $alamat = $_POST['alamat'];
                $tanggal_lahir = $_POST['tanggal_lahir'];
                $tempat_lahir = $_POST['tempat_lahir'];
                $jurusan = $_POST['jurusan'];
                $asal_sekolah = $_POST['asal_sekolah'];
                $nama_sekolah = $_POST['nama_sekolah'];
                $nama_ayah = $_POST['nama_ayah'];
                $pekerjaan_ayah = $_POST['pekerjaan_ayah'];
                $nama_ibu = $_POST['nama_ibu'];
                $pekerjaan_ibu = $_POST['pekerjaan_ibu'];
                $photo = $_FILES['photo']['name'];
                $no_telp = $_POST['no_telepon'];

                move_uploaded_file($_FILES['photo']['tmp_name'], '../assets/img/' . time() . $photo);

                $photo_name = time() . $photo;



                // Insert into tbl_siswa
                $siswaQuery = mysqli_query($conn, "INSERT INTO tbl_siswa(nama, nisn, alamat, tanggal_lahir, tempat_lahir, asal_sekolah, photo, no_telp) VALUES ('$nama', '$nisn', '$alamat', '$tanggal_lahir', '$tempat_lahir', '$asal_sekolah', '$photo_name', '$no_telp')");

                if ($siswaQuery) {
                    // Get the last inserted ID for tbl_siswa
                    $id_siswa = mysqli_insert_id($conn);

                    // Insert into tbl_orangtua_siswa
                    $ortuSiswaQuery = mysqli_query($conn, "INSERT INTO tbl_orangtua_siswa(id_siswa, nama_ayah, nama_ibu, pekerjaan_ibu, pekerjaan_ayah) VALUES ('$id_siswa', '$nama_ayah', '$nama_ibu', '$pekerjaan_ibu', '$pekerjaan_ayah')");

                    if ($ortuSiswaQuery) {
                        // Get the last inserted ID for tbl_orangtua_siswa
                        $id_ortu = mysqli_insert_id($conn);

                        // Insert into tbl_pendaftar
                        $pendaftarQuery = mysqli_query($conn, "INSERT INTO tbl_pendaftar(id_siswa, id_jurusan, id_sekolah, id_orangtua_siswa) VALUES ('$id_siswa', '$jurusan', '$nama_sekolah', '$id_ortu')");

                        if ($pendaftarQuery) {
                            $id_pendaftaran = mysqli_insert_id($conn);
                            header("location: /ppdb/?page=tampilkan&id=$id_pendaftaran");
                            $alert = "Data berhasil ditambahkan!";
                        } else {

                            $alert = "(3) Data gagal ditambahkan => " . mysqli_error($conn);
                        }
                    } else {
                        $alert = "(2) Data gagal ditambahkan => " . mysqli_error($conn);
                    }
                } else {
                    $alert = "(1) Data gagal ditambahkan => " . mysqli_error($conn);
                }

                echo $alert;
            }
            break;

        case 'login':
            # code...
            if (isset($_POST['login'])) {
                $username = $_POST['username'];
                $password = $_POST['password'];

                $hashPassword = $password;
                $query = mysqli_query($conn, "SELECT * FROM tbl_users WHERE username = '$username' LIMIT 1");

                while ($data = mysqli_fetch_array($query)) {
                    $hashPassword = $data['password'];
                }

                // Verify the password
                if (password_verify($password, $hashPassword)) {
                    echo 'User berhasil login!';
                    $_SESSION['logged'] = true;
                    $_SESSION['username'] = $username;
                    header('location: /ppdb/admin');
                } else {
                    echo 'User gagal login, harap cek username dan password!';
                    $_SESSION['logged'] = false;
                    $_SESSION['username'] = "";
                    header('location: /ppdb/?page=login');
                }
            }
            break;

        case 'register':
            # code...
            if (isset($_POST['register'])) {
                $username = $_POST['username'];
                $password = $_POST['password'];

                $check_exist = mysqli_fetch_row(mysqli_query($conn, "SELECT * FROM tbl_users WHERE username = '$username' LIMIT 1"));

                if ($check_exist) {
                    echo "User telah terdaftar, harap gunakan username lain!";
                } else {
                    $password = password_hash($password, PASSWORD_BCRYPT);
                    $query = mysqli_query($conn, "INSERT into tbl_users (username,password) VALUES ('$username','$password')");

                    if ($query) {
                        echo 'User berhasil ditambahkan!';
                    } else {
                        echo 'User gagal ditambahkan. => ' . mysqli_error($conn);
                    }
                }
            }
            break;

        case 'getCountDitolakPendaftaran':
            # code...
            $count_data = mysqli_fetch_row(mysqli_query($conn, "SELECT count(*) FROM tbl_pendaftar WHERE status = 3"))[0];
            if ($count_data) {
                echo $count_data;
            } else {
                http_response_code(404);
                echo "Data tidak ditemukan.";
            }
            break;

        case 'getCountDiterimaPendaftaran':
            # code...
            $count_data = mysqli_fetch_row(mysqli_query($conn, "SELECT count(*) FROM tbl_pendaftar WHERE status = 2"))[0];
            if ($count_data) {
                echo $count_data;
            } else {
                http_response_code(404);
                echo "Data tidak ditemukan.";
            }
            break;

        case 'getCountSiswa':
            # code...
            $count_data = mysqli_fetch_row(mysqli_query($conn, "SELECT count(*) FROM tbl_siswa"))[0];
            if ($count_data) {
                echo $count_data;
            } else {
                http_response_code(404);
                echo "Data tidak ditemukan.";
            }
            break;

        case 'getCountOrtuSiswa':
            # code...
            $count_data = mysqli_fetch_row(mysqli_query($conn, "SELECT count(*) FROM tbl_orangtua_siswa"))[0];
            if ($count_data) {
                echo $count_data;
            } else {
                http_response_code(404);
                echo "Data tidak ditemukan.";
            }
            break;

        case 'getCountJurusan':
            # code...
            $count_data = mysqli_fetch_row(mysqli_query($conn, "SELECT count(*) FROM tbl_jurusan"))[0];
            if ($count_data) {
                echo $count_data;
            } else {
                http_response_code(404);
                echo "Data tidak ditemukan.";
            }
            break;

        case 'getCountPendingPendaftaran':
            # code...
            $count_data = mysqli_fetch_row(mysqli_query($conn, "SELECT count(*) FROM tbl_pendaftar WHERE status = 1"))[0];
            if ($count_data) {
                echo $count_data;
            } else {
                http_response_code(404);
                echo "Data tidak ditemukan.";
            }
            break;

        case 'getCountSekolah':
            # code...
            $count_data = mysqli_fetch_row(mysqli_query($conn, "SELECT count(*) FROM tbl_sekolah"))[0];
            if ($count_data) {
                echo $count_data;
            } else {
                http_response_code(404);
                echo "Data tidak ditemukan.";
            }
            break;


        case 'tambahSekolah':
            # code...
            $alert;
            foreach ($_POST['nama_sekolah'] as $key => $value) {
                $nama = $_POST['nama_sekolah'][$key];
                $alamat = $_POST['alamat'][$key];
                $no_telp = $_POST['no_telp'][$key];
                $query = mysqli_query($conn, "INSERT INTO tbl_sekolah (nama_sekolah, alamat, no_telp) VALUES ('$nama','$alamat','$no_telp')");
                if (!$query) {
                    http_response_code(500);
                    $alert = "Terjadi kesalahan => " . mysqli_error($conn);
                } else {
                    $alert = "Data berhasil di tambahkan!";
                }
            }
            echo $alert;
            break;

        case 'tambahJurusan':
            # code...
            $alert;
            foreach ($_POST['nama_jurusan'] as $key => $value) {
                $nama_jurusan = $_POST['nama_jurusan'][$key];
                $query = mysqli_query($conn, "INSERT INTO tbl_jurusan (jurusan) VALUES ('$nama_jurusan')");
                if (!$query) {
                    http_response_code(500);
                    $alert = "Terjadi kesalahan => " . mysqli_error($conn);
                } else {
                    $alert = "Data berhasil di tambahkan!";
                }
            }
            echo $alert;
            break;

        case 'hapusSekolahByID':
            $alert;
            if (isset($_POST['id'])) {
                $id = $_POST['id'];
                $query = mysqli_query($conn, "DELETE FROM tbl_sekolah WHERE id = '$id'");
                if (!$query) {
                    http_response_code(500);
                    $alert = "Terjadi kesalahan => " . mysqli_error($conn);
                } else {
                    $alert = "Data berhasil dihapus!";
                }
            } else {
                http_response_code(404);
                $alert = "Id tidak ditemukan!";
            }
            echo $alert;
            break;

        case 'hapusJurusanByID':
            $alert;
            if (isset($_POST['id'])) {
                $id = $_POST['id'];
                $query = mysqli_query($conn, "DELETE FROM tbl_jurusan WHERE id = '$id'");
                if (!$query) {
                    http_response_code(500);
                    $alert = "Terjadi kesalahan => " . mysqli_error($conn);
                } else {
                    $alert = "Data berhasil dihapus!";
                }
            } else {
                http_response_code(404);
                $alert = "Id tidak ditemukan!";
            }
            echo $alert;
            break;

        case 'editSiswaByID':
            $alert;
            if (isset($_POST['id'])) {
                $id = $_POST['id'];
                $nama = $_POST['nama'];
                $nisn = $_POST['nisn'];
                $alamat = $_POST['alamat'];
                $tanggal_lahir = $_POST['tanggal_lahir'];
                $tempat_lahir = $_POST['tempat_lahir'];
                $asal_sekolah = $_POST['asal_sekolah'];
                $no_telp = $_POST['no_telp'];

                $query = mysqli_query($conn, "UPDATE tbl_siswa 
                                            SET nama = '$nama',    
                                                nisn = '$nisn', 
                                                alamat = '$alamat', 
                                                tanggal_lahir = '$tanggal_lahir', 
                                                tempat_lahir = '$tempat_lahir', 
                                                asal_sekolah = '$asal_sekolah',                     
                                                no_telp = '$no_telp' 
                                            WHERE id = '$id'");

                if (!$query) {
                    http_response_code(500);
                    $alert = "Terjadi kesalahan => " . mysqli_error($conn);
                } else {
                    $alert = "Data berhasil diubah!";
                }
            } else {
                http_response_code(404);
                $alert = "Id tidak ditemukan!";
            }
            echo $alert;
            break;

        case 'editSekolahByID':
            $alert;
            if (isset($_POST['id'])) {
                $id = $_POST['id'];
                $nama_sekolah = $_POST['nama_sekolah'];
                $alamat = $_POST['alamat'];
                $no_telp = $_POST['no_telp'];
                $query = mysqli_query($conn, "UPDATE tbl_sekolah SET nama_sekolah = '$nama_sekolah', alamat = '$alamat', no_telp = '$no_telp' WHERE id = '$id'");
                if (!$query) {
                    http_response_code(500);
                    $alert = "Terjadi kesalahan => " . mysqli_error($conn);
                } else {
                    $alert = "Data berhasil diubah!";
                }
            } else {
                http_response_code(404);
                $alert = "Id tidak ditemukan!";
            }
            echo $alert;
            break;

        case 'editOrtuSiswaByID':
            $alert;
            if (isset($_POST['id'])) {
                $id = $_POST['id'];
                $nama_ayah = $_POST['nama_ayah'];
                $nama_ibu = $_POST['nama_ibu'];
                $pekerjaan_ayah = $_POST['pekerjaan_ayah'];
                $pekerjaan_ibu = $_POST['pekerjaan_ibu'];
                $query = mysqli_query($conn, "UPDATE tbl_orangtua_siswa SET nama_ayah = '$nama_ayah', nama_ibu = '$nama_ibu', pekerjaan_ayah = '$pekerjaan_ayah', pekerjaan_ibu = '$pekerjaan_ibu' WHERE id = '$id'");
                if (!$query) {
                    http_response_code(500);
                    $alert = "Terjadi kesalahan => " . mysqli_error($conn);
                } else {
                    $alert = "Data berhasil diubah!";
                }
            } else {
                http_response_code(404);
                $alert = "Id tidak ditemukan!";
            }
            echo $alert;
            break;

        case 'editJurusanByID':
            $alert;
            if (isset($_POST['id'])) {
                $id = $_POST['id'];
                $nama_jurusan = $_POST['nama_jurusan'];

                $query = mysqli_query($conn, "UPDATE tbl_jurusan SET jurusan = '$nama_jurusan' WHERE id = '$id'");
                if (!$query) {
                    http_response_code(500);
                    $alert = "Terjadi kesalahan => " . mysqli_error($conn);
                } else {
                    $alert = "Data berhasil diubah!";
                }
            } else {
                http_response_code(404);
                $alert = "Id tidak ditemukan!";
            }
            echo $alert;
            break;

        case 'getSekolahByID':
            if (isset($_POST['id'])) {
                $id = $_POST['id'];
                $query = mysqli_query($conn, "SELECT * FROM tbl_sekolah WHERE id = '$id'");
                if (!$query) {
                    http_response_code(500);
                    $alert = "Terjadi kesalahan => " . mysqli_error($conn);
                } else {
                    $data = mysqli_fetch_assoc($query); // Fetch the row as an associative array
                    if (!$data) {
                        http_response_code(404);
                        $alert = "Data tidak ditemukan!";
                    } else {
                        http_response_code(200);
                        header('Content-Type: application/json');
                        echo json_encode($data);
                        exit();
                    }
                }
            } else {
                http_response_code(400);
                $alert = "ID tidak ditemukan!";
            }
            echo $alert;
            break;

        case 'getJurusanByID':
            if (isset($_POST['id'])) {
                $id = $_POST['id'];
                $query = mysqli_query($conn, "SELECT * FROM tbl_jurusan WHERE id = '$id'");
                if (!$query) {
                    http_response_code(500);
                    $alert = "Terjadi kesalahan => " . mysqli_error($conn);
                } else {
                    $data = mysqli_fetch_assoc($query); // Fetch the row as an associative array
                    if (!$data) {
                        http_response_code(404);
                        $alert = "Data tidak ditemukan!";
                    } else {
                        http_response_code(200);
                        header('Content-Type: application/json');
                        echo json_encode($data);
                        exit();
                    }
                }
            } else {
                http_response_code(400);
                $alert = "ID tidak ditemukan!";
            }
            echo $alert;
            break;


        default:
            # code...
            $alert;
            http_response_code(403);
            $alert = "Akses Dilarang.";

            echo $alert;
            break;
    }
} else {
    $alert;
    http_response_code(403);
    $alert = "Akses Dilarang.";

    echo $alert;
}
