<?php
$pdo = require_once "database.php";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $fName = $_POST['fname'];
    $lName = $_POST['lname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $gender = $_POST['gender'];
    $dob = $_POST['date'];
    $specialist = $_POST['specialist'];
    $deg = $_POST['degree'];
    $status = $_POST['status'];
    $regNo = $_POST['regNo'];
    $workplace = $_POST['workplace'];
    $chamber = $_POST['chamber'];
    $about = $_POST['about'];
    $image = '';

    $stmt = $pdo->prepare("INSERT INTO doctors (fName,lName,email,phone,gender,dob,specialist,degree,presentStatus,regNo,workplace,chamber,about,image ) 
                                            VALUES (:fn,:ln,:email,:phone,:gender,:dob,:specialist,:deg,:status,:reg,:workplace,:chamber,:about,:image)");

    $stmt->bindValue('fn',$fName);
    $stmt->bindValue(':ln',$lName);
    $stmt->bindValue(':email',$email);
    $stmt->bindValue(':phone',$phone);
    $stmt->bindValue(':gender',$gender);
    $stmt->bindValue(':dob',$dob);
    $stmt->bindValue(':specialist',$specialist);
    $stmt->bindValue(':deg',$deg);
    $stmt->bindValue(':status',$status);
    $stmt->bindValue(':reg',$regNo);
    $stmt->bindValue(':workplace',$workplace);
    $stmt->bindValue(':chamber',$chamber);
    $stmt->bindValue(':about',$about);
    $stmt->bindValue(':image','');
    $stmt->execute(header('location:login.php'));
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor Registation Form</title>
    <style>
        * {
            margin: 5px;
            padding: 2px;
        }
    </style>
</head>

<body>
    <div class="main">
        <div class="heading">
            Register as Patient <br>
            Create a account free
        </div>

        <form action="" method="post">
            <div class="name_child">
                <input type="text" name="fname" placeholder="First Name">
                <input type="text" name="lname" placeholder="Last Name">
            </div>

            <div class="email">
                <input type="text" name="email" placeholder="Email">
                <input type="text" name="phone" placeholder="Phone Number">
            </div>

            <div class="gender">
                <span>Gender</span>
                <input type="radio" name="gender" value="male" id="male">Male
                <input type="radio" name="gender" value="female" id="female">female
                <input type="radio" name="gender" value="other" id="other">other
            </div>

            <div class="dof">
                <span>Date of Birth</span>
                <input type="number" id="d" name="date" min="1" max="31" placeholder="day">
                <input type="number" id="m" name="date" min="1" max="12" placeholder="month">
                <input type="number" id="y" name="date" min="1900" max="9999" placeholder="year">
            </div>

            <div class="specialist">
                <input type="text" name="specialist" placeholder="Specialist">
            </div>

            <div class="degree">
                <input type="text" name="degree" placeholder="degree">
            </div>

            <div class="present_status">
                <input type="text" name="status" placeholder="Present Status">
            </div>

            <div class="registration_no">
                <input type="text" name="regNo" placeholder="BMDC Registration No">
            </div>

            <div class="present_work">
                <input type="text" name="workplace" placeholder="Present Work Place">
            </div>

            <div class="See_Patient">
                <input type="text" name="chamber" placeholder="Place to see Patient">
            </div>

            <div class="about">
                <textarea rows="4" cols="50" name="about">Say something about you </textarea>
            </div>

            <div class="image_upload">
                <label for="img">Select image:</label>
                <input type="file" name="image" id="doctor_img">
            </div>
            <div class="doctor_password">
               <input type="password" name="password" placeholder="New password">
               <input type="password" name="confPassword" placeholder="Conform Password">  
          </div>


            <input type="submit" value="Submit" name="submit">

        </form>

    </div>
</body>

</html>