</<?php
  include "../../DB/db_conn.php";

  ?> <!DOCTYPE html>
<html>

<head>
  <title>New Student Form</title>
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

  <form action="" method="POST">
    <h4>Add New Student</h4>

    <input type="hidden" name="id" value="<?= $row['id']; ?>">
    <table align="center" cellpadding="10" class="tableOne">

      <!----- First Name ---------------------------------------------------------->
      <tr>
        <td>FIRST NAME:</td>
        <td><input type="text" name="fname" maxlength="30" required placeholder="Enter the First Name" />
        </td>
      </tr>
      <!----- Last Name ---------------------------------------------------------->
      <tr>
        <td>LAST NAME:</td>
        <td><input type="text" name="lname" maxlength="30" required placeholder="Enter the Last Name" />
        </td>
      </tr>
      <!----- Matric No ---------------------------------------------------------->
      <tr>
        <td>MATRIC NUMBER:</td>
        <td><input type="text" name="userID" required placeholder="Enter the Matric Number" /></td>
      </tr>
      <!----- Email Id ---------------------------------------------------------->
      <tr>
        <td>EMAIL:</td>
        <td><input type="email" name="email" maxlength="100" required placeholder="Enter the Email" /></td>
      </tr>
      <!----- Password ---------------------------------------------------------->
      <tr>
        <td>PASSWORD:</td>
        <td><input type="text" name="pwd" maxlength="100" required placeholder="Enter the Password" /></td>
      </tr>


      <!----- Submit and Reset ------------------------------------------------->
      <tr>
        <td colspan="2" align="center">
          <button type="submit" name="add" value="Add">Add</button>
          <input type="button" onclick="history.back()" value="Back">
        </td>
      </tr>
    </table>
  </form>


  <?php


  if (isset($_POST['add'])) {

    $addFname = mysqli_real_escape_string($conn, $_POST['fname']);
    $addLname = mysqli_real_escape_string($conn, $_POST['lname']);
    $addUserID = mysqli_real_escape_string($conn, $_POST['userID']);
    $addEmail = mysqli_real_escape_string($conn, $_POST['email']);
    $addPwd = mysqli_real_escape_string($conn, $_POST['pwd']);

    $sql = "INSERT INTO accounts(userID, userName, userLname ,userEmail, userPwd) VALUES ('$addUserID', '$addFname',  '$addFname', '$addEmail', '$addPwd')";
    mysqli_query($conn, $sql) or die('query failed');

    echo '<script>alert("Student Added Successfully");';
    echo 'window.location.href = "../manageStudents.php";';
    echo '</script>';
  }
  ?>



</body>

</html>