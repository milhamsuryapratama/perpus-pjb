<?php session_start(); require_once("controller/dbcontroller.php"); ?>
<html>
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>LOGIN</title>
    <!-- Favicon-->
    <link rel="icon" href="adminBSB/favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="assets/adminBSB/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="assets/adminBSB/plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="assets/adminBSB/plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="assets/adminBSB/css/style.css" rel="stylesheet">
</head>

<body class="login-page">

    <?php  
        $db_handle = new DBController();

        if (isset($_POST['login'])) {
            $usr = $_POST['username'];
            $pwd = md5($_POST['password']);

            $sql = "SELECT * from tb_user WHERE nama = '$usr' AND password = '$pwd' ";
            $i = $db_handle->numRows($sql);

            if ($i > 0) {
                $row = $db_handle->runQueryById($sql);
                $_SESSION["nama"] = $row['nama'];
                $_SESSION['id'] = $row['id'];
                $_SESSION['role'] = $row['role'];
                $_SESSION['login_user'] = true;
                header("Location: administrator/home.php?page=dashboard");
                
            } else {
                echo "GAGAL";
            }

        }
    ?>

    <div class="login-box">
        <div class="card">
            <div class="body">
                <form id="sign_in" method="POST">
                    <div align="center"><img src="assets/img/PJB_LOGO.jpg" width="100" style="margin-bottom: 30px"></div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                        <div class="form-line">
                            <input type="text" class="form-control" name="username" placeholder="ID Karyawan" required autofocus>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-4">
                            <!-- <button class="btn btn-block bg-pink waves-effect" type="submit">SIGN IN</button> -->
                            <button type="submit" name="login" class="btn btn-block bg-pink waves-effect">Login</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Jquery Core Js -->
    <script src="assets/adminBSB/plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="assets/adminBSB/plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="assets/adminBSB/plugins/node-waves/waves.js"></script>

    <!-- Validation Plugin Js -->
    <script src="assets/adminBSB/plugins/jquery-validation/jquery.validate.js"></script>

    <!-- Custom Js -->
    <script src="assets/adminBSB/js/admin.js"></script>
    <script src="assets/adminBSB/js/pages/examples/sign-in.js"></script>
</body>

</html>