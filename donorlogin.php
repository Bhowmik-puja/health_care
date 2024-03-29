<?php
session_start();
$pdo = require_once "database.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $pass = ($_POST['password']);
    $stmt = $pdo->prepare("SELECT * FROM donors WHERE email = :email AND password = :password");
    $stmt->bindValue(':email', $email);
    $stmt->bindValue(':password', $pass);
    $stmt->execute();
    $profiles = $stmt->fetchAll();
    // echo '<pre>';
    // var_dump($profiles[0]['id']);
    // echo '</pre>';

    if ($stmt->rowCount() > 0) {
        $_SESSION['userlogin'] = 3;
        $_SESSION['name'] = $profiles[0]['name'];
        $_SESSION['id'] = $profiles[0]['id'];
       
        header("location: index.php ");
    } else {
        echo "<script>alert('Invalid email or password')</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="css/login.css">
    <!-- <script defer src="login.js"></script> -->
    <title>Login</title>
</head>

<body>
    <div id="login">
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                        <form id="login-form" class="form" action="" method="post">
                            <h3 class="text-center text-info">Login (Donor)</h3>
                            <div class="form-group">
                                <label for="username" class="text-info">Email:</label><br>
                                <input type="email" name="email" id="email" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="password" class="text-info">Password:</label><br>
                                <input type="password" name="password" id="password" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <br>
                                <input type="submit" name="submit" class="btn btn-info btn-md" value="submit"><br>
                                <span></span><a href="bloodbank.php">Back to home</a>
                            </div>
                            <div id="register-link" class="text-right">
                                <span>Don't have an account?</span>
                                <a href="donorReg.php" class="text-info">Register here</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>