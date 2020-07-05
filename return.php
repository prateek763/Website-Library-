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
if(isset($_POST['return']))
{
  $u=$_POST['id'];
  $bid=$_POST['bid'];
  $mydate=getdate();
  $d=$mydate[mday];
  $m=$mydate[mon];
  $f=0;
  $sql="select * from ".$u." where id='$bid'";
  $result = $conn->query($sql);
  $row = $result->fetch_assoc();
  $x=$row['exdate'];
  $p=strpos($x, "/");
  $ed=(int)substr($x,0,$p);
  $x=substr($x, $p+1);
  $p1=strpos($x, "/");
  $em=(int)substr($x,0,$p1);
  if($m==$em)
  {
    $d1=$d-$ed;
    if($d1<=0)
      $f=$f+0;
    else
      $f=$f+(3*$d1);
  }
  $sql1="update user set fine='$f' where id='$u'";
  $sql2="delete from ".$u." where id='$bid'";
  if(mysqli_query($conn, $sql2))
  {
    echo "<script type='text/javascript'>alert('Book Deleted successfully')</script>";
    if(mysqli_query($conn,$sql1))
    {
      echo " Fine Updated Successfully";
      header("refresh:1; url=home2.html");
    }
    else
    {
      echo " Table not created";
    }
  }
  else
  {
    echo "<script type='text/javascript'>alert('Book Not Added')</script>";
  }
}
 ?>
