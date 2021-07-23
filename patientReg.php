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
        $stmt->execute(header('location:login.php'));
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/regForm.css">
    <script type="text/javascript" src="validation.js"></script>
    <link rel="stylesheet" href="css/patientReg.css">
    <title>Registration Form</title>
</head>


<body>
    <div class="container">
        <form action="" onsubmit="return checkInputs()" method="post" autocomplete="on">

            <div class="heading">
                 <h2>Register as Doctor</h2> 
                  Create a account free  
            </div>
            
            <div class="single-input">
                <input type="text" name="fname" placeholder="Full Name" required>
            </div>

            <div class="email">
                <input style="margin-left: 26px;" type="email" name="email" placeholder="Email" required>
                <input type="text" name="phone" placeholder="Phone Number" required>
            </div>

            <div class="gender">
                <span>Gender</span>
                <input type="radio" name="gender" value="male" id="male" required>Male
                <input type="radio" name="gender" value="female" id="female" required>female
                <input type="radio" name="gender" value="other" id="other" required>other
            </div>

            <div class="dob">
                <span>Date of Birth :</span>
                <input type="date" name="dob" required>
            </div>

            <div class="single-input">
                <input type="text" name="specialist" placeholder="Specialist" required>
            </div>

            <div class="single-input">
                <input type="text" name="degree" placeholder="degree" required>
            </div>

            <div class="single-input">
                <input type="text" name="status" placeholder="Present Status" required>
            </div>

            <div class="single-input">
                <input type="text" name="regNo" placeholder="BMDC Registration No" required>
            </div>

            <div class="single-input">
                <input type="text" name="workplace" placeholder="Present Work Place" required>
            </div>

            <div class="single-input">
                <input type="text" name="chamber" placeholder="Place to see Patient" required>
            </div>

            <div class="about">
                <textarea rows="6" cols="53" name="about" placeholder="Say Saysomething about You" required></textarea>
            </div>

            <div class="image_upload">
                <label for="img">Select image:</label>
                <input type="file" name="image" id="doctor_img">
            </div>
            <div class="single-input">
                <input type="password" name="password" id="password" placeholder="New password" required>
                <small id="error"></small>
            </div>
            <div class="single-input">
                <input type="password" name="cpassword" id="cpassword" placeholder="Confirm Password" required>
                <small id="error2"></small>
            </div>


            <input class="btn_submit" type="submit" value="Submit" name="submit">

        </form>

    </div>
</body>

</html>