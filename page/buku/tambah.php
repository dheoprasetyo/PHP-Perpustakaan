           <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                               Tambah Buku
                            </h2>
                        </div>

                           <div class="body">
                           <form method="POST">


                           <label for="">Judul</label>
                            <div class="form-group">
                                 <div class="form-line">
                                     <input type="text" class="form-control" name="judul"/>
                                        </div>
                                    </div>

                            <label for="">Pengarang</label>
                            <div class="form-group">
                                 <div class="form-line">
                                     <input type="text" class="form-control" name="pengarang"/>
                                        </div>
                             </div>

                            <label for="">Penerbit</label>
                            <div class="form-group">
                                 <div class="form-line">
                                     <input type="text" class="form-control" name="penerbit"/>
                                        </div>
                             </div>

                            <label for="">Tahun</label>
                            <div class="form-group">
                              <select class="form-control" name="tahun">
                                               <?php 
                                               $tahun = date("Y");
                                               for ($i=$tahun-25; $i <= $tahun ; $i++) { 
                                                   echo ' <option value="'.$i.'">'.$i.'</option>';
                                               }

                                                ?>
                                            </select>
                                        </div>

                            <label for="">ISBN</label>
                            <div class="form-group">
                                 <div class="form-line">
                                     <input type="text" class="form-control" name="isbn"/>
                                        </div>
                             </div>

                            <label for="">Jumlah Buku</label>
                            <div class="form-group">
                                 <div class="form-line">
                                     <input type="num" class="form-control" name="jumlah"/>
                                        </div>
                             </div>

                            <label for="">Lokasi</label>
                            <div class="form-group">
                              <select class="form-control" name="lokasi">
                                                <option value="rak1">Rak 1</option>
                                                <option value="rak2">Rak 2</option>
                                                <option value="rak3">Rak 3</option>
                                            </select>
                                        </div>

                            <label for="">Tanggal Input</label>
                            <div class="form-group">
                                 <div class="form-line">
                                     <input type="date" class="form-control" name="tanggal"/>
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


   
  

 	$sql = $conn->query("INSERT INTO buku VALUES('','$judul','$pengarang','$penerbit','$tahun','$isbn','$jumlah','$lokasi','$tanggal')"); 

 	if($sql){
 		?>
 		<script type="text/javascript">alert('DAta Berhasil Disimpan'); window.location.href="?page=buku";</script>
 		<?php 
 		
 	}

 } ?>