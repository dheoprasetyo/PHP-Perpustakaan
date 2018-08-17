            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                               Tambah Anggota
                            </h2>
                        </div>

                           <div class="body">
                           <form method="POST">

                            <label for="">NPM</label>
                            <div class="form-group">
                                 <div class="form-line">
                                     <input type="text" class="form-control" name="npm"/>
                                        </div>
                                    </div>

                           <label for="">Nama</label>
                            <div class="form-group">
                                 <div class="form-line">
                                     <input type="text" class="form-control" name="nama"/>
                                        </div>
                                    </div>

                            <label for="">Kelas</label>
                            <div class="form-group">
                                 <div class="form-line">
                                     <input type="text" class="form-control" name="kelas"/>
                                        </div>
                             </div>

                            <label for="">Tanggal Lahir</label>
                            <div class="form-group">
                                 <div class="form-line">
                                     <input type="date" class="form-control" name="tgl_lahir"/>
                                        </div>
                                    </div>


                            <label for="">Kelamin</label>
                            <div class="demo-radio-button">
                                <input name="kelamin" type="radio" id="radio_1" value="L" />
                                <label for="radio_1">Laki2</label>
                                <input name="kelamin" type="radio" id="radio_2" value="P" />
                                <label for="radio_2">Cewek</label>
                            </div>
                            <!-- <div class="form-group">
                                 <label class="checkbox-inline">
                                                <input type="checkbox" value="L" name="kelamin" /> Laki Laki
                                            </label>
                                            <label class="checkbox-inline">
                                                <input type="checkbox" value="P"  name="kelamin" /> Perempuan
                                            </label>
                                            <br> -->

                            <label for="">Jurusan</label>
                            <div class="form-group">
                                 <div class="form-line">
                                     <input type="text" class="form-control" name="jurusan"/>
                                        </div>
                                    </div>

                           

                            <input type="submit" name="simpan" value="Simpan" class="btn btn-primary">
                                </form>

<?php 
if (isset($_POST['simpan'])) {
    $npm = $_POST['npm'];
 	$nama = $_POST['nama'];
 	$kelas = $_POST['kelas'];
 	$tgl_lahir=$_POST["tgl_lahir"];
    $kelamin=$_POST["kelamin"];
    $jurusan=$_POST["jurusan"];

 	$sql = $conn->query("INSERT INTO anggota VALUES('$npm','$nama','$kelas','$tgl_lahir','$kelamin','$jurusan')");

 	if($sql){
 		?>
 		<script type="text/javascript">alert('DAta Berhasil Disimpan'); window.location.href="?page=anggota";</script>
 		<?php 
 		
 	}

 } ?>