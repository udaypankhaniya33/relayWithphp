<?php include "../include/dbconnection.php";
$userId = $_POST["CustomerId"] || "";

$user = mysqli_query($connection, "SELECT * FROM  `user` WHERE `userId`='" . $_POST["CustomerId"] . "' ");
if (mysqli_num_rows($user) > 0) {
    $row = mysqli_fetch_array($user);


    if ($row["status"] == 1) {
        $update = mysqli_query($connection, "UPDATE  `user` SET `status`='0' WHERE `userId`='" . $_POST["CustomerId"] . "' AND `delete`='0'");
        if ($update) {
            echo "1";
        }
    } else {
        $update = mysqli_query($connection, "UPDATE  `user` SET `status`='1' WHERE `userId`='" . $_POST["CustomerId"] . "' AND `delete`='0'");
        if ($update) {
            echo "2";
        }
    }
}
