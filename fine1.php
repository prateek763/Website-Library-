<!DOCTYPE html>
<html>
<head>
	<title>Fine Details</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="https://kit.fontawesome.com/a076d05399.js"></script>
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="fine1.css">
	
</head>
<body>
	<div class="container">
		<h3><i class="fa fa-book" aria-hidden="true"style="padding-right:10px; "></i><i>Prateek Library</i></h3>
		<h3 class="t"><i>The World's Largest Knowledge Stadium</i></h3>
		<div class="b">
			<form action="dbconn.php" method="POST">
				<h2><i>Fine Details</i></h2>
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
			        $f="man123";
			        $sql="select * from user where id='$f'";
			        $result = $conn->query($sql);
                	$row = $result->fetch_assoc();
                	$x=$row['fine'];
                	echo"<h5>Your fine due is Rs $x</h5>"; 

				?>
				<input type="submit" name="fine" id="button" value="OK">
			</form>
		</div>
	</div>

</body>
</html>