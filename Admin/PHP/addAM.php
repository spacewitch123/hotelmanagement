</<?php
  include "../../DB/db_conn.php";

  ?> <!DOCTYPE html>
<html>

<head>
  <title>New AM Form</title>
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
    <h4>Add New Accommodation Manager</h4>

    <input type="hidden" name="id" value="<?= $row['id']; ?>">
    <table align="center" cellpadding="10" class="tableOne">

      <!----- Name ---------------------------------------------------------->
      <tr>
        <td>NAME:</td>
        <td><input type="text" name="Name" maxlength="30" required placeholder="Enter the Name" />
        </td>
      </tr>
      <!----- User ID ---------------------------------------------------------->
      <tr>
        <td>USER ID:</td>
        <td><input type="text" name="userID" required placeholder="Enter the User ID" /></td>
      </tr>
      <!----- Email Id ---------------------------------------------------------->
      <tr>
        <td>EMAIL:</td>
        <td><input type="email" name="email" maxlength="100" required placeholder="Enter the Email" /></td>
      </tr>
      <!----- Gender ----------------------------------------------------------->
      <tr>
        <td>GENDER:</td>
        <td><select name="gender" required>
            <option>Male</option>
            <option>Female</option>
        </td>
      </tr>
      <!----- Address ---------------------------------------------------------->
      <tr>
        <td>ADDRESS:<br /><br /><br /></td>
        <td><textarea name="address" rows="4" cols="30" required placeholder="Enter the Address"></textarea></td>
      </tr>
      <!----- Password ---------------------------------------------------------->
      <tr>
        <td>PASSWORD:</td>
        <td><input type="text" name="pwd" maxlength="100" required placeholder="Enter the Password" /></td>
      </tr>
      <tr>
        <td><input type="hidden" name="image" maxlength="100" required value="Profile.png" /></td>
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

    $addName = mysqli_real_escape_string($conn, $_POST['Name']);
    $addUserID = mysqli_real_escape_string($conn, $_POST['userID']);
    $addEmail = mysqli_real_escape_string($conn, $_POST['email']);
    $addGender = mysqli_real_escape_string($conn, $_POST['gender']);
    $addAddress = mysqli_real_escape_string($conn, $_POST['address']);
    $addPwd = mysqli_real_escape_string($conn, $_POST['pwd']);
    $addImage = mysqli_real_escape_string($conn, $_POST['image']);

    $sql = "INSERT INTO am_aacounts(amID, amName, amEmail, amGender, amAddress, amImage, amPwd) VALUES ('$addUserID', '$addName', '$addEmail' , '$addGender', '$addAddress', '$addImage', '$addPwd')";
    mysqli_query($conn, $sql) or die('query failed');

    echo '<script>alert("AM Added Successfully");';
    echo 'window.location.href = "../mangeAccomodatonManager.php";';
    echo '</script>';
  }
  ?>



</body>

</html>