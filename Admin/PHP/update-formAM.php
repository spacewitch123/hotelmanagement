<?php
include "../../DB/db_conn.php";


if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $userID = $_POST['userID'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $pwd = $_POST['Pwd'];

    $sql = "UPDATE am_aacounts SET amName= '$name',amID= '$userID', amGender= '$gender', amEmail= '$email', amAddress= '$address', amPwd= '$pwd'  WHERE id = '$id'";

    $result = mysqli_query($conn, $sql);
    if ($result) {
        echo '<script type="text/javascript">';
        echo 'alert("Form Updated Successfully");';
        echo 'window.location.href = "../mangeAccomodatonManager.php"';
        echo '</script>';
    }
}
