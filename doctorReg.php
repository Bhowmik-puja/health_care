<?php
$pdo = require_once "database.php";


if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $name = $_POST['fname'];
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
    $password = $_POST['password'];

    //  check if email already exist or not \\

    $stmthandler = $pdo->prepare("SELECT * FROM doctors WHERE email = :email");
    $stmthandler->bindValue(':email', $email);
    $stmthandler->execute();

    if ($stmthandler->rowCount() > 0) {
        echo "<script>alert('This email is already exists!!!!');</script>";
    } else {

        $stmt = $pdo->prepare("INSERT INTO doctors (name,email,phone,gender,dob,specialist,degree,presentStatus,regNo,workplace,chamber,about,image,password ) 
                                            VALUES (:name,:email,:phone,:gender,:dob,:specialist,:deg,:status,:reg,:workplace,:chamber,:about,:image,:password)");
        //   echo '<pre>';
        //   var_dump($stmt);
        //   echo '</pre>';
        $stmt->bindValue(':name', $name);
        $stmt->bindValue(':email', $email);
        $stmt->bindValue(':phone', $phone);
        $stmt->bindValue(':gender', $gender);
        $stmt->bindValue(':dob', $dob);
        $stmt->bindValue(':specialist', $specialist);
        $stmt->bindValue(':deg', $deg);
        $stmt->bindValue(':status', $status);
        $stmt->bindValue(':reg', $regNo);
        $stmt->bindValue(':workplace', $workplace);
        $stmt->bindValue(':chamber', $chamber);
        $stmt->bindValue(':about', $about);
        $stmt->bindValue(':image', '');
        $stmt->bindValue(':password', $password);
        $stmt->execute();
        // echo "<script>alert('This Email already exist!!!')</script>";
        header('location:doctorlogin.php');
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/doctorReg.css">
    <script type="text/javascript" src="validation.js"></script>
    <title>Doctor Registation Form</title>
</head>

<body>
    <div class="main">
        <div class="heading">
            Register as Doctor<br>
        </div>

        <form action="" onsubmit="return checkInputs()" method="post" autocomplete="on">
            <div class="name_child">
                <input type="text" name="fname" placeholder="Full Name" required>
            </div>

            <div class="email">
                <input type="email" name="email" placeholder="Email" required> 
                <input type="text" name="phone" placeholder="Phone Number" required>
            </div> 
           


            <div class="gender">
                <label>Gender: </label>
                <input type="radio" name="gender" value="male" id="male" required>Male
                <input type="radio" name="gender" value="female" id="female" required>female
                <input type="radio" name="gender" value="other" id="other" required>other

                <span>Date of Birth</span>
                <input type="date" id="d" name="date"  required>
            </div>

            

            <div class="specialist">
                <input type="text" name="specialist" placeholder="Specialist" required>
            </div>

            <div class="degree">
                <input type="text" name="degree" placeholder="degree" required>
            </div>

            <div class="present_status">
                <input type="text" name="status" placeholder="Present Status" required>
            </div>

            <div class="registration_no">
                <input type="text" name="regNo" placeholder="BMDC Registration No" required>
            </div>

            <div class="present_work">
                <input type="text" name="workplace" placeholder="Present Work Place" required>
            </div>

            <div class="See_Patient">
                <input type="text" name="chamber" placeholder="Place to see Patient" required>
            </div>

            <div class="about">
                <textarea placeholder="Say something about you" rows="4"  name="about" required></textarea>
            </div>

            <div class="image_upload">
                <label for="img">Select image:</label>
                <input type="file" name="image" id="doctor_img">
            </div>
            <div class="password">
                <label for="">Password</label>
                <input type="password" name="password" id="password" required>
                <small id="error"></small>
            </div>
            <div class="confirmpass">
                <label for="">Confirm Password</label>
                <input type="password" name="cpassword" id="cpassword" required>
                <small id="error2"></small>
            </div>


            <input type="submit" value="Submit" name="submit"><br>
            <div class="last-line">
                <span >Already Have an Account? <a href="doctorLogin.php">login here</a></span>
            </div>
            

        </form>

    </div>
</body>

</html>