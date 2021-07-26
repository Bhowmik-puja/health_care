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
            <img src="images/dummy.jpg" alt="">
        </div>
        <div class="details-box">
            <div>
                <span>Name:</span><?php echo ' ' . $profile[0]['name']; ?>
            </div>
            <div>
                <span>Email:</span><?php echo ' ' . $profile[0]['email']; ?> 
            </div>
            <div>
                <span>Contact Number: </span><?php echo ' ' . $profile[0]['phone']; ?> 
            </div>
            <div>
                <span>Gender:</span><?php echo ' ' . $profile[0]['gender']; ?>
            </div>
            <div>
                <span>Date of Birth:</span><?php echo ' ' . $profile[0]['dob']; ?> 
            </div>
            <!-- <div>
                <span>Age: </span>
            </div> -->
            <div>
                <span>Specialist:</span><?php echo ' ' . $profile[0]['specialist']; ?> 
            </div>
            <div>
                <span>Degree: </span><?php echo ' ' . $profile[0]['degree']; ?> 
            </div>
            <div>
                <span>Present Status: </span><?php echo ' ' . $profile[0]['presentStatus']; ?> 
            </div>
            <div>
                <span>BMDC Registration No:</span> <?php echo ' ' . $profile[0]['regNo']; ?> 
            </div>
            <div>
                <span>Workplace:</span> <?php echo ' ' . $profile[0]['workplace']; ?> 
            </div>
            <div>
                <span>Chamber for patients:  </span><?php echo ' ' . $profile[0]['chamber']; ?>
            </div>
            <div>
                <span>About Me: </span><?php echo ' ' . $profile[0]['about']; ?> 
            </div>
        </div>

        <div class="table-box">
            <table>
            <caption>Appointment Dashboard:</caption>
                <thead>
                    <tr>
                        <th scope="col">Serial</th>
                        <th scope="col">Patient Name</th>
                        <th scope="col">Date</th>
                        <th scope="col">time</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($appointments as $i => $row) : ?>
                        <tr>
                            <th><?PHP echo $i + 1; ?></th>
                            <td><?php echo $row['patientName'] ?></td>
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