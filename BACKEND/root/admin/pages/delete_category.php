<?php
    // Functions
    include "functions.php";
    // Login
    activeUser();

    $c_id = $_GET['id'];
    $c_img = $_GET['img'];

    $sql = "DELETE FROM `category` WHERE `id`='$c_id'";
    unlink('../../assets/img/category/'.$c_img);
    $run = mysqli_query($db_connect, $sql);
    if($run == true){
        echo "<script>window.location.href='view_category.php?status=deleted'</script>";
        //header('Location: category.php')
    }else{
        echo "<script>window.location.href='view_category.php?status=error'</script>";
    }

?>