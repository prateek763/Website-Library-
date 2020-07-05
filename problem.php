<!DOCTYPE html>
<html>
<head>
	<title>Due Details</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="https://kit.fontawesome.com/a076d05399.js"></script>
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="problem.css">
	
</head>
<body>
	<div class="container">
		<h3 id="head"><i class="fa fa-book" aria-hidden="true"style="padding-right:10px; "></i><i>Prateek Library</i></h3>
		<h3 class="t"><i>The World's Largest Knowledge Stadium</i></h3>
		<div class="b">
			<form action="dbconn.php" method="POST">
				<h2><i> Problem Details</i></h2>
				<hr>
				<?php    
					session_start();
				    $dbservername = "127.0.0.1";
				    $dbusername = "root";
				    $dbpassword = "asdf";
				    $conn = mysqli_connect($dbservername, $dbusername, $dbpassword);
			        if($conn){
			            
			        }
		            else{
			            echo"not connected";
	   	            }
			        if(!mysqli_select_db($conn,'webtech')){
			            echo" Database Not Selected";
			        }
			        $sql="select * from contact";
			        $p=mysqli_query($conn, $sql)or die("Error");
					if(mysqli_num_rows($p) > 0){  
						while($row = mysqli_fetch_assoc($p))
						{
							$i=$row['id'];
							$d=$row['topic'];
							$ed=$row['prob'];
							echo"<h3> Member Id:- $i</h3>";
							echo"<h3> Topic:- $d </h3>";
							echo"<h3> Description:- $ed</h3>";
							echo"<hr>";
						} 
					} 
					else{  
					echo "<h3>No Problem to show up.</h3>";  
					} 

				?>
				<input type="submit" name="prob" id="button" value="Ok">
			</form>
		</div>
	</div>

</body>
</html>