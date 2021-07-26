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
     <title>Donor Registation</title>
</head>

<body>
     <div class="container">

          <form action="" onsubmit="return checkInputs()" method="post" autocomplete="on">
               
                  <div class="heading">
                      <h2>Register as Donor</h2>
                          <p style="padding: 7px;">DONOR DETAILS</p> 
                  </div>
                    <div class="single-input">
                         <input type="text" name="name" placeholder="Full Name" required>
                    </div>

                    <div class="dobule-input">
                         <input type="email" name="email" placeholder="Email" required>
                         <input type="text" name="phone" placeholder="Phone Number" required>

                    </div>
                    
                    <div class="gender">
                         
                              <input type="radio" name="gender" value="Male" id="male" required>Male
                              <input type="radio" name="gender" value="Female" id="female" required>female
                              <input type="radio" name="gender" value="Other" id="other" required>other
                         
                       
                         <select name="bg" class="blood_group">
                              <option value="A+">Blood Group:&nbsp A+</option>
                              <option value="O+">Blood Group:&nbsp O+</option>
                              <option value="B+">Blood Group:&nbsp B+</option>
                              <option value="AB+">Blood Group:&nbsp AB+</option>
                              <option value="A-">Blood Group:&nbsp A-</option>
                              <option value="O-">Blood Group:&nbsp O-</option>
                              <option value="B-">Blood Group:&nbsp B-</option>
                              <option value="AB-">Blood Group:&nbsp AB-</option>
                         </select>
                    </div>


                    <div class="dob">
                         <span class="child_dob">Date of Birth</span>
                         <input class="date_input" type="date" name="dob" id="" required>
                    </div>

                    <div class="dob">
                        <span class="child_dob">Last Donation</span>
                         <input class="date_input1" type="date" name="lastdonate" id="" required>
                    </div>


                    <div class="single-input">
                         <input type="text" name="address1" placeholder="Address" required></input>
                    </div>

                    <div class="single-input">
                    <input type="text" name="address2" placeholder="city"></input>
                    </div>

                    <div class="dobule-input">
                         <input type="password" name="password" placeholder="New password" id="password" required>

                          <input type="password" name="cPassword" placeholder="Confirm Password" id="cpassword" required>
                    </div>
          

                    <input class="btn_submit" type="submit" value="Submit" name="submit">
          

          </form>

     </div>
</body>

</html>