<?php
session_start();
if (!isset($_SESSION['id'])) {
    echo "Access Denied";
    exit();
} else {

    $pdo = require_once "database.php";
    $id = $_SESSION['id'];
    $stmt = $pdo->prepare("SELECT * FROM doctors WHERE id = :id");
    $stmt->bindValue(':id', $id);
    $stmt->execute();
    $profile = $stmt->fetchAll(PDO::FETCH_ORI_FIRST);
    $stmt2 = $pdo->prepare("SELECT * FROM appointment WHERE doctorId = :id");
    $stmt2->bindValue(':id', $id);
    $stmt2->execute();
    $appointments = $stmt2->fetchAll();
}
// echo '<pre>';
// var_dump($appointments);
// echo '</pre>';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/doctorProfile.css">
    <title>doctor profile</title>
</head>

<body>
<section class="myProfile">
        <h1>My profile</h1>
        <div class="details-box">
            <img src="images/demo.png" alt="">
        </div>
        <div class="details-box">
            <div>
                <h4>Name:<?php echo ' ' . $profile[0]['name']; ?> </h4>
            </div>
            <div>
                <h4>Email:<?php echo ' ' . $profile[0]['email']; ?> </h4>
            </div>
            <div>
                <h4>Contact Number: <?php echo ' ' . $profile[0]['phone']; ?> </h4>
            </div>
            <div>
                <h4>Gender:<b><?php echo ' ' . $profile[0]['gender']; ?></b> </h4>
            </div>
            <div>
                <h4>Date of Birth:<?php echo ' ' . $profile[0]['dob']; ?> </h4>
            </div>
            <!-- <div>
                <h4>Age: </h4>
            </div> -->
            <div>
                <h4>Specialist:<?php echo ' ' . $profile[0]['specialist']; ?> </h4>
            </div>
            <div>
                <h4>Degree: <?php echo ' ' . $profile[0]['degree']; ?> </h4>
            </div>
            <div>
                <h4>Present Status: <?php echo ' ' . $profile[0]['presentStatus']; ?> </h4>
            </div>
            <div>
                <h4>BMDC Registration No: <?php echo ' ' . $profile[0]['regNo']; ?> </h4>
            </div>
            <div>
                <h4>Workplace: <?php echo ' ' . $profile[0]['workplace']; ?> </h4>
            </div>
            <div>
                <h4>Chamber for patients: <?php echo ' ' . $profile[0]['chamber']; ?> </h4>
            </div>
            <div>
                <h4>About Me: <?php echo ' ' . $profile[0]['about']; ?> </h4>
            </div>
        </div>

        <div class="table-box">
            <table>
            <caption>Appointment Dashboard:</caption>
                <thead>
                    <tr>
                        <th scope="col">Serial</th>
                        <th scope="col">Doctor Name</th>
                        <th scope="col">Date</th>
                        <th scope="col">time</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($appointments as $i => $row) : ?>
                        <tr>
                            <th><?PHP echo $i + 1; ?></th>
                            <td><?php echo $row['doctorName'] ?></td>
                            <td><?php echo $row['date'] ?></td>
                            <td><?php echo $row['time'] ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </section>
    <br>
</body>

</html>