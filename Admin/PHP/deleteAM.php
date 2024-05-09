<?php
include "../../DB/db_conn.php";


if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM am_aacounts WHERE id='$id'";
    $result = mysqli_query($conn, $sql);

    echo '<script type="text/javascript">';
    echo 'alert("Accommodation Manager Deleted Successfully");';
    echo 'window.location.href = "../mangeAccomodatonManager.php"';
    echo '</script>';
}
