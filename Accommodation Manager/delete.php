<?php
include "../DB/db_conn.php";


if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM booking_form WHERE id='$id'";
    $result = mysqli_query($conn, $sql);

    echo '<script type="text/javascript">';
    echo 'alert("Student Form Deleted Successfully");';
    echo 'window.location.href = "records.php"';
    echo '</script>';
}
