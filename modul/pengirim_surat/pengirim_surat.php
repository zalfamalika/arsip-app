<?php

    //uji jika tombol simpan diklik
    if(isset($_POST['bsimpan']))
    {

        //pengujian apakah data akan di edit / simpan baru
        if(@$_GET['hal'] == "edit"){
            //perintah edit data
            //ubah data
        $ubah = mysqli_query($koneksi, "UPDATE tbl_pengirim_surat SET 
                                        nama_pengirim = '$_POST[nama_pengirim]' ,
                                        no_telepon_unit = '$_POST[no_telepon_unit]' ,
                                        email = '$_POST[email]' 
                                        where id_pengirim_surat = '$_GET[id]' ");
            if($ubah)
            {
            echo "<script>
            alert('ubah Data Sukses')
            document.location='?halaman=pengirim_surat';
            </script>";
            }
            else
        {
            echo "<script>
            alert('ubah Data GAGAL!!')
            document.location='?halaman=pengirim_surat';
            </script>";
        }

        }
        else
        {
            //perintah simpan data baru
            //simpan data
        $simpan = mysqli_query($koneksi, "INSERT INTO tbl_pengirim_surat
                                                    VALUES ( '', 
                                                    '$_POST[nama_pengirim]' , 
                                                    '$_POST[no_telepon_unit]' ,
                                                    '$_POST[email]' 

                                                   ) ");
            if($simpan)
            {
                echo "<script>
                alert('Simpan Data Sukses')
                document.location='?halaman=pengirim_surat';
                </script>";
            }else
            {
                echo "<script>
                alert('Simpan Data GAGAL!!')
                document.location='?halaman=pengirim_surat';
                </script>";
             }

        }

        
    }

    //uji jika klik tombol edit / hapus
    if(isset($_GET['hal']))
    {
        if($_GET['hal'] == "edit")
        {
             //tampilkan data yang akan diedit
        $tampil = mysqli_query($koneksi, "SELECT * FROM tbl_pengirim_surat where id_pengirim_surat='$_GET[id]'");
        $data =mysqli_fetch_array($tampil);
        if($data)
        {
            //jika data ditemukan maka data ditampung kedalam variabel
            $vnama_pengirim= $data['nama_pengirim'];
            $vno_telepon_unit= $data['no_telepon_unit'];
            $vemail= $data['email'];
        }
        }else{
            $hapus = mysqli_query($koneksi, "DELETE FROM tbl_pengirim_surat WHERE id_pengirim_surat='$_GET[id]'");
            if($hapus){
                echo "<script>
                alert('Hapus Data Sukses')
                document.location='?halaman=pengirim_surat';
                </script>";
            }
        }
       
    }
?>


<div class="card mt-3">
  <div class="card-header bg-dark text-white">
    Form Data Pengirim Surat
  </div>
  <div class="card-body">
  <form method="post" action="">
  <div class="form-group">
    <label for="nama_pengirim">Nama Pengirim </label>
    <input type="text" class="form-control" id="nama_pengirim" name="nama_pengirim" value="<?=@$vnama_pengirim?>">
  </div>
  <div class="form-group">
    <label for="no_telepon_unit">No. Telepon Unit</label>
    <input type="text" class="form-control" id="no_telepon_unit" name="no_telepon_unit" value="<?=@$vno_telepon_unit?>">
  </div>
  <div class="form-group">
    <label for="email">Email</label>
    <input type="email" class="form-control" id="email" name="email" value="<?=@$vemail?>">
  </div>
  <button type="submit" name="bsimpan" class="btn btn-primary">Simpan</button>
  <button type="reset" name="bbatal" class="btn btn-danger">Batal</button>
</form>
  </div>
</div>

<div class="card mt-3">
  <div class="card-header bg-dark text-white">
     Data Pengirim Surat
  </div>
  <div class="card-body">
    <table class="table table-borderd table-hovered table-striped">
        <tr>
            <th>Nama Pengirim Surat</th>
            <th>No Telepon Unit</th>
            <th>Email</th>
            <th>Aksi</th>
        </tr>
        <?php
            $tampil = mysqli_query($koneksi, "SELECT * from tbl_pengirim_surat order by id_pengirim_surat desc");
            $no = 1;
            while($data = mysqli_fetch_array($tampil)) :
        ?>
        <tr>
             <td><?=$data['nama_pengirim']?></td>
            <td><?=$data['no_telepon_unit']?></td>
            <td><?=$data['email']?></td>
            <td>
                <a href="?halaman=pengirim_surat&hal=edit&id=<?=$data['id_pengirim_surat']?>" class="btn btn-success">Edit </a>
                <a href="?halaman=pengirim_surat&hal=hapus&id=<?=$data['id_pengirim_surat']?>" class="btn btn-danger"onclick="return confirm('Apakah yakin ingin menghapus data tersebut?')">Hapus </a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>
</div>
</div>
