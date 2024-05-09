<?php
include "../DB/db_conn.php";

?>

<!DOCTYPE html>
<html>

<head>
  <title>Student Booking Form</title>
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
    $query = "SELECT * FROM booking_form WHERE id='$user_id'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {

      foreach ($result as $row) {

  ?>

        <form action="update-form.php" method="POST">
          <h4>Update Student Booking Form</h4>

          <input type="hidden" name="id" value="<?= $row['id']; ?>">
          <table align="center" cellpadding="10" class="tableOne">

            <!----- First Name ---------------------------------------------------------->
            <tr>
              <td>FIRST NAME:</td>
              <td><input type="text" name="First_Name" maxlength="30" class="read" readonly value="<?php echo $row['fname']; ?>" />
              </td>
            </tr>
            <!----- Last Name ---------------------------------------------------------->
            <tr>
              <td>LAST NAME:</td>
              <td><input type="text" name="Last_Name" maxlength="30" class="read" readonly value="<?php echo $row['lname']; ?>" />
              </td>
            </tr>
            <!----- Student ID ---------------------------------------------------------->
            <tr>
              <td>MATRIC NUMBER:</td>
              <td><input type="text" name="userID" class="read" readonly value="<?php echo $row['userID']; ?>" /></td>
            </tr>
            <!----- Date Of Birth -------------------------------------------------------->
            <tr>
              <td>DATE OF BIRTH:</td>
              <td> <input type="date" value="<?php echo $row['dob']; ?>" class="read" readonly> </td>
            </tr>
            <!----- Gender ----------------------------------------------------------->
            <tr>
              <td>GENDER:</td>
              <td><input type="text" name="Gender" maxlength="10" value="<?php echo $row['gender']; ?>" class="read" readonly />
              </td>
            </tr>
            <!----- Email Id ---------------------------------------------------------->
            <tr>
              <td>EMAIL:</td>
              <td><input type="email" name="Email_Id" maxlength="100" value="<?php echo $row['email']; ?>" class="read" readonly /></td>
            </tr>
            <!----- Mobile Number ---------------------------------------------------------->
            <tr>
              <td>PHONE NO:</td>
              <td>
                <input type="text" name="Mobile_Number" maxlength="10" value="<?php echo $row['mobileNo']; ?>" class="read" readonly />
              </td>
            </tr>
            <!----- Address ---------------------------------------------------------->
            <tr>
              <td>ADDRESS:<br /><br /><br /></td>
              <td><textarea name="address" rows="4" cols="30" required><?php echo $row['address']; ?></textarea></td>
            </tr>

            <!----- Country ---------------------------------------------------------->
            <tr>
              <td>NATIONALITY:</td>
              <td><input type="text" name="nationality" value="<?php echo $row['nationality']; ?>" class="read" readonly /></td>
            </tr>

            <tr>
              <td></td>
              <td class="text">Room Info</td>
            </tr>
            <!----- College ---------------------------------------------------------->
            <tr>
              <td>COLLEGE:</td>
              <td><select name="college" required>
                  <option value="KLG" <?= $row['college'] == 'KLG' ? 'Selected' : '' ?>>KLG</option>
                  <option value="KRP" <?= $row['college'] == 'KRP' ? 'Selected' : '' ?>>KRP</option>
                  <option value="KTF" <?= $row['college'] == 'KTF' ? 'Selected' : '' ?>>KTF</option>
                  <option value="KDOJ" <?= $row['college'] == 'KDOJ' ? 'Selected' : '' ?>>KDOJ</option>
                  <option value="KDSE" <?= $row['college'] == 'KDSE' ? 'Selected' : '' ?>>KDSE</option>
                  <option value="KTDI" <?= $row['college'] == 'KTDI' ? 'Selected' : '' ?>>KTDI</option>
              </td>
            </tr>
            <tr>
              <td>ROOM TYPE:</td>
              <td><select name="roomtype" required>
                  <option value="Single Room" <?= $row['roomType'] == 'Single Room' ? 'Selected' : '' ?>>Single Room</option>
                  <option value="Double Rooms" <?= $row['roomType'] == 'Double Rooms' ? 'Selected' : '' ?>>Double Rooms</option>
                  <option value="Deluxe Single Room" <?= $row['roomType'] == 'Deluxe Single Room' ? 'Selected' : '' ?>>Deluxe Single Room</option>
              </td>
            </tr>
            <tr>
              <td>ROOM NUMBER:</td>
              <td><input type="number" name="roomno" value="<?php echo $row['roomNo']; ?>" required /></td>
            </tr>
            <!----- Check In date ID ---------------------------------------------------------->
            <tr>
              <td>CHECK-IN DATE:</td>
              <td> <input type="date" name="chkdate" value="<?php echo $row['chekInDate']; ?>" readonly></td>
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