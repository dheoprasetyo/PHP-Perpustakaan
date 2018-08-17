<?php 
$id = $_GET['id'];
$sql = $conn->query("SELECT * FROM buku WHERE id ='$id'");
$tampil = $sql->fetch_assoc();
$tahun2 = $tampil["tahun_terbit"];
$lokasi = $tampil["lokasi"];
?>
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                               Ubah Data
                            </h2>
                        </div>

                           <div class="body">
                           <form method="POST">
                            <label for="">Judul</label>
                            <div class="form-group">
                                 <div class="form-line">
                                     <input type="text" class="form-control" value="<?= $tampil['judul'] ?>" name="judul" readonly/>
                                        </div>
                                    </div>

                            <label for="">Pengarang</label>
                            <div class="form-group">
                                 <div class="form-line">
                                     <input type="text" class="form-control" value="<?= $tampil['pengarang'] ?>" name="pengarang" readonly/>
                                        </div>
                                    </div>

                            <label for="">Penerbit</label>
                            <div class="form-group">
                                 <div class="form-line">
                                     <input type="text" class="form-control" value="<?= $tampil['penerbit'] ?>" name="penerbit"/>
                                        </div>
                                    </div>

                            <label for="">Tahun Terbit</label>
                            <div class="form-group">
                                 <div class="form-line">
                                    <select class="form-control" name="tahun" value="<?= $tampil["tahun_terbit"];  ?>">
                                               <?php 
                                               $tahun = date("Y");
                                               for ($i=$tahun-25; $i <= $tahun ; $i++) { 
                                                if ($i==$tahun2){

                                                   echo ' <option value="'.$i.'" selected>'.$i.'</option>';
                                                }else{
                                                    echo ' <option value="'.$i.'">'.$i.'</option>';
                                                }
                                               }

                                                ?>
                                            </select>
                             </div>

                            <label for="">ISBN</label>
                            <div class="form-group">
                                 <div class="form-line">
                                     <input type="text" class="form-control" value="<?= $tampil['isbn'] ?>" name="isbn"/>
                                        </div>
                                    </div>

                            <label for="">Jumlah Buku</label>
                            <div class="form-group">
                                 <div class="form-line">
                                     <input type="num" class="form-control" value="<?= $tampil['isbn'] ?>" name="isbn"/>
                                        </div>
                                    </div>


                            <label for="">Lokasi</label>
                            <div class="form-group">
                                 <div class="form-line">
                                    <select class="form-control" name="lokasi">
                                                <option value="rak1"<?php if($lokasi=='rak1'){ echo "selected";} ?>>Rak 1</option>
                                                <option value="rak2"<?php if($lokasi=='rak2'){ echo "selected";} ?>>Rak 2</option>
                                                <option value="rak3"<?php if($lokasi=='rak3'){ echo "selected";} ?>>Rak 3</option>
                                            </select>
                                    </div>
                            
                            <label for="">Tanggal Input</label>
                            <div class="form-group">
                                 <div class="form-line">
                                     <input type="date" class="form-control" value="<?= $tampil['tgl_input'] ?>" name="tanggal"/>
                                        </div>
                                    </div>

                           

                            <input type="submit" name="simpan" value="Simpan" class="btn btn-primary">
                                </form>

<?php 
if (isset($_POST['simpan'])) {
    
    $judul = $_POST["judul"];
    $pengarang = $_POST["pengarang"];
    $penerbit = $_POST["penerbit"];
    $tahun = $_POST["tahun"];
    $isbn = $_POST["isbn"];
    $jumlah = $_POST["jumlah"];
    $lokasi = $_POST["lokasi"];
    $tanggal = $_POST["tanggal"];

    $sql = $conn->query("UPDATE buku SET judul = '$judul', pengarang = '$pengarang', penerbit = '$penerbit', tahun_terbit = '$tahun', isbn = '$isbn',jumlah_buku = '$jumlah',lokasi = '$lokasi',tgl_input = '$tanggal'  WHERE id = $id"); 

    if($sql){
        ?>
        <script type="text/javascript">alert('DAta Berhasil Diubah'); window.location.href="?page=buku";</script>
        <?php 
        
    }

 } ?>
