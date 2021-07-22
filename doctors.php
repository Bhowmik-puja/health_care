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
<?php
require_once "header.php";
?>
<div>
    <nav>
        <a href="index.php"><span class="website-name">Health Care</span></a>

        <div class="navbar">
            <ul>
                <li>
                    <a href="index.php">Home</a>
                </li>
                <li>
                    <a href="doctors.php">Doctors</a>
                </li>
                <li>
                    <a href="#">Blood Bank</a>
                </li>
                <li>
                    <a href="<?php echo isset($_SESSION["userlogin"]) ? "appointment.php" : "login.php"; ?>">Appointment</a>
                </li>
                <?php if (!isset($_SESSION["userlogin"])) : ?>
                    <li>
                        <a href="login.php">Login</a>
                    </li>
                    <li>
                        <a href="patientReg.php">SignIn</a>
                    </li>
                <?php endif; ?>
                <?php 
                if (isset($_SESSION["userlogin"])) : ?>
                    <li>
                        <a href="logout.php">Logout</a>
                    </li>
                    <li>
                        <a class="btn" href="userProfile.php"> <i class='fas fa-user-circle'></i> <?php echo  $_SESSION['name']; ?></a>
                    </li>
                <?php endif; ?>

            </ul>
        </div>
    </nav>
</div>
<div style="text-align: center; font-size: 30px; margin-top:30px; margin-bottom:0;">
    <h>Available Doctors:</h>
</div>
<hr>

<div class="container">

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
<?php require_once "footer.php"; ?>