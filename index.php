<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="fonts/icomoon/style.css">

    <link rel="stylesheet" href="css/owl.carousel.min.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Style -->
    <link rel="stylesheet" href="css/style.css">

    <title>Login</title>
</head>

<body>

    <?php
    $error_message = ''; // Menyimpan pesan error jika ada

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $username = $_POST['username'];
        $password = $_POST['password'];

        // Memeriksa apakah username atau password kosong
        if (empty($username) || empty($password)) {
            $error_message = 'Username dan password harus diisi.';
        } elseif ($username == "admin" && $password == "admin") {
            // Jika username dan password benar, arahkan ke home.php
            header("Location: home.php");
            exit;
        } else {
            // Jika username atau password salah
            $error_message = 'Username atau password salah.';
        }
    }
    ?>

    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <img src="images/logo.jpg" alt="Image" class="img-fluid">
                </div>
                <div class="col-md-6 contents">
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <div class="mb-4">
                                <h1><b>L O G I N</b></h1>
                                <p class="mb-4">DASHBOARD ADVENTURE WORK</p>
                            </div>

                            <!-- Menampilkan pesan error jika ada -->
                            <?php if ($error_message): ?>
                            <div class="alert alert-danger" role="alert">
                                <?php echo $error_message; ?>
                            </div>
                            <?php endif; ?>

                            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                                <p style="color: black;">Username :</p>
                                <div class="form-group first">
                                    <label for="username">Username</label>
                                    <input type="text" class="form-control" id="username" name="username"
                                        value="<?php echo isset($username) ? htmlspecialchars($username) : ''; ?>">
                                </div>

                                <p style="color: black;">Password :</p>
                                <div class="form-group last mb-4">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control" id="password" name="password">
                                </div>

                                <input type="submit" value="Login" class="btn btn-block btn-success">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer class=" bg-body-tertiary text-center text-lg-start">
        <!-- Copyright -->
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.05);">
            © 2024 Copyright:
            <a class="text-body" href="">Final Projek DWO (Fathur - Faris)</a>
        </div>
        <!-- Copyright -->
    </footer>

    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
</body>

</html>