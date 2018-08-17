            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                               Tambah Pengguna
                            </h2>
                        </div>

                           <div class="body">
                           <form method="POST" enctype="multipart/form-data" >
                           	<label for="">Username</label>
                            <div class="form-group">
                                 <div class="form-line">
                                     <input type="text" class="form-control" name="username"/>
                                        </div>
                                    </div>

                            <label for="">Nama</label>
                            <div class="form-group">
                                 <div class="form-line">
                                     <input type="text" class="form-control" name="nama"/>
                                        </div>
                             </div>

                            <label for="">Password</label>
                            <div class="form-group">
                                 <div class="form-line">
                                     <input type="password" class="form-control" name="password"/>
                                        </div>
                                    </div>

                            <label for="">Level</label>
                            <div class="form-group">
                            <div class="form-line">
                                    <select name="level" class="form-control show-tick">
                                        <option value="">-- Pilih satuan --</option>
                                        <option value="admin">Admin</option>
                                        <option value="pegawai">Pegawai</option>
                                    </select>
                            </div>


                            <label for="">Foto</label>
                            <div class="form-group">
                                 <div class="form-line">
                                     <input type="file" class="form-control" name="foto"/>
                                        </div>
                                    </div>

                           

                           

                            <input type="submit" name="simpan" value="Simpan" class="btn btn-primary">
                                </form>

<?php 
if (isset($_POST['simpan'])) {
    $username = $_POST['username'];
 	$nama = $_POST['nama'];
 	$password = $_POST['password'];
    $level = $_POST['level'];
    //$password = mysqli_real_escape_string($conn,$data["password"]);
    //$password = password_hash($password, PASSWORD_DEFAULT );
 	$foto = $_FILES['foto']['name'];
    $lokasi = $_FILES['foto']['tmp_name'];;
    $upload = move_uploaded_file($lokasi, "images/".$foto);

    if($upload){

 	$sql = $conn->query("INSERT INTO user VALUES ('','$username','$nama','$password','$level','$foto')");

 	if($sql){
 		?>
 		<script type="text/javascript">alert('DAta Berhasil Disimpan'); window.location.href="?page=pengguna";</script>
 		<?php 
 		
 	}

 } 
}?>