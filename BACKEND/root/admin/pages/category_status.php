<?php
    // Functions
    include "functions.php";
    // Login
    activeUser();

    $c_id = $_GET['id'];
    $c_status = $_GET['status'];

    $sql = "UPDATE `category` SET `status`='$c_status' WHERE `id`='$c_id'";
    $run = mysqli_query($db_connect, $sql);
    if($run == true){
        echo "<script>window.location.href='view_category.php?status=true'</script>";
        //header('Location: category.php')
    }else{
        echo "<script>window.location.href='view_category.php?status=error'</script>";
    }

?>