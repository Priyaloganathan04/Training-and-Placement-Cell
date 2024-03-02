
<?php

//To Handle Session Variables on This Page
session_start();

//If user Not logged in then redirect them back to homepage. 
if (empty($_SESSION['id_company'])) {
  header("Location: ../index.php");
  exit();
}

require_once("../db.php");
if (isset($_POST['submit'])) {
    //$a=$_POST['sno'];
    $b=$_POST['date'];
    $c=$_POST['dept'];
    $d=$_POST['tp'];
    $e=$_POST['pr'];
    $f=$_POST['type'];
    $g=$_POST['sa'];
    $h=$_POST['mlvd'];
 

    $filename = $_FILES["uploadfile"]["name"];
    $tempname = $_FILES["uploadfile"]["tmp_name"];
    $folder = "uploads/meetproof/".$filename;
    move_uploaded_file($tempname, $folder);

    try {
        $sql = "INSERT INTO activities (`date`,`dept`,`tp`,`pr`,`type`,`sa`,`mlvd`,`uploadfile`)
 VALUES('$b','$c','$d','$e','$f','$g','$h','$folder')";
        $rs = mysqli_query($conn, $sql);
        echo  "RECORDS INSERTED";
        header("Location:activity.php");
    } catch(Exception $e) {
        echo  "This user is already registered";
    }
}

?><!DOCTYPE html>
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
          <div class="row latest-job margin-top-0 margin-bottom-0 bg-white" style="padding:30px; margin:30px; margin-left:-6%; margin-right:-6%; margin-top:50px;" >
          <h2><strong>Details Of Coducted Programs</strong></h2>
                <div class="row">
                  <div class="col-md-12">
                    <div class="box box-primary">
                      <div class="box-header with-border">
                        <br>
                <form method="post" action="activity.php">
                  <div class="col-md-6 latest-job ">
                    
                    <div class="form-group">
                    <span>Conducted Date</span>
                    <input class="form-control input-lg" type="date" id="date" name="date" placeholder="Date">
                    </div>
                    <div class="form-group">
                    <select class="form-control input-lg" name="dept" id="dept" required>
                        <option value="-1">Department</option>
                    <option value="MCA">MCA</option>
                    <option value="BCA">BCA</option>
                    <option value="BSC(CS)">BSC(CS)</option>
                </select>
                    </div>
                    <div class="form-group">
                    <input class="form-control input-lg" type="text" id="tp" name="tp" placeholder="Title Of The Program" required="">
                    </div>
                    <div class="form-group">
                    <input class="form-control input-lg" type="text" id="pr" name="pr" placeholder="Program" required="">
                    </div>
                    
                    <div class="form-group">
                      <button type="submit" class="btn btn-flat btn-success" name="submit">Submit</button>
                    </div>
            </div>

                    <div class="col-md-6 latest-job ">
                      <br>
                    <div class="form-group">
                    <select class="form-control input-lg" name="type" id="type" required>
                        <option value="-1">Program Type</option>
                    <option value="International">International</option>
                    <option value="National">National</option>
                    <option value="Regional">Regional</option>
                </select>
                    </div>
                    <div class="form-group">
                      <input class="form-control  input-lg" id="sa"  name="sa" placeholder="T.No Of Student Attended" required="">
                    </div>
                    <div class="form-group">
                      <input type="text" class="form-control  input-lg" id="mlvd" name="mlvd" placeholder="MeetLink / VenueDetails" required="">
                    </div>
                    <div class="form-group">
                    <span class="details">Photo Proof</span>
                      <input type="file" class="form-control  input-lg" id="file" name="file" placeholder="Photo Proof" required="">
                    </div>


                    <!-- adding image to drive post  -->
                  </div>
                </form>
              </div>

            </div>
          </div>
        </div>
      </section>



    </div>
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
