<?php

include "../DB/db_conn.php";
session_start();
if (isset($_SESSION['id']) && isset($_SESSION['adID'])) {
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Manage Users</title>
        <link rel="stylesheet" href="./admin.css">
    </head>

    <body>

        <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
        <div class="wrapper">
            <div class="sidebar">
                <a href="./index.php">
                    <h2>PROFILE</h2>
                </a>
                <ul>

                    <li><a href="./ManageUsers.php"><i class="Appication"></i><span class="active">Manage Users</span></a></li>
                    <li><a href="../DB/logout.php"><i class="Appication"></i>Log out</a></li>


                </ul>
            </div>
            <div class="main_content">
                <div class="header"><?php echo $_SESSION['adName']; ?> Dashboard</div>

                <!-- *************************************************manage USers tables******************************************************** -->

                <div class="wrap">
                    <a href="./mangeAccomodatonManager.php">
                        <button class="button">Manage Accomodation Managers</button>
                    </a>
                </div>

                <div class="wrap">
                    <a href="./manageStudents.php">
                        <button class="button">Manage Students</button>
                    </a>
                </div>



            </div>

        </div>







        </div>
    </body>

    </html>
<?php
} else {
    header('Location: ../Sign-in Page Admin.php');
    exit();
}

?>