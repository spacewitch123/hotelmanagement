<?php

$sname = "localhost";
$uname = "root";
$password = "";


$conn = mysqli_connect($sname, $uname, $password);


if(!$result1){
    echo '<script type="text/javascript">';
    echo 'window.location.href = "Sign-in Page.php"';
    echo '</script>'; 
}
$sql = "CREATE DATABASE students_accounts";
$result1 = mysqli_query($conn,$sql) or header("Location: Sign-in Page.php" . getenv("HTTP_REFERER"));


 
 echo "Database test_db created successfully\n";

mysqli_select_db($conn, "students_accounts");
$sqla = "CREATE TABLE accounts (
id int NOT NULL AUTO_INCREMENT,
PRIMARY KEY(id),
userID varchar(255)NOT NULL,
userPwd varchar(255)NOT NULL,
userEmail varchar(255)NOT NULL,
userName varchar(255)NOT NULL,
unique(userID),
userLname varchar(255)NOT NULL
)";
$result = mysqli_query($conn, $sqla) or die(header("Location: Sign-in Page.php" . getenv("HTTP_REFERER")));

if(!$result)
{
echo '<script type="text/javascript">';
echo 'window.location.href = "Sign-in Page.php"';
echo '</script>';  
}
mysqli_query($conn ,"INSERT INTO accounts(userID, userPWD, userEmail, userName, userLname) VALUES ('202201', 'Khalil202201', 'Karam.kl@college.com' , 'Karam', 'Khalil')");
mysqli_query($conn ,"INSERT INTO accounts(userID, userPWD, userEmail, userName, userLname) VALUES ('202202', 'Nashwa02', 'W.Nashwa02@college.com' , 'Wangi', 'Nashwa')");
mysqli_query($conn ,"INSERT INTO accounts(userID, userPWD, userEmail, userName, userLname) VALUES ('202203', 'NidaFa', 'Fairuza.Nida03@college.com' , 'Fairuza', 'Nida')");


$sql2 = "CREATE TABLE am_aacounts (
id int NOT NULL AUTO_INCREMENT,
PRIMARY KEY(id),
amID varchar(255)NOT NULL,
amName varchar(255)NOT NULL,
amEmail varchar(255)NOT NULL,
amGender varchar(255)NOT NULL,
amAddress varchar(255)NOT NULL,
amImage varchar(255) NOT NULL,
amPwd varchar(255)NOT NULL
)";
$result2 = mysqli_query($conn, $sql2) or die();


mysqli_query($conn ,"INSERT INTO am_aacounts(amID, amName, amEmail, amGender, amAddress, amImage, amPwd) VALUES ('MY12101', 'Shabrina Salsabila', 'Salsabila.Sh@gmail.com' , 'Female', 'No. 5, Jalan Mutiara Emas 3/1 Taman Mount Austin / Johor Bahru', 'Profile.png',  'SalSh01')");
mysqli_query($conn ,"INSERT INTO am_aacounts(amID, amName, amEmail, amGender, amAddress, amImage, amPwd) VALUES ('MY12102', 'Mohamed Torky', 'Torky.Mo@gmail.com' , 'Male', '4233 Batu 5 3/4 Jalan Skudai / Johor Bahru', 'Profile.png', 'TorkyMo02')");





$sql3 = "CREATE TABLE booking_form (
    id int NOT NULL AUTO_INCREMENT,
    PRIMARY KEY(id),
    userID varchar(255)NOT NULL,
    fname varchar(255)NOT NULL,
    lname varchar(255)NOT NULL,
    dob date NOT NULL,
    email varchar(255)NOT NULL,
    mobileNo varchar(255) NOT NULL,
    nationality varchar(255)NOT NULL,
    gender varchar(255)NOT NULL,
    address varchar(255)NOT NULL,
    college varchar(255)NOT NULL,
    roomType varchar(255)NOT NULL,
    roomNo varchar(255)NOT NULL,
    chekInDate date NOT NULL,
    unique(userID),
    status varchar(100) DEFAULT 'pending'
    )";
    $result3 = mysqli_query($conn, $sql3) or die();

    $sql4 = "CREATE TABLE admin_accounts (
        id int NOT NULL AUTO_INCREMENT,
        PRIMARY KEY(id),
        adID varchar(255)NOT NULL,
        adName varchar(255)NOT NULL,
        adEmail varchar(255)NOT NULL,
        adGender varchar(255)NOT NULL,
        adAddress varchar(255)NOT NULL,
        adImage varchar(255) NOT NULL,
        adPwd varchar(255)NOT NULL,
        unique(adID)
    )";
    $result4 = mysqli_query($conn, $sql4) or die();


mysqli_query($conn ,"INSERT INTO admin_accounts(adID, adName, adEmail, adGender, adAddress, adImage, adPwd) VALUES ('AD101', 'Nafis Ahmed', 'N.Ahmed@gmail.com' , 'Male', '52 JLN KUNING TAMAN PELANGI / Johor Bahru', 'Profile.png', 'AhmedNa01')");
mysqli_query($conn ,"INSERT INTO admin_accounts(adID, adName, adEmail, adGender, adAddress, adImage, adPwd) VALUES ('AD102', 'Shah Sajid', 'Sh.Sajid@gmail.com' , 'Male', '11C Jalan Tun Abdul Razak / Johor Bahru', 'Profile.png', 'ShahSajid02')");

echo '<script type="text/javascript">';
echo 'window.location.href = "Sign-in Page.php"';
echo '</script>';  

if(!$conn){
    echo "ERROR: Could not connect.";
}



