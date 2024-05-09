<?php

include "DB/db_conn.php";
session_start();
$user_id = $_SESSION['id'];

if (isset($_POST['update_profile'])) {

   $update_name = mysqli_real_escape_string($conn, $_POST['update_name']);
   $update_email = mysqli_real_escape_string($conn, $_POST['update_email']);
   $update_lname = mysqli_real_escape_string($conn, $_POST['update_lname']);

   mysqli_query($conn, "UPDATE accounts SET userName = '$update_name', userEmail = '$update_email', userLname = '$update_lname' WHERE id = '$user_id'") or die('query failed');

   echo '<script>alert("Information Updated Successfully");</script>';
}







if (isset($_SESSION['id']) && isset($_SESSION['userID'])) {
?>

   <!DOCTYPE html>
   <html lang="en">

   <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="Styles/Profile.css">
      <title><?php echo $_SESSION['userName']; ?> <?php echo $_SESSION['userLname'] ?> - Profile Page</title>
   </head>

   <body>

      <div class="update-profile">
         <?php
         $select = mysqli_query($conn, "SELECT * FROM accounts WHERE id = '$user_id'") or die('query failed');
         if (mysqli_num_rows($select) > 0) {
            $_SESSION = mysqli_fetch_assoc($select);
         }
         ?>
         <form action="" method="post" enctype="multipart/form-data">

            <img src="Images\logo.png" alt="logo" class="logo">
            <div class="flex">
               <div class="inputBox">
                  <span>First Name :</span>
                  <input type="text" name="update_name" value="<?php echo $_SESSION['userName']; ?>" class="box">

                  <span>Your Email :</span>
                  <input type="email" name="update_email" value="<?php echo $_SESSION['userEmail']; ?>" class="box">
               </div>

               <div class="inputBox">
                  <span>Last Name :</span>
                  <input type="text" name="update_lname" value="<?php echo $_SESSION['userLname'] ?>" class="box">
                  <span>User ID :</span>
                  <input type="text" readonly name="user_ID" value="<?php echo $_SESSION['userID']; ?>" class="box1">
               </div>
            </div>

            <input type="submit" value="Update Profile" name="update_profile" class="btn">
            <button type="button" class="delete-btn" onclick="history.back()">Go Back</button>
         </form>
      </div>


   </body>

   </html>

<?php
} else {
   header('Location: Sign-in Page.php');
   exit();
}

?>