<?php

//To Handle Session Variables on This Page
session_start();

//If user Not logged in then redirect them back to homepage. 
//This is required if user tries to manually enter view-job-post.php in URL.
if (empty($_SESSION['id_company'])) {
  header("Location: ../index.php");
  exit();
}

//Including Database Connection From db.php file to avoid rewriting in all files  
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

      <section id="candidates" class="content-header" >
        <div class="container" style="margin-top: 50px;">
          <div class="row">
          <div class="row latest-job margin-top-0 margin-bottom-0 bg-white" style="padding:30px; margin:30px; margin-left:-8%; margin-right:-8%; margin-top:20px;" >

              <h2><strong>Posted Drives</strong></h2>
              <div class="row">
                  <div class="col-md-12">
                    <div class="box box-primary">
                      <div class="box-header with-border">
                        <br>
              <div class="row margin-top-20" >
                <div class="col-md-12">
                  <div class="box-body table-responsive no-padding">
                  <table id="example2" class="table table-hover">
                      <thead>
                        <th style="text-align: center;">Role</th>
                        
                        <th style="text-align: center;">Date Created</th>
                        <th style="text-align: center;">View</th>
                        <th style="text-align: center;">Delete</th>
                      </thead>
                      <tbody>
                        <?php
                        $sql = "SELECT job_post.*, company.companyname FROM job_post INNER JOIN company ON job_post.id_company=company.id_company where job_post.id_company = $_SESSION[id_company]";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                          $i = 0;
                          while ($row = $result->fetch_assoc()) {
                        ?>
                            <tr>
                              <td style="text-align: center;"><?php echo $row['role']; ?></td>
                             
                              <td style="text-align: center;"><?php echo date("d-M-Y", strtotime($row['createdat'])); ?></td>
                              <td style="text-align: center;"><a href="view-job-post.php?id=<?php echo $row['id_jobpost']; ?>"><i class="fa fa-address-card-o"></i></a></td>
                              <td style="text-align: center;"><a href="delete-job-post.php?id=<?php echo $row['id_jobpost']; ?>"><i class="fa fa-trash"></i></a></td>
                            </tr>
                        <?php

                            // $_SESSION['id_jobpost'] = $row['id_jobpost'];
                          }
                        }
                        ?>
                      </tbody>
                    </table>                  </div>
                </div>
              </div>

            </div>
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
</body>

</html>