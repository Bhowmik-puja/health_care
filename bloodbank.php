<?php
function calcutateAge($dob)
{

    $dob = date("Y-m-d", strtotime($dob));

    $dobObject = new DateTime($dob);
    $nowObject = new DateTime();

    $diff = $dobObject->diff($nowObject);

    return $diff->y;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        section {
            width: 80%;
            margin: auto;
        }
        h1{
            text-align: center;
            font-size: 30px;
        }

        .grid-container {
            display: grid;
            grid-template-columns: auto auto auto;
            background-color: red;
            padding: 50px;

        }

        .grid-item {

            background-color: white;
            border: 1px solid rgba(0, 0, 0, 0.8);
            padding: 20px;
            margin: 10px;
            font-size: 25px;
            text-align: center;
        }

        .donor {
            margin-top: 50px;
        }

        table,
        td,
        th {
            border: 1px solid red;
            text-align: center;
            font-size: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }
    </style>
    <title>Document</title>
</head>

<body>
    <section>
        
    </section>
    <section>
        <h2>Select Blood Group</h2>
        <form action="" method="get">

            <div class="grid-container">
                <input type="submit" name="bg" value="A+" class="grid-item">
                <input type="submit" name="bg" value="O+" class="grid-item">
                <input type="submit" name="bg" value="B+" class="grid-item">
                <input type="submit" name="bg" value="AB+" class="grid-item">
                <input type="submit" name="bg" value="A-" class="grid-item">
                <input type="submit" name="bg" value="O-" class="grid-item">
                <input type="submit" name="bg" value="B-" class="grid-item">
                <input type="submit" name="bg" value="AB-" class="grid-item">

            </div>
        </form>

    </section>
    <section class="donor">
        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {

            $pdo = require_once "database.php";
            $bg = $_GET['bg'];
            $stmt = $pdo->prepare("SELECT * FROM donors WHERE  bloodGrp= :bg");
            $stmt->bindValue(':bg', $bg);
            $stmt->execute();
            $donors = $stmt->fetchAll();
        }


        ?>

        <?php if (!empty($donors)) : ?>
           <h1>Available <?php echo ' "' . $donors[0]['bloodGrp'] . '" ' ?> Donor</h1> 
            <table>
                <thead>
                    <th>no</th>
                    <th>name</th>
                    <th>contact</th>
                    <th>gender</th>
                    <th>address</th>
                    <th>age</th>
                </thead>
                <tbody>
                    <?php foreach ($donors as $i => $row) : ?>

                        <tr>
                            <th><?PHP echo $i + 1; ?></th>
                            <td><?php echo $row['name'] ?></td>
                            <td><?php echo $row['phone'] ?></td>
                            <td><?php echo $row['gender'] ?></td>
                            <td><?php echo $row['presentAdd'] ?></td>
                            <td><?php
                                echo calcutateAge($row['dob']) ?></td>

                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>
        <?php if (empty($donors)) : ?>
            <h1 >Not a single <?php echo ' " ' . $bg . '" ' ?> donor available</h1>
        <?php endif; ?>
    </section>
</body>

</html>