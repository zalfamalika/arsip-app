<?php
session_start();
include "config/koneksi.php";

//contoh login sederhana, bisa dikembangkan 

//password diamankan dengan  enkripsi kriptografi md5
@$pass = md5($_POST['password']);

//mysqli_escape_string fungsinya untuk mengamankan karakter aneh yang diinputkan user, sepeti sql injection

@$username = mysqli_escape_string($koneksi, $_POST['username']);
@$password = mysqli_escape_string($koneksi, $pass);

$login = mysqli_query($koneksi, "SELECT * from tbl_user 
                                 WHERE username='$username' and password = '$password' ");

$data = mysqli_fetch_array($login);
if($data)
{
    $_SESSION['id_user'] = $data['id_user'];
    $_SESSION['username'] = $data['username'];
    header('location:admin.php');
}
else
{
    echo "<script>
            alert('Maaf, Login GAGAL, pastikan username dan password anda benar..!');
            document.location='index.php';
         </script>";
}
?>