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
    <title>Registration Form</title>
</head>

<body>
    <section class="main">
        <form action="" onsubmit="return checkInputs()" method="post" autocomplete="on">
            <h1>Register as Patient</h1>
            <p>Please fill in the form to create an account</p>
            <hr>
            <label for="fname"></label>
            <input type="text" placeholder="First Name" name="firstName" required>
            <input type="text" placeholder="Last Name" name="lastName" required><br>
            <input type="email" placeholder="Email" name="email" required><br>
            <input type="tel" placeholder="Phone" name="phone" required>
            <input type="text" placeholder="telephone" name="telephone"><br>
            <span>Gender</span>
            <input type="radio" name="gender" value="male">Male
            <input type="radio" name="gender" value="female">female
            <input type="radio" name="gender" value="other" checked>other
            <br>
            <span>Blood Group</span>
            <select name="bloodgrp">
                <option value="A+">A+</option>
                <option value="O+">O+</option>
                <option value="B+">B+</option>
                <option value="AB+">AB+</option>
                <option value="A-">A-</option>
                <option value="O-">O-</option>
                <option value="B-">B-</option>
                <option value="AB-">AB-</option>
            </select>
            <br>
            <span>Date of Birth</span>
            <input type="date" name="dob" required>
            <br>
            <textarea type="text" placeholder="address" name="address" required></textarea>
            <input type="text" placeholder="city" name="city" required>
            <input type="text" placeholder="district" name="district" required>
            <br>
            <label>Add an Image:</label>
            <input type="file" name="image">
            <br>
            <div class="form-control">
                <label for="">Password</label>
                <input type="password" name="password" id="password" required>
                <small id="error"></small>
            </div>
            <div class="form-control">
                <label for="">Confirm Password</label>
                <input type="password" name="cpassword" id="cpassword" required>
                <small id="error2"></small>
            </div>
            <input type="submit" value="submit" class="btn">
            <a href="doctorReg.php"> or Register As Doctor</a> <br>
            <a href="donorReg.php"> or Register As Donor</a>
        </form>
    </section>
</body>

</html>