<?php
session_start();
if (!isset($_SESSION['id'])) {
    echo "Access Denied";
    exit();
} else {

    $pdo = require_once "database.php";
    $id = $_SESSION['id'];
    $stmt = $pdo->prepare("SELECT * FROM donors WHERE id = :id");
    $stmt->bindValue(':id', $id);
    $stmt->execute();
    $profile = $stmt->fetchAll();

    $name = $profile[0]['name'];
    $email = $profile[0]['email'];
    $phone = $profile[0]['phone'];
    $gender = $profile[0]['gender'];
    $dob = $profile[0]['dob'];
    $lod = $profile[0]['lastDonate'];
    $add = $profile[0]['address'];
    $city = $profile[0]['city'];

    if (isset($_GET['status'])) {
        $disable = "required";
    } else {
        $disable = "disabled";
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $name = $_POST['name'];
        $phone = $_POST['phone'];
        $dob = $_POST['dob'];
        $lod = $_POST['lod'];
        $add = $_POST['add'];
        $city = $_POST['city'];
        $stmt = $pdo->prepare("UPDATE donors SET name = :name, phone =:phone, dob=:dob, lastDonate=:lod, address=:add, city=:city WHERE id =:id");
        $stmt->bindValue(':name', $name);
        $stmt->bindValue(':phone', $phone);
        $stmt->bindValue(':dob', $dob);
        $stmt->bindValue(':lod', $lod);
        $stmt->bindValue(':add', $add);
        $stmt->bindValue(':city', $city);
        $stmt->bindValue(':id', $id);
        $stmt->execute();
        header('Location: donorProfile.php');
    }
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
    <link rel="stylesheet" href="css/donorProfile.css">
    <link rel="stylesheet" href="css/style.css">
    <title>doctor profile</title>
</head>

<body>
    <?php include_once "navbar.php" ?>
    <section class="myProfile">
        <h1>My profile</h1>
        <div class="details-box">
            <img src="images/donor.png" alt="">
        </div>
        <div class="details-box">
            <form method="post" enctype="multipart/form-data">
                <div class="single-input">
                    <span>Name:</span><input type="text" name="name" value="<?php echo $name; ?>" <?php echo $disable; ?>>
                </div>

                <div class="single-input">
                    <span>Email:</span><input type="text" name="email" value="<?php echo $email; ?>" disabled>
                </div>

                <div class="single-input">
                    <span>Contact Number: </span><input type="text" name="phone" value="<?php echo $phone; ?>" <?php echo $disable; ?>>
                </div>

                <div class="single-input">
                    <span>Gender:</span><input type="text" name="" value="<?php echo $gender; ?>" <?php echo $disable; ?>>
                </div>

                <div class="single-input">
                    <span>Date of Birth:</span><input type="date" name="dob" value="<?php echo $dob; ?>" <?php echo $disable; ?>>
                </div>
                <br>

                <div class="single-input">
                    <span>Age: </span> <?php
                                        $bday = new DateTime($profile[0]['dob']); // Your date of birth
                                        $today = new Datetime(date('m.d.y'));
                                        $diff = $today->diff($bday);
                                        echo $diff->y . " years";

                                        ?>
                </div>
                <br>

                <div class="single-input">
                    <span>Last date of donation:</span><input type="date" name="lod" value="<?php echo $lod; ?>" <?php echo $disable; ?>>
                </div>

                <div class="single-input">
                    <span>Address:</span><input type="text" name="add" value="<?php echo $add; ?>" <?php echo $disable; ?>>
                </div>

                <div class="single-input">
                    <span>City:</span><input type="text" name="city" value="<?php echo $city; ?>" <?php echo $disable; ?>>
                </div><br>

                <div class="btn_submit">
                    <a href="donorProfile.php?status=<?php echo "edit" ?>" class="btn btn-sm btn-outline-primary">Edit</a>
                
                    <input type="submit" name="submit" value="Save" id="" class="btn btn-success">
                </div>

        </form>
     </div>
    </section>
    <br>
</body>

</html>