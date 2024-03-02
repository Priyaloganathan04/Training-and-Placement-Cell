<?php

//To Handle Session Variables on This Page


session_start();


//Including Database Connection From db.php file to avoid rewriting in all files
require_once("../db.php");



if (isset($_POST['submit'])) {

    // they take values using name attribute 
    $subject = $_POST['subject'];
    $notice = $_POST['input'];
    $audience = $_POST['audience'];


    //Folder where you want to save your resume. THIS FOLDER MUST BE CREATED BEFORE TRYING
    $filename = $_FILES["resume"]["name"];
    $tempname = $_FILES["resume"]["tmp_name"];
    $file = "../uploads/resume/".$filename;
    move_uploaded_file($tempname,$file);

    





    $sql = "INSERT INTO notice(subject,notice,audience,`resume`, `date`) VALUES ('$subject','$notice','$audience','$file',now())";

    if ($conn->query($sql) === TRUE) {
        include 'sendmail.php';
        header("Location: postnotice.php");
        exit();
    }
}

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Placement Portal</title>

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

<body class="hold-transition skin-white sidebar-mini">
  <div class="wrapper">

    <?php

    include 'header.php';

    ?>
<br>
<br>
    <div class="row">
        <div class="col-xs-6 responsive">
            <section>
                <div class="alert alert-success alert-dismissible" style="display: none;" id="truemsg">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-check"></i> Success!</h4>
                    New Notice Successfully added
                </div>
                    <br>
                    <br>
                <form class="centre" action="" method="POST">
                    <br>
                    <div>
                        <h4><strong> Post a new notice</strong></h4>
                    </div>
                    <div>
                    <br>
                        <input id="subject" class="subject" placeholder="Subject" type="text" name="subject" >

                    </div>
                    <div id="file" class="form-group">
                        <!-- <label style="color: red;">Attachment</label> -->
                        <input type="file" name="resume" class="btn btn-flat btn-primary upload">
                    </div>
                    <br>
                    <div class="form-group mt-3">
                        <textarea style="top:100px " type="input" class="input" name="input" id="input" placeholder="Notice" required></textarea>
                    </div>

                    <div class="form-group text-center option">
                        <label>Audience </label>
                        <select class="form-control select2 select2-hidden-accessible" style="width: 100%" tabindex="-1" aria-hidden="true" class="input" name="audience">

                            <option class="option" value="All Students">All Students</option>
                            <option class="option" value="Co-ordinators">Co-ordinators</option>


                        </select>
                    </div>
                    <br>
                    <div class="text-center">
                        <button class="btn btn-primary btn-sm" id="submit" name="submit" type=" submit1">POST</button>

                    </div><br>
                    <div>
                    </div>


                </form>

        </div>
        </section>

        <div class="col-xs-5 responsive2">  
                <h3 align="center"><strong> Posted Notices</strong></h3><br />
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                      <tr>
                                      <th>Subject</th>
                                      <th>Notice</th>
                                      <th>Audience</th>
                                      <th>File</th>
                                      <th>Date and Time</th>
                                      <th>Delete</th>
                      </tr>
    <?php

      $sql = "SELECT * FROM notice";

          $result = $conn->query($sql);

          if ($result->num_rows > 0) {

              // output data of each row
              while ($row = $result->fetch_assoc()) {
                  ?>
              <td><?php echo $row['subject']; ?></td>
              <td><?php echo $row['notice']; ?></td>
              <td><?php echo $row['audience']; ?></td>
              <?php if ($row['resume'] != '') { ?>
                  <td><a href="../uploads/resume/<?php echo $row['resume']; ?>" download="<?php echo 'Notice'; ?>"><i class="fa fa-file"></i></a></td>
              <?php } else { ?>
                  <td>No Resume Uploaded</td>
              <?php } ?>
              <td><?php echo $row['date']; ?></td>

              <td><a id="delete" href="deletenotice.php?id=<?php echo $row['id']; ?>"><i class='fa fa-trash' onclick='return checkdelete()'></i></a></td>
              </tr><?php

              }
          }
      
    ?>

            </div>
          </div>
        </div>
      </section>

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


<style>
    body {

        /* background-color: #bccde5;
         */
        background-color: white;
    }

    .centre {
        margin-left: 10%;
        text-align: center;
        height: 475px;
        width: 650px;
        border: 2px solid black;
        border-radius: 10px;
        /* display: inline-grid; */
        display: inline-block;
    }

    .subject {
        width: 50%;
        height: 20%;
        padding: 10px 10px;
        margin-bottom: 20px;
    }

    .option {
        width: 50%;
        margin: auto;
    }

    .upload{

        margin:auto;
        width: 50%;

    }
    .input {
        height: 100px;
        width: 250px;
        border-radius: 5px;
        background-color: white;
        text-align: center;

    }

    .button {
        background-color: #3e79c8;
        /* Green */
        border: none;
        color: white;
        padding: 15px 32px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin: 0px 10px 0px 10px;
    }

    /* @media screen and (max-width: 1447px) {

        .input1 {
            width: auto;
            height: auto;
        }

        .centre {

            height: 105%;
            width: 105%;
            margin-left: 100px;

        }

        .responsive2 {
            margin: auto;
            display: block;
            height: 80%;
            width: 80%;
            margin: auto;
        }

        #subject {
            height: 60%;
            width: 60%;
            margin: auto;

        }

        .option {
            height: 60%;
            width: 60%;
            margin: auto;
        }

        .input {
            height: 80%;
            width: 60%;
            margin: auto;

        }


    } */
</style>