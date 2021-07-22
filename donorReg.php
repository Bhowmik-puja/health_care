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
               Create a account free
          </div>

          <form action="" method="post">
               <div class="name_child">
                    <input type="text" name="doner_fast_name" placeholder="First Name">
                    <input type="text" name="doner_lasl_name" placeholder="Last Name">
               </div>

               <div class="email">
                    <input type="text" name="doner_email" placeholder="Email">
                    <input type="text" name="phone_number" placeholder="Phone Number">
               </div>

          <div class="dof">
               <span>Date of Birth</span>
               <input type="number" id="d" name="date" min="1" max="31" placeholder="day" require>
               <input type="number" id="m" name="month" min="1" max="12" placeholder="month" require>
               <input type="number" id="y"  name="year" min="1900" max="9999" placeholder="year" require>
          </div>

          <div class="donation_date">
               <span>Last Donation</span>
               <input type="number" id="d" name="date" min="1" max="31" placeholder="day" require>
               <input type="number" id="m" name="month" min="1" max="12" placeholder="month" require>
               <input type="number" id="y"  name="year" min="1900" max="9999" placeholder="year" require>
          </div>

          <div class="Address">
               <span>Address</span> <br>
               <input type="text" name="doner_address_1" placeholder="Address-1" require>
               <input type="text" name="doner_lasl_address_2" placeholder="Address-2">  
          </div>

           <div class="city">
               <input type="text" name="doner_city" placeholder="City/village" require>
               <input type="text" name="doner_Zip_code" placeholder="ZIP/Post Code" require>  
          </div>

          <div class="doner_password">
               <input type="password" name="password" placeholder="New password" require>
               <input type="password" name="confPassword" placeholder="Conform Password" require>  
          </div>

               <div class="doner_password">
                    <input type="password" name="password" placeholder="New password">
                    <input type="password" name="confPassword" placeholder="Conform Password">
               </div>



               <input type="submit" value="Submit">

          </form>

     </div>
</body>

</html>