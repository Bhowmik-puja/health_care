<?php
$pdo = require_once "database.php";


if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $telephone = $_POST['telephone'];
    $gender = $_POST['gender'];
    $bloodGrp = $_POST['bloodgrp'];
    $dob = $_POST['dob'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $district = $_POST['district'];
    // $image = $_POST['image'];
    $password = $_POST['password'];
    //  check if email already exist or not \\
    $stmthandler = $pdo->prepare("SELECT * FROM patients WHERE email = :email");
    $stmthandler->bindValue(':email', $email);
    $stmthandler->execute();

    if ($stmthandler->rowCount() > 0) {
        echo "<script>alert('This email is already exists!!!!');</script>";
    } else {



        $stmt = $pdo->prepare("INSERT INTO patients (firstName,lastName,email,phone,telephone, gender, bloodGrp, dob,address,city,district,image,password) 
                             VALUES (:firstName,:lastName,:email,:phone,:telephone,:gender,:bloodGrp,:dob,:address,:city,:district,:image,:password)");

        $stmt->bindValue(':firstName', $firstName);
        $stmt->bindValue(':lastName', $lastName);
        $stmt->bindValue(':email', $email);
        $stmt->bindValue(':phone', $phone);
        $stmt->bindValue(':telephone', $telephone);
        $stmt->bindValue(':gender', $gender);
        $stmt->bindValue(':bloodGrp', $bloodGrp);
        $stmt->bindValue(':dob', $dob);
        $stmt->bindValue(':address', $address);
        $stmt->bindValue(':city', $city);
        $stmt->bindValue(':district', $district);
        $stmt->bindValue(':image', ' ');
        $stmt->bindValue(':password', $password);
        $stmt->execute(header('location:patientlogin.php'));
    }
    // 
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="text/javascript" src="validation.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/patientReg.css">
    <!-- for font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <title>Registration Form</title>
</head>


<body>

    <?php include_once "navbar.php" ?>


    <div class="container">

        <form action="" onsubmit="return checkInputs()" method="post" autocomplete="on">

            <div class="heading">
                <h3>Register as Patient</h3>
            </div>

            <div class="two-field">
                <input id="fname" type="text" name="firstName" placeholder="First Name" required>
                <input type="text" name="lastName" placeholder="Last Name" required>
            </div>

            <div class="email">
                <input type="email" name="email" placeholder="Email" required>
            </div>

            <div class="two-field">
                <input type="text" name="phone" placeholder="Phone ">
                <input type="text" name="telephone" placeholder="Telephone">
            </div>

            <div class="gender">
                <input type="radio" name="gender" value="male" id="Male">Male
                <input type="radio" name="gender" value="female" id="Female">female
                <input type="radio" name="gender" value="other" id="Other">other

                <select name="bloodgrp" class="blood_group">
                    <option value="A+">Blood Group :&ensp; A+</option>
                    <option value="O+">Blood Group :&ensp; O+</option>
                    <option value="B+">Blood Group :&ensp; B+</option>
                    <option value="AB+">Blood Group :&ensp; AB+</option>
                    <option value="A-">Blood Group :&ensp; A-</option>
                    <option value="O-">Blood Group :&ensp; O-</option>
                    <option value="B-">Blood Group :&ensp; B-</option>
                    <option value="AB-">Blood Group :&ensp; AB-</option>
                </select>

            </div>

            <div class="dob">
                <span class="child_dob">Date of Birth</span>
                <input class="date_input" type="date" name="dob" required>
            </div>


            <div class="email">
                <input rows="4" cols="66" name="address" placeholder="Enter your Address">
            </div>

            <div class="two-field">
                <input type="text" name="city" placeholder="City/village" required>
                <input type="text" name="district" placeholder="District" required>
            </div>

            <div class="two-field">
                <span style="font-size: 20px;" class="child_dob">Enter password:&nbsp;&nbsp;&nbsp;</span>
                <input type="password" name="password" id="password" required>
                <small id="error"></small>
            </div>
            <div class="two-field">
                <span style="font-size: 20px;">Retype Password:</span>
                <input type="password" name="cpassword" id="cpassword" required>
                <small id="error2"></small>
            </div>
            <div class="btn">
                <input class="btn_submit" type="submit" value="Submit">

            </div>


            <hr class="horiz">


            <div class="link_field">
                <a href="doctorReg.php"> or Register As Doctor</a>


            </div>
            <div style="font-size: 20px;">
                <p>Already Have an Account?<a id="last-link" href="patientlogin.php">Login here</a></p>
            </div>


        </form>

    </div>
</body>

</html>