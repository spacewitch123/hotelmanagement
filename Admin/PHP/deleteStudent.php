<?php
include "../../DB/db_conn.php";


if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM accounts WHERE id='$id'";
    $result = mysqli_query($conn, $sql);

    echo '<script type="text/javascript">';
    echo 'alert("Student Deleted Successfully");';
    echo 'window.location.href = "../manageStudents.php"';
    echo '</script>';
}
