<?php

//To Handle Session Variables on This Page
session_start();

//If user Not logged in then redirect them back to homepage. 
//This is required if user tries to manually enter view-job-post.php in URL.
if (empty($_SESSION['id_jobpost'])) {
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../css/AdminLTE.min.css">
  <link rel="stylesheet" href="../css/_all-skins.min.css">
  <!-- Custom -->
  <link rel="stylesheet" href="../css/custom.css">

  <script src="../js/tinymce/tinymce.min.js"></script>

  <script>
    tinymce.init({
      selector: '#description',
      height: 300
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

    include 'header.php';
    ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="wrapper">
    <div class=" content-wrapper" style="margin-left: 0px;">
      <section class="content-header" >
        <div class="container">
          <div class="row latest-job margin-top-0 margin-bottom-0 bg-white" style="padding:30px; margin:30px; margin-left:-8%; margin-right:-8%;" >
          <h2><strong>Update Drive</strong></h2>
                <div class="row">
                  <div class="col-md-12">
                    <div class="box box-primary">
                      <div class="box-header with-border">
                        <br>
                                <form action="updatedrive1.php" method="post" enctype="multipart/form-data">
                                    <?php
                                    $sql = "SELECT * FROM job_post WHERE id_jobpost='$_SESSION[id_jobpost]'";
                                    $result = $conn->query($sql);

                                    if ($result->num_rows > 0) {
                                        while ($row = $result->fetch_assoc()) {
                                    ?>
                                            <div class="col-md-6 latest-job ">
                                                <div class="form-group">
                                                    <label>coordinator Name</label>
                                                    <input type="text" class="form-control input-lg" name="coordinatorname" id="coordinatorname" value="<?php echo $row['jobtitle']; ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label>Role</label>
                                                    <input type="text" class="form-control input-lg" name="role" id="role" value="<?php echo $row['role']; ?>">
                                                </div>

                                                <div class="form-group">
                                                    <label>Drive Detail</label>
                                                    <textarea class="form-control input-lg" rows="4" id="description" name="description"><?php echo $row['description']; ?></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <button type="submit" name="submit" id="submit" class="btn btn-flat btn-success">Update Profile</button>
                                                </div>
                                            </div>
                                            <div class="col-md-6 latest-job ">
                                                <div class="form-group">
                                                    <label for="contactno">Eligibility</label>
                                                    <input type="text" class="form-control input-lg" id="Eligibility" name="Eligibility" placeholder="Eligibility" value="<?php echo $row['maximumsalary']; ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label for="city">CTC</label>
                                                    <input type="text" class="form-control input-lg" id="CTC" name="CTC" value="<?php echo $row['minimumsalary']; ?>" placeholder="CTC">
                                                </div>
                                                <div class="form-group">
                                                    <label for="state">Qualification Required</label>
                                                    <input type="text" class="form-control input-lg" id="qualification" name="qualification" placeholder="qualification" value="<?php echo $row['qualification']; ?>">
                                                </div>

                                            </div>
                                    <?php
                                        }
                                    }
                                    ?>
                                </form>
                            </div>


                        </div>



                    </div>
                </div>

            </section>






        </div>
        <!-- /.content-wrapper -->

        <footer class=" main-footer" style="margin-left: 0px;">
            <div class="text-center">
                <strong>Copyright &copy; 2022 <a href="scsit@Davv">Placement Portal</a>.</strong> All rights
                reserved.
            </div>
        </footer>

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

</body>

</html>