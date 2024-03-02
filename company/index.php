<?php

//To Handle Session Variables on This Page
session_start();

//If user Not logged in then redirect them back to homepage. 
if (empty($_SESSION['id_company'])) {
  header("Location: ../index.php");
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
        <div class="container" style="margin-top: 10px;">
          <div class="row">
          <div class="row latest-job margin-top-0 margin-bottom-0 bg-white" style="padding:30px; margin:30px; margin-left:-8%; margin-right:-8%; margin-top:10px;" >

              <h2><strong>Company Profile</strong></h2>
              <div class="row">
                  <div class="col-md-12">
                    <div class="box box-primary">
                      <div class="box-header with-border">
                        <br>
              <div class="row">
                <form action="update-company.php" method="post" enctype="multipart/form-data">
                  <?php
                  $sql = "SELECT * FROM company WHERE id_company='$_SESSION[id_company]'";
                  $result = $conn->query($sql);

                  if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                  ?>
                      <div class="col-md-6 latest-job ">
                        <div class="form-group">
                          <label>Company Name</label>
                          <input type="text" class="form-control input-lg" name="companyname" value="<?php echo $row['companyname']; ?>" required="">
                        </div>
                        <div class="form-group">
                          <label>Website</label>
                          <input type="text" class="form-control input-lg" name="website" value="<?php echo $row['website']; ?>" required="">
                        </div>
                        <div class="form-group">
                          <label for="email">Email address</label>
                          <input type="email" class="form-control input-lg" id="email" placeholder="Email" value="<?php echo $row['email']; ?>" readonly>
                        </div>
                        <div class="form-group">
                          <label>About Me</label>
                          <textarea class="form-control input-lg" rows="2" name="aboutme"><?php echo $row['aboutme']; ?></textarea>
                        </div>
                        <div class="form-group">
                          <button type="submit" class="btn btn-flat btn-success">Update Profile</button>
                        </div>
                      </div>
                      <div class="col-md-6 latest-job ">
                        <div class="form-group">
                          <label for="contactno">Contact Number</label>
                          <input type="text" class="form-control input-lg" id="contactno" name="contactno" placeholder="Contact Number" value="<?php echo $row['contactno']; ?>">
                        </div>
                        <div class="form-group">
                          <label for="city">City</label>
                          <input type="text" class="form-control input-lg" id="city" name="city" value="<?php echo $row['city']; ?>" placeholder="city">
                        </div>
                        <div class="form-group">
                          <label for="state">State</label>
                          <input type="text" class="form-control input-lg" id="state" name="state" placeholder="state" value="<?php echo $row['state']; ?>">
                        </div>
                        <div class="form-group">
                          <label>Change Profile</label>
                          <input type="file" name="image" class="btn btn-default">
                          <?php if ($row['logo'] != "") { ?>
                            <img src="../uploads/logo/<?php echo $row['logo']; ?>" class="img-responsive" style="max-height: 150px; max-width: 150px;">
                          <?php } ?>
                        </div>
                      </div>
                  <?php
                    }
                  }
                  ?>
                </form>
              </div>
              <?php if (isset($_SESSION['uploadError'])) { ?>
                <div class="row">
                  <div class="col-md-12 text-center">
                    <?php echo $_SESSION['uploadError']; ?>
                  </div>
                </div>
              <?php unset($_SESSION['uploadError']);
              } ?>

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
  <!-- AdminLTE App -->
  <script src="../js/adminlte.min.js"></script>
</body>

</html>