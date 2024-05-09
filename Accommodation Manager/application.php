<?php
include "../DB/db_conn.php";
session_start();
if (isset($_SESSION['id']) && isset($_SESSION['amID'])) {

?>

  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Application</title>
    <link rel="stylesheet" href="./sylesheet.css">
  </head>

  <body>

    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    <div class="wrapper">
      <div class="sidebar">
        <a href="./index.php">
          <h2>PROFILE</h2>
        </a>
        <ul>

          <li><a href="./application.php"><i class="Appication"></i><span class="active">Application</span></a></li>
          <li><a href="./records.php"><i class="Records"></i>Records</a></li>
          <li><a href="../DB/logout.php"><i class="Appication"></i>Log out</a></li>

        </ul>
      </div>
      <div class="main_content">
        <div class="header"><?php echo $_SESSION['amName']; ?> Dashboard </div>

        <!-- *************************************************Data Table  View******************************************************** -->

        <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names.." title="Type in a name">


        <?php
        $query = "SELECT * FROM booking_form WHERE status = 'pending' ORDER BY id ASC";
        $result = mysqli_query($conn, $query);
        ?>

        <p align="center"><button class="sort" onclick="sortTable()">Sort Alphabetically</button></p>

        <table id="myTable">
          <tr class="header">
            <th style="width:20%;">Full Name</th>
            <th style="width:20%;">Matric Number</th>
            <th style="width:10%;">College</th>
            <th style="width:10%;">Room Type</th>
            <th style="width:10%;">Check In Date</th>
            <th style="width:20%;">Room Number</th>
            <th style="width:30%;">Action</th>

          </tr>

          <?php while ($row = mysqli_fetch_array($result)) {
          ?>
            <tr>

              <td><?php echo $row['fname']; ?> <?php echo $row['lname']; ?></td>
              <td><?php echo $row['userID']; ?></td>
              <td><?php echo $row['college']; ?></td>
              <td><?php echo $row['roomType']; ?></td>
              <td><?php echo $row['chekInDate']; ?></td>
              <form action="application.php" method="POST">
                <td>
                  <input type="hidden" name="id1" value=" <?php echo $row['id']; ?>" />
                  <input type="number" name="rN" placeholder="Add Room Number">
                </td>
                <td>
                  <input type="hidden" name="id1" value=" <?php echo $row['id']; ?>" />
                  <input type="submit" class="approve" name="approve" value="Approve" />
                  <input type="submit" class="deny" name="deny" value="Deny" />

                </td>
              </form>
              <!-- <td> <span class="action_btn"> <a href="./registration.html" target="_blank">View</a> </span> </td> -->
            </tr>
          <?php
          }
          ?>

        </table>

        <!-- *************************************************Java Scipt for table******************************************************** -->
        <script>
          function myFunction() {
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("myInput");
            filter = input.value.toUpperCase();
            table = document.getElementById("myTable");
            tr = table.getElementsByTagName("tr");
            for (i = 0; i < tr.length; i++) {
              td = tr[i].getElementsByTagName("td")[0];
              if (td) {
                txtValue = td.textContent || td.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                  tr[i].style.display = "";
                } else {
                  tr[i].style.display = "none";
                }
              }
            }
          }



          function sortTable() {
            var table, rows, switching, i, x, y, shouldSwitch;
            table = document.getElementById("myTable");
            switching = true;
            /*Make a loop that will continue until
            no switching has been done:*/
            while (switching) {
              //start by saying: no switching is done:
              switching = false;
              rows = table.rows;
              /*Loop through all table rows (except the
              first, which contains table headers):*/
              for (i = 1; i < (rows.length - 1); i++) {
                //start by saying there should be no switching:
                shouldSwitch = false;
                /*Get the two elements you want to compare,
                one from current row and one from the next:*/
                x = rows[i].getElementsByTagName("TD")[0];
                y = rows[i + 1].getElementsByTagName("TD")[0];
                //check if the two rows should switch place:
                if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
                  //if so, mark as a switch and break the loop:
                  shouldSwitch = true;
                  break;
                }
              }
              if (shouldSwitch) {
                /*If a switch has been marked, make the switch
                and mark that a switch has been done:*/
                rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
                switching = true;
              }
            }
          }
        </script>
      </div>

    </div>







    </div>


    <?php

    if (isset($_POST['approve'])) {
      $id = $_POST['id1'];
      $rN = $_POST['rN'];

      $select = "UPDATE booking_form SET status = 'Approved' ,roomNo = '$rN' WHERE id ='$id'";
      $result = mysqli_query($conn, $select);

      echo '<script type="text/javascript">';
      echo 'alert("Approved and added room number");';
      echo 'window.location.href = "application.php"';
      echo '</script>';
    }


    if (isset($_POST['deny'])) {
      $id = $_POST['id1'];

      $select = "UPDATE booking_form SET status = 'Denied' WHERE id ='$id'";
      $result = mysqli_query($conn, $select);

      echo '<script type="text/javascript">';
      echo 'alert("Approved and added room number");';
      echo 'window.location.href = "application.php"';
      echo '</script>';
    }

    ?>
  </body>

  </html>

<?php
} else {
  header('Location: ../Sign-in Page AM.php');
  exit();
}

?>