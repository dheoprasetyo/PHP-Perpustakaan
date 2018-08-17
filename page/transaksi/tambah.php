<?php 

$tgl_pinjam = date("d-m-Y");
$tujuh_hari = mktime(0,0,0, date("n"), date("j")+7 ,date("Y"));
$kembali = date("d-m-Y", $tujuh_hari);
?>            
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                               Tambah Data
                            </h2>
                        </div>

                           <div class="body">
                           <form method="POST">

                            <label for="">Judul</label>
                            <div class="form-group">
                                 <select class="form-control" name="buku">
                                               <?php 
                                               $sql = $conn->query("SELECT * FROM buku order by id");
                                               while ($row=$sql->fetch_assoc()) {
                                                   # code...
                                              
                                               echo "<option value='$row[id].$row[judul]'>$row[judul]</option>"; 
                                                 }
                                               ?>
                                            </select>


                            <label for="">lokasi</label>
                            <div class="form-group">
                                 <select class="form-control" name="nama">
                                               <?php 
                                               $sql = $conn->query("SELECT * FROM anggota order by npm");
                                              while ($row=$sql->fetch_assoc()) {
                                               echo "<option value='$row[npm].$row[nama]'>$row[npm].$row[nama]</option>"; 
                                                 }
                                               ?>
                                            </select>
                             </div>

                            <label for="">Tanggal Pinjam</label>
                            <div class="form-group">
                                 <div class="form-line">
                                     <input class="form-control" name="tgl_pinjam" type="text" id="tgl" value="
                                            <?php echo $tgl_pinjam; ?>" readonly />
                                        </div>
                                    </div>


                            <label for="">Tanggal Kembali</label>
                            <div class="form-group">
                                 <div class="form-line">
                                     <input class="form-control" name="tgl_kembali" type="text" id="tgl" value="
                                            <?php echo $kembali; ?>" readonly />
                                        </div>
                                    </div>


                            <input type="submit" name="simpan" value="Simpan" class="btn btn-primary">
                                </form>

<?php 
if (isset($_POST['simpan'])) {
 	$buku = $_POST["buku"];
    $pecah_buku = explode(".", $buku);
    $id = $pecah_buku[0];
    $judul = $pecah_buku[1];

    $nama = $_POST["nama"];
    $pecah_nama = explode(".", $nama);
    $npm = $pecah_nama[0];
    $nama = $pecah_nama[1];

 	$sql = $conn->query("SELECT * FROM buku WHERE judul = '$judul'");
    while ($row = $sql->fetch_assoc()) {
        $sisa = $row["jumlah_buku"];
        if ($sisa == 0) {
           ?>
           <script type="text/javascript">
               alert("Stok Buku Habis, Transaksi tidak dapat dilakukan, silahkan tambah stok terlebih dahulu");
               window.location.href="?page=transaksi&aksi=tambah";
           </script>
           <?php 
           }else{
            $sql = $conn->query("INSERT INTO transaksi VALUES ('','$judul','$npm','$nama','$tgl_pinjam','$kembali','Pinjam')");
            $sql2 = $conn->query("UPDATE buku SET jumlah_buku=(jumlah_buku-1) WHERE id='$id'");
            ?>
             <script type="text/javascript">
               alert("Simpan data berhasil");
               window.location.href="?page=transaksi";
           </script>
           <?php  
       }
 		
 	}

 } ?>