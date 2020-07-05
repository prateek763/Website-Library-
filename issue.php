<?php 
session_start();
      $dbservername = "127.0.0.1";
      $dbusername = "root";
      $dbpassword = "asdf";
      $conn = mysqli_connect($dbservername, $dbusername, $dbpassword);
           if($conn){
                 echo "Connection successfull";
           }
           else{
            echo"not connected";
           }
           if(!mysqli_select_db($conn,'webtech')){
                echo" Database Not Selected";
           }
if(isset($_POST['issue']))
{
  $u=$_POST['id'];
  $bid=$_POST['id1'];
  $mydate=getdate();
  $isd=(string)$mydate[mday]."/".(string)$mydate[mon]."/".(string)$mydate[year];
  $d=$mydate[mday]+4;
  if($d>30)
  {
    $mydate[mon]=$mydate[mon]+1;
    $d=$d-30;
  }
  $ed=(string)$d."/".(string)$mydate[mon]."/".(string)$mydate[year];
  $sql="insert into ".$u."(id,idate,exdate) values('$bid','$isd','$ed')";
  echo"$sql";
  if(mysqli_query($conn, $sql))
  {
    echo "<script type='text/javascript'>alert('Book Added successfully')</script>";
    header("refresh:1; url=home2.html");
  }
  else
  {
    echo "<script type='text/javascript'>alert('Book Not Added')</script>";
  }
}
 ?>
