<?php

session_start();

if (empty($_SESSION['id_admin'])) {
  header("Location: index.php");
  exit();
}

require_once("../db.php");
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Placement Portal</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../css/AdminLTE.min.css">
  <link rel="stylesheet" href="../css/_all-skins.min.css">
  <!-- Custom -->
  <link rel="stylesheet" href="../css/custom.css">
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition skin-green sidebar-mini">
  <div class="wrapper">

    <?php

    include 'header.php';

    ?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper" style="margin-left: 0px;">

      <section id="candidates" class="content-header">
        <div class="container">
          <div class="col md-4">
            <h3 align="center"><strong>Details Of Placed Students</strong></h3>
            <br>

            <!-- Add placeholders for the dropdown boxes -->

            <label for="department">Department:</label>
            <select id="department" onchange="filterByDepartment()">
              <option value="">All Departments</option>
              <?php
              // Fetch department data from the database
              $departmentQuery = "SELECT DISTINCT dept FROM preport";
              $departmentResult = $conn->query($departmentQuery);

              // Generate department options
              if ($departmentResult->num_rows > 0) {
                while ($departmentRow = $departmentResult->fetch_assoc()) {
                  $department = $departmentRow['dept'];
                  echo "<option value='$department'>$department</option>";
                }
              }
              ?>
            </select>

            <label for="coordinator">Company:</label>
            <select id="coordinator" onchange="filterBycoordinator()">
              <option value="">All Company</option>
              <?php
              // Fetch coordinator data from the database
              $coordinatorQuery = "SELECT DISTINCT cmp FROM preport";
              $coordinatorResult = $conn->query($coordinatorQuery);

              // Generate coordinator options
              if ($coordinatorResult->num_rows > 0) {
                while ($coordinatorRow = $coordinatorResult->fetch_assoc()) {
                  $coordinator = $coordinatorRow['cmp'];
                  echo "<option value='$coordinator'>$coordinator</option>";
                }
              }
              ?>
            </select>

            <a href="export1.php">
              <button type="submit1" name="export_excel_btn" class="btn btn-primary">Export to Excel</button>
            </a>
            <button type="submit1" onclick="sortTable()" name="export_excel_btn" style="margin-left: 8px;" class="btn btn-success">Sort Data</button>
          </div>

          <br>
          <div class="row margin-top-20">
            <div class="col-md-15 bg-white padding-2">
              <div class="box-body table-responsive no-padding">
                <table id="example2" class="table table-hover">
                  <tr class="header">
                    <thead>
                      <th style="width:20%; text-align: center;"> Regno</th>
                      <th style="width:20%; text-align: center;"> Name</th>
                      <th style="width:20%; text-align: center;"> Department</th>
                      <th style="width:20%; text-align: center;"> coordinator</th>
                      <th style="width:20%; text-align: center;"> Role</th>
                      <th style="width:20%; text-align: center;"> CTC</th>
                      <th style="width:20%; text-align: center;"> Email</th>
                      <th style="width:20%; text-align: center;"> Delete</th>
                    </thead>
                    <tbody>
                      <?php
                      // selecting student record via option 
                      // fetching placed students from placed table &user table

                      $sql = "SELECT * FROM preport";
                      $_SESSION['QUERY'] = $sql;
                      $result = $conn->query($sql);

                      if ($result->num_rows > 0) {

                        while ($row = $result->fetch_assoc()) {


                      ?>
                          <tr>
                            <td style="text-align: center;"><?php echo $row['regno']; ?></td>
                            <td style="text-align: center;"><?php echo $row['name']; ?></td>
                            <td style="text-align: center;"><?php echo $row['dept']; ?></td>
                            <td style="text-align: center;"><?php echo $row['cmp']; ?></td>
                            <td style="text-align: center;"><?php echo $row['des']; ?></td>
                            <td style="text-align: center;"><?php echo $row['sal']; ?></td>
                            <td style="text-align: center;"><?php echo $row['email']; ?></td>
                            <td style="text-align: center;"><a id="delete" href="deletereport.php?regno=<?php echo $row['regno']; ?>"><i class='fa fa-trash' onclick='return checkdelete()'></i></a></td>

                          </tr>


                      <?php

                        }
                      }

                      ?>
                    </tbody>
                </table>
              </div>
            </div>
          </div>


        </div>



        <!-- <div class="col-md-2 ">



                    </div> -->
    </div>
  </div>
  </section>



  </div>
  <!-- /.content-wrapper -->
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>

  </div>
  <!-- ./wrapper -->

  <!-- jQuery 3 -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <!-- Bootstrap 3.3.7 -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <!-- AdminLTE App -->
  <script src="../js/adminlte.min.js"></script>
</body>

</html>

