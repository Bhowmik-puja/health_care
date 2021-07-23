<?PHP
session_start();
$pdo = require_once "database.php";
$stmt = $pdo->prepare('SELECT * FROM doctors ORDER BY email ');
$stmt->execute();
$doctors = $stmt->fetchAll(PDO::FETCH_ASSOC);
// echo '<pre>';
// var_dump($doctors);
// echo '</pre>';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>

    <script src="https://code.iconify.design/1/1.0.7/iconify.min.js"></script><!-- for blood icon -->

    <style>
        body {
            background-image: url(images/bg.jpg);
            background-position: center;
            background-size: cover;
        }
    </style>
    <title>Health Care</title>
</head>

<body>

    <?php include_once "navbar.php"; ?>

    <div style="text-align: center; font-size: 30px; margin-top:30px; margin-bottom:0;">
        <h>Available Doctors:</h>
    </div>
    <hr>
    <section>
        <div class="doc-container">

            <?php foreach ($doctors as $doctor) : ?>
                <div class="doctor-block">
                    <div class="block">
                        <img src="images/dummy.jpg" alt="">
                    </div>
                    <div class="block details">
                        <h3><?php echo $doctor['name']; ?></h3>
                        <h4>Email:<?php echo ' ' . $doctor['email']; ?></h4>
                        <h4>Phone:<?php echo ' ' . $doctor['phone']; ?></h4>
                        <h4><?php echo ' ' . $doctor['specialist']; ?></h4>
                        <h4><?php echo ' ' . $doctor['degree']; ?></h4>
                        <h4><?php echo ' ' . $doctor['chamber']; ?></h4>
                        <h4><?php echo ' ' . $doctor['presentStatus']; ?></h4>
                        <br>
                        <br>
                        <a href="">Book Appointment</a>
                    </div>

                </div>
            <?php endforeach; ?>

        </div>
    </section>

</body>

</html>