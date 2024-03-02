<style >
td{
	padding: 10px;
}	

</style>


    
   
                                    

<?php
include("connection.php");
error_reporting(0);
$query="SELECT *FROM activities";
$data=mysqli_query($conn,$query);
$total=mysqli_num_rows($data);

	

if ($total!=0) {
    ?>
     <html>
    <head>  
        <title>Placement Activities Data</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
          
    </head>  
    <body> 
        <div class="container">  
            <br />
   <div class="table-responsive">  
    <h3 align="center">PLACEMENT ACTIVITIES DATA</h3><br />
    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
		<tr>
                                <th> SNo</th>
                                <th> Date</th>
                                <th> Department</th>
                                <th> Title Of The Program</th>
                                <th> Program</th>
                                <th> Type</th>
                                <th> Total.No Of Student Attended</th>
                                <th> MeetLink / VenueDetails</th>
                                <th> Resource</th>
                                <th> Photo Proof</th>

			<th colspan='2'>Operations</th> 
		</tr>

	<?php

    while ($result=mysqli_fetch_assoc($data)) {
        echo "<tr>
                <td>".$result['sno']."</td>
                <td>".$result['date']."</td>
                <td>".$result['dept']."</td>
                <td>".$result['tp']."</td>
                <td>".$result['pr']."</td>
                <td>".$result['type']."</td>
                <td>".$result['sa']."</td>
                <td>".$result['mlvd']."</td>
                <td>".$result['re']."</td>
                <td><img src='".$result['uploadfile']."'height='100px' width='100px'></td>
        
                <td><a href='delete.php?sno=$result[sno]'><input type='submit'value='delete' class='delete' onclick='return checkdelete()'/></a></td>
		</tr>";
    }
}
?>
<script>
    function checkdelete()
    {
        return confirm('Are You Sure You Want To Delete The Record ?');
    }
</script>
</div>
</table>