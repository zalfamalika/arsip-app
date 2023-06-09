<?php

//persiapan function untuk upload file/foto
function upload()
{
    //deklarasikan variabel kebutuhan
    $namafile = $_FILES['file']['name'];
    $ukuranfile = $_FILES['file']['size'];
    $error = $_FILES['file']['error'];
    $tmpname = $_FILES['file']['tmp_name'];

    //cek apakah yan diupload file/gambar
    $eksfilevalid = ['jpg', 'jpeg', 'png', 'pdf'];
    $eksfile = explode('.', $namafile);
    $eksfile = strtolower(end($eksfile));
    if(!in_array($eksfile, $eksfilevalid)){
       echo "<script> alert('Yang Anda Upload Bukan Gambar Atau PDF..!') </script>"; 
       return false;
    }
    
    //cek jika ukuran file sangat besar 
    if($ukuranfile > 1000000){
        echo "<script> alert('Ukuran File Anda Terlalu Besar!') </script>"; 
        return false;    
    }
    //jika lolos pengecekan , file siap diupload
    //generate nama file baru

    $namafilebaru = uniqid();
    $namafilebaru .= '.';
    $namafilebaru .= $eksfile;
    
    move_uploaded_file($tmpname, 'file/'.$namafilebaru);
    return $namafilebaru;

}

?>