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
    <div class="content-wrapper" style="margin-left: 0px;" >
    <section id="statistics" class="content-header">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12 text-center latest-job margin-bottom-20 margin-top-50">
                                    <h1 style="color:#0ea2bd;"><strong>Our Statistics</strong></h1>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-3 col-xs-6">
                                    <!-- small box -->
                                    <div class="small-box bg-red">
                                        <div class="inner">
                                            <?php
                                            $sql = "SELECT * FROM job_post";
                                            $result = $conn->query($sql);
                                            if ($result->num_rows > 0) {
                                                $totalno = $result->num_rows;
                                            } else {
                                                $totalno = 0;
                                            }
                                            ?>
                                            <h3>
                                                <?php echo $totalno; ?>
                                            </h3>

                                            <p>Total Drives</p>
                                        </div>
                                        <div class="icon">
                                            <i class="ion ion-ios-paper"></i>
                                        </div>
                                    </div>
                                </div>
                                <!-- ./col -->
                                <div class="col-lg-3 col-xs-6">
                                    <!-- small box -->
                                    <div class="small-box bg-yellow">
                                        <div class="inner">
                                            <?php
                                            $sql = "SELECT * FROM coordinator WHERE active='1'";
                                            $result = $conn->query($sql);
                                            if ($result->num_rows > 0) {
                                                $totalno = $result->num_rows;
                                            } else {
                                                $totalno = 0;
                                            }
                                            ?>
                                            <h3>
                                                <?php echo $totalno; ?>
                                            </h3>

                                            <p>Job Offers</p>
                                        </div>
                                        <div class="icon">
                                            <i class="ion ion-briefcase"></i>
                                        </div>
                                    </div>
                                </div>
                                <!-- ./col -->
                                <div class="col-lg-3 col-xs-6">
                                    <!-- small box -->
                                    <div class="small-box bg-blue">
                                        <div class="inner">
                                            <?php
                                            $sql = "SELECT * FROM users WHERE resume!=''";
                                            $result = $conn->query($sql);
                                            if ($result->num_rows > 0) {
                                                $totalno = $result->num_rows;
                                            } else {
                                                $totalno = 0;
                                            }
                                            ?>
                                            <h3>
                                                <?php echo $totalno; ?>
                                            </h3>

                                            <p>CV'S/Resume</p>
                                        </div>
                                        <div class="icon">
                                            <i class="ion ion-ios-list"></i>
                                        </div>
                                    </div>
                                </div>
                                <!-- ./col -->
                                <div class="col-lg-3 col-xs-6">
                                    <!-- small box -->
                                    <div class="small-box bg-green">
                                        <div class="inner">
                                            <?php
                                            $sql = "SELECT * FROM users WHERE active='1'";
                                            $result = $conn->query($sql);
                                            if ($result->num_rows > 0) {
                                                $totalno = $result->num_rows;
                                            } else {
                                                $totalno = 0;
                                            }
                                            ?>
                                            <h3>
                                                <?php echo $totalno; ?>
                                            </h3>

                                            <p>Daily Users</p>
                                        </div>
                                        <div class="icon">
                                            <i class="ion ion-person-stalker"></i>
                                        </div>
                                    </div>
                                </div>
                                  <!-- ./col -->
                                <div class="col-lg-3 col-xs-6">
                                    <!-- small box -->
                                    <div class="small-box bg-purple">
                                        <div class="inner">
                                        <?php
                                          $sql = "SELECT * FROM coordinator WHERE active='1'";
                                          $result = $conn->query($sql);
                                          if ($result->num_rows > 0) {
                                            $totalno = $result->num_rows;
                                          } else {
                                            $totalno = 0;
                                          }
                                        ?>  
                                        <h3>
                                                <?php echo $totalno; ?>
                                            </h3>

                                            <p>Pending Coordinators</p>
                                        </div>
                                        <div class="icon">
                                            <i class="ion ion-person-stalker"></i>
                                        </div>
                                    </div>
                                </div>    
                                 <!-- ./col -->
                                <div class="col-lg-3 col-xs-6">
                                    <!-- small box -->
                                    <div class="small-box bg-aqua">
                                        <div class="inner">
                                        <?php
                                          $sql = "SELECT * FROM company WHERE active='2'";
                                          $result = $conn->query($sql);
                                          if ($result->num_rows > 0) {
                                            $totalno = $result->num_rows;
                                          } else {
                                            $totalno = 0;
                                          }
                                          ?>
                                        <h3>
                                                <?php echo $totalno; ?>
                                            </h3>

                                            <p>Pending Companies</p>
                                        </div>
                                        <div class="icon">
                                            <i class="ion ion-person-stalker"></i>
                                        </div>
                                    </div>
                                </div>                
                                <!-- ./col -->
                                <div class="col-lg-3 col-xs-6">
                                    <!-- small box -->
                                    <div class="small-box bg-red">
                                        <div class="inner">
                                  <?php
                                        $sql = "SELECT * FROM users WHERE active='0'";
                                        $result = $conn->query($sql);
                                        if ($result->num_rows > 0) {
                                          $totalno = $result->num_rows;
                                        } else {
                                          $totalno = 0;
                                        }
                                        ?>
                                        
                                        <h3>
                                                <?php echo $totalno; ?>
                                            </h3>

                                            <p>Pending Students</p>
                                        </div>
                                        <div class="icon">
                                            <i class="ion ion-person-stalker"></i>
                                        </div>
                                    </div>
                                </div>                
                            <!-- ./col -->
                            <div class="col-lg-3 col-xs-6">
                                    <!-- small box -->
                                    <div class="small-box bg-orange">
                                        <div class="inner">
                                  <?php
                                        $sql = "SELECT * FROM preport";
                                        $result = $conn->query($sql);
                                        if ($result->num_rows > 0) {
                                          $totalno = $result->num_rows;
                                        } else {
                                          $totalno = 0;
                                        }
                                        ?>
                                        
                                        <h3>
                                                <?php echo $totalno; ?>
                                            </h3>

                                            <p>Placed Students</p>
                                        </div>
                                        <div class="icon">
                                            <i class="ion ion-person-stalker"></i>
                                        </div>
                                    </div>
                                </div>                

                            </div>
                        </div>
                    </section>
          

                               
  <!-- jQuery 3 -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <!-- Bootstrap 3.3.7 -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <!-- AdminLTE App -->
  <script src="../js/adminlte.min.js"></script>
</body>

</html>