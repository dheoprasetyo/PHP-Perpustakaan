<?php 
 $conn = new mysqli("localhost", "root", "", "perpus");
 error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
 ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Perpustakaan</title>
    <!-- Favicon-->
    <link rel="icon" href="favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body class="signup-page">
    <div class="signup-box">
        <div class="logo">
            <a href="javascript:void(0);"><b>Selamat Datang</b></a>
            <small>Aplikasi Perpustakaan</small>
        </div>
        <div class="card">
            <div class="body">
                <form id="sign_up" method="POST" enctype="multipart/form-data">
                    <div class="msg">Registrasi Pengguna Baru</div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                        <div class="form-line">
                            <input type="text" class="form-control" name="username" placeholder="Username" required autofocus>
                        </div>
                    </div>

                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">account_circle</i>
                        </span>
                        <div class="form-line">
                            <input type="text" class="form-control" name="nama" placeholder="nama" required autofocus>
                        </div>
                    </div>

                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input type="password" class="form-control" name="password" minlength="6" placeholder="Password" required>
                        </div>
                    </div>
                    
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">list</i>
                        </span>
                        <div class="form-line">
                            <select name="level" class="form-control show-tick">
                                        <option value="">-- Pilih satuan --</option>
                                        <option value="admin">Admin</option>
                                        <option value="pegawai">Pegawai</option>
                            </select>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">add_a_photo</i>
                        </span>
                        <div class="form-line">
                            <input type="file" class="form-control" name="foto"/>
                        </div>
                    </div>




                    
                    <!-- <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input type="password" class="form-control" name="password2" minlength="6" placeholder="Confirm Password" required>
                        </div>
                    </div> -->

                    <input type="submit" name="daftar" value="Daftar" class="btn btn-block bg-pink waves-effect"  >

                    <div class="m-t-25 m-b--5 align-center">
                        <a href="login.php">You already have a membership?</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Jquery Core Js -->
    <script src="plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="plugins/node-waves/waves.js"></script>

    <!-- Validation Plugin Js -->
    <script src="plugins/jquery-validation/jquery.validate.js"></script>

    <!-- Custom Js -->
    <script src="js/admin.js"></script>
    <script src="js/pages/examples/sign-up.js"></script>
</body>

</html>
<?php 
if (isset($_POST['daftar'])) {
    $username = $_POST['username'];
    // $password =$_POST['password'];
    
    // $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
    $nama = $_POST['nama'];
   
    // $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
    // $password2 = mysqli_real_escape_string($conn,$_POST['password2']);
    $level = $_POST['level'];
    $foto = $_FILES['foto']['name'];
    $lokasi = $_FILES['foto']['tmp_name'];
    $upload = move_uploaded_file($lokasi, "images/".$foto);
    
    if($upload){

    $sql = $conn->query("INSERT INTO user VALUES ('','$username','$password','$nama','$level','$foto')");

    if($sql){
        ?>
        <script type="text/javascript">alert('DAta Berhasil Disimpan'); window.location.href="login.php";</script>
        <?php 
        
    }

 } 
}?>