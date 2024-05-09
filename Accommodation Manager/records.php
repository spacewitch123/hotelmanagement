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
    <title>Records</title>
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

          <li><a href="./application.php"><i class="Appication"></i>Application</a></li>
          <li><a href="./records.php"><i class="Records"></i><span class="active">Records</span></a></li>
          <li><a href="../DB/logout.php"><i class="Appication"></i>Log out</a></li>

        </ul>
      </div>
      <div class="main_content">
        <div class="header"><?php echo $_SESSION['amName']; ?> Dashboard </div>
        <div class="info">
          <!-- ************************CODE FOR REMOVING DATA  TABLE********************** -->

          <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names.." title="Type in a name">

          <?php
          $query = "SELECT * FROM booking_form WHERE status = 'Approved' ORDER BY id ASC";
          $result = mysqli_query($conn, $query);
          ?>

          <p align="center"><button class="sort" onclick="sortTable()">Sort Alphabetically</button></p>

          <table id="myTable">
            <tr class="header">
              <th style="width:10%;">Full Name</th>
              <th style="width:10%;">Matric Number</th>
              <th style="width:10%;">Email</th>
              <th style="width:10%;">Nationality</th>
              <th style="width:8%;">Date of Birth</th>
              <th style="width:5%;">College</th>
              <th style="width:10%;">Room Type</th>
              <th style="width:10%;">Room Number</th>
              <th style="width:8%;">Check In Date</th>
              <th style="width:10%;">Action</th>
            </tr>

            <?php
            if (mysqli_num_rows($result) > 0) {
              foreach ($result as $row) {
            ?>

                <tr>

                  <td><?php echo $row['fname']; ?> <?php echo $row['lname']; ?></td>
                  <td><?php echo $row['userID']; ?></td>
                  <td><?php echo $row['email']; ?></td>
                  <td><?php echo $row['nationality']; ?></td>
                  <td><?php echo $row['dob']; ?></td>
                  <td><?php echo $row['college']; ?></td>
                  <td><?php echo $row['roomType']; ?></td>
                  <td><?php echo $row['roomNo']; ?></td>
                  <td><?php echo $row['chekInDate']; ?></td>
                  <td>
                    <input type="hidden" name="id1" value=" <?php echo $row['id']; ?>" />
                    <a href="edit.php?id=<?= $row['id']; ?> "><input type="submit" class="approve" name="edit" value="Edit" onclick=edit() /></a>
                    <a href="delete.php?id=<?= $row['id']; ?> "><button type="submit" class="deny" name="delete" value="Delete">Delete</button>
                  </td>

              <?php
              }
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
  </body>

  </html>

<?php
} else {
  header('Location: ../Sign-in Page AM.php');
  exit();
}

?>