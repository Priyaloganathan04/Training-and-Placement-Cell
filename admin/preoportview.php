<style >
td{
	padding: 10px;
}	

</style>

<?php
require_once("../db.php");
error_reporting(0);
$query="SELECT *FROM preport";
$data=mysqli_query($conn,$query);
$total=mysqli_num_rows($data);

if($total!=0)
{
	?>
    <html>
    <head>  
        <title>Placement Report</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
          
    </head>  
    <body>  
        <div class="container">  
            <br />
   <div class="table-responsive">  
    <h3 align="center">PLACEMENT REPORT</h3><br />
    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
		<tr>
                                <th> SNo</th>
                                <th> Regno</th>
                                <th> Department</th>
                                <th> DateOf WrittenTest</th>
                                <th> Company</th>
                                <th> Desingation</th>
                                <th> Salary</th>
                                <th> Email Id</th>
                                <th> Mobile Number</th>
                                <th> Offer Letter</th>
			<th colspan='2'>Operations</th> 
		</tr>

	<?php

	while($result=mysqli_fetch_assoc($data))
	{	

		echo "<tr>
                <td>".$result['sno']."</td>
                <td>".$result['regno']."</td>
                <td>".$result['dept']."</td>
                <td>".$result['dwt']."</td>
                <td>".$result['cmp']."</td>
                <td>".$result['des']."</td>
                <td>".$result['sal']."</td>
                <td>".$result['email']."</td>
                <td>".$result['mno']."</td>
                <td><img src='".$result['img2']."'height='100px' width='100px'></td>

                <td><a href='delete.php?sno=$result[sno]'><input type='submit'value='delete' class='delete' onclick='return checkdelete()'/></a></td>
		</tr>";
	}

}
else
{
	echo "No record found";
}

?>
<script>
    function checkdelete()
    {
        return confirm('Are You Sure You Want To Delete The Record ?');
    }
</script>
</table>