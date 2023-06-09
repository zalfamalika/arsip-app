<?php 
session_start();
//mengatasi jika user langsung masuk menggunakan link, tanpa login
if(empty($_SESSION['id_user']) or empty($_SESSION['username']))




{
  
  echo "<script>
      alert('Maaf, untuk mengakses halaman ini, silahkan Login terlebih dahulu..!!');
      document.location='index.php';
      </script>";

   
  
}


?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    
    
    <title>E-Arsip | Kampus </title>
  </head>
  <body>

  <!-- Awal Nav / Menu -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-warning">
    
    
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="?">E-Arsip <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="?halaman=departemen">Data Departemen</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="?halaman=pengirim_surat">Data Pengirim Surat</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="?halaman=arsip_surat">Data Arsip Surat</a>
      </li>
  
      
</div>
      

      
    </ul>
    
  </div>

    </div>
 
</nav>
  <!-- Akhir Nav / Menu -->
  <!-- Awal Container -->
  <div class="container">