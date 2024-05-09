<?php

include "../DB/db_conn.php";
session_start();
$user_id = $_SESSION['id'];

if (isset($_POST['update_profile'])) {

    $update_name = mysqli_real_escape_string($conn, $_POST['update_name']);
    $update_email = mysqli_real_escape_string($conn, $_POST['update_email']);
    $update_address = mysqli_real_escape_string($conn, $_POST['update_address']);

    mysqli_query($conn, "UPDATE am_aacounts SET amName = '$update_name', amEmail = '$update_email', amAddress = '$update_address' WHERE id = '$user_id'") or die('query failed');

    echo '<script>alert("Information Updated Successfully");</script>';
}







if (isset($_SESSION['id']) && isset($_SESSION['amID'])) {
?>


    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <title><?php echo $_SESSION['amName']; ?> Dashboard</title>
        <link rel="stylesheet" href="./sylesheet.css">
    </head>

    <body>



        <?php
        $select = mysqli_query($conn, "SELECT * FROM am_aacounts WHERE id = '$user_id'") or die('query failed');
        if (mysqli_num_rows($select) > 0) {
            $_SESSION = mysqli_fetch_assoc($select);
        }
        ?>

        <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
        <div class="wrapper">
            <div class="sidebar">

                <a href="./index.html">
                    <h2>PROFILE </h2>
                </a>
                <ul>

                    <li><a href="./application.php"><i class="Appication"></i>Application</a></li>
                    <li><a href="./records.php"><i class="Records"></i>Records</a></li>
                    <li><a href="../DB/logout.php"><i class="Appication"></i>Log out</a></li>

                </ul>
            </div>
            <div class="main_content">
                <div class="header"><?php echo $_SESSION['amName']; ?> Dashboard </div>



                <div class="wrapper" style="background-image: url('tech.jpg');">
                    <div class="inner">
                        <div class="image-holder">

                            <form method="post" action="" id="form" enctype="multipart/form-data">
                                <img src="imgs/<?php echo $_SESSION['amImage']; ?>" title="<?php echo $_SESSION['amImage'] ?>" alt="image">
                                <input type="hidden" name="id" value="<?php echo $_SESSION['id'] ?>">
                                <input type="hidden" name="name" value="<?php echo $_SESSION['amName'] ?>">
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
                                    $quer = "UPDATE am_aacounts SET amImage = '$newImageName' WHERE id ='$id'";
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
                            <h3>Manager Profile</h3>
                            <div class="form-group">

                                <input type="text" name="update_name" value="<?php echo $_SESSION['amName']; ?>" class="form-control">
                            </div>
                            <div class="form-wrapper">
                                <input type="text" name="update_email" value="<?php echo $_SESSION['amEmail']; ?>" class="form-control">

                            </div>
                            <div class="form-wrapper">
                                <input type="text" value="<?php echo $_SESSION['amID']; ?>" readonly class="form-control">
                            </div>

                            <div class="form-wrapper">
                                <input type="text" name="update_address" value="<?php echo $_SESSION['amAddress']; ?>" class="form-control">

                            </div>
                            <div class="form-wrapper">
                                <select name="" id="" class="form-control">
                                    <option value="<?php echo $_SESSION['amGender']; ?>" selected><?php echo $_SESSION['amGender']; ?></option>
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