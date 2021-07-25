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
          $stmt = $pdo->prepare("INSERT INTO donors (name,email,phone,gender,bloodGrp,dob,lastDonate,presentAdd,permanentAdd,password ) 
     VALUES (:name,:email,:phone,:gender,:bg,:lastdonate,:dob,:address,:city,:password)");
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
     <title>Doner Registation Form</title>
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
               Register as Donor<br>
          </div>

          <form action="" onsubmit="return checkInputs()" method="post" autocomplete="on">
               <div class="name_child">
                    <input type="text" name="name" placeholder="Full Name" required>
               </div>

               <div class="email">
                    <input type="text" name="email" placeholder="Email" required>
                    <input type="text" name="phone" placeholder="Phone Number" required>
               </div>
               <div class="gender">
                    <span>Gender</span>
                    <input type="radio" name="gender" value="male" id="male" required>Male
                    <input type="radio" name="gender" value="female" id="female" required>female
                    <input type="radio" name="gender" value="other" id="other" required>other
               </div>
               <span>Blood Group</span>
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

               <div class="dob">
                    <span>Date of Birth</span>
                    <input type="date" name="dob" id="" required>
               </div>

               <div class="donation_date">
                    <span>Last Donation</span>
                    <input type="date" name="lastdonate" id="" required>
               </div>

               <div class="Address">
                    <span>Address</span> <br>
                    <textarea type="text" name="address1" placeholder="Address" required></textarea>
                    <textarea type="text" name="address2" placeholder="city"></textarea>
               </div>
               <div class="doner_password">
                    <input type="password" name="password" placeholder="New password" id="password" required>
                    <input type="password" name="cPassword" placeholder="Confirm Password" id="cpassword" required>
               </div>

               <input type="submit" value="Submit" name="submit">

          </form>

     </div>
</body>

</html>