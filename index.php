<?php
// require_once "header.php";
session_start();
// echo $_SESSION['userlogin'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <link rel="stylesheet" href="css/meetDoctor.css">
    <script src="https://code.iconify.design/1/1.0.7/iconify.min.js"></script><!-- for blood icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"/>
    <title>Health Care</title>
</head>

<body>
     <?php include_once "navbar.php"; ?>
    <section class="header">
       
    </section>
    <br>
    <section class="service-block">
        <div class="container">
            <div class="box">
                <div class="icon"><i class='far fa-calendar-alt' style='font-size:36px; text-align:center;'></i></div>
                <div class="content">
                    <h3>BOOK  AN   APPOINTMENT</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Inventore quas distinctio illo voluptatibus ipsa praesentium et eius obcaecati a error. Fugit expedita iure blanditiisvoluptatum! Error, impedit.</p>
                    <button class="click-btn"><a href="<?php echo isset($_SESSION['id'] ) ? "appointment.php":"patientlogin.php"; ?>">Click here</a></button>

                </div>
            </div>

            <div class="box">
                <div class="icon"><i class="fa fa-user-md" style="font-size:36px;"></i></div>
                <div class="content">
                    <h3>FIND A DOCTOR</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Inventore quas distinctio illo voluptatibus ipsa praesentium et eius obcaecati a error. Fugit expedita iure blanditiisvoluptatum! Error, impedit.</p>
                    <button class="click-btn"><a href="doctors.php">Click here</a></button>

                </div>
            </div>

            <div class="box">
                <div class="icon"><span class="iconify" data-icon="maki-blood-bank" data-inline="false" style="font-size:36px;"></span></div>
                <div class="content">
                    <h3>BLOOD BANK</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Inventore quas distinctio illo voluptatibus ipsa praesentium et eius obcaecati a error. Fugit expedita iure blanditiisvoluptatum! Error, impedit. </p>
                    <button class="click-btn"><a href="bloodbank.php">Click here</a></button>
                </div>
            </div>
        </div>
    </section>



    <section class="doctors">
        <h1>Meet Our Doctors</h1>
        <hr style="border: 1px solid black">
        <div class="row">
           <div class="box-1">
               <img src="images/sobuz.png" alt="">
               <h3>Dr. Md. Rabiul Islam</h3><br>
               <p>Medicine, Diabetes and Arthritis<br> General Physician, <br> MBBS (RMC), BCS (Health) <br>FCPS-part-2 (medicine), CMU(Ultra) <br>Medical officer<br> Upazila Health Complex, Sariakandi,Bogura <br>
                Ex.Registrar(Medicine) <br>Dhaka Central Int. Medical College & Hospital
               </p>
           </div>

         <div class="box-1">
              <img src="images/ashik.png" alt="">
              <h3>Dr. Md. Ashikur Rhaman</h3> <br>
               <p>Surgery and General Physician<br>MBBS, (COMC),<br>BCS (Health) FCPS Surgery Final part <br> Resident Medical Officer <br>
                Medical officer<br> Upazila Health Complex, Sariakandi,Bogura <br>
               </p>
           </div>

          <div class="box-1">
              <img src="images/dshofiq.png" alt="">
               <h3>Dr. Md. Shoriqul Islam</h3><br>
               <p>General Physician<br> MBBS (SZMC), BCS (Health) DMU<br>Medical officer<br>Mugda Medical College & Hospital<br>
                 
               </p>
           </div>

          <div class="box-1">
               <img src="images/dTanjil.png" alt="">
               <h3>Dr. Md. Tanjil Ahamed</h3><br>
               <p> MBBS (RMC), Assistant Surgeon<br> BCS (Health) CMU(Dhaka) <br>Medical officer<br> Upazila Health Complex, Sariakandi,Bogura <br>
               </p>
           </div>
       </div>

    </section>




  <!------ ------------Footer------------------------------>

  <section class="footer">
        <h4>Contract with us</h4>
        <p>You can contact with us in any need, We will be happy. We are always by your side in your need.</p>
        <div class="icons">
            <a href="#" target="_blank"><i class="fa fa-envelope"></a></i>
            <a href="https://web.facebook.com/shorifulislam.ridoy.773" target="_blank"><i class="fa fa-facebook-square"></a></i>
            <a href="https://www.instagram.com/?hl=ru" target="_blank"><i class="fa fa-instagram"></a></i>
            <a href="https://https://bit.ly/30nxsXM" target="_blank"><i class="fa fa-whatsapp"></a></i>
            <a href="#" target="_blank"><i class="fa fa-twitter"></a></i>
            <a href="#" target="_blank"><i class="fa fa-linkedin"></a></i>


            <div>
                <p>Copyright <span>&copy</span>2021<i class="fa fa-heart-o"></i>by Puja Bhowmik & Shoriful Islam</p>
            </div>
        </div>
    </section>   
</body>
</html>