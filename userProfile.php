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
}
// echo '<pre>';
// var_dump($profile);
// echo '</pre>';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div>
        <img src="images/dummy.jpg" alt="">
    </div>
    <div>
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
            <h4>Age: </h4>
        </div>
        <div>
            <h4>Address: <?php echo ' ' . $profile[0]['address']; ?> </h4>
        </div>
    </div>
</body>

</html>