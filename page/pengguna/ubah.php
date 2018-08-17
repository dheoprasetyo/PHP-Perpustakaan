<?php 
 $id = $_GET['id'];
$sql2 = $conn->query("SELECT * FROM user WHERE id ='$id'");
 $rows = $sql2->fetch_assoc();
 $level = $rows['level'];
 ?>            
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
                                     <input type="text" class="form-control" value="<?=$rows['username']; ?>" name="username"/>
                                        </div>
                                    </div>

                            <label for="">Nama</label>
                            <div class="form-group">
                                 <div class="form-line">
                                     <input type="text" class="form-control" value="<?=$rows['nama']; ?>" name="nama"/>
                                        </div>
                             </div>


                            <label for="">Level</label>
                            <div class="form-group">
                            <div class="form-line">
                                    <select name="level" class="form-control show-tick">
                                        
                                       <option value="admin" <?php if($level =='admin'){ echo "selected";} ?>>admin</option>
                                        <option value="pegawai" <?php if($level =='pegawai'){ echo "selected";} ?> >Pegawai</option>
                                    </select>
                            </div>


                            <label for="">Foto</label>
                            <div class="form-group">
                                 <div class="form-line">
                                     <img src="images/<?= $rows['foto']; ?>" width = "100" height = "100">
                                        </div>
                                    </div>

                             <label for="">GAnti Foto</label>
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
    $level = $_POST['level'];
    $foto = $_FILES['foto']['name'];
    $lokasi = $_FILES['foto']['tmp_name'];;
   

    if(!empty($lokasi)){
         $upload = move_uploaded_file($lokasi, "images/".$foto);

    $sql = $conn->query("UPDATE user SET username = '$username', nama ='$nama',level ='$level',foto ='$foto' WHERE id = '$id'");

    if($sql){
        ?>
        <script type="text/javascript">alert('DAta Berhasil Diubah'); window.location.href="?page=pengguna";</script>
        <?php 
        
    }

}else{

    $sql = $conn->query("UPDATE user SET username = '$username',nama ='$nama',level ='$level'WHERE id = '$id'");

    if($sql){
        ?>
        <script type="text/javascript">alert('DAta Berhasil Diubah'); window.location.href="?page=pengguna";</script>
        <?php 
        
    }
}
}
    ?>