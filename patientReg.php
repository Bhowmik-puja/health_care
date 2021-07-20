<?php
$pdo= require_once"database.php";
echo '<pre>';
var_dump($_POST);
echo '</pre>';
if($_SERVER['REQUEST_METHOD']=='POST'){

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

$stmt = $pdo->prepare("INSERT INTO patients (firstName,lastName,email,phone,telephone, gender, bloodGrp, dob,address,city,district,image,password) VALUES (:firstName,:lastName,:email,:phone,:telephone,:gender,:bloodGrp,:dob,:address,:city,:district,:image,:password)");

$stmt->bindValue(':firstName',$firstName);
$stmt->bindValue(':lastName',$lastName);
$stmt->bindValue(':email',$email);
$stmt->bindValue(':phone',$phone);
$stmt->bindValue(':telephone',$telephone);
$stmt->bindValue(':gender',$gender);
$stmt->bindValue(':bloodGrp',$bloodGrp);
$stmt->bindValue(':dob',$dob);
$stmt->bindValue(':address',$address);
$stmt->bindValue(':city',$city);
$stmt->bindValue(':district',$district);
$stmt->bindValue(':image',' ');
$stmt->bindValue(':password',$password);
$stmt->execute();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="regForm.css">
    <title>Document</title>
</head>

<body>
    <section class="main">
        <form action="" method="post">
            <h1>Register as Patient</h1>
            <p>Please fill in the form to create an account</p>
            <hr>
            <label for="fname"></label>
            <input type="text" placeholder="First Name" name="firstName">
            <input type="text" placeholder="Last Name" name="lastName"><br>
            <input type="text" placeholder="Email" name="email"><br>
            <input type="text" placeholder="Phone" name="phone">
            <input type="text" placeholder="telephone" name="telephone"><br>
            <span>Gender</span>
            <input type="radio" name="gender"  value = "male"id="male">Male
            <input type="radio" name="gender" value="female" id="female">female
            <input type="radio" name="gender" value="other" id="other">other
            <br>
            <span>Blood Group</span>
            <select  name="bloodgrp" >
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
            <input type="date" name="dob">
            <br>
            <textarea type="text" placeholder="address" name="address"></textarea>
            <input type="text" placeholder="city" name="city">
            <input type="text" placeholder="district" name="district">
            <br>
            <label>Add an Image:</label>
            <input type="file" name="image"> 
            <br>
            <label for="">Password</label>
            <input type="password" name="password">
            <br>
            <label for="">Confirm Password</label>
            <input type="password" name="password">
            <br>
            <input type="submit" name="submit">
        </form>
    </section>
</body>

</html>