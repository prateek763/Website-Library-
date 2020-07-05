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
if(isset($_POST['signup'])){
            $n=$_POST['name'];
            $ln=$_POST['lname'];
            $u=$_POST['user'];
            $g=$_POST['gender'];
            $e=$_POST['em'];
            $p=$_POST['pa'];
            $d=$_POST['date'];
            $m=$_POST['month'];
            $y=$_POST['year'];
            $da=$d."/".$m."/".$y;

              $sql="select * from user where id='$u'";
              echo"$sql";
              $r=mysqli_query($conn, $sql);
              $num=mysqli_num_rows($r);

              if($num >= 1){

                echo "<script type='text/javascript'>alert('Member ID Already taken')</script>";
                header("refresh:1; url=sign.html");


              }
              else{
                    $query="insert into user(id,fname,lname,gender, email, pass,date) values ('$u','$n','$ln','$g','$e','$p','$da')";
                  if(mysqli_query($conn, $query)){
                      echo "<script type='text/javascript'>alert('Registration Successful')</script>";
                      $que="create table ".$u."(id varchar(45),name varchar(45),idate varchar(45),exdate varchar(45))";
                      echo"$que";
                      if(mysqli_query($conn,$que))
                      {
                           echo " Table created successfully";
                           header("location:details1.html");
                      }
                      else
                      {
                        echo " Table not created";
                      }
                   }
                  else{
                        echo "<script type='text/javascript'>alert('Registration not  Successful')</script>";
                  }
            }
           
}

if(isset($_POST['login']))
            {
            $u=$_POST['user'];
            $p=$_POST['pass'];
            $sql="select * from user where id='$u'";
            $sql1="select * from admin where id='$u'";
            $r=mysqli_query($conn, $sql);
            $num=mysqli_num_rows($r);

              if($num >= 1)
              {
                $result = $conn->query($sql);
                $row = $result->fetch_assoc();
                $x=$row['pass'];
                if($x==$p && !empty($u) && !empty($p))
                  {
                    header('location:details1.html');
                  }
                else 
                 { echo "<script type='text/javascript'>alert('Failed to Login! Incorrect RollNo or Password')</script>";
                  header('refresh:1; url=login.html');
                }   
              }
              else
              { 
                $result = $conn->query($sql1);
                $row = $result->fetch_assoc();
                $x=$row['pass'];
                if($x==$p && !empty($u) && !empty($p))
                  {
                    header('location:home2.html');
                  }
                else 
                 { echo "<script type='text/javascript'>alert('Failed to Login! Incorrect RollNo or Password')</script>";
                  header('refresh:1; url=login.html');
                } 
              }  
            }
if(isset($_POST['fine']))
{
	header('location:details1.html');
}
if(isset($_POST['cont']))
{
	$id=$_POST['id'];
    $t=$_POST['topic'];
    $p=$_POST['prob'];
    $sql1="insert into contact(id,topic,prob) values('$id','$t','$p')";
    if(mysqli_query($conn, $sql1)){
                      echo "<script type='text/javascript'>alert('Problem Submitted')</script>";
                      header('refresh:0; url=details1.html');
                      }
                  else{
                        echo "<script type='text/javascript'>alert('Not Contacted')</script>";
                  }
}

 ?>
