<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor Registation Form</title>
    <style>
        *{
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
               <input type="text" name="fast_name" placeholder="First Name">
               <input type="text" name="lasl_name" placeholder="Last Name">
          </div>

           <div class="email">
               <input type="text" name="email" placeholder="Email">
               <input type="text" name="phone_number" placeholder="Phone Number">
          </div>

          <div class="gender">
                 <span>Gender</span>
                 <input type="radio" name="gender"  value = "male"id="male">Male
                 <input type="radio" name="gender" value="female" id="female">female
                 <input type="radio" name="gender" value="other" id="other">other
          </div>

          <div class="dof">
               <span>Date of Birth</span>
               <input type="number" id="d" name="date" min="1" max="31" placeholder="day">
               <input type="number" id="m" name="month" min="1" max="12" placeholder="month">
               <input type="number" id="y"  name="year" min="1900" max="9999" placeholder="year">
          </div>

          <div class="specialist">
               <input type="text" name="specialist"  placeholder="Specialist">
          </div>

           <div class="digree">
              <input type="text" name="digree"  placeholder="digree">
          </div>

          <div class="present_status">
              <input type="text" name="present_status"  placeholder="Present Status">
          </div>

          <div class="registation_no">
              <input type="text" name="registation_no"  placeholder="BMDC Registation No">
          </div>

          <div class="present_work">
              <input type="text" name="present_work"  placeholder="Present Work Place">
          </div>

          <div class="See_Patient">
              <input type="text" name="Place_to_see_patient"  placeholder="Place to see Patient">
          </div>

          <div class="comment">
              <textarea rows="4" cols="50" name="comment">Say something about you </textarea>
          </div>

          <div class="image_upload">
               <label for="img">Select image:</label>
               <input type="file" name="doctor_img"  id="doctor_img">
          </div>

          <div class="doctor_password">
               <input type="password" name="password" placeholder="New password">
               <input type="password" name="confPassword" placeholder="Conform Password">  
          </div>

         
         <input type="submit" value="Submit">

     </form>
         
    </div>
</body>
</html>