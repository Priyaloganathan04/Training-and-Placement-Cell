<?php

//To Handle Session Variables on This Page
session_start();



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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
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
    <div class="wrapper">
    <div class=" content-wrapper" style="margin-left: 0px;">
      <section class="content-header" >
        <div class="container">
          <div class="row latest-job margin-top-0 margin-bottom-0 bg-white" style="padding:30px; margin:30px; margin-left:-6%; margin-right:-6%; margin-top:30px;" >
          <h2><strong>Details and Information of Students</strong></h2>
                <div class="row">
                  <div class="col-md-12">
                    <div class="box box-primary">
                      <div class="box-header with-border">
                        <br>
        <div class="row margin-top-20">
          <div class="col-md-12">
            <div class="box-body table-responsive no-padding">
              <table id="example2" class="table table-hover">
                <thead>
                  <th style="text-align: center;">  Registerno</th>
                  <th style="text-align: center;">  Candidate</th>
                  <th style="text-align: center;">  Department</th>
                  <th style="text-align: center;">  City</th>
                  <th style="text-align: center;">  State</th>
                  <th style="text-align: center;">  Download Resume</th>
                  <th style="text-align: center;">  Status</th>
                  <th style="text-align: center;">  Delete</th>
                </thead>
                <tbody>

                
                  <?php

                  $coordinatorId = $_SESSION['id_coordinator'];
                  $coordinatorDepartment = "";
                  // Fetch the coordinator's department from the database using $coordinatorId
                  $sqlCoordinator = "SELECT dept FROM coordinator WHERE id_coordinator = '$coordinatorId'";
                  $resultCoordinator = $conn->query($sqlCoordinator);

                  if ($resultCoordinator->num_rows > 0) {
                    $rowCoordinator = $resultCoordinator->fetch_assoc();
                    $coordinatorDepartment = $rowCoordinator['dept'];
                  }
                  // Display student details
                  $sql = "SELECT * FROM users WHERE dept = '$coordinatorDepartment'";
                  $result = $conn->query($sql);

                  if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                      
                  ?>
                      <tr style="text-align: center;">
                        <td><?php echo $row['rno']; ?></td>
                        <td><?php echo $row['fname'] . ' ' . $row['lname']; ?></td>
                        <td><?php echo $row['dept']; ?></td> 
                        <td><?php echo $row['city']; ?></td>
                        <td><?php echo $row['state']; ?></td>
                        <?php if ($row['resume'] != '') { ?>
                          <td style="text-align: center;"><a href="../uploads/resume/<?php echo $row['resume']; ?>" download="<?php echo $row['fname'] . ' Resume'; ?>"><i class="fa fa-file" ></i></a></td>
                        <?php } else { ?>
                          <td>No Resume Uploaded</td>
                        <?php } ?>
                        <td>
                          <?php
                          if ($row['active'] == '1') {
                            echo "Activated";
                          } else if ($row['active'] == '2') {
                          ?>
                            <a href="reject-student.php?id=<?php echo $row['id_user']; ?>">Reject</a> <a href="approve-student.php?id=<?php echo $row['id_user']; ?>">Approve</a>
                          <?php
                          } else if ($row['active'] == '3') {
                          ?>
                            <a href="approve-student.php?id=<?php echo $row['id_user']; ?>">Reactivate</a>
                          <?php
                          } else if ($row['active'] == '0') {
                            echo "Rejected";
                          }
                          ?>
                        </td>
                        <td><a href="delete-student.php?id=<?php echo $row['id_user']; ?>"><i class='fa fa-trash' onclick='return checkdelete()'></i></a></td>
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
    </div>
  </div>
</section>

</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
<!-- AdminLTE App -->
<script src="../js/adminlte.min.js"></script>


<script>
function checkdelete()
{
return confirm('Are You Sure You Want To Delete The Record ?');
}

</script>
</body>

</html>