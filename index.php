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

    <script src="https://code.iconify.design/1/1.0.7/iconify.min.js"></script><!-- for blood icon -->
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
                    <h3>BOOK  A   APPOINTMENT</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Inventore quas distinctio illo voluptatibus ipsa praesentium et eius obcaecati a error. Fugit expedita iure blanditiisvoluptatum! Error, impedit.</p>
                    <button class="click-btn"><a href="appointment.php">Click here</a></button>

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
                    <button class="click-btn"><a href="">Click here</a></button>
                </div>
            </div>
        </div>
    </section>



    <section class="doctors">
        <h1>Doctors</h1>
        <br>

        <div class="box-1">
            <div>
                <img src="images/dummy.jpg" alt="">
            </div>
            <div>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Labore mollitia obcaecati et tenetur veritatis laudantium sint error tempore ab possimus harum, nemo placeat molestias nostrum sunt odit blanditiis doloremque odio?</p>
            </div>
        </div>

        <div class="box-1">
            <div>
                <img src="images/dummy.jpg" alt="">
            </div>
            <div>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Labore mollitia obcaecati et tenetur veritatis laudantium sint error tempore ab possimus harum, nemo placeat molestias nostrum sunt odit blanditiis doloremque odio?</p>
            </div>
        </div>

        <div class="box-1">
            <div>
                <img src="images/dummy.jpg" alt="">
            </div>
            <div>

                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Vero numquam veritatis quo et cum. Dignissimos expedita, odio blanditiis reiciendis maiores commodi iusto nam obhjohuaperiam. Exhvhvhpedita, quam possimus.</p>

            </div>
        </div>

        <div class="box-1">
            <div>
                <img src="images/dummy.jpg" alt="">
            </div>
            <div>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Labore mollitia obcaecati et tenetur veritatis laudantium sint error tempore ab possimus harum, nemo placeat molestias nostrum sunt odit blanditiis doloremque odio?</p>
            </div>
        </div>
    </section>

</body>
<footer>

</footer>
</body>

</html>