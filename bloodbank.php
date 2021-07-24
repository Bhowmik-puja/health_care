<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        hr {
            margin-bottom: 50px;
        }

        section {
            width: 80%;
            margin: auto;
        }

        h1 {
            text-align: center;
            font-size: 30px;
        }

        q {
            margin-top: 35px;
            margin-left: 250px;
            font-size: 20px;
            color: brown;
        }

        .grid-container {
            display: grid;
            grid-template-columns: auto auto auto;
            background-color: red;
            padding: 50px;
            width: 50%;
            margin: auto;

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

    <!--  for navbar style -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">

    <title>Document</title>
</head>

<body>
    <header>
        <nav>
            <a href="index.php"><span class="website-name">Health Care</span></a>
            <q>Donate Blood Save Life</q>

            <div class="navbar">
                <ul>
                    <li>
                        <a href="donorReg.php"><b>Register As Donor</b> </a>
                    </li>
                </ul>
    </header>
    <hr>
    <section>
        <h2 style="text-align:center; margin-bottom:-40px">Search for blood</h2>

        <form action="" method="post">

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
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $pdo = require_once "database.php";
            $bg = $_POST['bg'];
            $stmt = $pdo->prepare("SELECT * FROM donors WHERE  bloodGrp= :bg");
            $stmt->bindValue(':bg', $bg);
            $stmt->execute();
            $donors = $stmt->fetchAll();
        }
        ?>

        <?php if (!empty($donors)) : ?>
            <h1>Available <?php echo ' "' . $donors[0]['bloodGrp'] . '" ' ?> Donor</h1><br>
            <table>
                <thead>
                    <th>no</th>
                    <th>name</th>
                    <th>contact</th>
                    <th>gender</th>
                    <th>address</th>
                </thead>
                <tbody>
                    <?php foreach ($donors as $i => $row) : ?>

                        <tr>
                            <th><?PHP echo $i + 1; ?></th>
                            <td><?php echo $row['name'] ?></td>
                            <td><?php echo $row['phone'] ?></td>
                            <td><?php echo $row['gender'] ?></td>
                            <td><?php echo $row['presentAdd'] ?></td>


                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>
        <?php if (empty($donors) && isset($bg)) : ?>
            <h1>Not a single <?php echo ' " ' . $bg . '" ' ?> donor available</h1>
        <?php endif; ?>
    </section>
</body>

</html>