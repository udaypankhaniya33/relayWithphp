<?php 
include "../include/dbconnection.php";




$username=$_POST['number'];
$flag=1;
$password=$_POST['password'];




    
    if($flag==1)
    {
        $user = mysqli_query($connection,"select * from `admins_admin` where `number`='$username' AND `password` = '".md5($password)."'   ");
    
        $count = mysqli_num_rows($user);
        $row = mysqli_fetch_array($user);

        if($count > 0)
        {       $_SESSION['id']= $row['id'];
               
                echo "1";
      
            }        
        else
        {
            echo "3";
        }
    }
