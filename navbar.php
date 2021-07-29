<div>
    <nav>
        <a href="index.php"><span class="website-name">Health Care</span></a>

        <div class="navbar">
            <ul>
                <li>
                    <a href="index.php">Home</a>
                </li>
                <li>
                    <a href="about.php">About</a>
                </li>
                <?php if (!isset($_SESSION["userlogin"])) : ?>
                    <li>
                        <a href="patientlogin.php">Login</a>
                    </li>
                    <li>
                        <a href="patientReg.php">SignIn</a>
                    </li>
                <?php endif; ?>
                <?php
                if (isset($_SESSION["userlogin"])) : ?>
                    <li>
                        <a href="logout.php">Logout</a>
                    </li>
                    <li>
                        <a class="btn" href="<?php
                                                if ($_SESSION["userlogin"] == 1) echo "doctorProfile.php";
                                                else if ($_SESSION["userlogin"] == 0) echo "patientProfile.php";
                                                else if ($_SESSION["userlogin"] == 3) echo "donorProfile.php";
                                                else echo "admin.php";
                                                ?>"> <i class='fas fa-user-circle'></i> <?php echo  $_SESSION['name'] ?? "ADMIN"; ?></a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </nav>
    </div>