<?php
include "../../DB/db_conn.php";


if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $userID = $_POST['userID'];
    $email = $_POST['email'];
    $pwd = $_POST['Pwd'];

    $sql = "UPDATE accounts SET userName= '$fname', userLname= '$lname', userID= '$userID', userEmail= '$email', userPwd= '$pwd'  WHERE id = '$id'";

    $result = mysqli_query($conn, $sql);
    if ($result) {
        echo '<script type="text/javascript">';
        echo 'alert("Student Information Updated Successfully");';
        echo 'window.location.href = "../manageStudents.php"';
        echo '</script>';
    }
}