<!-- script to sort data  -->
<script>
  function sortTable() {
    var table, rows, switching, i, x, y, shouldSwitch;
    table = document.getElementById("example2");
    switching = true;

    // Make a loop that will continue until no switching has been done
    while (switching) {
      switching = false;
      rows = table.rows;

      // Loop through all table rows (except the first, which contains table headers)
      for (i = 1; i < (rows.length - 1); i++) {
        shouldSwitch = false;
        x = rows[i].getElementsByTagName("TD")[2]; // Department column
        y = rows[i + 1].getElementsByTagName("TD")[2]; // Next row's Department column

        // Compare the departments
        if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
          shouldSwitch = true;
          break;
        } else if (x.innerHTML.toLowerCase() === y.innerHTML.toLowerCase()) {
          // If departments are the same, compare the coordinator names
          var coordinatorX = rows[i].getElementsByTagName("TD")[3].innerHTML.toLowerCase();
          var coordinatorY = rows[i + 1].getElementsByTagName("TD")[3].innerHTML.toLowerCase();
          if (coordinatorX > coordinatorY) {
            shouldSwitch = true;
            break;
          }
        }
      }

      if (shouldSwitch) {
        rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
        switching = true;
      }
    }
  }

  function checkdelete() {
    return confirm('Are You Sure You Want To Delete The Record?');
  }
</script>



<!-- script for filtering table on the basis of coordinator name  -->
<script>
  function myFunction() {

    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("myInput");
    filter = input.value.toUpperCase();
    table = document.getElementById("example2");
    tr = table.getElementsByTagName("tr");

    // Loop through all table rows, and hide those who don't match the search query
    for (i = 0; i < tr.length; i++) {


      td = tr[i].getElementsByTagName("td")[0];

      for (var j = 0; j < td.length; j++) {

        td = tr[i].getElementsByTagName("td")[j]; //1 row ke 1 column ki value hai yeh
        if (td) {
          txtValue = td.textContent || td.innerHTML;
          if (txtValue.toUpperCase().indexOf(filter) > -1) {
            tr[i].style.display = "";

          } else {
            tr[i].style.display = "none";
          }
        }
      }
    }
  }



  function myFunction() {
    // Declare variables
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("myInput");
    filter = input.value.toUpperCase();
    table = document.getElementById("example2");
    tr = table.getElementsByTagName("tr");

    // Loop through all table rows, and hide those who don't match the search query
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
</script>


<!-- Update the script block -->
<script>
  function filterByDepartment() {
    var input, filter, table, tr, td, i;
    input = document.getElementById("department");
    filter = input.value.toUpperCase();
    table = document.getElementById("example2");
    tr = table.getElementsByTagName("tr");

    for (i = 0; i < tr.length; i++) {
      td = tr[i].getElementsByTagName("td")[2]; // Department column
      if (td) {
        var department = td.innerText || td.textContent;
        if (filter === "" || department.toUpperCase().indexOf(filter) > -1) {
          tr[i].style.display = "";
        } else {
          tr[i].style.display = "none";
        }
      }
    }
  }

  function filterBycoordinator() {
    var input, filter, table, tr, td, i;
    input = document.getElementById("coordinator");
    filter = input.value.toUpperCase();
    table = document.getElementById("example2");
    tr = table.getElementsByTagName("tr");

    for (i = 0; i < tr.length; i++) {
      td = tr[i].getElementsByTagName("td")[3]; // coordinator column
      if (td) {
        var coordinator = td.innerText || td.textContent;
        if (filter === "" || coordinator.toUpperCase().indexOf(filter) > -1) {
          tr[i].style.display = "";
        } else {
          tr[i].style.display = "none";
        }
      }
    }
  }

  function sortTable() {
    // Existing sortTable() function code
  }
</script>


<style>
  #myInput {
    background-image: url('/css/searchicon.png');
    /* Add a search icon to input */
    background-position: 10px 12px;
    /* Position the search icon */
    background-repeat: no-repeat;
    /* Do not repeat the icon image */
    width: 100%;
    /* Full-width */
    font-size: 16px;
    /* Increase font-size */
    padding: 12px 20px 12px 40px;
    /* Add some padding */
    border: 1px solid #ddd;
    /* Add a grey border */
    margin-bottom: 12px;
    /* Add some space below the input */
  }

  #example2 {
    border-collapse: collapse;
    /* Collapse borders */
    width: 100%;
    /* Full-width */
    font-size: 18px;
    /* Increase font-size */
  }

  #example2 th,
  #example2 td {
    text-align: left;
    /* Left-align text */
    padding: 12px;
    /* Add padding */
  }

  #example2 tr {
    /* Add a bottom border to all table rows */
    border-bottom: 1px solid #ddd;
  }

  #example2 tr.header,
  #example2 tr:hover {
    /* Add a grey background color to the table header and on hover */
    background-color: #f1f1f1;
  }
</style>