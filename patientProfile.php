<?php
session_start();
if (!isset($_SESSION['id'])) {
    echo "Access Denied";
    exit();
} else {

    $pdo = require_once "database.php";
    $id = $_SESSION['id'];
    $stmt = $pdo->prepare("SELECT * FROM patients WHERE id = :id");
    $stmt->bindValue(':id', $id);
    $stmt->execute();
    $profile = $stmt->fetchAll(PDO::FETCH_ORI_FIRST);
    $patientId = $id;
    $stmt2 = $pdo->prepare("SELECT * FROM appointment WHERE patientId = :id");
    $stmt2->bindValue(':id', $patientId);
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
    <title>Patient Profile</title>
</head>

<body>
    <section class="myProfile">
    <h1>My profile</h1>
    <div class="details-box">
        <img src="images/demoPatient.jpg" alt="">
    </div>

    <div class="details-box">
        <div>
            <h4>Name:<?php echo ' ' . $profile[0]['firstName'] . ' ' . $profile[0]['lastName']; ?> </h4>
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
            <h4>Blood Group: <?php echo ' ' . $profile[0]['bloodGrp']; ?></h4>
        </div>
        <div>
            <h4>Date of Birth:<?php echo ' ' . $profile[0]['dob']; ?> </h4>
        </div>
        <div>
            <h4>Age: <?php
                                $bday = new DateTime($profile[0]['dob']); // Your date of birth
                                $today = new Datetime(date('m.d.y'));
                                $diff = $today->diff($bday);
                                printf('%d years, %d month, %d days', $diff->y, $diff->m, $diff->d);
                             
                                ?> </h4>
        </div>
        <div>
            <h4>Address: <?php echo ' ' . $profile[0]['address']; ?> </h4>
        </div>
    </div>

    <div class="table-box">
        <table class="table">
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
</body>

</html>