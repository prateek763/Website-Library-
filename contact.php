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
if(isset($_POST['cont']))
{
  $id=$_POST['id'];
    $t=$_POST['topic'];
    $p=$_POST['prob'];
    echo " "."$id";
    $sql="insert into contact1(id,topic,prob) values ('$id','$t','$p')";
    if(mysqli_query($conn, $sql)){
                      echo "<script type='text/javascript'>alert('Problem Submitted')</script>";
                      }
                  else{
                        echo "<script type='text/javascript'>alert('Not Contacted')</script>";
                  }
}

 ?>
