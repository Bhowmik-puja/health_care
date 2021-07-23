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
    $stmtIn = $pdo->prepare("INSERT INTO appointment (patientId,doctorId,doctorName,date,time, symptoms)
        VALUES (:patientId,:docId,:dName,:date,:time,:symp)
    ");
    $stmtIn->bindValue(':docId', $doctorId);
    $stmtIn->bindValue(':dName', $doctorName);
    $stmtIn->bindValue(':patientId', $patientId);
    $stmtIn->bindValue(':symp', $symptom);
    $stmtIn->bindValue(':date', $date);
    $stmtIn->bindValue(':time', $time);
    $stmtIn->execute();
    echo "<script> alert('appointment Booked');</script>";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Appointment</title>
</head>

<body>
    <h1>Book An Appointment</h1>
    <form action="" method="post">
        <label for="">Select Doctor</label>
        <select name="doctorid" id="">
            <?php foreach ($doctors as $doctor) : ?>
                <option value="<?php echo $doctor['id']; ?>">
                    <?php echo $doctor['name'];
                    echo " ; ";
                    echo $doctor['specialist']; ?>
                </option>
            <?php endforeach; ?>
        </select>
        <br><br>
        <label for="">Symptoms:</label>
        <textarea name="problems" id="" cols="30" rows="10" required></textarea> <br><br>
        <label for="">Select Date:</label>
        <input type="date" name="date" required>

        <br><br>
        <label for="">Select time:</label>
        <input type="time" name="time" required>
        <div>
            <input type="submit" name="submit">
        </div>

    </form>
</body>

</html>