<?php
include "../../DB/db_conn.php";

?>

<!DOCTYPE html>
<html>

<head>
  <title>Accomodation Manager Information</title>
  <style>
    h4 {
      font-family: Calibri;
      font-size: 25pt;
      font-style: normal;
      font-weight: bold;
      color: slateblue;
      text-align: center;
    }

    .text {
      font-size: 20px;
    }

    table {
      font-family: Calibri;
      color: white;
      font-size: 11pt;
      font-style: normal;
      font-weight: bold;
      background-color: #0072B5;
      border-collapse: collapse;
      border: 3px solid #001f3f
    }

    table.inner {
      border: 0px
    }

    .read {
      background-color: transparent;
      color: white;
      font-weight: 300;
      border: none;
      cursor: pointer;
      box-shadow: inset 0 0 0 0 #54b3d6;
      transition: color .3s ease-in-out, box-shadow .3s ease-in-out;
      font-size: 15px;
    }

    .read:hover {
      box-shadow: inset 200px 0 0 0 white;
      color: #0072B5;
    }

    option:default {
      color: #D2386C;
      font-weight: 600;
    }
  </style>
</head>

<body style="background-color:rgb(245, 237, 191);">


  <?php
  if (isset($_GET['id'])) {
    $user_id = $_GET['id'];
    $query = "SELECT * FROM accounts WHERE id='$user_id'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {

      foreach ($result as $row) {

  ?>

        <form action="update-formStudent.php" method="POST">
          <h4>Update <?= $row['userName']; ?> <?= $row['userLname']; ?> Information</h4>

          <input type="hidden" name="id" value="<?= $row['id']; ?>">
          <table align="center" cellpadding="10" class="tableOne">

            <!----- First Name ---------------------------------------------------------->
            <tr>
              <td>FIRST NAME:</td>
              <td><input type="text" name="fname" required maxlength="30" value="<?php echo $row['userName']; ?>" />
              </td>
            </tr>
            <!----- Last Name ---------------------------------------------------------->
            <tr>
              <td>Last NAME:</td>
              <td><input type="text" name="lname" required maxlength="30" value="<?php echo $row['userLname']; ?>" />
              </td>
            </tr>
            <!----- Student ID ---------------------------------------------------------->
            <tr>
              <td>MATRIC NUMBER:</td>
              <td><input type="text" name="userID" required value="<?php echo $row['userID']; ?>" /></td>
            </tr>
            <!----- Email Id ---------------------------------------------------------->
            <tr>
              <td>EMAIL:</td>
              <td><input type="email" name="email" required maxlength="100" value="<?php echo $row['userEmail']; ?>" /></td>
            </tr>
            <!----- Address ---------------------------------------------------------->
            <tr>
              <td>PASSWORD:</td>
              <td><input type="text" name="Pwd" required maxlength="100" value="<?php echo $row['userPwd']; ?>" /></td>
            </tr>


            <!----- Submit and Reset ------------------------------------------------->
            <tr>
              <td colspan="2" align="center">
                <button type="submit" name="update" value="Update">Update</button>
                <input type="button" onclick="history.back()" value="Back">
              </td>
            </tr>
          </table>
        </form>



      <?php

      }
    } else {
      ?>
      <h4>No Record Found</h4>
  <?php
    }
  }
  ?>




</body>

</html>