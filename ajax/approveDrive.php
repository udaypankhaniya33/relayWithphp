<?php include "../include/dbconnection.php";
$userId=$_POST["CustomerId"]||"";

$user = mysqli_query($connection,"SELECT * FROM  `user` WHERE `userId`='".$_POST["CustomerId"]."' ");
if(mysqli_num_rows($user)>0){
$update=mysqli_query($connection,"UPDATE  `user` SET `is_driver`='1',`is_requested`='2' WHERE `userId`='".$_POST["CustomerId"]."' ");
    if($update){
    echo "1";
    }
}else{
    echo "2";
}
