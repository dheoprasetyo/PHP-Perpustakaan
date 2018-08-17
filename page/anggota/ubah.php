<?php 
$npm = $_GET['npm'];
$sql = $conn->query("SELECT * FROM anggota WHERE npm ='$npm'");
$tampil = $sql->fetch_assoc(); 
$kelamin = $tampil["kelamin"];
?>
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                               Ubah Data Anggota
                            </h2>
                        </div>

                           <div class="body">
                           <form method="POST">
                            <label for="">NPM</label>
                            <div class="form-group">
                                 <div class="form-line">
                                     <input type="text" class="form-control" value="<?= $tampil['npm'] ?>" name="npm" readonly/>
                                        </div>
                                    </div>

                            <label for="">Nama</label>
                            <div class="form-group">
                                 <div class="form-line">
                                     <input type="text" class="form-control" value="<?= $tampil['nama'] ?>" name="nama"/>
                                        </div>
                                    </div>

                            <label for="">Kelas</label>
                            <div class="form-group">
                                 <div class="form-line">
                                     <input type="text" class="form-control"  value="<?= $tampil['kelas'] ?>" name="kelas"/>
                                        </div>
                             </div>

                            <label for="">Tanggal Lahir</label>
                            <div class="form-group">
                                 <div class="form-line">
                                     <input class="form-control" name="tgl_lahir" type="date" value="<?= $tampil["tgl_lahir"];  ?>"/>
                                        </div>
                                    </div>


                            <label for="">Kelamin</label>
                            <div class="demo-radio-button">
                                <input name="kelamin" type="radio" id="radio_1" value="L" <?php echo($kelamin=='L')?"checked":""; ?> />
                                <label for="radio_1">Laki2</label>
                                <input name="kelamin" type="radio" id="radio_2" value="P" <?php echo ($kelamin=='P')?"checked":""; ?> />
                                <label for="radio_2">Cewek</label>
                            </div>
                            

                            <label for="">Jurusan</label>
                            <div class="form-group">
                                 <div class="form-line">
                                     <input type="text" class="form-control"  value="<?= $tampil['jurusan'] ?>" name="jurusan"/>
                                        </div>
                                    </div>

                           

                            <input type="submit" name="simpan" value="Simpan" class="btn btn-primary">
                                </form>

<?php 
if (isset($_POST['simpan'])) {
    $nama = $_POST['nama'];
    $kelas = $_POST['kelas'];
    $tgl_lahir = $_POST['tgl_lahir'];
    $kelamin = $_POST['kelamin'];
    $jurusan = $_POST['jurusan'];


    $sql = $conn->query("UPDATE anggota SET  nama = '$nama', kelas = '$kelas', tgl_lahir = '$tgl_lahir', kelamin = '$kelamin',jurusan = '$jurusan' WHERE npm = '$npm'");  

    if($sql){
        ?>
        <script type="text/javascript">alert('DAta Berhasil Diubah'); window.location.href="?page=anggota";</script>
        <?php 
        
    }

 } ?>
