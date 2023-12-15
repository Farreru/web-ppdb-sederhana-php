<?php
// if(include('../function/action.php')) echo 'YES : 200 <br>';
if(isset($_GET{'page'})){
  $page = $_GET['page'];
  
  switch ($page) {
    case 'admin':
      require_once('admin.php');
      break;

    case 'login':
      require_once('login.php');
      break;

    case 'pendaftaran_pending':
      require_once('admin_pendaftaran_pending.php');
      break;

    case 'pendaftaran_diterima':
      require_once('admin_pendaftaran_diterima.php');
      break;

    case 'pendaftaran_ditolak':
      require_once('admin_pendaftaran_ditolak.php');
      break;

    case 'list_sekolah':
      require_once('admin_list_sekolah.php');
      break;

    case 'list_jurusan':
      require_once('admin_list_jurusan.php');
      break;

    case 'siswa':
      require_once('admin_siswa.php');
      break;

    case 'ortu_siswa':
      require_once('admin_ortu_siswa.php');
      break;
    
    default:
      http_response_code(404);
      require_once('404.php');
      break;
  }


}  else{
require_once('admin.php');
}

?>