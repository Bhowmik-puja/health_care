<?PHP
session_start();
$pdo = require_once "database.php";
$stmt = $pdo->prepare('SELECT * FROM doctors ORDER BY email ');
$stmt->execute();
$doctors = $stmt->fetchAll(PDO::FETCH_ASSOC);
// echo '<pre>';
// var_dump($_SESSION['id']);
// echo '</pre>';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $doctorId = $_POST['doctorid'];
    $patientId = $_SESSION['id'];
    $symptom = $_POST['problems'];
    $date = $_POST['date'];
    $time = $_POST['time'];

    // find doctor name from doctors table and insert it to appointment table 
    $docStmt = $pdo->prepare('SELECT * FROM doctors where id = :docId');
    $docStmt->bindValue(':docId', $doctorId);
    $docStmt->execute();
    $docName = $docStmt->fetchAll();
    // fetch complete \\\
    $doctorName = $docName[0]['name'];
    $patientName = $_SESSION['name'].' '.$_SESSION['surname'];
    $stmtIn = $pdo->prepare("INSERT INTO appointment (patientId,doctorId,doctorName,patientName,date,time, symptoms)
        VALUES (:patientId,:docId,:dName,:pName,:date,:time,:symp)
    ");
    $stmtIn->bindValue(':docId', $doctorId);
    $stmtIn->bindValue(':dName', $doctorName);
    $stmtIn->bindValue(':pName', $patientName);
    $stmtIn->bindValue(':patientId', $patientId);
    $stmtIn->bindValue(':symp', $symptom);
    $stmtIn->bindValue(':date', $date);
    $stmtIn->bindValue(':time', $time);
    $stmtIn->execute();
    echo "<script> alert('appointment Booked');</script>";
    header("location: index.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/appointment.css">
    <!-- font link -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@300&display=swap" rel="stylesheet">
    <!-- font link -->
    <title>Book Appointment</title>
</head>

<body>
    <section class="header">
        <h2><a href="index.php">Health Care</a> </h2>
    </section>
    <div class="container">
        <div class="box">
            <h3>Book An Appointment</h3>
            <form action="" method="post">
                <div class="select">
                    <label for=""><b>Select Doctor</b> </label>
                    <select name="doctorid" id="">
                        <?php foreach ($doctors as $doctor) : ?>
                            <option value="<?php echo $doctor['id']; ?>">
                                <?php echo $doctor['name'];
                                echo " ; ";
                                echo $doctor['specialist']; ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="row">
                    <!-- <label for="">Date</label> -->
                    <input type="date" name="date" required>
                    <!-- <label for="">Time</label> -->
                    <input type="time" name="time" required>
                </div>

                <label for=""><b>Symptoms:</b> </label>
                <textarea name="problems" id="" cols="30" rows="10" required></textarea> <br><br>

                <div>
                    <input type="submit" name="submit">
                </div>

            </form>

        </div>

    </div>

</body>

</html>