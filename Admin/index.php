<?php

include "../DB/db_conn.php";
session_start();
$user_id = $_SESSION['id'];

if (isset($_POST['update_profile'])) {

    $update_name = mysqli_real_escape_string($conn, $_POST['update_name']);
    $update_email = mysqli_real_escape_string($conn, $_POST['update_email']);
    $update_address = mysqli_real_escape_string($conn, $_POST['update_address']);
    $update_Pwd = mysqli_real_escape_string($conn, $_POST['update_password']);

    mysqli_query($conn, "UPDATE admin_accounts SET adName = '$update_name', adEmail = '$update_email', adAddress = '$update_address', adPwd = '$update_Pwd' WHERE id = '$user_id'") or die('query failed');

    echo '<script>alert("Information Updated Successfully");</script>';
}



if (isset($_SESSION['id']) && isset($_SESSION['adID'])) {
?>


    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?php echo $_SESSION['adName']; ?> Dashboard</title>
        <link rel="stylesheet" href="./admin.css">
    </head>

    <body>

        <?php
        $select = mysqli_query($conn, "SELECT * FROM admin_accounts WHERE id = '$user_id'") or die('query failed');
        if (mysqli_num_rows($select) > 0) {
            $_SESSION = mysqli_fetch_assoc($select);
        }
        ?>

        <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
        <div class="wrapper">
            <div class="sidebar">

                <a href="./index.php">
                    <h2>PROFILE </h2>
                </a>
                <ul>

                    <li><a href="./ManageUsers.php"><i class="Appication"></i>Manage Users</a></li>
                    <li><a href="../DB/logout.php"><i class="Appication"></i>Log out</a></li>


                </ul>
            </div>
            <div class="main_content">
                <div class="header"><?php echo $_SESSION['adName']; ?> Dashboard</div>

                <div class="wrapper" style="background-image: url('tech.jpg');">
                    <div class="inner">
                        <div class="image-holder">
                            <form method="post" action="" id="form" enctype="multipart/form-data">
                                <img src="imgs/<?php echo $_SESSION['adImage']; ?>" title="<?php echo $_SESSION['adImage'] ?>" alt="image">
                                <input type="hidden" name="id" value="<?php echo $_SESSION['id'] ?>">
                                <input type="hidden" name="name" value="<?php echo $_SESSION['adName'] ?>">
                                <span class="fast"><i class="fa fa-camera"></i></span>
                                <input type="file" name="image" id="image" accept=".jpg, .png, .jpeg">


                            </form>

                            <script type="text/javascript">
                                document.getElementById("image").onchange = function() {
                                    document.getElementById('form').submit();
                                }
                            </script>
                            <?php
                            if (isset($_FILES['image']['name'])) {
                                $id = $_POST['id'];
                                $name = $_POST['name'];

                                $imageName = $_FILES["image"]["name"];
                                $imageSize = $_FILES["image"]["size"];
                                $tmpName = $_FILES["image"]["tmp_name"];

                                $validateImageExtension = ['jpg', 'png', 'jpeg'];
                                $imageExtension = explode('.', $imageName);
                                $imageExtension = strtolower(end($imageExtension));
                                if (!in_array($imageExtension, $validateImageExtension)) {
                                    echo "
        <script>
        alert('Invalid Image Extension');
        document.location.href = 'index.php';
        </script>
        ";
                                } elseif ($imageSize > 12000000) {
                                    echo "
        <script>
        alert('Image Size is too Large');
        document.location.href = 'index.php';
        </script>
        ";
                                } else {
                                    $newImageName = $name . " - " . date("Y-m-d") . " - " . date("h.i.sa");
                                    $newImageName .= "." . $imageExtension;
                                    $quer = "UPDATE admin_accounts SET adImage = '$newImageName' WHERE id ='$id'";
                                    mysqli_query($conn, $quer);
                                    move_uploaded_file($tmpName, 'imgs/' . $newImageName);
                                    echo "
        <script>
        document.location.href = 'index.php';
        </script>
        ";
                                }
                            }
                            ?>
                        </div>

                        <form action="" method="post" enctype="multipart/form-data">
                            <h3>Admin Profile</h3>
                            <div class="form-group">

                                <input type="text" name="update_name" value="<?php echo $_SESSION['adName']; ?>" class="form-control">
                            </div>
                            <div class="form-wrapper">
                                <input type="text" name="update_email" value="<?php echo $_SESSION['adEmail']; ?>" class="form-control">

                            </div>
                            <div class="form-wrapper">
                                <input type="text" value="<?php echo $_SESSION['adID']; ?>" readonly class="form-control">
                            </div>

                            <div class="form-wrapper">
                                <input type="text" name="update_address" value="<?php echo $_SESSION['adAddress']; ?>" class="form-control">
                            </div>
                            <div class="form-wrapper">
                                <input type="text" name="update_password" value="<?php echo $_SESSION['adPwd']; ?>" class="form-control">

                            </div>
                            <div class="form-wrapper">
                                <select name="" id="" class="form-control">
                                    <option value="<?php echo $_SESSION['adGender']; ?>" selected><?php echo $_SESSION['adGender']; ?></option>
                                </select>
                            </div>



                            <input type="submit" value="Edit" name="update_profile" class="edit">

                            </button>
                        </form>
                    </div>
                </div>



            </div>
        </div>


    </body>

    </html>


<?php
} else {
    header('Location: ../Sign-in Page AM.php');
    exit();
}

?>