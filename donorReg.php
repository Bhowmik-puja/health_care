<?php
$pdo = require_once "database.php";


if ($_SERVER['REQUEST_METHOD'] == 'POST') {

     $name = $_POST['name'];
     $email = $_POST['email'];
     $phone = $_POST['phone'];
     $dob = $_POST['dob'];
     $gender = $_POST['gender'];
     $bg = $_POST['bg'];
     $lastdonate = $_POST['lastdonate'];
     $address1 = $_POST['address1'];
     $address2 = $_POST['address2'] ?? '';
     $password = $_POST['password'];

     //  check if email already exist or not \\

     $stmthandler = $pdo->prepare("SELECT * FROM donors WHERE email = :email");
     $stmthandler->bindValue(':email', $email);
     $stmthandler->execute();

     if ($stmthandler->rowCount() > 0) {
          echo "<script>alert('This email is already exists!!!!');</script>";
     } else {
          $stmt = $pdo->prepare("INSERT INTO donors (name,email,phone,gender,bloodGrp,dob,lastDonate,address,city,password ) 
     VALUES (:name,:email,:phone,:gender,:bg,:dob,:lastdonate,:address,:city,:password)");
          $stmt->bindValue(':name', $name);
          $stmt->bindValue(':email', $email);
          $stmt->bindValue(':phone', $phone);
          $stmt->bindValue(':gender', $gender);
          $stmt->bindValue(':bg', $bg);
          $stmt->bindValue(':dob', $dob);
          $stmt->bindValue(':lastdonate', $lastdonate);
          $stmt->bindValue(':address', $address1);
          $stmt->bindValue(':city', $address2);
          $stmt->bindValue('password', $password);
          $stmt->execute(header("location: index.php"));
     }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="css/donorReg.css">

</head>

<body>
     <div class="main">
          <div class="heading">
               <H3>Register as Donor</H3>
          </div>

          <form action="" onsubmit="return checkInputs()" method="post" autocomplete="on">
               <fieldset>
                    <legend>DONOR DETAILS</legend>
                    <div class="name">
                         <label for="">Full Name: </label>
                         <input type="text" name="name" placeholder="Full Name" required>
                    </div>

                    <div class="email">
                         <label for="">Email:</label>
                         <input type="email" name="email" placeholder="Email" required>

                    </div>
                    <div class="phone">
                         <label for="">Contact no:</label>
                         <input type="text" name="phone" placeholder="Phone Number" required>
                    </div>
                    <div class="gender">
                         <label>Gender:</label>
                         <div class="radio">
                              <input type="radio" name="gender" value="male" id="male" required>Male
                              <input type="radio" name="gender" value="female" id="female" required>female
                              <input type="radio" name="gender" value="other" id="other" required>other
                         </div>

                    </div>
                    <div class="bloodgrp">
                         <label>Blood Group:</label>
                         <select name="bg">
                              <option value="A+">A+</option>
                              <option value="O+">O+</option>
                              <option value="B+">B+</option>
                              <option value="AB+">AB+</option>
                              <option value="A-">A-</option>
                              <option value="O-">O-</option>
                              <option value="B-">B-</option>
                              <option value="AB-">AB-</option>
                         </select>
                    </div>


                    <div class="dob">
                         <label>Date of Birth</label>&nbsp&nbsp&nbsp
                         <input type="date" name="dob" id="" required>
                    </div>

                    <div class="donation_date">
                         <label>Last Donation</label>&nbsp&nbsp&nbsp
                         <input type="date" name="lastdonate" id="" required>
                    </div>

                    <div class="address">
                         <label>Address</label>
                         <input type="text" name="address1" placeholder="Address" required></input>
                    </div>
                    <div>
                    <input type="text" name="address2" placeholder="city"></input>
                    </div>
                    <div class="doner_password">
                         <input type="password" name="password" placeholder="New password" id="password" required>
                    </div>
                    <div>
                         <input type="password" name="cPassword" placeholder="Confirm Password" id="cpassword" required>
                    </div>

                    <input type="submit" value="Submit" name="submit">
               </fieldset>


          </form>

     </div>
</body>

</html>