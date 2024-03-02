<?php

session_start();

if (empty($_SESSION['id_admin'])) {
 
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
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../css/AdminLTE.min.css">
  <link rel="stylesheet" href="../css/_all-skins.min.css">
  <!-- Custom -->
  <link rel="stylesheet" href="../css/custom.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css">

  <script src="../js/tinymce/tinymce.min.js"></script>
  <script>
    tinymce.init({
      selector: '#description',
      height: 150
    });
  </script>
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
    include 'header.php'
    ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper" style="margin-left: 0px;">

      <section class="content-header">
        <div class="container">
          <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-10 latest-job margin-top-50 margin-bottom-20 large">
              <style>
                .large {

                  margin: auto;
                  margin-bottom: 20px;
                }
              </style>
              <h2 class="text-center">Active Drives</h2>
              <div class="input-group input-group-lg">
                <input type="text" id="searchBar" class="form-control" placeholder="Search job">
                <span class="input-group-btn">
                  <button id="searchBtn" type="button" class="btn btn-info btn-flat">Go!</button>
                </span>
              </div>
            </div>
            <div class="row margin-top-20" style="align-items: center; margin-left:9%; margin-right:1%;">
                  <div class="col-md-11">
                    <div class="box-body table-responsive no-padding">
                      <table id="example2" class="table table-hover">
                      <thead>
                        <th style="text-align: center;">Company Name</th>
                        <th style="text-align: center;">Role</th>
                        <th style="text-align: center;">Date Created</th>
                        <th style="text-align: center;">View</th>
                        <th style="text-align: center;">Delete</th>
                      </thead>
                      <tbody>
                        <?php
                        $sql = "SELECT job_post.*, company.companyname FROM job_post INNER JOIN company ON job_post.id_company=company.id_company";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                          $i = 0;
                          while ($row = $result->fetch_assoc()) {
                        ?>
                            <tr>
                              <td style="text-align: center;"><?php echo $row['jobtitle']; ?></td>
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
                    </table>
                  </div>
                </div>
              </div>

            </div>
          </div>                 
        </div>
      </section>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->


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