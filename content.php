<?php 

    @$halaman = $_GET['halaman'];

    if($halaman == "departemen")
    {
        //tampilkan halaman Departemen
        //echo "Tampil Halaman Modul Departemen";
        include "modul/departemen/departemen.php";
    }
    elseif ($halaman == "pengirim_surat"){
        //tampilkan halaman pengirim surat
        include "modul/pengirim_surat/pengirim_surat.php";
    }
    elseif($halaman == "arsip_surat")
    {
        //tampilkan halaman arsip surat
        if(@$_GET['hal'] == "tambahdata" || @$_GET['hal'] == "edit" || @$_GET['hal'] == "hapus")
        {
            include"modul/arsip/form.php";
        }else{
            include "modul/arsip/data.php";
        }
        
    }
    else
    {
        //echo "Tampil Halaman Home";
        include "modul/home.php";
    }

    if($halaman == "beranda")
    {
        //tampilkan halaman Beranda
        //echo "Tampil Halaman Modul Beranda";
        include "modul/arsip/beranda.php";
    }
    




?>