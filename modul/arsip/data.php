<div class="card mt-3">
  <div class="card-header bg-dark text-white">
     Data Arsip Surat
  </div>
  <div class="card-body">
    <a href="?halaman=arsip_surat&hal=tambahdata"class="btn btn-dark mb-3" >Tambah Data</a>
    <table class="table table-borderd table-hovered table-striped">
    <button onclick ="window.print()" class="btn btn-danger shadow float-right"> Print <i class="fa fa-print"></i></button>
        <style>
            @media print{
                .navbar-nav,
                th:nth-child(20),
                td:nth-child(20),
                .btn,
                footer {
                    display: none;
                }
            }
        </style>
     <tr>
            <th>No Telepon Unit</th>
            <th>No Surat</th>
            <th>Tanggal Surat</th>
            <th>Tanggal Diterima</th>
            <th>prihal</th>
            <th>Tujuan Departemen</th>
            <th>Pengirim</th>
            <th>File</th>
            <th>Aksi</th>

        </tr>
        <?php
            $tampil = mysqli_query($koneksi,"
                        SELECT 
                        tbl_arsip.*,
                        tbl_departemen.nama_departemen,
                        tbl_pengirim_surat.nama_pengirim, tbl_pengirim_surat.no_telepon_unit
                    FROM  
                        tbl_arsip, tbl_departemen, tbl_pengirim_surat
                    WHERE
                        tbl_arsip.id_departemen = tbl_departemen.id_departemen
                        and tbl_arsip.id_pengirim = tbl_pengirim_surat.id_pengirim_surat
                        
                        
            
                      ");
            $no = 1;
            while($data = mysqli_fetch_array($tampil)) :
        ?>
        <tr>
            <td><?=$data['no_telepon_unit']?></td>
            <td><?=$data['no_surat']?></td>
            <td><?=$data['tanggal_surat']?></td>
            <td><?=$data['tanggal_diterima']?></td>
            <td><?=$data['prihal']?></td>
            <td><?=$data['nama_departemen']?></td>
            <td><?=$data['nama_pengirim']?></td>
            <td>
                <?php
                    //uji apakah file nya ada atau tidak
                    if(empty($data['file'])){
                        echo "  "; 

                    }else{
                ?>
                    <a href="file/<?=$data['file']?> " target="$_blank"> Lihat File </a>

                    
                    <?php
                    if (isset($_POST["hasil"])) {

                        $file = $_FILES["file"]["nama"];
                        $tmp_name = $_FILES["file"]["tmp_name"];
                        
                        

                    

                    }
                ?>
                   
                    
                <?php
                
                    }
                    
                ?>
                
            </td>



            <td>
                <a href="?halaman=arsip_surat&hal=edit&id=<?=$data['id_arsip']?>" class="btn btn-success">Edit </a>
                <a href="?halaman=arsip_surat&hal=hapus&id=<?=$data['id_arsip']?>" class="btn btn-danger"onclick="return confirm('Apakah yakin ingin menghapus data tersebut?')">Hapus </a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>
</div>
</div>
