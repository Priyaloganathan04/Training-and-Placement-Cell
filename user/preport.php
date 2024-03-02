
<?php

//To Handle Session Variables on This Page
session_start();

//If user Not logged in then redirect them back to homepage. 
if (empty($_SESSION['id_user'])) {
  header("Location: ../index.php");
  exit();
}

require_once("../db.php");
if (isset($_POST['submit'])) {
  $a=$_POST['regno'];  
  $b=$_POST['name'];
  $c=$_POST['dept'];
  $e=$_POST['cmp'];
  $f=$_POST['des'];
  $g=$_POST['sal'];
  $h=$_POST['email'];
  
  
 
  try {
      $sql = "INSERT INTO preport (`regno`,`name`,`dept`,`cmp`,`des`,`sal`,`email`)
VALUES('$a','$b','$c','$e','$f','$g','$h')";
      $rs = mysqli_query($conn, $sql);
      echo  "RECORD INSERTED";
      header("Location:preport.php");
  } catch(Exception $e) {
      echo  "RECORD NOT INSERTED";
  }
}
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
    <div class=" content-wrapper" style="margin-left: 0px; border: #0ea2bd;">
      <section class="content-header">
        <div class="container">
          <br>
        <div class="row latest-job margin-top-0 margin-bottom-0 bg-white" style="padding:40px; margin:20px; margin-left:-6%; margin-right:-6%; margin-top:1%;" >
          <h2>Offer Letter</h2>
          <div class="row">
                  <div class="col-md-12">
                    <div class="box box-primary">
                      <div class="box-header with-border">
            <br>
            
              <form method="post" action="preport.php">
                  <div class="col-md-12 latest-job ">
                    <div class="form-group">
                    <input class="form-control input-lg" type="text" id="regno" name="regno" placeholder="Reg_No"required="">
                    </div>
                    <div class="form-group">
                    <input class="form-control input-lg" type="text" id="name" name="name" placeholder="Name"required="">
                    </div>
                    <div class="form-group">
                    <input class="form-control input-lg" type="text" id="dept" name="dept" placeholder="Department"required="">
                    </div>
                    <div class="form-group">
                    <input class="form-control input-lg" type="text" id="cmp" name="cmp" placeholder="coordinator" required="">
                    </div>
                    <div class="form-group">
                    <input class="form-control input-lg" type="text" id="des" name="des" placeholder="Role" required="">
                    </div>
                    <div class="form-group">
                      <input class="form-control  input-lg" id="sal"  name="sal" placeholder="CTC" required="">
                    </div>
                    <div class="form-group">
                      <input type="text" class="form-control  input-lg" id="email" name="email" placeholder="Email Id" required="">
                    </div>
                    <div class="form-group">
                      <button type="submit" class="btn btn-flat btn-success" name="submit">Submit</button>
                    </div>
                  </div>
                </form>
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
  <!-- AdminLTE App -->
  <script src="../js/adminlte.min.js"></script>
</body>

</html>
