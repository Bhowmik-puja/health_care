<?php
session_start();
if (!isset($_SESSION['userlogin'])) {
    echo "Access Denied";
    exit();
} else {
    $pdo = require_once "database.php";
    $stmt = $pdo->prepare('SELECT * FROM doctors ORDER BY id ');
    $stmt->execute();
    $doctors = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $stmt = $pdo->prepare('SELECT * FROM patients ORDER BY id ');
    $stmt->execute();
    $patients=$stmt->fetchAll(PDO::FETCH_ASSOC);
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        table,
        td,
        th {
            border: 1px solid black;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }
    </style>
    <title>Document</title>
</head>

<body>
    <h1>Admin Dashboard</h1>
    <hr>
    <div>
        <h3 style="text-align: center;">All Registered Doctors:</h3>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Gender</th>
                    <th scope="col">BMDC Registration No</th>
                    <th scope="col">Specialist</th>
                    <th scope="col">Degree</th>
                    <th scope="col">Workplace</th>
                    <th scope="col">Chamber</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($doctors as $i => $row) : ?>
                    <tr>
                        <th><?PHP echo $i + 1; ?></th>
                        <td><?php echo $row['name'] ?></td>
                        <td><?php echo $row['email'] ?></td>
                        <td><?php echo $row['phone'] ?></td>
                        <td><?php echo $row['gender'] ?></td>
                        <td><?php echo $row['regNo'] ?></td>
                        <td><?php echo $row['specialist'] ?></td>
                        <td><?php echo $row['degree'] ?></td>
                        <td><?php echo $row['workplace'] ?></td>
                        <td><?php echo $row['chamber'] ?></td>

                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

<div style="height: 100px;">

</div>

<div>
        <h3 style="text-align: center;">All Registered Patients:</h3>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Gender</th>
                    <th scope="col">Blood Group</th>
                    <th scope="col">Date of Birth</th>
                    <th scope="col">Address</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($patients as $i => $row) : ?>
                    <tr>
                        <th><?PHP echo $i + 1; ?></th>
                        <td><?php echo $row['firstName'].' '.$row['lastName']; ?></td>
                        <td><?php echo $row['email'] ?></td>
                        <td><?php echo $row['phone'] ?></td>
                        <td><?php echo $row['gender'] ?></td>
                        <td><?php echo $row['bloodGrp'] ?></td>
                        <td><?php echo $row['dob'] ?></td>
                        <td><?php echo $row['address'].' , '.$row['city'] ?></td>
                        

                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

</body>

</html>