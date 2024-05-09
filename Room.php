<?php
session_start();
include "DB/db_conn.php";

$user_id = $_SESSION['userID'];
$sql = "SELECT * FROM booking_form WHERE userID = '$user_id'";
$result = mysqli_query($conn, $sql);
if (isset($_SESSION['id']) && isset($_SESSION['userID']) && isset($result)) {

    while ($row = mysqli_fetch_array($result)) {
?>

        <!-- Header -->

        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="Styles/Room.css">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
            <title><?php echo $_SESSION['userName'] ?> <?php echo $_SESSION['userLname'] ?> - Room</title>
        </head>

        <body>


            <!-- Room Information-->

            <section id="form1">
                <div class="container1">
                    <a href="Home Page.php"><img src="Images\logo.png" alt="logo" class="logo"></a>

                    <h1 class="booktitle">Room Information</h1>

                    <form action="DB/Search.php" method="POST" class="forma">
                        <div class="form first">
                            <div class="details personal">
                                <span class="title"><span class="req">Booking</span> Details</span>

                                <div class="fields">
                                    <div class="input-field">
                                        <label>Full <span class="req">Name</span></label>
                                        <input type="text" name="fname" value="<?php echo $_SESSION['userName'] ?> <?php echo $_SESSION['userLname'] ?>" required readonly>
                                    </div>

                                    <div class="input-field">
                                        <label>ID/Matric <span class="req">Number</span></label>
                                        <input type="number" name="ID" value="<?php echo $row['userID']; ?>" readonly required>
                                    </div>

                                    <div class="input-field">
                                        <label>Email</label>
                                        <input type="email" name="email" value="<?php echo $_SESSION['userEmail']; ?>" readonly required>
                                    </div>
                                </div>

                                <div class="fields">
                                    <div class="input-field">
                                        <label>Date of <span class="req">Birth</span></label>
                                        <input type="date" name="dob" value="<?php echo $row['dob'] ?>" required readonly>
                                    </div>

                                    <div class="input-field">
                                        <label>Mobile <span class="req">Number</span></label>
                                        <input type="number" name="mobileNO" value="<?php echo $row['mobileNo']; ?>" readonly required>
                                    </div>

                                    <div class="input-field">
                                        <label>Nationality</label>
                                        <input type="text" name="nation" value="<?php echo $row['nationality']; ?>" readonly required>
                                    </div>

                                    <div class="fields">
                                        <div class="input-field">
                                            <label>Gender</label>
                                            <input type="text" name="gender" value="<?php echo $row['gender'] ?>" required readonly>
                                        </div>

                                        <div class="input-fieldn">
                                            <label>Address</label>
                                            <input type="text" name="address" value="<?php echo $row['address']; ?>" readonly required>
                                        </div>


                                        <span class="title"><span class="req">Room </span>Details</span>

                                        <div class="fields">
                                            <div class="input-field">
                                                <label>Room <span class="req">Type</span></label>
                                                <input type="text" name="roomt" id="roomt" value="<?php echo $row['roomType']; ?>" readonly required>
                                            </div>

                                            <div class="input-field">
                                                <label>Check <span class="req">In Date</span></label>
                                                <input type="date" name="check" value="<?php echo $row['chekInDate']; ?>" readonly required>
                                            </div>

                                            <div class="input-field">
                                                <label>College</label>
                                                <input type="text" name="college" value="<?php echo $row['college'] ?>" required readonly>
                                            </div>

                                            <div class="fields">
                                                <div class="input-field">
                                                    <label>Room <span class="req">Number</span></label>
                                                    <input type="number" name="roomn" value="<?php echo $row['roomNo']; ?>" readonly required>
                                                </div>

                                                <div class="input-field">
                                                    <label>Status</label>
                                                    <input type="text" name="status" id="status" value="<?php echo $row['status'] ?>" required readonly>
                                                </div>
                                            </div>

                                            <button type="button" class="btn" onclick="history.back()">Back</button>


                                            <!-- Script -->

                                            <script type="text/javascript">
                                                var myInput = document.getElementById("status");
                                                if (myInput.value == 'Approved') {
                                                    myInput.style.color = 'White';
                                                    myInput.style.background = 'green'
                                                } else {
                                                    myInput.style.color = 'white';
                                                    myInput.style.background = 'red'
                                                }
                                                var myImg = document.getElementById("roomt");
                                                // if(myImg.value == 'Single Room') {document.body.style.backgroundImage = "url(Images/Rooms/R1.1.jpg)" ;document.body.style.backgroundSize= "100% 120%" }
                                                // else if(myImg.value == 'Double Rooms') {document.body.style.backgroundImage = "url(Images/Rooms/R2.1.jpg)" ;document.body.style.backgroundSize= "100% 120%" }
                                            </script>


                                        <?php
                                    }
                                        ?>


                                        </div>
                                    </div>
                    </form>
                </div>
            </section>

        </body>

        </html>

    <?php

} else {
    header('Location: Sign-in Page.php');
    exit();
}
    ?>