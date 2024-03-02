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
          <div class="row">
            <br>
            <h3 align="center"><Strong>Applications And Details Of Students</Strong></h3>
            <br>
            <div class="col-md-15 bg-white padding-2" style="margin-left:-6%; margin-right:-6%;">
              
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
                        $sql = "SELECT * FROM users";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                          while ($row = $result->fetch_assoc()) {

                           
                        ?>
                            <tr style="text-align: center;">
                              <td><?php echo $row['rno']; ?></td>
                              <td><?php echo $row['fname']; ?></td>
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
    $(function() {
      $('#example2').DataTable({
        'paging': true,
        'lengthChange': false,
        'searching': false,
        'ordering': true,
        'info': true,
        'autoWidth': false
      });
    });
  </script>

<script>
  function checkdelete()
  {
      return confirm('Are You Sure You Want To Delete The Record ?');
  }

    </script>
</body>

</html>