<?php
//Track the inactive products
include('../db_connect/db.php');

    $sql = "SELECT * FROM `products`";
    $result = $db_connect->query($sql);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $status = $row['status'];
            $id = $row['id'];
           $count_inactive_days = 0;
            if($status == "0"){
               $count_inactive_days = floatval($row['sorting'])+1;
                $qry = "UPDATE `products` SET `sorting`='$count_inactive_days' WHERE `id`='$id'";
                $run = mysqli_query($db_connect, $qry);
                echo "<span style='color:red'>Inactive</span> $count_inactive_days<br> ";
            }else{
                echo "Active<br>";
            }

            if($count_inactive_days >= 365){
                 $dlt = "DELETE FROM `products` WHERE `id`='$id'";
                 $run = mysqli_query($db_connect, $dlt);
                // echo "<span style='color:red'>Product Deleted</span> $count_inactive_days<br> ";
            }else{

            }
        }
    }
?>