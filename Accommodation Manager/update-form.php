<?php
include "../DB/db_conn.php";


if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $address = $_POST['address'];
    $college = $_POST['college'];
    $roomtype = $_POST['roomtype'];
    $roomno = $_POST['roomno'];

    $sql = "UPDATE booking_form SET address= '$address',college= '$college', roomType= '$roomtype', roomNo= '$roomno' WHERE id = '$id'";

    $result = mysqli_query($conn, $sql);
    if ($result) {
        echo '<script type="text/javascript">';
        echo 'alert("Form Updated Successfully");';
        echo 'window.location.href = "records.php"';
        echo '</script>';
    }
}
