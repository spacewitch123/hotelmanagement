<?php
session_start();
include "DB/db_conn.php";

if (isset($_POST['ID']) && isset($_POST['Password'])) {

    function Validate($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    $ID = Validate($_POST['ID']);
    $Password = Validate($_POST['Password']);

    if (empty($ID)) {
        header('Location: Sign-in Page Admin.php?error=Enter User ID');
        exit();
    } else if (empty($Password)) {
        header('Location: Sign-in Page Admin.php?error=Enter Password');
        exit();
    } else {
        $sql = "SELECT * FROM admin_accounts WHERE adID = '$ID' AND adPwd = '$Password'";

        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);
            if ($row['adID'] == $ID && $row['adPwd'] == $Password) {
                $_SESSION['adID'] = $row['adID'];
                $_SESSION['adName'] = $row['adName'];
                $_SESSION['adEmail'] = $row['adEmail'];
                $_SESSION['adPwd'] = $row['adPwd'];
                $_SESSION['adGender'] = $row['adGender'];
                $_SESSION['adAddress'] = $row['adAddress'];
                $_SESSION['adImage'] = $row['adImage'];
                $_SESSION['id'] = $row['id'];
                header('Location: Admin/index.php');
                exit();
            } else {
                header('Location: Sign-in Page Admin.php?error=Incorrect Information');
                exit();
            }
        } else {
            header('Location: Sign-in Page Admin.php?error=Incorrect Information');
            exit();
        }
    }
} else {
    header('Location: Sign-in Page Admin.php');
    exit();
}
