<?php

//To Handle Session Variables on This Page
session_start();

//If user Not logged in then redirect them back to homepage. 
if (empty($_SESSION['id_user'])) {
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
  <div class="wrapper">
    <div class=" content-wrapper" style="margin-left: 0px;">
      <section class="content-header" >
        <div class="container">
          <div class="row latest-job margin-top-0 margin-bottom-0 bg-white" style="padding:40px; margin:20px; margin-left:-6%; margin-right:-6%; margin-top:20px;" >
          <h2>Profile</h2>
                <div class="row">
                  <div class="col-md-12">
                    <div class="box box-primary">
                      <div class="box-header with-border">
                        <div class="pull-right">
          <form action="update-profile.php" method="post" enctype="multipart/form-data">
                <?php
                //Sql to get logged in user details.
                $sql = "SELECT * FROM users WHERE id_user='$_SESSION[id_user]'";
                $result = $conn->query($sql);

                //If user exists then show his details.
                if ($result->num_rows > 0) {
                  while ($row = $result->fetch_assoc()) {
                ?>
                    <div class="row">
                      <div class="col-md-3 latest-job ">
                      <div class="form-group">
                      <label for="rno">Register Number</label>
                      <input class="form-control input-lg" type="text" id="rno" name="rno" placeholder="Register Number *" value="<?php echo $row['rno']; ?>" required="">
                      </div>
                        <div class="form-group">
                          <label for="fname">First Name</label>
                          <input type="text" class="form-control input-lg" id="fname" name="fname" placeholder="First Name" value="<?php echo $row['fname']; ?>" required="">
                        </div>
                        <div class="form-group">
                          <label for="lname">Last Name</label>
                          <input type="text" class="form-control input-lg" id="lname" name="lname" placeholder="Last Name" value="<?php echo $row['lname']; ?>" required="">
                        </div>
                        <div class="form-group">
                          <label for="email">Email address</label>
                          <input type="email" class="form-control input-lg" id="email" placeholder="Email" value="<?php echo $row['email']; ?>" readonly>
                        </div>
                        <div class="form-group">
                        <label for="ano">Aadhar Number</label>
                        <input class="form-control input-lg" type="text" id="ano" name="ano"  placeholder="Aadhar Number *" value="<?php echo $row['ano']; ?>" required="">
                        </div>
                        
                  </div>
                  
                  <div class="col-md-3 latest-job ">
                        <div class="form-group">
                          <label for="dob">Date of Birth</label>
                          <input type="text" class="form-control input-lg" id="dob" placeholder="Date of Birth" value="<?php echo $row['dob']; ?>" readonly>
                        </div>
                        <div class="form-group">
                          <label for="age">Age</label>
                          <input type="text" class="form-control input-lg" id="age" placeholder="Age" value="<?php echo $row['age']; ?>" readonly>
                        </div>
                        
                        <div class="form-group">
                        <label for="gender">Gender</label>
                        <input class="form-control input-lg" type="text" id="gender" name="gender"  placeholder="Gender *" value="<?php echo $row['gender']; ?>" required="">
                        </div>
                       
                        <div class="form-group">
                          <label for="contactno">Contact Number</label>
                          <input type="text" class="form-control input-lg" id="contactno" name="contactno" placeholder="Contact Number" value="<?php echo $row['contactno']; ?>">
                        </div>
                                           
                        <div class="form-group">
                          <label for="address">Address</label>
                          <textarea id="address" name="address" class="form-control input-lg" rows="2" placeholder="Address"><?php echo $row['address']; ?></textarea>
                        </div>
                  </div>
                  
                  <div class="col-md-3 latest-job ">
                         <div class="form-group">
                          <label for="city">City</label>
                          <input type="text" class="form-control input-lg" id="city" name="city" value="<?php echo $row['city']; ?>" placeholder="city">
                        </div>
                        <div class="form-group">
                          <label for="state">State</label>
                          <input type="text" class="form-control input-lg" id="state" name="state" placeholder="state" value="<?php echo $row['state']; ?>">
                        </div>
                        <div class="form-group">
                          <label>Course Studying</label>
                          <input type="text" class="form-control input-lg"  id="dept" name="dept" value="<?php echo $row['dept']; ?>">
                        </div>
                        <div class="form-group">
                          <label>Passing Year</label>
                          <input type="text" class="form-control input-lg" id="passingyear" name="passingyear" value="<?php echo $row['passingyear']; ?>">
                        </div>
                        <div class="form-group">
                          <label for="Marks">SSC Marks</label>
                          <input type="text" class="form-control input-lg" id="Marks" name="ssc" placeholder="Percentage/CGPA" value="<?php echo $row['ssc']; ?>">
                        </div>
                  </div>

                  <div class="col-md-3 latest-job ">
                        <div class="form-group">
                          <label for="Marks">HSC Marks</label>
                          <input type="text" class="form-control input-lg" id="Marks" name="hsc" placeholder="Percentage/CGPA" value="<?php echo $row['hsc']; ?>">
                        </div>
                        <div class="form-group">
                          <label for="Marks">UG Marks</label>
                          <input type="text" class="form-control input-lg" id="Marks" name="ug" placeholder="Percentage/CGPA" value="<?php echo $row['ug']; ?>">
                        </div>
                        <div class="form-group">
                          <label for="Marks">PG Marks</label>
                          <input type="text" class="form-control input-lg" id="Marks" name="pg" placeholder="Percentage/CGPA" value="<?php echo $row['pg']; ?>">
                        </div>
                        <div class="form-group">
                          <label>Upload/Change Resume</label>
                          <input type="file" name="resume" class="btn btn-default">
                        </div>

                        <div class="form-group">
                          <button type="submit" class="btn btn-flat btn-success">Update Profile</button>
                        </div>
                      </div>                       
                      </div>
                    </div>
                <?php
                  }
                }
                ?>
              </form>
              <?php if (isset($_SESSION['uploadError'])) { ?>
                <div class="row">
                  <div class="col-md-12 text-center">
                    <?php echo $_SESSION['uploadError']; ?>
                  </div>
                </div>
              <?php } ?>
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

<style>
  /* my css  */

  .box {

    font-size: medium;
    font-family: sans-serif;
  }


  li {
    color: aqua;
  }


  @media only screen and (max-width: 989px) {
    .box {
      margin: auto;
      text-align: center;
    }
  }
</style>