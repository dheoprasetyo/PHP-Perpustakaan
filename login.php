<?php 
//ob_start();
session_start();
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
 $conn = new mysqli("localhost", "root", "", "perpus");
 if ($_SESSION['admin'] || $_SESSION['pegawai'] ) {
     header("location:index.php");
 }else{
  ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Halaman Login</title>
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

<body class="login-page">
    <div class="login-box">
        <div class="card">
            <div class="body">
                <form id="sign_in" method="POST">
                    <div class="msg">Masukkan Username dan Password</div>
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
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input type="password" class="form-control" name="password" placeholder="Password" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-4">
                            <input type="submit" name="login" value="Login" class="btn btn-block bg-pink waves-effect"  >
                        </div>
                    </div>
                   
                        
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
    <script src="js/pages/examples/sign-in.js"></script>
</body>

</html>
<?php 
    $username = $_POST['username'];
    $password = $_POST['password'];

    $login = $_POST['login']; 

    if($login) {
        $sql = $conn->query("SELECT * FROM user WHERE username = '$username' and password = '$password'");

        $ketemu = $sql->num_rows;
        $data = $sql->fetch_assoc();
        

        if($ketemu >=1){
            session_start();
            if($data['level']== "admin"){
                $_SESSION['admin'] = $data['id'];
                header("location:index.php");
            }else if ($data['level'] == "user"){
                 $_SESSION['pegawai'] = $data['id'];
                header("location:index.php");
            }
            }else{
        ?>
            <script type="text/javascript">alert("login gagal");</script>
            <?php 
    }
    }
            

} ?>