<?php
require_once("../db.php");
error_reporting(0);
$query="SELECT *FROM activities";
$data=mysqli_query($conn,$query);
$total=mysqli_num_rows($data);
if ($total!=0) {
    
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
              <h3 align="center"><strong> Placement Activities And Programs</strong></h3>
              <br>
              <div class="col-md-15 bg-white padding-2" style="margin-left:-6%; margin-right:-6%;"> 
                <div class="row margin-top-20">
                  <div class="col-md-12">
                    <div class="box-body table-responsive no-padding">
                      <table id="example2" class="table table-hover">
                          <thead >        
                                <th style="text-align: center;"> SNo</th>
                                <th style="text-align: center;" > Date </th>
                                <th style="text-align: center;"> Department</th>
                                <th style="text-align: center;"> Title</th>
                                <th style="text-align: center;"> Program</th>
                                <th style="text-align: center;"> Type</th>
                                <th style="text-align: center;"> Attended Students</th>
                                <th style="text-align: center;"> MeetLink / VenueDetails</th>
                                <th style="text-align: center;"> Photo Proof</th>
			                          <th style="text-align: center;">Delete</th> 
                          </thead>
                      <tbody>
     <?php
        $sql = "SELECT * FROM activities";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                // output data of each row
                while ($row = $result->fetch_assoc()) {
     ?>
                <tr>
                <td style="text-align: center;"><?php echo $row['sno']; ?></td>
                <td style="text-align: center;"><?php echo $row['date']; ?></td>
                <td style="text-align: center;"><?php echo $row['dept']; ?></td>
                <td style="text-align: center;"><?php echo $row['tp']; ?></td>
                <td style="text-align: center;"><?php echo $row['pr']; ?></td>
                <td style="text-align: center;"><?php echo $row['type']; ?></td>
                <td style="text-align: center;"><?php echo $row['sa']; ?></td>
                <td style="text-align: center;"><?php echo $row['mlvd']; ?></td>
                <?php if ($row['resume'] != '') { ?>
                    <td><a href="../uploads/resume/<?php echo $row['resume']; ?>" download="<?php echo 'Notice'; ?>"><i class="fa fa-file"></i></a></td>
                <?php } else { ?>
                    <td>No Resume Uploaded</td>
                <?php } ?>

                <td style="text-align: center;"><a id="delete" href="deleteactivity.php?sno=<?php echo $row['sno']; ?>"><i class='fa fa-trash' onclick='return checkdelete()'></i></a></td>
                </tr> 
                <?php

              }
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

  








