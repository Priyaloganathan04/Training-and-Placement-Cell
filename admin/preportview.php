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
            
            <div class="col-md-9 bg-white padding-2">

              <h3>PLACEMENT REPORT</h3>
              <div class="row margin-top-20">
                <div class="col-md-12">
                  <div class="box-body table-responsive no-padding">
                    <table id="example2" class="table table-hover">
                      <thead>
                                <th> SNo</th>
                                <th> Regno</th>
                                <th> Department</th>
                                <th> DateOf WrittenTest</th>
                                <th> coordinator</th>
                                <th> Desingation</th>
                                <th> Salary</th>
                                <th> Email Id</th>
                                <th> Mobile Number</th>
                                <th> Offer Letter</th>
                                <th> Delete</th>
		 
                      </thead>
                      <tbody>
                      <?php
        if(isset($array['id'])){
            // do something with the id value
            }else{
            // handle the case where the id key is not defined in the array
            }
$sql = "SELECT * FROM preport";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<tr>
            <td>".$row['sno']."</td>
            <td>".$row['regno']."</td>
            <td>".$row['dept']."</td>
            <td>".$row['dwt']."</td>
            <td>".$row['cmp']."</td>
            <td>".$row['des']."</td>
            <td>".$row['sal']."</td>
            <td>".$row['email']."</td>
            <td>".$row['mno']."</td>
            <td><img src='".$row['img2']."'height='100px' width='100px'></td>
            <td><a href='deletepreport.php?regno=".$row['regno']."'><i class='fa fa-trash' onclick='return checkdelete()'></i></a></td>
        </tr>";
    }
} else {
    echo "0 results";
}
$conn->close();
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
function checkdelete()
{
    return confirm('Are You Sure You Want To Delete The Record ?');
}

  </script>
</body>

</html>

