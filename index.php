<?php

if(isset($_GET{'page'})){
  $page = $_GET['page'];
  
  switch ($page) {
    case 'admin':
      header('location: /ppdb/admin/');
      break;

    case 'login':
      header('location: /ppdb/admin/?page=login');
      break;

    case 'daftar':
      require_once('views/daftar.php');
      break;

    case 'tampilkan':
      require_once('views/tampilkan.php');
      break;
    
    default:
      http_response_code(404);
      require_once('views/404.php');
      break;
  }


}  else{
  require_once('views/home.php');
}

?>